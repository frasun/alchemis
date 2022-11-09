<?php

/**
 * Theme filters.
 */

namespace App;

/**
 * Add "… Continued" to the excerpt.
 *
 * @return string
 */
add_filter('excerpt_more', function () {
    return sprintf(' &hellip; <a href="%s" class="block mt-1 text-right font-bold">%s</a>', get_permalink(), __('Continued', 'sage'));
});
