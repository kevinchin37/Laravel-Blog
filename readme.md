# Laravel Blog

A project for learning Laravel.

## Installation

```
git clone https://github.com/kevinchin37/Laravel-Blog.git

composer install
php artisan key:generate
php artisan storage:link
php artisan migrate
php artisan db:seed --class=DatabaseSeeder
```

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
