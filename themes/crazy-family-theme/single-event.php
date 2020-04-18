<?php get_header();

while (have_posts()) {
    
    the_post(); 
    pageBanner(); ?>

  <div class="container container--narrow page-section">
    <div class="metabox metabox--position-up metabox--with-home-link">
        <p><a class="metabox__blog-home-link" href="<?php echo site_url('/events'); ?>"><i class="fa fa-home" aria-hidden="true"></i> Events Home</a> <span class="metabox__main"><?php the_title() ?></span></p>
    </div>

    <div class="generic-content"><?php the_content() ?></div>

    <?php $relatedProgram = get_field('related_program');
          print_r( $relatedProgram ); ?>
  </div>

<?php } get_footer(); ?>