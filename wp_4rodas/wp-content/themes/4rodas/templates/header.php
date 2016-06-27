<?php
use Roots\Sage\Assets;
?>

<div class="banner">
  <img
    width="300"
    height="48"
    src="<?php echo Assets\asset_path('images/banner_desktop.jpg'); ?>">
</div>

<header class="navbar">
  <div class="wrap">
    <a class="navbar__brand" href="<?= esc_url(home_url('/')); ?>">
      <img
        title="<?php bloginfo('name'); ?>"
        width="150"
        height="32"
        src="<?php echo Assets\asset_path('images/4rodas-logo_desktop.png'); ?>">
      <?php bloginfo('name'); ?>
    </a>

    <div class="show-only-in-mobile">
      <a
        class="navbar__button menu"
        href="#collapseMenuMobile"
        data-toggle="collapse"
        role="button"
        aria-label="Menu"
        aria-expanded="false"
        aria-controls="collapseMenuMobile">
          <i class="icon icon-bars" aria-hidden="true"></i>
      </a>
      <a
        class="navbar__button search"
        href="#collapseSearchMobile"
        data-toggle="collapse"
        role="button"
        aria-label="Pesquisar"
        aria-expanded="false"
        aria-controls="collapseSearchMobile">
          <i class="icon icon-search" aria-hidden="true"></i>
      </a>
    </div>

    <div class="navbar__collapses">
      <div class="navbar__collapses__item" id="collapseSearchMobile">
        <form class="form-search">
          <div class="form-group">
            <input type="text" class="form-group__input" placeholder="Pesquisar">
          </div>
        </form>
      </div>

      <div class="navbar__collapses__item show-only-in-desktop">
        <a href="#assine">
          ASSINE
        </a>
      </div>

      <div class="navbar__collapses__item" id="collapseMenuMobile">
        <nav class="nav-primary">
          <?php
          if (has_nav_menu('primary_navigation')) :
            wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']);
          endif;
          ?>
        </nav>
      </div>
    </div>
  </div>
</header>

