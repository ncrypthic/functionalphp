<?php

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use LLA\Functional as F;
use PHPUnit\Framework\Assert;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context
{
    private $value;
    private $maybe;
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
    }
    /**
     * @Given a value is null
     */
    public function aValueIsNull()
    {
        $this->value = null;
    }
    /**
     * @Given a value is 3
     */
    public function aValueIs3()
    {
        $this->value = 3;
    }
    /**
     * @When value is wrapped with Maybe
     */
    public function valueIsWrappedWithMaybe()
    {
        $this->maybe = F\Maybe($this->value);
    }
    /**
     * @Then it should match None
     */
    public function itShouldMatchNone()
    {
        $result = $this->maybe->match()
            ->case(F\None(), function($val) { return null; })
            ->case(F\Some(null), function($val) { return $val; })
            ->val();
        Assert::assertNull($result);
    }
    /**
     * @Then should not match Some null
     */
    public function shouldNotMatchSomeNull()
    {
        $result = $this->maybe->match()
            ->case(F\None(), function($val) { return null; })
            ->case(F\Some(null), function($val) {return $val; })
            ->val();
        Assert::assertNull($result);
    }
    /**
     * @Then it should match Some 3
     */
    public function itShouldMatchSome3()
    {
        $result = $this->maybe->match()
            ->case(F\None(), function($val) { return null; })
            ->case(F\Some(3), function($val) { return $val; })
            ->val();
        Assert::assertEquals($result, 3);
    }
    /**
     * @Then should not match None
     */
    public function shouldNotMatchNone()
    {
        $result = $this->maybe->match()
            ->case(F\None(), function($val) { return null; })
            ->case(F\Some(3), function($val) { return $val; })
            ->val();
        Assert::assertEquals($result, 3);
    }
    /**
     * @Given a good function
     */
    public function aGoodFunction()
    {
        $this->goodFunction = function() {
            return F\Success(true);
        };
    }
    /**
     * @When executed successfully
     */
    public function executedSuccessfully()
    {
        $this->goodProcess = F\Execute($this->goodFunction);
    }
    /**
     * @Then it should match Success
     */
    public function itShouldMatchSuccess()
    {
        $exc = new \Exception("error");
        $result = $this->goodProcess->match()
            ->case(F\Success(true), function($val) { return $val; })
            ->case(F\Failure($exc), function(\Exception $exc) { return $exc; })
            ->val();
        Assert::assertEquals($result, true);
    }
    /**
     * @Then the success value is correctly returned
     */
    public function theSuccessValueIsCorrectlyReturned()
    {
        $exc = new \Exception("error");
        $result = $this->goodProcess->match()
            ->case(F\Success(true), function($val) { return $val; })
            ->case(F\Failure($exc), function(\Exception $exc) { return $exc; })
            ->val();
        Assert::assertEquals($result, true);
    }
    /**
     * @Then should not match Failure
     */
    public function shouldNotMatchFailure()
    {
        $exc = new \Exception("error");
        $result = $this->goodProcess->match()
            ->case(F\Success(true), function($val) { return $val; })
            ->case(F\Failure($exc), function(\Exception $exc) { return $exc; })
            ->val();
        Assert::assertNotEquals($result, $exc);
    }
    /**
     * @Given a bad function
     */
    public function aBadFunction()
    {
        $this->badFunction = function() {
            throw new \Exception("error");
        };
    }
    /**
     * @When an exception occured
     */
    public function anExceptionOccured()
    {
        $this->badProcess = F\Execute($this->badFunction);
    }
    /**
     * @Then it should match Failure type
     */
    public function itShouldMatchFailureType()
    {
        $exc = new \Exception("error");
        $result = $this->badProcess->match()
            ->case(F\Success(true), function($val) { return $val; })
            ->case(F\Failure($exc), function(\Exception $exc) { return $exc; })
            ->val();
        Assert::assertEquals($result, $exc);
    }
    /**
     * @Then the exception is correctly returned
     */
    public function theExceptionIsCorrectlyReturned()
    {
        $exc = new \Exception("error");
        $result = $this->badProcess->match()
            ->case(F\Success(true), function($val) { return $val; })
            ->case(F\Failure($exc), function(\Exception $exc) { return $exc; })
            ->val();
        Assert::assertEquals($result, $exc);
    }
    /**
     * @Then should not match Success
     */
    public function shouldNotMatchSuccess()
    {
        $exc = new \Exception("error");
        $result = $this->badProcess->match()
            ->case(F\Success(true), function($val) { return $val; })
            ->case(F\Failure($exc), function(\Exception $exc) { return $exc; })
            ->val();
        Assert::assertNotEquals($result, true);
    }
}
