@mink:selenium2 @alice(Page) @reset-schema
Feature: Manage a Title widget

    Background:
        Given I am on homepage

    Scenario: I can create a new Title widget
        When I switch to "layout" mode
        Then I should see "New content"
        When I select "Title & headings" from the "1" select of "main_content" slot
        Then I should see "Widget (Title & headings)"
        And I should see "1" quantum
        When I fill in "_a_static_widget_title[content]" with "My Title Widget content"
        And I submit the widget
        Then I should see the success message for Widget edit
        When I reload the page
        Then I should see "My Title Widget content"

    Scenario: I can update a Title widget
        Given the following WidgetMap:
            | view | action | slot         |
            | home | create | main_content |
        And the following WidgetTitle:
            | widgetMap | content              |
            | home      | Title Widget to edit |
        When I reload the page
        Then I should see "Title Widget to edit"
        When I switch to "edit" mode
        And I edit the "Title" widget
        And I should see "1" quantum
        When I fill in "_a_static_widget_title[content]" with "Title Widget modified"
        And I submit the widget
        Then I should see the success message for Widget edit
        When I reload the page
        Then I should see "Title Widget modified"

    Scenario: I can change heading level and style
        Given the following WidgetMap:
            | view | action | slot         |
            | home | create | main_content |
        And the following WidgetTitle:
            | widgetMap | content              | headingLevel | headingStyle |
            | home      | Title Widget to edit | h2           | h4           |
        When I reload the page
        Then I should see a "h2" title with class "h4" and text "Title Widget to edit"
        When I switch to "edit" mode
        And I edit the "Title" widget
        And I should see "1" quantum
        When I fill in "_a_static_widget_title[content]" with "Title Widget modified"
        And I select "h6" from "_a_static_widget_title[headingLevel]"
        And I select "h3" from "_a_static_widget_title[headingStyle]"
        And I submit the widget
        Then I should see the success message for Widget edit
        When I reload the page
        Then I should see a "h6" title with class "h3" and text "Title Widget modified"
