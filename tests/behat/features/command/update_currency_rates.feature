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

  Scenario:  Test command execution with original response
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
                <Cube currency='USD' rate='1.0953'/>
                <Cube currency='JPY' rate='157.91'/>
                <Cube currency='BGN' rate='1.9558'/>
                <Cube currency='CZK' rate='24.652'/>
                <Cube currency='DKK' rate='7.4590'/>
                <Cube currency='GBP' rate='0.86278'/>
                <Cube currency='HUF' rate='378.85'/>
                <Cube currency='PLN' rate='4.3460'/>
                <Cube currency='RON' rate='4.9733'/>
                <Cube currency='SEK' rate='11.1905'/>
                <Cube currency='CHF' rate='0.9313'/>
                <Cube currency='ISK' rate='150.50'/>
                <Cube currency='NOK' rate='11.2845'/>
                <Cube currency='TRY' rate='32.6087'/>
                <Cube currency='AUD' rate='1.6280'/>
                <Cube currency='BRL' rate='5.3761'/>
                <Cube currency='CAD' rate='1.4603'/>
                <Cube currency='CNY' rate='7.8330'/>
                <Cube currency='HKD' rate='8.5523'/>
                <Cube currency='IDR' rate='16994.46'/>
                <Cube currency='ILS' rate='3.9973'/>
                <Cube currency='INR' rate='91.1745'/>
                <Cube currency='KRW' rate='1434.25'/>
                <Cube currency='MXN' rate='18.6124'/>
                <Cube currency='MYR' rate='5.0762'/>
                <Cube currency='NZD' rate='1.7528'/>
                <Cube currency='PHP' rate='60.833'/>
                <Cube currency='SGD' rate='1.4546'/>
                <Cube currency='THB' rate='37.750'/>
                <Cube currency='ZAR' rate='20.4271'/>
            </Cube>
        </Cube>
    </gesmes:Envelope>
    """
    When I run Command "currency-rates:update"
    Then a currency with iso3 "USD" and rate 1.0953 can be found in the database
    Then a currency with iso3 "JPY" and rate 157.91 can be found in the database
    Then a currency with iso3 "BGN" and rate 1.9558 can be found in the database
    Then a currency with iso3 "CZK" and rate 24.652 can be found in the database
    Then a currency with iso3 "CZK" and rate 24.652 can be found in the database
    Then a currency with iso3 "DKK" and rate 7.4590 can be found in the database
    Then a currency with iso3 "GBP" and rate 0.86278 can be found in the database
    Then a currency with iso3 "HUF" and rate 378.85 can be found in the database
    Then a currency with iso3 "PLN" and rate 4.3460 can be found in the database
    Then a currency with iso3 "RON" and rate 4.9733 can be found in the database
    Then a currency with iso3 "SEK" and rate 11.1905 can be found in the database
    Then a currency with iso3 "CHF" and rate 0.9313 can be found in the database
    Then a currency with iso3 "ISK" and rate 150.50 can be found in the database
    Then a currency with iso3 "NOK" and rate 11.2845 can be found in the database
    Then a currency with iso3 "TRY" and rate 32.6087 can be found in the database
    Then a currency with iso3 "AUD" and rate 1.6280 can be found in the database
    Then a currency with iso3 "BRL" and rate 5.3761 can be found in the database
    Then a currency with iso3 "CAD" and rate 1.4603 can be found in the database
    Then a currency with iso3 "CNY" and rate 7.8330 can be found in the database
    Then a currency with iso3 "HKD" and rate 8.5523 can be found in the database
    Then a currency with iso3 "IDR" and rate 16994.46 can be found in the database
    Then a currency with iso3 "ILS" and rate 3.9973 can be found in the database
    Then a currency with iso3 "INR" and rate 91.1745 can be found in the database
    Then a currency with iso3 "KRW" and rate 1434.25 can be found in the database
    Then a currency with iso3 "MXN" and rate 18.6124 can be found in the database
    Then a currency with iso3 "MYR" and rate 5.0762 can be found in the database
    Then a currency with iso3 "NZD" and rate 1.7528 can be found in the database
    Then a currency with iso3 "PHP" and rate 60.833 can be found in the database
    Then a currency with iso3 "SGD" and rate 1.4546 can be found in the database
    Then a currency with iso3 "THB" and rate 37.750 can be found in the database
    Then a currency with iso3 "ZAR" and rate 20.4271 can be found in the database
    And the log file "currency_rates_update_error_test.log" does not exist
