<?php get_header(); ?>

<div class="container">

<?php
if ( have_posts() ) {
  while ( have_posts() ) {

    the_post(); 

    the_content();
?>
      
<?php
    
$img = get_field('banner_background_image');
$xxxx = get_field('download_image');
      
?>
    
<section class="section-intro" style="background-image: url(<?php echo $img['url']; ?>);">
  <div class="wrapper">
    <p class="section-content">
      <span><?php the_field('banner_baseline')?></span>
      <span><?php the_field('banner_title_brown')?></span>
      <span><?php the_field('banner_title_green')?></span>

    </p>

    <a class="btn btn-green" href="<?php echo get_field('banner_title_link')?>">S'inscrire aux rencontres</a>

  </div>

</section>    

<section class="section-conference">
  <div class="section-content">
    <h3 class="section-title"><?php the_field('conference_title')?></h3>

    <hr/>

    <p class="paragraphe"><?php the_field('conference_paragraphe')?>

    <?php 

    $img = get_field('conference_image');

    ?>
    
  </div>

  <div class="image-separator" style="background-image: url(<?php echo $img['url']; ?>);"></div>

</section>    

<section class="section-programme">

  <h3 class="section-title"><?php the_field('program_title')?></h3>

  <hr/>

  <div class="program_subtitles">
    <h4 class="program_subtitle"><?php the_field('program_subtitle')?></h4>
    <h4 class="program_subtitle"><?php the_field('program_subtitle_more')?></h4>

  </div>

  <div class="rows-display">
    <div class="row-1">
      
      <?php

      $programme = get_field('program_detail');

      foreach($programme as $program_detail){
        echo "<span class='date'>".$program_detail['hour']."</span/>";
        echo "<span class='desc'>".$program_detail['description']."</span><br/>";
      }

      ?>

    </div>

    <div class="row-2">
      
      <?php

      $programme = get_field('program_detail_more');

      foreach($programme as $program_detail_more){
        echo "<span class='date'>".$program_detail_more['hour']."</span>";
        echo "<span class='desc'>".$program_detail_more['description']."</span><br/>";
      }

      ?>

    </div>

  </div>

  <a class="btn btn-green" href="<?php echo get_field('banner_title_link')?>">S'inscrire aux rencontres</a>

</section>

<section class="section-orators">

  <h3 class="section-title"><?php the_field('orators_title')?></h3>

  <hr />

  <div class="orators-wrapper">

    <?php

    $orators = get_field('orators_all');

    foreach($orators as $orator){

      echo "<div>";
      echo "<div class='profile_pic' style='background-image: url(".$orator['profile_pic']['url'].");'></div><br/>";
      echo "<div><span class='name'>".$orator['name']."</span><br/>";
      echo "<span class='desc'>".$orator['desc']."</span><br/></div>";
      echo "<a href='#' class='orator-btn'>".$orator['btn_line']."</a>";
      echo "</div>";
    }

    ?>

  </div>

</section>

<section class="section-infos">
    
  <h3 class="section-title"><?php the_field('infos_title')?></h3>

  <hr/>

  <div class="infos-wrapper">

    <?php $img = get_field('infos_image'); ?>

    <div class='banner' style="background-image: url(<?php echo $img['url']; ?>);">
      <div class="address">
        <div class="item">
          <div class="icon-1"></div>
          <span><?php the_field('infos_address')?></span>
        
        </div>

        <hr/>

        <div class="item">
          <div class="icon-2"></div>
          <span><?php the_field('infos_hour')?></span>
        
        </div>

        <hr/>

        <div class="item">
          <div class="icon-3"></div>
          <span><?php the_field('infos_restauration')?></span>
        
        </div>

      </div>

      <div class="map-check">
        <a href="#" class="btn btn-wht">Voir sur la carte</a>

      </div>

    </div>

  </div>

</section>

<section class="section-videos">

  <h3 class="section-title"><?php the_field('videos_title')?></h3>

  <hr/>

  <?php 
  
  $videos = get_field('last_videos'); 

  $banner = $videos[0]['video_presenter_banner']['url'];

  ?>

  <div class="videos-wrapper">
    <div class="first-col">

      <?php  

      $videos_left = get_field('videos_left');
      $videos_right = get_field('videos_right');

      ?>

      <div class="item" style="background-image: url(<?php echo $videos_left['url']; ?>);">
        <div style="position: absolute; background: grey; opacity: 0.3; top: 0; left: 0; height: 100%; width: 100%;"></div>
        <span><?php the_field('videos_left_title') ?></span>

      </div>

      <div class="item" style="background-image: url(<?php echo $videos_right['url']; ?>);">
        <div style="position: absolute; background: grey; opacity: 0.3; top: 0; left: 0; height: 100%; width: 100%;"></div>
        <span><?php the_field('videos_right_title') ?></span>

      </div>

    </div>

    <div class="second-col">

        <?php 

        $side_videos = get_field('secondary_videos');

        $img = $side_videos[0]['secondary_video_banner']['url'];

        foreach($side_videos as $side_video){
          echo "<div class='item'>";
            echo "<div class='secondary_video_banner' style='background-image: url($img);'></div>";
              
            echo "<div style='padding-left: 2rem;'>";
            echo "<span class='title'>".$side_video['secondary_video_title']."</span>";
            echo "<span class='author'>".$side_video['secondary_video_author'];
            echo "</div>";
      
          echo "</div>";
        }

        ?>

    </div>
      
  </div>

</section>

<section class="section-actus">
  <h3 class="section-title"><?php the_field('actus_title')?></h3>

  <hr/>
  
  <div class="actus-wrapper">

     <?php

    $posts_myname = new WP_Query( array( 'post_type' => 'post' ) );

    while ( $posts_myname->have_posts() ) {
      $posts_myname->the_post();    

      echo "<div class='type-article'>"; ?>
        <div class="article-banner" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>;')"></div>
          <div class="container">
            <span class="article-title"><?php echo get_the_title(); ?></span>
            <span class="article-caption"><?php echo get_the_post_thumbnail_caption(); ?></span>
            
            <a href="#" class="read-btn">Lire la suite</a>

            <span class="article-date"><?php echo get_the_date(); ?></span>

        </div>

      <?php echo "</div>";
      }
      wp_reset_postdata();  
      ?> 

      <?php 
        $xxxx = get_field('download_image');
        $xxxx2 = get_field('download_image_alt');

      ?>

    </div>

  </div>
   
</section>

<section class="section-prefooter">

    <div class="row">
      <div class="banner" style="background-image: url(<?php echo $xxxx['url']; ?>);">
      <span><?php the_field('prefooter_title_left') ?></span>

      </div>

    </div>

    <div class="row">
      <div class="banner" style="background-image: url(<?php echo $xxxx2['url']; ?>);">
        <span><?php the_field('prefooter_title_right') ?></span>

      </div>

    </div>





</section>
           
<?php
  }
}

?>
    
</div>

<?php get_footer(); ?>