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
