<?php get_template_part( '/includes/head_foot/_head' );?>

<div class="container">


<?php get_template_part( '/includes/masthead' );?>


<div class="row">
	<div class="span12"><?php get_template_part( '/includes/navigation' );?></div>
</div>




<div class="row">
	<div class="span9"><?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<?php the_content(); ?>
		<?php endwhile; else: ?>
		<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
		<?php endif; ?></div><!--span9-->
	 	
		
</div><!--row-->




<?php get_template_part( '/includes/head_foot/_foot' );?>

</div><!-- container -->