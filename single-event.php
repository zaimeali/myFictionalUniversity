<?php get_header(); ?>

    <?php while(have_posts()) {?>

        <?php the_post(); ?>

        <?php pageBanner(); ?>

    <!-- <div class="page-banner">
        <div class="page-banner__bg-image" style="background-image: url(<?php 
            // echo get_theme_file_uri('img/ocean.jpg'); 
        ?>);"></div>
        <div class="page-banner__content container container--narrow">
            <h1 class="page-banner__title">
                <?php 
                    // the_title(); 
                ?>
            </h1>
            <div class="page-banner__intro">
                <p>DON'T FORGET TO REPLACE ME LATER.</p>
            </div>
        </div>  
    </div> -->

    <div class="container container--narrow page-section">
        <div class="metabox metabox--position-up metabox--with-home-link">
            <p><a class="metabox__blog-home-link" href="<?php echo site_url('/events'); ?>"><i class="fa fa-home" aria-hidden="true"></i> Event Home</a> 
            <span class="metabox__main"><?php the_title(); ?></span></p>
        </div>
        <div class="generic-content">
            <?php the_content(); ?>
        </div>

        <?php 
            $relatedPrograms = get_field('related_program');
        ?>

        <?php if($relatedPrograms){?>
            
        <hr class="section-break">

        <?php
            echo "<h2 class='headline headline--medium'>Related Program(s):</h2>";
            echo '<ul class="link-list min-list ">';
            foreach($relatedPrograms as $program){
                ?>
                <li><a href="<?php echo get_the_permalink($program); ?>" target="_blank" rel="noopener noreferrer"><?php echo get_the_title($program); ?></a></li>
                <?php
            }
            echo '</ul>';
        ?>

        <?php } ?>

    </div>

    <?php } ?>

<?php get_footer(); ?>