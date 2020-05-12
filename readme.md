# Laravel Blog

A project for learning Laravel.

### Features: 
* __Admin__:
    * CRUD operations for Posts, Categories and Tags.
    * User Invitation - Can generate unique invite links to send out to people.
    * Search - Can search posts by title, author, category (or all).
    *  __Dashboard__:
        * Widgets - Latest Posts / Category / Tags
        * Activity logger (create, update, edit, delete, user registration)
    * __User Roles__:
        * Roles can have up to 3 permissions (create, update and delete). These can be updated at any time.
        * Admin actions are authorized by Policies based on a user's role and permissions.

# Screenshots
[View more screenshots here](https://imgur.com/a/M5jmzEb)

![screen1](https://i.imgur.com/loPqdof.png)


## Installation
```
git clone https://github.com/kevinchin37/Laravel-Blog.git

cd Laravel-blog
composer install
php artisan key:generate
php artisan storage:link
php artisan migrate

// This will run all required and optional seeders
php artisan db:seed --class=DatabaseSeeder
```
Set `MAIL_DRIVER` in your .env to `log` or `stmp`(with your Mailtrap info). This is to test out User invitation.

## Database seeding
```
// Required
php artisan db:seed --class=PermissionSeeder
php artisan db:seed --class=RoleSeeder
php artisan db:seed --class=AdminSeeder

// Optional (This will create and assign categories and tags for each post)
php artisan db:seed --class=PostSeeder

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

## Future Project Ideas
[] Look into adding a text editor(WYSIWYG?) for post content  
[x] Add the ability to create roles on `/admin/roles`  
[] Think of sidebar content  
[] Add tests
