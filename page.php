<?php get_template_part( '/includes/head_foot/_head' );?>

<?php get_template_part( '/includes/masthead' );?>

<?php get_template_part( '/includes/navigation' );?>




<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php the_content(); ?>
<?php endwhile; else: ?>
<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>




<?php get_template_part( '/includes/head_foot/_foot' );?>