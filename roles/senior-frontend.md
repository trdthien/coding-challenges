## Senior Frontend Developer Challenge

### Introduction

An independent contractor is having trouble keeping track of the hours she worked for a client.  She has asked you to create a simple time tracking application.

**This challenge is to be completed using Bootstrap and React/Vue/Polymer and their respective routing and state management plugins.**

You are free to use any additional libraries.

Please include instructions for how to build and run your solution.

#### Bonus Points
* Use gulp and webpack to build/compile your solution
* Add unit tests using mocha/chai
* Store the application data in a Web Storage area

### Requirements
The application will be a single page application with the following pages.

#### Welcome (/welcome)
* A welcome screen will greet the user and ask for their `first name`, `last name`, and `email address`
  * Check the first and last name (they should not be empty), and that the email is valid

#### Time Log (/time-log)
* Once the user has entered in their information, they will be brought to a page with a dynamic header that lists the following:
  * the current date and time;
  * how many hours have been tracked; and
  * the user's first name and last name.
* In the main content, the user will be presented with an inline form with four columns that will accept a `date`, `start time`, `end time`, and `description`
  * Date and Time fields should make use of a widget to input their respective fields.
  * As the user enters in rows, the total amount of hours should be dynamically calculated and updated in the header.

#### Technical Considerations
* There will be no server-side persistence for this application.
* You are strongly encouraged to leverage existing functionality (i.e., libraries and plugins) where possible.

### Criteria
For full transparency, the test will be scored according to the following:
* Validation
* Use of services, controllers, and models
* Best practices
* Reusable code
* Decoupled code
* Ability to transform requirements into code
