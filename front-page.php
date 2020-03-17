<?php
/**
 * The template for displaying the front page only
 
 */

get_header(); ?>
</div>
</div>
<div class="jumbotron">
    <div class="container">
<h3>SCILL is a charity registered in Scotland and dedicated to helping parents and professionals caring for children with additional support needs. We offer workshops for adults on a range of topics ...finish writing this at another time.</h3>
add the icons from the marketing materials here
</div>

</div>
	<section id="primary" class="content-area ">
		<main id="main" class="site-main" role="main">
<div class= "card-group">
    <div class= "col-md-6" id="events">
        <h2>Upcoming Events</h2>
        <div class="card-group">
        <?php 
                $homepageEvents = new WP_Query(array(
                    'posts_per_page' => -1,
                    'post_type' => 'event',
                    'orderby' => ''
                ));

			while ($homepageEvents->have_posts()) {
                $homepageEvents->the_post(); ?>
    <div class="col-12">
        <div class="card mb-2">
            <img class="card-img-top" src="<?php echo $featured_img_url ?>" alt="">
            <div class="card-body">
            <?php $eventDate = new DateTime(get_field('event_date')); ?>
                <div class= "event-date">
                    <p id="date-number"><?php echo $eventDate->format('d')?></p><span id="date-month"><?php 
                        echo $eventDate->format('M');
                    ?></span>
                </div>
                <h4 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                <p class="card-text"><?php if (has_excerpt()) {
                    echo get_the_excerpt();
                } else {
                    echo wp_trim_words(get_the_content(), 15);
                } ?>
                </p>
                <a href="<?php the_permalink( ) ?>" class="solid-btn">Read More</a>
            </div>
        </div>
    </div>
            <?php } ?>
</div>
    <div class="text-center">
    <a href='#' class= "btn btn-outline-primary">See All Events</a>
    </div>
</div>

<div class= "col-md-6" id="news">
    <h2>News</h2>
    <div class="card-group">
        <?php 
        $homepagePosts = new WP_Query(array(
            'posts_per_page' => 2,
            'post_type' => 'post'
            ));

			while ($homepagePosts->have_posts()) {
                $homepagePosts->the_post(); ?>
    <div class="col-12">
        <div class="card mb-2">
            <img class="card-img-top" src="<?php echo $featured_img_url ?>" alt="">
            <div class="card-body">
                <div class= "news-date">
                    <p id="date-number"><?php the_date('d') ?></p>
                    <p id="date-month"><?php the_date('M') ?></p>
                </div>
                <h4 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                <p class="card-text"><?php if (has_excerpt()) {
                    echo get_the_excerpt();
                } else {
                    echo wp_trim_words(get_the_content(), 15);
                } ?>
                </p>
                <a href="<?php the_permalink( ) ?>" class="solid-btn">Read More</a>
            </div>
        </div>
    </div>
    <?php } ?>
    </div>
                <div class="text-center">
    <a href='#' class= "btn btn-outline-primary">See All News</a>
</div>
    
    </div>
</div>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php

get_footer();
