<?php
/**
 * The template for displaying the front page only

 */

get_header(); ?>
</div>
    </div>
        <div class='jumbo-border'>
            <div class="jumbotron">
                <div class="container">
                    <h3 class="text-center mb-5" >SCILL is a charity registered in Scotland and dedicated to helping parents and professionals caring for children with additional support needs.</h3>
                <div class="homepage-icons">
                <div id="cup">
                    <img src="<?php echo get_theme_file_uri('assets/images/500px-cup-icon.png') ?>"> <div class="icon-descrip">support sessions</div>
                </div>
                <div id="child">
                    <img src="<?php echo get_theme_file_uri('assets/images/500px-child-icon.png') ?>">
                    <p class="icon-descrip">children's activities</p>
                </div>
                <div id="talk">
                    <img src="<?php echo get_theme_file_uri('assets/images/500px-talk-icon.png') ?>">
                    <p class="icon-descrip">workshops and talks</p>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
	<section id="primary" class="content-area ">
		<main id="main" class="site-main" role="main">
<div class= "card-group">
    <div class= "col-md-6" id="events">
        <h2>Upcoming Events</h2>
        <div class="card-group">
        <?php 
                $today = date('Ymd');
                $homepageEvents = new WP_Query(array(
                    'posts_per_page' => 3,
                    'post_type' => 'event',
                    'meta_key' => 'event_date',
                    'orderby' => 'meta_value_num',
                    'order' => 'ASC',
                    'meta_query' => array(
                        array(
                            'key' => 'event_date',
                            'compare' => '>=',
                            'value' => $today,
                            'type' => 'numeric'
                        )
                    )
                ));

			while ($homepageEvents->have_posts()) {
                $homepageEvents->the_post(); ?>
    <div class="col-12">
        <div class="card mb-2 text-center" id="event-card">
            <h4 class=""><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
            <hr />
            <div class="row">
                <div class="col-md-6">
                    <div class="card-body">
                            <?php $eventDate = new DateTime(get_field('event_date')); ?>
                            <div class= "event-date">
                                <p id="date-number"><?php echo $eventDate->format('d')?></p><span id="date-month"><?php 
                                echo $eventDate->format('M');
                                ?></span>
                            </div><!--ends the event date -->
                    <p class="card-text"><?php if (has_excerpt()) {
                    echo get_the_excerpt();
                } else {
                    echo wp_trim_words(get_the_content(), 15);
                } ?>
                    </p>

                    </div><!--ends the card body -->
                    
                    </div><!--ends the col-6 -->
<!-- the Event picture  -------------------------------------->
                <div class="col-md-6">
                    <?php $image = get_field('event_image');?>
                    <img class="card-img-top event-image-homepage" src=" <?php echo $image?> ?>" alt="">
                </div><!--ends the col-6 -->
            </div> <!--ends the row -->
            <div class= "card-footer mt-3">
                    <a href="<?php the_permalink( ) ?>" class="btn btn-outline-primary">Event Detail</a>
                    </div><!--ends the card footer -->
        </div><!--ends the card -->
    </div>
            <?php } ?>
</div>
    <div class="text-center">
    <a href='<?php echo site_url('/events')?>' class= "btn btn-outline-primary">See All Events</a>
    </div>
</div>
<div class= "col-md-6" id="news">
    <h2>News</h2>
    <div class="card-group">
        <?php 
        $homepagePosts = new WP_Query(array(
            'posts_per_page' => 3,
            'post_type' => 'post'
            ));

			while ($homepagePosts->have_posts()) {
                $homepagePosts->the_post(); ?>
    <div class="col-12">
        <div class="card mb-2 text-center news-card">
        <h4 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
            <hr>
            <div class= "row">
                <div class ="col-md-6">
                    <div class="card-body">
                        <div class= "news-date">
                            <p id="date-number"><?php echo get_the_date('d') ?></p>
                            <p id="date-month"><?php echo get_the_date('M')?></p>
                        </div>
                            <p class="card-text mt-2"><?php if (has_excerpt()) {
                                echo get_the_excerpt();
                                } else {
                                echo wp_trim_words(get_the_content(), 15);
                                } ?>
                            </p>
                            
                    </div>
                </div>
            
                <div class ="col-md-6">
                    <img class="img-fluid" src="<?php the_post_thumbnail_url() ?>" >
                </div><!--ends the col-6 -->
            </div><!--ends the row -->
                <div class="card-footer mt-3">
                    <a href="<?php the_permalink( ) ?>" class="btn btn-outline-primary">Read More</a>
                </div>
        </div><!--ends the card -->
    <?php } ?>
    </div><!--ends the col-12 -->
    </div><!--ends the card group-->
                <div class="text-center">
    <a href='#' class= "btn btn-outline-primary">See All News</a>
</div>
    
    </div>
</div>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php

get_footer();
