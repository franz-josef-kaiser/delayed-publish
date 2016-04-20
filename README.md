# Remove Publish Meta Box

Removes the "publish" Meta Box for WordPress admin UI post screens during the
first week after the user registered. As long as autosave is activated
(in the `wp-config.php`), the user will be able to write and save posts.
The capability to publish posts will be added after one week after the registration.

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

Best served as `mu-plugin`.

## License

MIT