<?php
/*
Template Name: Landing Page
*/
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body  <?php body_class(); ?>>
    <div id="wrapper">
        <header class="brand-wrapper">
            <div class="site-branding">
                <div class="site-logo-area"><?php
                    if ( function_exists( 'the_custom_logo' ) ) {
                        the_custom_logo();
                    } ?>
                </div>
                <div class="site-branding-text">
                    <?php
                    if ( is_front_page() && is_home() ) : ?>
                            <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                    <?php else : ?>
                            <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                    <?php endif; ?>
                </div>
            </div><!-- .site-branding -->
        </header><!-- .branding-wrapper -->
        <nav>
            <section id="tucson">
                    <h1 class="show-location">Tucson</h1>
                <ul>
                    <li><a href="tucson">Show Info</a></li>
                    <li><a href="tucson/exhibit">Exhibitors</a></li>
                    <li><a href="tucson/wholesale-buyers">Buyers</a></li>
                </ul>
            </section>

            <section id="denver">
                <h1 class="show-location">Denver</h1>
                <ul>
                    <li><a href="denver">Show Info</a></li>
                </ul>
            </section>
        </nav>

        <section id="image-gallery">
            <div class="gallery-text">
                <?php
                $description = get_bloginfo( 'description', 'display' );
                if ( $description || is_customize_preview() ) : ?>
                        <p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
                <?php
                endif; ?>
            </div>

        </section>

    </div>
</body>
</html>