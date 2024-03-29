<?php
/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 */
?>

<div id="page" class="clearfix">
  <a name="Top" id="Top"></a>

  <!-- HEADER -->
  <div id="header-wrapper" class="wrapper">
    <div class="container <?php print $grid; ?>">
      <div class="grid-inner clearfix">
        <div id="header" class="clearfix">

          <?php if ($logo): ?>
            <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" id="logo">
<!--              <img src="--><?php //print $logo; ?><!--" alt="--><?php //print t('Home'); ?><!--" />-->
                <h1>Héritages de Claude Cahun et Marcel Moore</h1>
            </a>
          <?php endif; ?>

          <?php if ($site_name || $site_slogan): ?>
            <div id="name-and-slogan" class="hgroup">
              <?php if ($site_name): ?>
                <h1 class="site-name">
                  <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>">
                    <?php print $site_name; ?>
                  </a>
                </h1>
              <?php endif; ?>
              <?php if ($site_slogan): ?>
                <h2 class="site-slogan"><?php print $site_slogan; ?></h2>
              <?php endif; ?>
            </div>
          <?php endif; ?>

          <?php if ($header = render($page['header'])): print $header; endif; ?>

          <?php if ($secondary_menu): ?>
            <div id="secondary-menu" class="navigation">
              <?php print theme('links__system_secondary_menu', array(
                'links' => $secondary_menu,
                'attributes' => array(
                  'id' => 'secondary-menu-links',
                  'class' => array('links', 'inline', 'clearfix'),
                ),
                'heading' => array(
                  'text' => t('Secondary menu'),
                  'level' => 'h2',
                  'class' => array('element-invisible'),
                ),
              )); ?>
            </div> <!-- /#secondary-menu -->
          <?php endif; ?>

          <?php if($menu_bar = render($page['menu_bar'])): ?>
            <!-- MAIN NAV -->
            <div id="menu-bar-wrapper">
              <div class="grid-inner clearfix">
                <?php print $menu_bar; ?>
              </div>
            </div>
            <!-- //MAIN NAV -->
          <?php endif;?>
        </div>
      </div>
    </div>
  </div>
  <!-- //HEADER -->

    <!-- SLIDESHOW -->
    <?php if(isset($header_image_url) && $header_image_url) : ?>
    <div id="slideshow-wrapper" class="wrapper">
      <div class="container">
<!--          <div id="slides">
              <img src="/sites/default/files/images/slider/slide1.jpg" alt="Claude Cahun - Marcel Moore" style="height: 100%;">
              <img src="/sites/default/files/images/slider/slide4.jpg" alt="Claude Cahun - Marcel Moore" style="height: 100%;">
              <img src="/sites/default/files/images/slider/slide3.jpg" alt="Claude Cahun - Marcel Moore" style="height: 100%;">
              <img src="/sites/default/files/images/slider/slide5.jpg" alt="Claude Cahun - Marcel Moore" style="height: 100%;">
              <img src="/sites/default/files/images/slider/slide2.jpg" alt="Claude Cahun - Marcel Moore" style="height: 100%;">
              <img src="/sites/default/files/images/slider/slide6.jpg" alt="Claude Cahun - Marcel Moore" style="height: 100%;">
          </div>-->
          <div style="text-align: center;height: 480px">
            <img src="<?php print $header_image_url?>" alt="Claude Cahun - Marcel Moore" style="max-height: 100%;max-width: 90%">
          </div>
          <?php if(isset($header_image_credit) && $header_image_credit) : ?>
          <div class="photo-credits" style="text-align:center;margin:5px auto; width:80%;padding-right: 20px; height: auto; margin-top: 5px; margin-bottom: 5px; padding-left: 20px; font-family: "Arial, sans-serif;" >
            <p > <?php print $header_image_credit?></p>
          </div>
          <?php endif ?>
    </div>
    </div>
    <?php endif ?>
    <!-- //SLIDESHOW -->

  <?php if($messages || $page['help']): ?>
    <!-- HELP & MESSAGES -->
    <div id="system-messages-wrapper" class="wrapper container-16">
      <div class="container <?php print $grid; ?>">
        <div class="grid-inner clearfix">
          <?php print $messages . render($page['help']); ?>
        </div>
      </div>
    </div>
    <!-- HELP & MESSAGES -->
  <?php endif; ?>

  <div id="main-wrapper" class="wrapper">
    <div class="container <?php print $grid; ?> clearfix">
      <div class="<?php print nucleus_group_class("content, sidebar_first");?>">
        <!-- MAIN CONTENT -->
        <div id="main-content" class="<?php print $content_width;?> section">
          <div class="grid-inner clearfix">
            <?php if ($tabs = render($tabs)): ?>
              <div class="tabs"><?php print $tabs; ?></div>
            <?php endif; ?>

            <?php if ($highlighted = render($page['highlighted'])): print $highlighted; endif; ?>

            <?php print render($title_prefix); ?>
            <?php if ($title): ?>
              <h1 id="page-title" style="text-align: center"><?php print $title; ?></h1>
            <?php endif; ?>

            <?php print render($title_suffix); ?>

            <?php if ($action_links = render($action_links)): ?>
              <ul class="action-links"><?php print $action_links; ?></ul>
            <?php endif; ?>

            <?php if ($content = render($page['content'])): print $content; endif; ?>

          </div>
        </div>
        <!-- //MAIN CONTENT -->

        <?php if (($sidebar_first = render($page['sidebar_first'])) && $sidebar_first_width) : ?>
          <!-- SIDEBAR FIRST -->
          <div id="sidebar-first-wrapper" class="sidebar <?php print $sidebar_first_width;?>">
            <div class="grid-inner clearfix">
              <?php print $sidebar_first; ?>
            </div>
          </div>
          <!-- //SIDEBAR FIRST -->
        <?php endif; ?>
      </div>
    </div>
  </div>


  <?php if($panel_second): ?>
    <!-- PANEL SECOND -->
    <div id="panel-second-wrapper" class="wrapper panel panel-second">
      <div class="container <?php print $grid;?>">
        <div class="grid-inner clearfix">
          <?php print $panel_second;?>
        </div>
      </div>
    </div>
    <!-- PANEL SECOND -->
  <?php endif; ?>

  <?php if ($footer = render($page['footer'])): ?>
    <!-- FOOTER -->
    <div id="footer-wrapper" class="wrapper container-16">
      <div class="container <?php print $grid; ?>">
        <div class="grid-inner clearfix">
          <div id="footer" class="clearfix">
            <?php print $footer; ?>
            <?php print $feed_icons; ?>
          </div>
        </div>
      </div>
    </div>
    <!-- //FOOTER -->
  <?php endif; ?>
</div>
