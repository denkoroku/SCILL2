<?php
/**
 * The template for displaying the front page only
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Starter
 */

get_header(); ?>
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
                    'posts_per_page' => 2,
                    'post_type' => 'event'
                ));

			while ($homepageEvents->have_posts()) {
                $homepageEvents->the_post(); ?>
    <div class="col-12">
        <div class="card mb-2">
            <img class="card-img-top" src="<?php echo $featured_img_url ?>" alt="">
            <div class="card-body">
                <div class= "date">
                    <p id="date-number">15</p><p id="date-month"> AUG</p>
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
