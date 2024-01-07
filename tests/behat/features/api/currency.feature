Feature: API Currency

  Background:
    Given the database is empty

  Scenario: Requesting /api/currencies - Format: default

  Scenario: Requesting /api/currencies - Format: CSV

  Scenario: Requesting /api/currencies/{iso3} - Format: default

  Scenario: Requesting /api/currencies/{iso3) - Format: CSV

  Scenario: Requesting /api/currencies/{iso3} with not existing currency

  Scenario: Requesting /api/currencies/{iso3} with invalid iso3

  Scenario: Requesting /api/currencies/{iso3}/history - Format: default

  Scenario: Requesting /api/currencies/{iso3)/history - Format: CSV

  Scenario: Requesting /api/currencies/{iso3}/history with pagination
