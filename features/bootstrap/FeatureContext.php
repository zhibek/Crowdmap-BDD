<?php

use Behat\Behat\Context\ClosuredContextInterface,
    Behat\Behat\Context\TranslatedContextInterface,
    Behat\Behat\Context\BehatContext,
    Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode,
    Behat\Gherkin\Node\TableNode;

use Behat\MinkExtension\Context\MinkContext;

use Behat\Mink\Driver\Selenium2Driver;

/**
 * Features context.
 */
class FeatureContext extends MinkContext
{

    // see MinkContext for most step methods

    /**
     * @Given /^I click the "([^"]*)" element$/
     */
    public function iClickTheElement($css)
    {
        $this->getSession()->getPage()->find('css', $css)->click();

        $this->getSession()->wait(5000);
    }

    /**
     * Take screenshot when step fails.
     * Works only with Selenium2Driver.
     * https://gist.github.com/michalochman/3175175
     * 
     * @AfterStep
     */
    public function takeScreenshotAfterFailedStep($event)
    {
        if (4 === $event->getResult()) {
            $driver = $this->getSession()->getDriver();
            if (!($driver instanceof Selenium2Driver)) {
                throw new UnsupportedDriverActionException('Taking screenshots is not supported by %s, use Selenium2Driver instead.', $driver);
            }
     
            $screenshot = $this->getSession()->getDriver()->getScreenshot();;
            file_put_contents('./test.png', $screenshot);
        }
    }

}