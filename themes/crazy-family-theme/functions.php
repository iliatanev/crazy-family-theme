<?php

function pageBanner( $args = NULL){ //this makes this argument optional
    
    if ( !$args['title'] ) {
          $args['title'] = get_the_title();
    }

    if ( !$args['subtitle'] ) {
          $args['subtitle'] = get_field( 'page_banner_subtittle' );
    }

    if ( !$args['photo'] ) {
        if ( get_field( 'page_banner_background_image' ) ) {
            $args['photo'] = get_field( 'page_banner_background_image' );
        } else {
            $args[ 'photo' ] = get_theme_file_uri( '/images/ocean.jpg' );
        }
    }
    ?>

    <div class="page-banner">
    <div class="page-banner__bg-image" style="background-image: url( <?php echo $args['photo'] ?> );"></div>
    <div class="page-banner__content container container--narrow">
      <h1 class="page-banner__title"><?php echo $args['title'] ?></h1>
      <div class="page-banner__intro">
        <p><?php echo $args['subtitle'] ?></p>
      </div>
    </div>  
  </div>

<?php }

function crazyfamily_files() {

    wp_enqueue_script( 'main-family-js', get_theme_file_uri( '/js/scripts-bundled.js' ), NULL, '1.0', true );
    wp_enqueue_style( 'font-awsome', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i' );
    wp_enqueue_style( 'font-awsome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );
    wp_enqueue_style( 'main_styles', get_stylesheet_uri() );
}

add_action( 'wp_enqueue_scripts', 'crazyfamily_files' );

function family_features(){
    //register_nav_menu($location, $description) - Setting Menu section in the Apearece section
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
}

add_action( 'after_setup_theme', 'family_features' );
