<?php
/**
 * @file
 * Override of theme_preprocess_...
 */

/**
 * Override or insert variables into the node template.
 *
 * @param array $vars
 *   An array of variables to pass to the theme template.
 */
function tb_blog_preprocess_node(&$vars) {
  if ($vars['type'] == 'blog') {
    $vars['blog_created_day']   = date('d', $vars['created']);
    $vars['blog_created_month'] = date('M', $vars['created']);
  }
}

function tb_blog_preprocess_page(&$vars) {
    isset($vars['node']) ? $node = $vars['node'] : $node = null;

    if(isset($node->field_header_image['und'][0]['uri'])) {
        $header_image_uri = $node->field_header_image['und'][0]['uri'];
        $file_url         = file_create_url($header_image_uri);

        $vars['header_image_url'] = $file_url;
    }

    if(isset($node->field_header_image_credit['und'][0]['value'])) {
        $header_image_credit = $node->field_header_image_credit['und'][0]['value'];

        $vars['header_image_credit'] = $header_image_credit;
    }
}
