
<div class="row ">
	<div class="span8  branding pull-right"></div>
	<div class="span4 logo-heading">
<header>
		<hgroup>
		<h1 id="site-title"><span><a rel="home" title="Diamond Way Manchester" href="http://buddhism-manchester.org/">Diamond Way Manchester</a></span></h1>
		</hgroup>
		</header>
</div><!-- span6-->



</div><!--row-->

<div class="row">
	<div class="span8">
	<?php
	$carousel = new WP_Query('post_type=carousel');
	?>
	
<?php	if ($carousel->have_posts()):?>
	<div id="carousel">
	    <?php while ($carousel->have_posts()): $carousel->the_post(); ?>
	     <div class="slide-content">
	          
	            <?php if ( has_post_thumbnail() ) { the_post_thumbnail('banner-image'); } ?>
	       </div>
	    <?php endwhile; ?>
	</div>
	<?php endif; ?>
	
	<?php  wp_reset_postdata(); ?>
	</div><!--span8 -->
	<div class="span4 rightbanner">
	
	<p class="dark_text text-center" id="banner_address"> <span itemprop="name"> Manchester Diamond Way Buddhist Group</span><br>
	<span itemtype="http://schema.org/PostalAddress" itemscope="" itemprop="address">
	<span itemprop="streetAddress">Unit 8, 3rd Floor<br>
	8 Lower Ormond Street</span><br>
	<span itemprop="addressLocality">Manchester</span> <span itemprop="postalCode">M1 5QF</span></span></p>
	<p class="dark_text text-center" id="contact_details">Phone : <span itemprop="telephone">07851297292</span>, 07725013639 <br>
	Email : <a href="mailto:manchester@dwbuk.org" itemprop="email">manchester@dwbuk.org</a>
	</p>
		<?php
		$quotes = new WP_Query('post_type=quotes');
		?>
		
	<?php	if ($quotes->have_posts()):?>
		<div id="quote_list">
		    <?php while ($quotes->have_posts()): $quotes->the_post(); ?>
		        <div class="slide-content">
		        	<?php the_content(); ?>		    
		        	 <strong class="dark_text"> <?php the_title(); ?></strong>
		        </div>
		    <?php endwhile; ?>
		</div>
		<?php endif; ?>
		
		<?php  wp_reset_postdata(); ?>
	</div><!-- span4 -->
</div>
<div class="row">
	<div class="span2 pull-right">
	<div id="social_nav"><div id="facebook_nav"><a href="https://www.facebook.com/DiamondWayBuddhismManchester" title="Facebook"></a></div><div id="googleplus_nav"><a rel="publisher" href="https://plus.google.com/110381720756032976908" title="google+"></a></div><div id="twitter_nav"><a href="https://twitter.com/DWBmanchester" title="Twitter"></a></div></div>
	
	</div>
</div>