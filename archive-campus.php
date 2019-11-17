<?php get_header(); ?>

<?php pageBanner(array(
    'title' => 'Our Campuses',
    'subtitle' => 'We have several conveniently located campuses.'
)); ?>


    <!-- <div class="page-banner">
        <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('img/ocean.jpg'); ?>);"></div>
        <div class="page-banner__content container container--narrow">
            <h1 class="page-banner__title">
                All Programs
            </h1>
            <div class="page-banner__intro">
                <p>There's something for Everyone. Have a look around.</p>
            </div>
        </div>  
    </div> -->

        
        <div class="container container--narrow page-section">
            
            <div class="acf-map">
            <?php $mapLocation = get_field('map_location'); ?>
            <?php while(have_posts()){ ?>
                <?php the_post(); ?>
                <div data-lat='<?php echo $mapLocation['lat']; ?>' data-lng='<?php echo $mapLocation['lng'] ?>' class="marker">

                </div>
            <?php } ?>
            <?php echo paginate_links(); ?>
            </div>

        </div>

<?php get_footer(); ?>