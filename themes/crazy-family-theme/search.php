<?php get_header(); 

pageBanner(array(
  'title' => 'Search results',
  'subtitle' => 'You serach for &ldquo;' . get_search_query() .'&ldquo;'
)); ?>

  <div class="container container--narrow page-section">
   <?php 
    while ( have_posts() ) { 
        the_post();
        get_template_part( 'template-parts/content', get_post_type() );
    }

    echo paginate_links(); ?>
  </div>
  
<?php get_footer(); ?>