<?php

/**
 * Theme setup.
 */

namespace App;

use function Roots\bundle;

/**
 * Register the theme assets.
 *
 * @return void
 */
add_action('wp_enqueue_scripts', function () {
    bundle('app')->enqueue();
}, 100);

/**
 * Register the theme assets with the block editor.
 *
 * @return void
 */
add_action('enqueue_block_editor_assets', function () {
    bundle('editor')->enqueue();
}, 100);

/**
 * Register the initial theme setup.
 *
 * @return void
 */
add_action('after_setup_theme', function () {
    /**
     * Enable features from the Soil plugin if activated.
     *
     * @link https://roots.io/plugins/soil/
     */
    add_theme_support('soil', [
        'clean-up',
        'nav-walker',
        'nice-search',
        'relative-urls',
    ]);

    /**
     * Disable full-site editing support.
     *
     * @link https://wptavern.com/gutenberg-10-5-embeds-pdfs-adds-verse-block-color-options-and-introduces-new-patterns
     */
    remove_theme_support('block-templates');

    /**
     * Register the navigation menus.
     *
     * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
     */
    register_nav_menus([
        'primary_navigation' => __('Primary Navigation', 'sage'),
        'footer_navigation' => __('Footer Navigation', 'sage'),
    ]);

    /**
     * Disable the default block patterns.
     *
     * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#disabling-the-default-block-patterns
     */
    remove_theme_support('core-block-patterns');

    /**
     * Enable plugins to manage the document title.
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
     */
    add_theme_support('title-tag');

    /**
     * Enable post thumbnail support.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    /**
     * Enable responsive embed support.
     *
     * @link https://wordpress.org/gutenberg/handbook/designers-developers/developers/themes/theme-support/#responsive-embedded-content
     */
    add_theme_support('responsive-embeds');

    /**
     * Enable HTML5 markup support.
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
     */
    add_theme_support('html5', [
        'caption',
        'comment-form',
        'comment-list',
        'gallery',
        'search-form',
        'script',
        'style',
    ]);

    /**
     * Enable selective refresh for widgets in customizer.
     *
     * @link https://developer.wordpress.org/themes/advanced-topics/customizer-api/#theme-support-in-sidebars
     */
    add_theme_support('customize-selective-refresh-widgets');
}, 20);

/**
 * Register the theme sidebars.
 *
 * @return void
 */
add_action('widgets_init', function () {
    $config = [
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h4 class="pb-0.5">',
        'after_title' => '</h4>',
    ];

    register_sidebar([
        'name' => __('Primary', 'sage'),
        'id' => 'sidebar-primary',
    ] + $config);

    register_sidebar([
        'name' => __('Footer 1', 'sage'),
        'id' => 'sidebar-footer-1',
    ] + $config);

    register_sidebar([
        'name' => __('Footer 2', 'sage'),
        'id' => 'sidebar-footer-2',
    ] + $config);

    register_sidebar([
        'name' => __('Footer 3', 'sage'),
        'id' => 'sidebar-footer-3',
    ] + $config);

    register_sidebar([
        'name' => __('Footer 4', 'sage'),
        'id' => 'sidebar-footer-4',
    ] + $config);

    register_sidebar([
        'name' => __('Newsletter', 'sage'),
        'id' => 'sidebar-newsletter',
    ] + $config);
});


/**
 * Register custom post type - testimonial
 */
add_action('init', function () {
    $labels = array(
        'name'                  => _x('Testimonials', 'Post type general name', 'sage'),
        'singular_name'         => _x('Testimonial', 'Post type singular name', 'sage'),
        'menu_name'             => _x('Testimonials', 'Admin Menu text', 'sage'),
        'name_admin_bar'        => _x('Testimonial', 'Add New on Toolbar', 'sage'),
        // 'add_new'               => __('Add New', 'sage'),
        // 'add_new_item'          => __('Add New Book', 'sage'),
        // 'new_item'              => __('New Book', 'sage'),
        // 'edit_item'             => __('Edit Book', 'sage'),
        // 'view_item'             => __('View Book', 'sage'),
        // 'all_items'             => __('All Books', 'sage'),
        // 'search_items'          => __('Search Books', 'sage'),
        // 'parent_item_colon'     => __('Parent Books:', 'sage'),
        // 'not_found'             => __('No books found.', 'sage'),
        // 'not_found_in_trash'    => __('No books found in Trash.', 'sage'),
        // 'featured_image'        => _x('Book Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'sage'),
        // 'set_featured_image'    => _x('Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'sage'),
        // 'remove_featured_image' => _x('Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'sage'),
        // 'use_featured_image'    => _x('Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'sage'),
        'archives'              => _x('Book archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'sage'),
        // 'insert_into_item'      => _x('Insert into book', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'sage'),
        // 'uploaded_to_this_item' => _x('Uploaded to this book', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'sage'),
        // 'filter_items_list'     => _x('Filter books list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'sage'),
        'items_list_navigation' => _x('Books list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'sage'),
        'items_list'            => _x('Books list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'sage'),
    );
    $args = array(
        'labels'        => $labels,
        'description'   => 'Holds our testimonial items',
        'public'        => true,
        'menu_position' => 5,
        'supports'      => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'publicly_queryable'  => true,
        'exclude_from_search' => false,
        'show_in_rest' => true,
        'rewrite' => array('slug' => 'historie', 'pages' => true)
    );
    register_post_type('testimonial', $args);

    register_post_meta('testimonial', 'author', array(
        'show_in_rest' => true,
        'single' => true,
        'type' => 'string'
    ));
});

/**
 * Block alchemis/testimonials
 */
add_action('init', function () {
    register_block_type('alchemis/testimonials', array(
        'api_version' => 2,
        'render_callback' => function () {
            ob_start();
            include(get_template_directory() . '/resources/blocks/testimonials/testimonials.php');

            return ob_get_clean();
        }
    ));
});

/**
 * Remove global inline styles
 * Comment out for debug
 */
add_action('init', function () {
    remove_action('wp_enqueue_scripts', 'wp_enqueue_global_styles');
    remove_action('wp_footer', 'wp_enqueue_global_styles', 1);
    remove_action('wp_body_open', 'wp_global_styles_render_svg_filters');
});

add_action('wp_enqueue_scripts', function () {
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
    wp_dequeue_style('wc-block-style'); // REMOVE WOOCOMMERCE BLOCK CSS
    wp_dequeue_style('global-styles'); // REMOVE THEME.JSON
    wp_deregister_style('global-styles');
});
remove_filter('render_block', 'wp_render_layout_support_flag', 10, 2);
remove_filter('render_block', 'gutenberg_render_layout_support_flag', 10, 2);
remove_filter('render_block', 'wp_render_elements_support', 10, 2);
remove_filter('render_block', 'gutenberg_render_elements_support', 10, 2);

/**
 * Soil plugin
 */
add_theme_support('soil', [
    'clean-up',
    'disable-rest-api',
    'disable-asset-versioning',
    'disable-trackbacks',
    // 'google-analytics' => 'UA-XXXXX-Y',
    'js-to-footer',
    'nav-walker',
    'nice-search',
    'relative-urls'
]);

/**
 * add translations support
 */
add_action('after_setup_theme', function () {
    load_theme_textdomain('sage', get_template_directory() . '/lang');
});

// ACF Display Custom Fields
add_filter('acf/settings/remove_wp_meta_box', '__return_false');

/**
 * analytics
 */
if (!defined('WP_DEV')) :
    add_action('wp_head', function () {
?>
        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-NK0N6KNLSB"></script>
        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());
            gtag('config', 'G-NK0N6KNLSB');
        </script>
        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=AW-10943144298"></script>
        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());
            gtag('config', 'AW-10943144298');
        </script>
        <!-- Google Tag Manager -->
        <script>
            (function(w, d, s, l, i) {
                w[l] = w[l] || [];
                w[l].push({
                    'gtm.start': new Date().getTime(),
                    event: 'gtm.js'
                });
                var f = d.getElementsByTagName(s)[0],
                    j = d.createElement(s),
                    dl = l != 'dataLayer' ? '&l=' + l : '';
                j.async = true;
                j.src =
                    'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
                f.parentNode.insertBefore(j, f);
            })(window, document, 'script', 'dataLayer', 'GTM-57N9F5N');
        </script>
        <!-- End Google Tag Manager -->
        <!-- Meta Pixel Code -->
        <script>
            ! function(f, b, e, v, n, t, s) {
                if (f.fbq) return;
                n = f.fbq = function() {
                    n.callMethod ?
                        n.callMethod.apply(n, arguments) : n.queue.push(arguments)
                };
                if (!f._fbq) f._fbq = n;
                n.push = n;
                n.loaded = !0;
                n.version = '2.0';
                n.queue = [];
                t = b.createElement(e);
                t.async = !0;
                t.src = v;
                s = b.getElementsByTagName(e)[0];
                s.parentNode.insertBefore(t, s)
            }(window, document, 'script',
                'https://connect.facebook.net/en_US/fbevents.js');
            fbq('init', '1656380098135208');
            fbq('track', 'PageView');
        </script>
        <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=1656380098135208&ev=PageView&noscript=1" /></noscript>
        <!-- End Meta Pixel Code -->
        <meta name="facebook-domain-verification" content="ijmxcp3n5v2mmmklcimc2dfbcb6os7" />
    <?php
    });

    add_action('wp_footer', function () {
    ?>
        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-57N9F5N" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->
    <?php
    });
endif;

/**
 * favicon
 */
add_action('wp_head', function () {
    $favicon_dir = get_stylesheet_directory_uri() . '/favicon';
    ?>
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo $favicon_dir; ?>/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo $favicon_dir; ?>/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $favicon_dir; ?>/favicon-16x16.png">
    <link rel="manifest" href="<?php echo $favicon_dir; ?>/site.webmanifest">
    <link rel="mask-icon" href="<?php echo $favicon_dir; ?>/safari-pinned-tab.svg" color="#5bbad5">
<?php
});
