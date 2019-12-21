<?php get_header(); ?>

  <div class="container">

  <?php
  if ( have_posts() ) {
    while ( have_posts() ) {
    
      the_post(); 

    ?> 

      <div class="article-type">

        <?php $link = get_permalink(); ?>

        <h2><a href="<?php echo $link ?>"><?php the_title(); ?></a></h2>
        <span class="caption"><?php the_post_thumbnail_caption(); ?></span>
        <?php the_post_thumbnail(); ?>
        
      </div>
        
  <?php
    }
  }
  ?>
      
      

  </div>

<?php get_footer(); ?>