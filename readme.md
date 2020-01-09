# Dev/Static Pages for Wordpress

Have you ever needed to spin up a quick wordpress template, and had to go to the Admin panel just to create the page/post to tie into? No longer!

## How?

Under the hood, we're creating a Custom Post Type (CPT) Archive for Wordpress, with the URL you request. We've abstracted it out to make it simpler and easier to spin up pages.

This Custom Post Type is not visible in the admin panel, and won't show up in navigation or in search results.

## Prerequisites

We're using the Custom Permalinks handling of Wordpress, so at the least need to be using a permalink setting other than "Plain" as defined in WP Admin > Settings > Permalinks.

## Installing

Include this plugin in your `wp-content/plugins` directory and activate it!

Then, in your theme's `functions.php` add

```
register_page('demo-page')
```

Next, flush your rewrite rules by going to WP Admin > Settings > Permalinks and clicking "Save Changes", or if you're using WP CLI, by running

```
wp rewrite flush
```

Voila! The page will now show up with the url you specified, such as `yourwebsite.com/demo-page`

Now you can add your own Wordpress template to your theme with `static-{url}.php`, for example:

```
static-demo-page.php
```

### Examples

#### Root URL

Say you need a page to demo for a client, fully static but using your theme's styling/javascript. We'll want them to visit via the url `/demo`

Add the page via your theme's `functions.php`

```
register_page('demo');
```

Create the template in your theme

```
static-demo.php
```

And make your necessary changes to this file!

**Don't forget to flush your rewrite rules!**

#### Nested URL

You want a custom landing page that's 3 levels deep in your site's hierarchy

Add the page via your theme's `functions.php`

```
register_page('posts/content/landing-page');
```

Create the template. In this case, the plugin converts the URL you set up into a more usable string by replacing the slashes with dashes. The page is set up as 'posts-content-landing-page' so the template name would be

```
static-posts-content-landing-page.php
```

**Don't forget to flush your rewrite rules!**


## Built With

* [Wordpress](https://wordpress.org/)
* [Composer](http://getcomposer.org/)

## Contributing

Submit a Pull Request!

## Authors

* **Chris Lagasse** - *Initial work* - [Poutine](https://github.com/poutinedev)

See also the list of [contributors](https://github.com/poutine/devpageswp/contributors) who participated in this project.

## Acknowledgments

* Hat tip to Santiago, who sparked me at work to build this out to be reusable and easier.
