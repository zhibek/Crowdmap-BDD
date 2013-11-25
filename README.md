Crowdmap-BDD
============

A collection of BDD features and step files to test functionality on Crowdmap.

**To run:**

1) Start selenium server:
# java -jar selenium/selenium-server-standalone-2.37.0.jar &

2) Run behat and observe the scenarios in the features being run in the browser:
# behat

3) Observe the test results and fix any errors.

**What needs to be installed?**

For Behat, PHP is required. All required dependencies are installed by composer:
# php composer.phar install

On a desktop system (Windows/Mac/Linux) if Java and some compatible browsers (Firefox usually works well, but so do Chrome and others) are installed, then the Selenium (browser control) part of the testing should work out of the box.

On a server/headless system, a virtual framebuffer (e.g. Xvfb) is required, along with installing a browser. When running the browser, it needs to be aware of the Xvfb screen that is available. Other than that, Java is required for Selenium.