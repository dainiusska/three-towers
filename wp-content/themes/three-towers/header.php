<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title(); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php
$logo_img_src = get_template_directory_uri() . '/images/Logo.svg';
$button_img_src = get_template_directory_uri() . '/images/Button.svg';
?>
<header class="site-header">
    <nav class="main-nav">
        <div class="main-nav-toggle">
            <div class="header-logo">
                <a href="/">
                    <img src="<?php echo $logo_img_src ? esc_url( $logo_img_src ) : ''; ?>" alt="">
                </a>
            </div>
            <div class="nav-links">
                <?php wp_nav_menu(array('theme_location' => 'main-menu')); ?>
            </div>
            <div class="header-button">
                <a href="/">
                    <img src="<?php echo $button_img_src ? esc_url( $button_img_src ) : ''; ?>" alt="">
                </a>
            </div>
        </div>
        <div class="menu-toggle" id="mobile-menu">
            ☰
        </div>
    </nav>
</header>