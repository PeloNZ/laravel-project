# Laravel blog

This is a practice Laravel Blog which started out based on the Laracast "Laravel 5.4 From Scratch" tutorial. The source has been upgraded to 5.6.

## Features

Guest Users can
- read existing blog posts
- register then log in
- add comments to posts

Authenticated users can
- Log in
- Create
- Read
- Update
- Delete
- Add comments to posts

## Implementation details

Users
- Stored in mysql table "users"

Posts & comments
- Stored in mongodb collections "posts" & "comments"
- Comments are associated with specific posts

Tests
- PostController test for CRUD operations on blog posts

Front end
- standard laravel bootstrap

## Dev environment

Environment files including Homestead configuration is in /env directory. Mainly needed for MongoDB and phpunit configuration.

## TODO

- user roles for controlling access to delete and update of posts
- WYSIWYG blog post editing, using vuejs markdown component or similar
- delete post confirmation dialog rather than instant
- update post success message
- index page preview of post bodies instead of full body

## Known issues

- The PostController testEdit function won't load the post content so one of the assertions fail. The edit page works fine on the front end.
