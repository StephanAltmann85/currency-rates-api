Feature: Command - currency-rates:update

  Background:
    Given the database is empty

  Scenario: Initial execution will persist entities
  #check logfile empty

  Scenario: Execution will update existing data only if rates have changed and add history entry while currencies with unchanged rates remain untouched
  #check logfile empty

  Scenario: Execution with verbose option
  #check logfile empty

  Scenario: An error caused by client will be logged and cause output on terminal
  #check logfile

  Scenario: An error caused by failed validation will be logged and cause output on terminal
  #check logfile