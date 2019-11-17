<?php get_header(); ?>

<?php pageBanner(array(
    'title' => 'All Programs',
    'subtitle' => 'There is something for Everyone. Have a look around.'
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
        <ul class="link-list min-list">
        <?php while(have_posts()){ ?>
            <?php the_post(); ?>
            <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
        <?php } ?>
        </ul>
        <?php echo paginate_links(); ?>
    </div>

<?php get_footer(); ?>