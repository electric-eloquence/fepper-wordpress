# Fepper Child

## Description

Use this child theme to customize the Fepper parent theme.

## Installation

* [Install WordPress alongside Fepper](https://github.com/electric-eloquence/fepper-wordpress#user-content-wordpress-install).
* Be sure there is an instance of the [Fepper parent theme](https://wordpress.org/themes/fepper/) 
  at `backend/wordpress/wp-content/themes`.
* Activate this theme in the browser admin at /wp-admin/themes.php

## Fepper Usage

* [Install Fepper](https://github.com/electric-eloquence/fepper-wordpress#user-content-install).
* Launch Fepper on the command line:
  * `fp`
* Write your frontend code in the `source` directory.
* Sync your frontend code with the WordPress backend:
  * `fp syncback`

## WordPress Usage

* This child theme demonstrates a Hero + Subs + Hoagies graphical layout for the homepage.
* The Hero section will be populated by the first post under the Hero category.
* The Subs section will be populated by the first three posts under the Sub category.
* The Hoagies section will be populated by a configurable number of posts that are neither Heroes nor Subs.
* The Hero + Subs + Hoagies layout is by no means mandatory.
* You are welcome (indeed encouraged) to use any frontend code you wish.
