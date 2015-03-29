<?php

/**
 * @file html.tpl.php
 * Default theme implementation to display the basic html structure of a single
 * Drupal page.
 *
 * Variables:
 * - $css: An array of CSS files for the current page.
 * - $language: (object) The language the site is being displayed in.
 *   $language->language contains its textual representation.
 *   $language->dir contains the language direction. It will either be 'ltr' or 'rtl'.
 * - $rdf_namespaces: All the RDF namespace prefixes used in the HTML document.
 * - $grddl_profile: A GRDDL profile allowing agents to extract the RDF data.
 * - $head_title: A modified version of the page title, for use in the TITLE
 *   tag.
 * - $head_title_array: (array) An associative array containing the string parts
 *   that were used to generate the $head_title variable, already prepared to be
 *   output as TITLE tag. The key/value pairs may contain one or more of the
 *   following, depending on conditions:
 *   - title: The title of the current page, if any.
 *   - name: The name of the site.
 *   - slogan: The slogan of the site, if any, and if there is no title.
 * - $head: Markup for the HEAD section (including meta tags, keyword tags, and
 *   so on).
 * - $styles: Style tags necessary to import all CSS files for the page.
 * - $scripts: Script tags necessary to load the JavaScript files and settings
 *   for the page.
 * - $page_top: Initial markup from any modules that have altered the
 *   page. This variable should always be output first, before all other dynamic
 *   content.
 * - $page: The rendered page content.
 * - $page_bottom: Final closing markup from any modules that have altered the
 *   page. This variable should always be output last, after all other dynamic
 *   content.
 * - $classes String of classes that can be used to style contextually through
 *   CSS.
 *
 * @see template_preprocess()
 * @see template_preprocess_html()
 * @see template_process()
 * @see nucleus_preprocess_html()
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language; ?>" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>">
  <head>
    <?php print $head; ?>

      <meta charset="UTF-8">
      <meta name="description" content="le site a pour vocation de devenir une plateforme de diffusion d’informations sur des journées d’étude, des colloques, des publications et des expositions consacrés au couple d’artistes Claude Cahun (Lucy Schwob, 1894-1954) et (Marcel) Moore (1892-1972).">
      <meta name="keywords" content="Artiste, Auteur, Claude Cahun, Marcel Moore, article, publication, colloque, intermédialité, genre, image, photographie, littérature, histoire de l'art, écriture des femmes">
      <meta name="author" content="Michaël Chemani, Alexandra Arvisais, Andrea Oberhuber">

    <title><?php print $head_title; ?></title>
    <?php print $styles; ?>
      <style>
          /* Prevents slides from flashing */

      </style>

  </head>

  <body class="<?php print $classes; ?>"<?php print $attributes;?>>
    <div id="skip-link"><a href="#main-content" class="element-invisible element-focusable"><?php print t('Skip to main content'); ?></a></div>
    <?php print $page_top; ?>
    <?php print $page; ?>
    <?php print $page_bottom; ?>
  </body>
  <script src="http://code.jquery.com/jquery-latest.min.js"></script>
  <?php print $scripts; ?>
  <script>
      $(function(){
          jQuery("#slides").slidesjs({
              width: 940,
              height: 450,
              navigation: {
                  active: false
              },
              pagination: {
                  active: false
              },
              play: {
                  active: true,
                  // [boolean] Generate the play and stop buttons.
                  // You cannot use your own buttons. Sorry.
                  effect: "slide",
                  // [string] Can be either "slide" or "fade".
                  interval: 5000,
                  // [number] Time spent on each slide in milliseconds.
                  auto: true,
                  // [boolean] Start playing the slideshow on load.
                  swap: true,
                  // [boolean] show/hide stop and play buttons
                  pauseOnHover: true,
                  // [boolean] pause a playing slideshow on hover
                  restartDelay: 2500
                  // [number] restart delay on inactive slideshow
              }
          });
      });
  </script>
</html>