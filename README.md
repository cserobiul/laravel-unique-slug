# Laravel Unicode Supported Unique Slug Generator Package
Very Simple and Easy Package
## Installation
```sh
composer require cserobiul/slug
```
## Configuration
```sh
No Configuration Need
```

## Use from Controller
Import Slug class
```php
use Cserobiul\Slug\Slug;
```

## Publish configuration
```php
php artisan vendor:publish cserobiul/slug
```

### Example #01- Blog unique slug from 'Blog Title'
Suppose, we already have `blogs` table and added an `slug` column which is unique. Now, if we passed `title` and generate unique `slug` from that.

```php
// 1st time create slug 
Slug::make('blogs', 'Blog Title', 'slug');
// Output: blog-title

// 2nd time create slug 
Slug::make('blogs', 'Blog Title', 'slug');
// Output: blog-title-1

// 3rd time create slug 
Slug::make('blogs', 'Blog Title', 'slug');
// Output: blog-title-2

// 4th time create slug 
Slug::make('blogs', 'Blog Title', 'slug');
// Output: blog-title-3

```

### Example #02- Blog 'Unicode Title' to unique slug 

```php
// 1st time create slug 
Slug::make('blogs', 'প্রেমের নাম বেদনা', 'slug');
// Output: প্রেমের-নাম-বেদনা

// 2nd time create slug 
Slug::make('blogs', 'প্রেমের নাম বেদনা', 'slug');
// Output: প্রেমের-নাম-বেদনা-1

// 3rd time create slug 
Slug::make('blogs', 'প্রেমের নাম বেদনা', 'slug');
// Output: প্রেমের-নাম-বেদনা-2

// 4th time create slug 
Slug::make('blogs', 'প্রেমের নাম বেদনা', 'slug');
// Output: প্রেমের-নাম-বেদনা-3

```


### Example #03 - Pass custom separator for Customer Table

Suppose separator is `_` underscore.

```php
// 1st time create customer username.
UniqueSlug::generate('customers', 'jony', 'username', '_'); 
// Output: jony

// 2nd time create customer username.
UniqueSlug::generate('customers', 'jony', 'username', '_');
// Output: jony_1

// 3rd time create customer username.
UniqueSlug::generate('customers', 'jony', 'username', '_');
// Output: jony_2

// 4th time create customer username.
UniqueSlug::generate('customers', 'jony', 'username', '_'); 
// Output: jony_3

```

## Contribution
Anyone can create any Pull request.




