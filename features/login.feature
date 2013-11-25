Feature: Login

  Scenario: Failed Login
    Given I am on "/welcome"
    And I follow "Log in"
    When I fill in the following:
      | login_email | nonexistentuser@example.org |
      | login_password | password |
    And I click the ".button-submit" element
    Then I should be on "/welcome"

  Scenario: Successful Login
    Given I am on "/welcome"
    And I follow "Log in"
    When I fill in the following:
      | login_email | zhibektesting+crowdmap@gmail.com |
      | login_password | zhibektesting0 |
    And I click the ".button-submit" element
    Then I should be on "/posts"