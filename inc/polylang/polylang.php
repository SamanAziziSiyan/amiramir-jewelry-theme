<?php
/** Offer the jewelry content type to Polylang when the plugin is active. */
add_filter('pll_get_post_types', 'jewp_add_cpt_to_polylang', 10, 2);
function jewp_add_cpt_to_polylang($post_types, $hide)
{
    if ($hide) {
        unset($post_types['jewelery']);
    } else {
        $post_types['jewelery'] = 'jewelery';
    }
    return $post_types;
}
