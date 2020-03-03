# Laravel Blog

A ongoing project for learning Laravel.

### Features: 
* __Admin__:
    * CRUD operations for Posts, Categories and Tags.
    * User Invitation - can generate an invite link with a unique token to send out to people
    * Search functionality - Can search posts by title, author, category (or all)
    *  __Dashboard__:
        * Latest Posts
        * Activity logger (create, update, edit, delete, user registration)
* __User Roles (WIP)__:
    * Permissions - As of now certain roles do not have permission to certain actions and page access



# Screenshots
[View more screenshots here](https://imgur.com/a/M5jmzEb)

![screen1](https://i.imgur.com/loPqdof.png)


## Installation
```
git clone https://github.com/kevinchin37/Laravel-Blog.git

composer install
php artisan key:generate
php artisan storage:link
php artisan migrate
php artisan db:seed --class=DatabaseSeeder
```
Set `MAIL_DRIVER` in your .env to `log` or `stmp`(with your Mailtrap info). This is to test out User invitation.

## Database seeding

```
// Required
php artisan db:seed --class=RoleSeeder
php artisan db:seed --class=AdminSeeder

// Optional (Will also create categories and tags per post)
php artisan db:seed --class=PostSeeder

// This will run all 3 seeders
php artisan db:seed --class=DatabaseSeeder

```

## Routes

Admin dashboard: ```http://127.0.0.1:8000/admin```\
After seeding you can log in as admin with:
```
Email: admin@admin
Password: password
```
Frontend: \
Posts: ```http://127.0.0.1:8000/posts```\
Categorys: ```http://127.0.0.1:8000/category/category-name```\
Tags: ```http://127.0.0.1:8000/tag/tag-name```

# Future Project Ideas
[] Look into adding a text editor(WYSIWYG?) for post content
[] Add the ability to create roles on `/admin/roles`
[] Think of sidebar content
