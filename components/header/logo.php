<?php
/**
 * Site logo
 * 
 * @author Andrea Musso
 * 
 * @package Foundry
 */
 ?>

<figure class="site-header__item site-header__logo">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="link-invisible">

        <?php if ( has_custom_logo() ) : ?>
            <?php
            $custom_logo_id  = get_theme_mod( 'custom_logo' );
            $logo_url        = wp_get_attachment_image_src( $custom_logo_id, 'full' );
            $logo_path       = get_attached_file( $custom_logo_id );
            $logo_path_parts = explode( '.', $logo_path );
            $extension       = end( $logo_path_parts );

            if ( 'svg' === $extension ) :
                echo file_get_contents( $logo_path ); // @codingStandardsIgnoreLine
            else :
                ?>
                <img src="<?php echo esc_url( $logo_url[0] ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
            <?php endif; ?>
        <?php else : ?>
            <p class="site-header__title"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></p>
        <?php endif; ?>
    </a>
</figure>