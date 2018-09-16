# A Nano-Blog from the scratch
## Intro
This README aims to describe my first PHP project. 
Given my knowledge of few days of experience, I put a comprehensive description of each steps,
explaining what and I did and why I took some decisions.
This excercise has been made on top of some Symfony tutorials, official references 
and few good readings such [PHP in action](https://www.manning.com/books/php-in-action).
  

## Pre-requisites
MacOS comes with a built-in PHP, but my installation was old, 
then, to avoid any conflict, I decided to re-install the latest apache and PHP:
                  
`brew install httpd php72`

`brew install php72 --with-httpd --with-thread-safety`

## Tech requirements
* PHP *
* Symfony * (framework to create websites and web applications)
* MySQL
* Doctrine (object-relational mapper - ORM)
* Twig (template engine for PHP)

`*` = I installed the most recent ones, instead of strictly following the tech requiremnts (PHP 5 an Symfony 2/3).  
Reason is explained above, in Pre-requisites section.

##Tools
### PhpStorm
JetBrains PhpStorm is a commercial, cross-platform IDE for PHP built on JetBrains' IntelliJ IDEA.
*Why PhpStorm instead of a plain-text tool such Sublime?* I used the 30-trial version, mainly because coming from
JVM world, JetBrains tools - and many of their shortcuts - are familiar to me and actually I got advantage this time of using some of them. 
### Sequel Pro
Mac database management application for working with MySQL databases. I'm still using it since some years. 

## Set Up
I installed Composer following its official reference (https://getcomposer.org)  

`composer create-project symfony/website-skeleton nanoblog`

Then I sanity-check my environment running `php bin/console server:run`

The `website-skeleton` is optimized for traditional web applications, not for building a microservices-based architecture. 

Entities are `Author` and `BlogPost`. Tables have been generated using the command:
`php bin/console doctrine:schema:update --force`
and data have been preloaded with `php bin/console doctrine:fixtures:load` 


The application logic behind is pretty simple and implemented into
`AdminController` and `NanoBlogController`. Routing is defined in `config/routes.yaml`   
`AuthorRepository` and `BlogPostRepository` handles database queries.

## User Stories
### User story “User can view blog posts”

_User should be able to view the list of blog posts once he’ll login with
email/password_

Blog posts are loaded by `NanoBlogController.entriesAction()` `/entries` route.
Authentication is checked in `base.html.twig` by loading `block body` 
only if user is authenticated.

_User should be able to open blog post page by clicking on any blog post title in
the blog posts list_

`Entry.html.twig` displays blog post details and is governed 
by `NanoBlogController.entryAction()` routed by `/entry/{slug}`.    

 _User should be able to view the list of blog posts and blog post in another
language (both DE and EN should be available to user)_

Languages routes are defined in `routes.yaml`. Default one, as input parameter in 
`NanoBlogController.entriesAction()`, is english.
`BlogPost` english/german title/text attributes are part of the model 
and loaded given selected languages, in `entries.html.twig`.  

### User story “Manager can add new blog post”
_Manager should be able to create new blog post, by entering following fields for
every available language (EN + DE):_
* Title
* Slug
* Author name
* Author email
* Post text

`AdminController` manages blog posts (create, delete) through `createEntryAction()` 
and `deleteEntryAction()` routed by `/create-entry` and `/delete-entry/{entryId}`

## What is not required, but would be nice to have
_Visual language selector._
A language selector EN|DE is shown on the top right, in `nav_bar.html` and routed
in `routes.yaml`. Based on the selection, `titleDE`|`textDE` or `titleEN`|`textEN` are shown 
in `nano_blog/entries.html.twig` and `nano_blog/entry.html.twig.

_WYSIWYG editor for blog post text._
The majority of full free WYSIWYG editor bundles are not compatible with Symfony 4, 
then I installed [CKeditor](https://ckeditor.com/ckeditor-4/download/#ckeditor4)  manually.

## What is not needed
_Upload of images and media files with blog posts:_ Missing feature.


_Users management as part of functionality is not required, yet it should be easy to create
new managers and users via command line or SQL scripts or any other way:_

New Oauth2 tenants can be managed through the authentication pop-up and registered in https://auth0.com/ . 
An author associated to a tenant can be added through _admin/author.html.twig_. Only authors 
with _title = Author_ are allowed to create new posts as long as _admin_create_entry_ is 
dynamically showed/hidden in `admin/entries.html.twig`


## Retrospective and takeaways
* Symfony offers an easy-going scaffolding but, at the current stage of my learning, hard to be adapted.
* It's impressive to see how big is the community. Any error or question is pretty much covered by any kind of blogs and tutorials. 
* Components, i.e. WYSIWYG editor are affected by inconsistencies and no standard ones are offered out-of-the-box.
* Integration with Oauth2 is straightforward.
* Hacks on Twig templates gave me the chance to achieve faster my objectives by shortcuts, 
but made git remote add origin https://github.com/enr74/nanoblog.git code hard to maintain.
