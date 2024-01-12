Feature: Command - currency-rates:update

  Background:
    Given the log file "currency_rates_update_error_test.log" has been deleted

  Scenario: Initial execution will persist entities
    Given the database is empty
    And the http-client will return response with status code 200 and body:
    """
    <?xml version="1.0" encoding="UTF-8"?>
    <gesmes:Envelope xmlns:gesmes="http://www.gesmes.org/xml/2002-08-01" xmlns="http://www.ecb.int/vocabulary/2002-08-01/eurofxref">
        <gesmes:subject>Reference rates</gesmes:subject>
        <gesmes:Sender>
            <gesmes:name>European Central Bank</gesmes:name>
        </gesmes:Sender>
        <Cube>
            <Cube time='2024-01-04'>
                <Cube currency='TST' rate='1.5'/>
            </Cube>
        </Cube>
    </gesmes:Envelope>
    """
    When I run Command "currency-rates:update"
    Then a currency with iso3 "TST" and rate 1.5 can be found in the database
    And the rate history for currency with iso3 "TST" is empty
    And the log file "currency_rates_update_error_test.log" does not exist

  Scenario: Currencies with unchanged rates remain untouched
    Given the fixtures "currencies.yaml" are loaded
    And the http-client will return response with status code 200 and body:
    """
    <?xml version="1.0" encoding="UTF-8"?>
    <gesmes:Envelope xmlns:gesmes="http://www.gesmes.org/xml/2002-08-01" xmlns="http://www.ecb.int/vocabulary/2002-08-01/eurofxref">
        <gesmes:subject>Reference rates</gesmes:subject>
        <gesmes:Sender>
            <gesmes:name>European Central Bank</gesmes:name>
        </gesmes:Sender>
        <Cube>
            <Cube time='2024-01-04'>
                <Cube currency='TST' rate='1'/>
            </Cube>
        </Cube>
    </gesmes:Envelope>
    """
    When I run Command "currency-rates:update"
    Then a currency with iso3 "TST" and rate 1 can be found in the database
    And the rate history for currency with iso3 "TST" is empty
    And the log file "currency_rates_update_error_test.log" does not exist

  Scenario: Execution will update existing data only if rates have changed and add history entry
    Given the fixtures "currencies.yaml" are loaded
    And the http-client will return response with status code 200 and body:
    """
    <?xml version="1.0" encoding="UTF-8"?>
    <gesmes:Envelope xmlns:gesmes="http://www.gesmes.org/xml/2002-08-01" xmlns="http://www.ecb.int/vocabulary/2002-08-01/eurofxref">
        <gesmes:subject>Reference rates</gesmes:subject>
        <gesmes:Sender>
            <gesmes:name>European Central Bank</gesmes:name>
        </gesmes:Sender>
        <Cube>
            <Cube time='2024-01-04'>
                <Cube currency='TST' rate='1.5'/>
            </Cube>
        </Cube>
    </gesmes:Envelope>
    """
    When I run Command "currency-rates:update"
    Then a currency with iso3 "TST" and rate 1.5 can be found in the database
    And a rate history entry for currency "TST" with rate 1 from "2020-01-01 12:00:00" exists
    And the log file "currency_rates_update_error_test.log" does not exist

  Scenario: Execution with channel option - Valid channel
    Given the database is empty
    And the http-client will return response with status code 200 and body:
    """
    <?xml version="1.0" encoding="UTF-8"?>
    <gesmes:Envelope xmlns:gesmes="http://www.gesmes.org/xml/2002-08-01" xmlns="http://www.ecb.int/vocabulary/2002-08-01/eurofxref">
        <gesmes:subject>Reference rates</gesmes:subject>
        <gesmes:Sender>
            <gesmes:name>European Central Bank</gesmes:name>
        </gesmes:Sender>
        <Cube>
            <Cube time='2024-01-04'>
                <Cube currency='TST' rate='1.5'/>
            </Cube>
        </Cube>
    </gesmes:Envelope>
    """
    When I run Command "currency-rates:update" with "--channel=ECB"
    Then a currency with iso3 "TST" and rate 1.5 can be found in the database
    And the rate history for currency with iso3 "TST" is empty
    And the log file "currency_rates_update_error_test.log" does not exist

  Scenario: Execution with channel option - Invalid channel
    Given the fixtures "currencies.yaml" are loaded
    And the http-client will return response with status code 200 and body:
    """
    <?xml version="1.0" encoding="UTF-8"?>
    <gesmes:Envelope xmlns:gesmes="http://www.gesmes.org/xml/2002-08-01" xmlns="http://www.ecb.int/vocabulary/2002-08-01/eurofxref">
        <gesmes:subject>Reference rates</gesmes:subject>
        <gesmes:Sender>
            <gesmes:name>European Central Bank</gesmes:name>
        </gesmes:Sender>
        <Cube>
            <Cube time='2024-01-04'>
                <Cube currency='TST' rate='1.5'/>
            </Cube>
        </Cube>
    </gesmes:Envelope>
    """
    When I run Command "currency-rates:update" with "--channel=INVALID"
    Then a currency with iso3 "TST" and rate 1 can be found in the database
    And the rate history for currency with iso3 "TST" is empty
    Then the log file "currency_rates_update_error_test.log" does not exist

  Scenario: An error caused by client will be logged and cause output on terminal
    Given the database is empty
    And the http-client will return response with status code 500 and body:
    """
    Error
    """
    When I run Command "currency-rates:update"
    And I read the log file "currency_rates_update_error_test.log"
    Then the log file contains:
    """
    currency_rates_update.ERROR: An error occurred while collecting currency rates! {"channel":"ECB","message":"HTTP 500 returned for \"https://www.ecb.europa.eu/stats/eurofxref/eurofxref-daily.xml\"."}
    """
    And the output should contain:
    """
    ERROR     [currency_rates_update] An error occurred while collecting currency rates! ["channel" => "ECB","message" => "HTTP 500 returned for "https://www.ecb.europa.eu/stats/eurofxref/eurofxref-daily.xml"."]
    """

  Scenario: An error caused by failed validation will be logged and cause output on terminal
    Given the database is empty
    And the http-client will return response with status code 200 and body:
    """
    <?xml version="1.0" encoding="UTF-8"?>
    <gesmes:Envelope xmlns:gesmes="http://www.gesmes.org/xml/2002-08-01" xmlns="http://www.ecb.int/vocabulary/2002-08-01/eurofxref">
        <gesmes:subject>Reference rates</gesmes:subject>
        <gesmes:Sender>
            <gesmes:name>European Central Bank</gesmes:name>
        </gesmes:Sender>
        <Cube>
            <Cube time='2024-01-04'>
                <Cube currency='TSTF' rate='1.5'/>
            </Cube>
        </Cube>
    </gesmes:Envelope>
    """
    When I run Command "currency-rates:update"
    And I read the log file "currency_rates_update_error_test.log"
    Then the log file contains:
    """
    currency_rates_update.ERROR: An error occurred while collecting currency rates! {"channel":"ECB","message":"Object(App\\Collector\\Currency\\Channel\\Ecb\\Response\\GetRatesResponse).currencyRates[0].iso3:\n    This value should have exactly 3 characters.
    """
    And the output should contain:
    """
    Object(App\Collector\Currency\Channel\Ecb\Response\GetRatesResponse).currencyRates[0].iso3:\n      This value should have exactly 3 characters
    """