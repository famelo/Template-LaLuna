<?php
	$images = get_field('produkbilder');
?>
<article class="media">
  <a class="pull-left" href="#">
    <img class="media-object" src="<?php echo $images[0]['produktbild']; ?>" alt="<?php the_title(); ?>" width="200px" />
  </a>
  <article class="media-body">
    <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
    <?php the_excerpt(); ?>
  </article>
</article>