![Build and Deploy to Cloud Run](https://github.com/ujwaldhakal/things-for-granted-api/workflows/Build%20and%20Deploy%20to%20Cloud%20Run/badge.svg)
## Free Giveaway

Since we are throwing away many consumable goods which could have been helpful for others. 
So this is the place where you list your things out instead of throwing it away. Just visit xxx , register and list down
your products and the one who will need will contact you. Lets spread the happiness.

## Technologies used 

* [Laravel](https://laravel.com/)
* [Lighthouse](https://lighthouse-php.com/) for graphql 

## Installation
* Clone this repo
* `docker compose up -d`
* Run `composer install`
* Run `php artisan migrate` && `php artisan db:seed`
 

## Folder Structure

* `/app` -: is where application logic is
* `app/GraphQL`
    * `Mutations` -: All write part are handled in mutations
    * `Queries` -: All read part are handled in queries
* `routes` -: All routes schema with their resolver, directives 
    

## Contribution Guidelines
* If you found out a bug please create an issue
* If you want to request any feature just create a feature tag issue
* All codes must tested well on local machine before pushing it to production
 

