Feature: Option monad
    Scenario: Match "None" when value is null
        Given a value is null
        When value is wrapped with Maybe
        Then it should match None
        But should not match Some null
    Scenario: Match "Some" when value is not null
        Given a value is 3
        When value is wrapped with Maybe
        Then it should match Some 3
        But should not match None
