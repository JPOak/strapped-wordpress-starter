<?php
/**
 * Header Social
 * 
 * @author Andrea Musso
 * 
 * @package Foundry
 */
 ?>

 <?php 

$social = [];

if(get_theme_mod( 'instagram')){
    $instagram = get_theme_mod( 'instagram');
    $social['instagram'] = $instagram;
}
if(get_theme_mod( 'facebook')){
    $facebook = get_theme_mod('facebook');
    $social['facebook'] = $facebook;
}
if(get_theme_mod( 'linkedin')){
    $linkedin = get_theme_mod( 'linkedin');
    $social['linkedin'] = $linkedin;
}


 ?>

 <ul class="site-header__item site-header__social">

    <?php foreach($social as $key => $link) : ?>
        <li class="social-item"><a class="social-link" rel="noopener noreferrer"  target="_blank" href="<?php echo $link ?>"><?php get_template_part( 'svg-template/svg', $key ) ?></a></li>
     <?php endforeach; ?>

</ul><!--  .site-header__social  -->