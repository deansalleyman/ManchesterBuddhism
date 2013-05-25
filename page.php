<?php get_template_part( '/includes/head_foot/_head' );?>
<!--<div class="shadow-container">-->
<div class="container">



<?php get_template_part( '/includes/masthead' );?>


<div class="row white-back">
	<div class="span12">

	<?php get_template_part( '/includes/navigation' );?>
	</div>
</div>



<div class="row white-back">
	<div class="span8 mt-20 "><?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<?php the_content(); ?>
		<?php endwhile; else: ?>
		<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
		<?php endif; ?></div><!--span9-->
	 	<div class="span4">
	 	<?php get_template_part( '/includes/aside' );?>
	 	
	 	</div>
		
</div><!--row-->




<?php get_template_part( '/includes/head_foot/_foot' );?>

</div><!-- container -->
<!--</div>-->