<?php get_header();

while (have_posts()) {
    
    the_post(); 
    pageBanner( array(
      //'title' => 'Hello there this is the title',
      'subtitle' => 'This is the subtitle',
      'photo' => 'https://www.imom.com/wp-content/uploads/2014/06/family_fun_5_great_family_field_trips.jpg'
    ) ); ?>
    
    <div class="container container--narrow page-section">

        <?php $theParent = wp_get_post_parent_id( get_the_ID() ) ;
            if ( $theParent ) { ?>
                
            <div class="metabox metabox--position-up metabox--with-home-link">
                <p><a class="metabox__blog-home-link" href="<?php echo get_the_permalink( $theParent ) ?>"><i class="fa fa-home" aria-hidden="true"></i> Back to <?php echo get_the_title( $theParent ) ?></a> <span class="metabox__main"><?php the_title(); ?></span></p>
            </div>

        <?php } ?>

        <div class="page-links">
            <h2 class="page-links__title">
                <a href="<?php echo get_permalink( $theParentthe ) ?>"><?php echo get_the_title( $theParent ) ?></a>
            </h2>
            <ul class="min-list">
                <?php 
                if ( $theParent ) {
                    $findeChildrenOf = $theParent;
                } else {
                    $findeChildrenOf = get_the_ID();
                }

                wp_list_pages( array(
                    'title_li' => null,
                    'child_of' => $findeChildrenOf
                ) ); ?>
            </ul>
        </div>
        
        <div class="generic-content">
            <form class="search-form" method="get" action="<?php echo esc_url( site_url('/') ); ?>">
                <label class="headline headline--medium" for="s">Perform a Search</label>
                <div class="search-form-row">
                    <input class="s" id="s" type="search" name="s" placeholder="Searching for...?">
                    <input class="search--submit" type="submit" value="Search">
                </div>
            </form>
        </div>
    </div>

<?php }

get_footer(); ?>