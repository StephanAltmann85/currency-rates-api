Feature: API Currency

  Background:
    Given the fixtures "currencies.yaml" are loaded

  Scenario: Requesting /api/currencies - Format: default
    When I request "/api/currencies" with method "GET"
    Then the status code is 200
    And the response body contains:
    """
    [{"iso3":"TST","rate":1.0,"updatedAt":"2020-01-01T12:00:00+00:00"},{"iso3":"TWD","rate":10.8,"updatedAt":"2020-01-01T12:00:00+00:00"},{"iso3":"USD","rate":1.08,"updatedAt":"2020-01-01T12:00:00+00:00"}]
    """
  Scenario: Requesting /api/currencies - Format: CSV
    Given the "accept" request header is "text/csv"
    When I request "/api/currencies" with method "GET"
    Then the status code is 200
    And the response body contains:
    """
    iso3,rate,updatedAt
    TST,1,2020-01-01T12:00:00+00:00
    TWD,10.8,2020-01-01T12:00:00+00:00
    USD,1.08,2020-01-01T12:00:00+00:00
    """

  Scenario: Requesting /api/currencies/{iso3} - Format: default
    When I request "/api/currencies/USD" with method "GET"
    Then the status code is 200
    And the response body contains:
    """
    {"iso3":"USD","rate":1.08,"updatedAt":"2020-01-01T12:00:00+00:00"}
    """

  Scenario: Requesting /api/currencies/{iso3) - Format: CSV
    Given the "accept" request header is "text/csv"
    When I request "/api/currencies/USD" with method "GET"
    Then the status code is 200
    And the response body contains:
    """
    iso3,rate,updatedAt
    USD,1.08,2020-01-01T12:00:00+00:00
    """

  Scenario: Requesting /api/currencies/{iso3} with not existing currency
    When I request "/api/currencies/NIL" with method "GET"
    Then the status code is 404
    And the response body contains:
    """
    "detail":"Not Found","status":404
    """

  Scenario: Requesting /api/currencies/{iso3} with invalid iso3
    When I request "/api/currencies/INVALIDISO3" with method "GET"
    Then the status code is 404
    And the response body contains:
    """
    "detail":"Not Found","status":404
    """

  Scenario: Requesting /api/currencies/{iso3}/history - Format: default
    When I request "/api/currencies/TWD/history" with method "GET"
    Then the status code is 200
    And the response body contains:
    """
    [{"rate":1.3,"date":"2020-01-04T12:00:00+00:00"},{"rate":1.2,"date":"2020-01-03T13:00:00+00:00"},{"rate":1.2,"date":"2020-01-03T12:00:00+00:00"},{"rate":1.1,"date":"2020-01-02T12:00:00+00:00"},{"rate":1.0,"date":"2020-01-01T12:00:00+00:00"}]
    """

  Scenario: Requesting /api/currencies/{iso3)/history - Format: CSV
    Given the "accept" request header is "text/csv"
    When I request "/api/currencies/TWD/history" with method "GET"
    Then the status code is 200
    And the response body contains:
    """
    rate,date
    1.3,2020-01-04T12:00:00+00:00
    1.2,2020-01-03T13:00:00+00:00
    1.2,2020-01-03T12:00:00+00:00
    1.1,2020-01-02T12:00:00+00:00
    1,2020-01-01T12:00:00+00:00
    """

  Scenario: Requesting /api/currencies/{iso3}/history with pagination
    When I request "/api/currencies/USD/history" with method "GET"
    Then the status code is 200
    And the response body contains 28 elements
    When I request "/api/currencies/USD/history?page=2" with method "GET"
    Then the status code is 200
    And the response body contains 12 elements
