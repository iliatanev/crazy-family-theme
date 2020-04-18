<?php get_header(); ?>
  
<?php pageBanner(array(
    'title' => 'All Events',
    'subtitle' => 'See what is going on here'
)); ?>

  <div class="container container--narrow page-section">
    <?php 
    // $wp_query = new WP_Query(array('posts_per_page'=>-1));

    while ( have_posts() ) : the_post(); ?>
      <!-- <h2 class="headline headline--medium headline--post-title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2> -->
      <?php get_template_part('template-parts/content-event'); ?>
    <?php endwhile;
    
    echo paginate_links(); ?>
  </div>
  
<?php get_footer(); ?>