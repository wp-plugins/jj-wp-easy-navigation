<?php
/*
  Plugin Name: jj-WP Easy Navigation
  Plugin URI: http://www.jobyj.in/wordpress/jj-wp-easy-navigation-wordpress-plugin
  Description: Easy Navigation to next and previous posts using arrow keys or navigation buttons.
  Author: Joby Joseph
  Version: 1.0
  Author URI: http://jobyj.in
 */
add_action('wp_print_styles', 'printcss');
add_action('wp_print_scripts', 'printjs');

function printcss() {
    if (is_single ()) {
        $cssfile = plugin_dir_url(__FILE__) . "css/styles.css";
        wp_enqueue_style('jj-wp-nav', $cssfile, false, '1.0');
    }
}

function printjs() {
    if (is_single ()) {
        wp_enqueue_script('jquery', '', array(), false, true);
        $scripturl = plugin_dir_url(__FILE__) . "js/custom.js";
        wp_enqueue_script('customjs', $scripturl, Array('jquery'), '1.0', true);
    }
}

function jj_wp_post_navigation() {

    if (is_single ()) {
        $pluginurl = plugin_dir_url(__FILE__);
        $nextPost = get_next_post(); //Gets next and previous posts and their URIs
        $nextURI = get_permalink($nextPost->ID);
        $nextTitle = get_the_title($nextPost->ID);
        $prevPost = get_previous_post();
        $prevURI = get_permalink($prevPost->ID);
        $prevTitle = get_the_title($prevPost->ID);
        if ($nextPost || $prevPost):
            echo '<div id="jj-prev-post" class="jj-nav-post">';
            if ($prevPost) {
                echo '<div id="jj-prev-post-title"><div class="divContainerDown">';
                $prevthumbnail = get_the_post_thumbnail($prevPost->ID, array(85, 85));
                echo "<div class='jj-thumb-holder'>$prevthumbnail</div>";
                echo "<div class='jj-title-holder'><div class='jj-title-contents'>$prevTitle</div></div>";
                //echo $prevTitle;
                echo '</div>
          <div class="calloutDown">
          <div class="calloutDown2">
          </div>
          </div></div>';
                echo '<a href="' . $prevURI . '">';
                echo "<img src=\"{$pluginurl}img/prev_48.png\"/>";
                echo '</a>';
            };
            echo '</div>';


            echo '<div id="jj-next-post" class="jj-nav-post">';
            if ($nextPost) {
                echo '<div id="jj-next-post-title"><div class="divContainerDown">';
                $nextthumbnail = get_the_post_thumbnail($nextPost->ID, array(85, 85));
                echo "<div class='jj-thumb-holder'>$nextthumbnail</div>";
                echo "<div class='jj-title-holder'><div class='jj-title-contents'>$nextTitle</div></div>";
                echo '</div>
          <div class="calloutDown">
          <div class="calloutDown2">
          </div>
          </div></div>';
                echo '<a href="' . $nextURI . '">';
                echo "<img src=\"{$pluginurl}img/next_48.png\"/>";
                echo '</a>';
            };
            echo '</div>';
        endif;
    }
}

add_action('wp_footer', 'jj_wp_post_navigation');
?>
