Feature: Execute monda
    Scenario: Match Success when callback is successful
        Given a good function
        When executed successfully
        Then it should match Success
        And the success value is correctly returned
        But should not match Failure
    Scenario: Match Success when callback is successful
        Given a bad function
        When an exception occured
        Then it should match Failure type
        And the exception is correctly returned
        But should not match Success
