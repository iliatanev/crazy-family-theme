<?php get_header(); ?>

<?php pageBanner(array(
  'title' => get_the_archive_title(),
  'subtitle' => get_the_author_description()
)); ?>

  <div class="container container--narrow page-section">
  <?php $wp_query = new WP_Query(array('posts_per_page'=>-1));

    while ( $wp_query -> have_posts() ) : $wp_query -> the_post();?>
      <h2 class="headline headline--medium headline--post-title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2>
      
      <div class="metabox">
        <p>Posted by <?php the_author_posts_link(); ?> on <?php the_time('d.m.Y'); ?> in <?php echo get_the_category_list(', ') ?></p>
      </div>

      <div class="generic-content">
        <?php the_excerpt(); ?>
        <p><a class="btn btn--blue" href="<?php the_permalink(); ?>">Continue reading &raquo;</a></p>
      </div>
    <?php endwhile;
    
    echo paginate_links(); ?>
  </div>
  
<?php get_footer(); ?>