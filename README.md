### Installation of Vividfront Repeatable Editor
### From the programmatical genius of Chris DeMarco and Kevin Borling

1. Open a command prompt and navigate to your Wordpress installation's plugins folder.  Typically, C:/xampp/htdocs/wordpress/wp-content/plugins
3. Remove the file called content-gallery.php and place it in your current theme's directory.  
4. Log into Wordpress and activate this plugin from the Plugins menu in Wordpress administration area.
5. In your current theme, open single.php and type the following "<?php get_template_part( 'content', 'gallery' ); ?>" without the quotes of course