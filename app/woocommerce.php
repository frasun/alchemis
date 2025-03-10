<?php

namespace App;

/**
 * Show a shop page description on product archives.
 */
add_action('woocommerce_archive_description', function () {
    // Don't display the description on search results page.
    if (is_search()) {
        return;
    }

    if (is_post_type_archive('product') && in_array(absint(get_query_var('paged')), array(0, 1), true)) {
        $shop_page = get_post(wc_get_page_id('shop'));
        if ($shop_page) {

            $allowed_html = wp_kses_allowed_html('post');

            // This is needed for the search product block to work.
            $allowed_html = array_merge(
                $allowed_html,
                array(
                    'form'   => array(
                        'action'         => true,
                        'accept'         => true,
                        'accept-charset' => true,
                        'enctype'        => true,
                        'method'         => true,
                        'name'           => true,
                        'target'         => true,
                    ),

                    'input'  => array(
                        'type'        => true,
                        'id'          => true,
                        'class'       => true,
                        'placeholder' => true,
                        'name'        => true,
                        'value'       => true,
                    ),

                    'button' => array(
                        'type'  => true,
                        'class' => true,
                        'label' => true,
                    ),

                    'svg'    => array(
                        'hidden'    => true,
                        'role'      => true,
                        'focusable' => true,
                        'xmlns'     => true,
                        'width'     => true,
                        'height'    => true,
                        'viewbox'   => true,
                    ),
                    'path'   => array(
                        'd' => true,
                    ),
                )
            );

            $description = wc_format_content(wp_kses($shop_page->post_content, $allowed_html));
            if ($description) {
                echo '<section class="container py-5 pb-1">' . $description . '</section>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            }
        }
    }
}, 10);

/**
 * Insert the opening anchor tag for products in the loop.
 */
add_action('woocommerce_before_shop_loop_item', function () {
    global $product;

    $link = apply_filters('woocommerce_loop_product_link', get_the_permalink(), $product);

    echo '<a href="' . esc_url($link) . '" class="link">';
}, 10);

/**
 * Show the product title in the product loop. By default this is an H2.
 */
add_action('woocommerce_shop_loop_item_title', function () {
    echo '<h3 class="' . esc_attr(apply_filters('woocommerce_product_loop_title_classes', 'uppercase font-bold pt-0.75 leading-tight')) . '">' . get_the_title() . '</h3>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}, 10);

/**
 * Change the placeholder image
 */
add_filter('woocommerce_placeholder_img_src', function () {
    return get_template_directory_uri() . '/resources/images/woocommerce-placeholder.png';
});

/**
 * product gallery
 */
// add_theme_support('wc-product-gallery-zoom');
add_theme_support('wc-product-gallery-lightbox');
add_theme_support('wc-product-gallery-slider');


/**
 * thumbnails
 */
add_filter('woocommerce_get_image_size_gallery_thumbnail', function ($size) {
    return array(
        'width' => 90,
        'height' => 90,
        'crop' => 1,
    );
});

add_filter('woocommerce_get_image_size_single', function ($size) {
    return array(
        'width' => 600,
        'height' => 600,
        'crop' => 1,
    );
});

add_filter('woocommerce_get_image_size_thumbnail', function ($size) {
    return array(
        'width' => 300,
        'height' => 300,
        'crop' => 1,
    );
});

/**
 * disable product page scripts
 */
// disable flexslider js
add_action('wp_print_scripts', function () {
    // wp_dequeue_script('flexslider');
    wp_dequeue_script('zoom');
    wp_dequeue_script('photoswipe-ui-default');
}, 100);

/**
 * Replace the home link URL in breadcrumbs
 */
add_filter('woocommerce_breadcrumb_home_url', function () {
    return wc_get_page_permalink('shop');
});

/**
 * Change breadcrumb defaults
 */
add_filter('woocommerce_breadcrumb_defaults', function () {
    $defaults['delimiter'] = ' &gt; ';
    $defaults['home'] = __('Products', 'woocommerce');

    return $defaults;
});

/**
 * Remove woocommerce CSS
 */
// add_filter('woocommerce_enqueue_styles', function ($enqueue_styles) {
//     unset($enqueue_styles['woocommerce-general']);    // Remove the gloss
//     unset($enqueue_styles['woocommerce-layout']);        // Remove the layout
//     unset($enqueue_styles['woocommerce-smallscreen']);    // Remove the smallscreen optimisation
//     return $enqueue_styles;
// });

// enable gutenberg for woocommerce

add_filter('use_block_editor_for_post_type', function ($can_edit, $post_type) {
    if ($post_type == 'product') {
        $can_edit = true;
    }
    return $can_edit;
}, 10, 2);


// enable taxonomy fields for woocommerce with gutenberg on

add_filter('woocommerce_taxonomy_args_product_cat', function ($args) {
    $args['show_in_rest'] = true;
    return $args;
});
add_filter('woocommerce_taxonomy_args_product_tag', function ($args) {
    $args['show_in_rest'] = true;
    return $args;
});
