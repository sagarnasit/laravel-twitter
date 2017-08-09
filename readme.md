<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

## About Application

This is a Laravel Application with expressive, elegant syntax which  allows a user to do following activities:

- Provides User to login in the application.
- Login page redirects a user to twitter.com where a user can login with his twitter account.
- In order to use this application, the user must allow an application to access Twitter.
- Successful login redirects a user to the home page.
- Home page display slider with latest 10 tweets with a timestamp from logged in user.
- It also displays 10 Followers of logged in user right below the slider.
- The user can post a new tweet from the application.
- The user can search his/her follower from search text box that lists out matched followers without any page reload.
- On clicking of follower name from a list will change slider with corresponding clicked user's latest 10 tweets.
- The user can get his/her tweets in PDF file via Email by clicking Email button above the slider.
- Email button will ask for an email address on which user wants to receive his/her Tweets as PDF file.


## Directory Structure
.
    ├── Root Directory
    ├── app
    |   ├── Http
    |   |   ├── Controllers     # Controllers handling request and response
    |   |   ├── Middleware      # Applied Middleware
    │   ├── database            
    |   |   ├── migrations      # contain all migrations files for the database
    │   ├── public              # all publicaly available files i.e images,css,js
    │   └── resources
    |   |   ├── views           # contain all the php blade files which render on browser
    |   ├── routes              # contain all routes of application
    └── ...


## System Requirenments
- PHP >= 5.6.4
    - OpenSSL PHP Extension
    - PDO PHP Extension
    - Mbstring PHP Extension
    - Tokenizer PHP Extension
    - XML PHP Extension
- Mysql
- Composer (https://getcomposer.org/)
- Git
- For more detail about laravel application requirenments visit <a href="https://laravel.com/docs/5.4/installation#installation">Here</a>

## Installation
- Use the following command to clone application on your machine(Git)
    - `git clone https://github.com/sagarnasit/Twitter_App.git`

- After cloning run following command inside root directory to install all libraries.
    - `composer install --no-dev`

## Constraint of Using Application
 - User must have a twitter account.
 - In order to login successfully, a user must allow permission to the application.
 - Twitter account of a user must be public in order to view its tweet and follower.

## 3rd Party Libraries used in application
- <a href="https://github.com/laravel/socialite" >Socialite</a> for Login With Twitter
    - <strong>Path: </strong> /vendor/laravel/socialite
- <a href="https://github.com/thujohn/twitter">Thujohn/Twitter </a>for Twitter API
    - <strong>Path: </strong> /vendor/thujohn/twitter
- <a href="http://getbootstrap.com/">Bootstrap</a> CDN for Responsive Design
- <a href="https://jquery.com/">JQuery</a> CDN for Ajax
- <a href="http://fontawesome.io/get-started/">Font Awesome</a>CDN for Icons

## Note
- In order to maintain the latest version of  Bootstrap and Jquery, it linked with CDN.
- Because of composer strictly installed all the libraries in vendor folder inside root folder, I mention all 3rd party libraries above.
