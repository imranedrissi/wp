<footer class="footer">
<?php wp_footer(); ?>

<nav>

  <?php 

    wp_nav_menu( array('theme_location' => 'nav_footer') );
  ?>

</nav>

<p>&copy; <?php echo __('Tous droits réservés'); ?></p>

</footer>

</body>

</html>