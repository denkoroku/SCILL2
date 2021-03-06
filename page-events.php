<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Starter
 */

get_header(); ?>

	<section id="primary" class="content-area col-sm-12 col-lg-8">
		<main id="main" class="site-main" role="main">

        <div class="card-group">
        <?php 
                $today = date('Ymd');
                $Events = new WP_Query(array(
                    'paged' => get_query_var('paged', 1),

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

			while ($Events->have_posts()) {
                $Events->the_post(); ?>
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
                    <?php $imageID = get_field('event_image'); ?>
                    <?php $image = wp_get_attachment_image_src( $imageID, 'full' ); ?>
                    <?php $alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true); ?>
                    <img src="<?php echo $image[0]?> ?>" alt="<?php echo $alt_text; ?>">
            </div>
        </div>
    </div>
            <?php }    
            echo paginate_links(array(
                'total' => $Events->max_num_pages
            ));
         ?>

         <p class='col-12'>Looking for a recap of past events ? <a href="<?php echo site_url('/past-events')?>">Check out our past events archive</a>.</p>
</div>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_sidebar();
get_footer();
