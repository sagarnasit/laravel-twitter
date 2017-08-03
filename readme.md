<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>
##Twitter App

## About Application

This is Laravel Application with expressive, elegant syntax which can allow user to do following activities:

- Provide User to login in application.
- Login page redirect user to twitter.com where user can login with his twitter account.
- User has to allow application to use twitter in order to use this application.
- Successfull login redirect user to the home page.
- Home page display slider with latest 10 tweets with timestamp from logged in user.
- It also display 10 Follower of logged in user right bellow the slider.
- User can post new tweet from application.
- User can search his/her follower from search text box that list out matched followers without any page reload.
- On clicking of follower name from list will change slider with corressponding clicked user's latest 10 tweets.
- User can also get his tweets by clicking Email button above the slider.
- Email button will ask for email address on which user want to receive his/her Tweets as PDF file.

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
For more detail about laravel application requirenments visit <a href="https://laravel.com/docs/5.4/installation#installation">Here</a>

## Install
Use following command to clone application on your machine
- https://github.com/sagarnasit/Twitter_App.git

After Completion of clonning give coposer update
- composer update

## Constrain of Using Application
- User must have a twitter account.
- User must allow permission to application to login successful.
- Twitter account of a user must be public in order to view its tweet and follower.
- Due to the twitter api limitation for fetching data, there may be possiblity of missing some data.


## 3rd Party Libraries used in application
- <a href="https://github.com/laravel/socialite" >Socialite</a> for Login With Tweeter
<strong>Path=</strong> /vendor/laravel/socialite
- <a href="https://github.com/thujohn/twitter">Thujohn/Twitter </a>for fetching tweets and follower detail
<strong>Directory Path=</strong> /vendor/thujohn/twitter
- <a href="http://getbootstrap.com/">Bootstrap</a> CDN for Responsive Design
- <a href="https://jquery.com/">JQuery</a> CDNFor Ajax
- <a href="http://fontawesome.io/get-started/"> CDN Font Awesome</a> For Icons


## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
