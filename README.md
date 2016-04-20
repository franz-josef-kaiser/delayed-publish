# Remove Publish Meta Box

Removes the "publish" Meta Box for WordPress admin UI post screens during the
first week after the user registered. As long as autosave is activated
(in the `wp-config.php`), the user will be able to write and save posts.
The capability to publish posts will be added after one week after the registration.

## Installation

This is plugin is best served as `mu-plugin`.

To install, we recommend using _Composer_:

1. Download Composer `wget https://getcomposer.org/composer.phar`
1. In your main `project`, just use it on the command line

        php composer.phar require wcm/delayed-publish

**…or…**

Add it to your `composer.json` manually: 

    "require" : {
        "wcm/delayed-publish" : "^1"
    }

**…or…** 

Alternatively you can as well just download the zip from [releases](/releases), 
upload it and install it manually via the `/wp-admin` UI.

## How To

To customize the default timespan of `7` days/ 1 week until the user is allowed 
to publish a post, you can use a filter:

    add_filter( 
        'wcm.delayedpublish.days', 
        function( $days ) { 
            return 23; 
        }
    );

A similar plugin (or just a callback) like this one could be added to show the user
when he is allowed to publish. Use the `user_admin_notices` action or the

	apply_filters( 'post_updated_messages', $messages );

filter to add your custom message above the editor and MetaBoxes on a post screen.

---

## License: MIT / [TL;DR](https://tldrlegal.com/license/mit-license)

See attached license for full text.

**Can:** You may use the work commercially.
You may make changes to the work.
You may distribute the compiled code and/or source.
You may incorporate the work into something that has a more restrictive license.
You may use the work for private use.

**Cannot:** The work is provided "as is". You may not hold the author liable.

**Must:** You must include the copyright notice in all copies or substantial uses of the work.
You must include the license notice in all copies or substantial uses of the work.