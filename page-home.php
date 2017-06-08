<?php
/*
 * Template Name: Home Page
 * @package JGM2018
 */

get_header('home'); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

            <?php
            while ( have_posts() ) : the_post();

                    get_template_part( 'template-parts/content', 'page' );

                    // If comments are open or we have at least one comment, load up the comment template.
                    if ( comments_open() || get_comments_number() ) :
                            comments_template();
                    endif;

            endwhile; // End of the loop.
            ?>
            <nav id="site-navigation" class="main-navigation" role="navigation">
                    <?php wp_nav_menu( array( 'theme_location' => 'menu-3', 'menu_id' => 'primary-menu' ) ); ?>
            </nav><!-- #site-navigation -->
            
        </main><!-- #main -->
    </div><!-- #primary -->

<?php

get_footer('home');
