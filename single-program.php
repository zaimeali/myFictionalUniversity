<?php get_header(); ?>

    <?php while(have_posts()) {?>

        <?php the_post(); ?>

        <?php pageBanner(); ?>
<!-- 
    <div class="page-banner">
        <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('img/ocean.jpg'); ?>);"></div>
        <div class="page-banner__content container container--narrow">
            <h1 class="page-banner__title"><?php the_title(); ?></h1>
            <div class="page-banner__intro">
                <p>DON'T FORGET TO REPLACE ME LATER.</p>
            </div>
        </div>  
    </div> -->

    <div class="container container--narrow page-section">
        <div class="metabox metabox--position-up metabox--with-home-link">
            <p><a class="metabox__blog-home-link" href="<?php echo site_url('/programs'); ?>"><i class="fa fa-home" aria-hidden="true"></i> All Programs</a> 
            <span class="metabox__main"><?php the_title(); ?></span></p>
        </div>
        <div class="generic-content">
            <?php the_field('main_body_content'); ?>
        </div>

        <?php

                    $relatedProfessor = new WP_Query(array(
                        'posts_per_page' => -1,
                        'post_type' => 'professor',
                        'orderby' => 'title',
                        'order' => 'ASC',
                        'meta_query' => array(
                            array(
                                'key' => 'related_program',
                                'compare' => 'LIKE',
                                'value' => '"' . get_the_ID() . '"'
                            )
                        )
                    ));

                    if($relatedProfessor->have_posts()){
                        echo "<hr class='section-break'>";

                        ?>
                        <h2 class="headline headline--medium"><?php echo get_the_title(); ?> Professor(s):</h2>
                        <ul>
                        <?php
                        
                        echo "<ul class='professor-cards'>";
                        while($relatedProfessor->have_posts()){
                            $relatedProfessor->the_post();
                            ?>
                            <li class="professor-card__list-item">
                                <a class="professor-card" href="<?php the_permalink(); ?>">
                                    <img class="professor-card__image" src="<?php the_post_thumbnail_url("professorLandscape"); ?>">
                                    <span class="professor-card__name"><?php the_title(); ?></span>
                                </a>
                            </li>
                            <?php
                        }
                        echo "</ul>";

                        // reset the global post object and turn it into default query.. use it in every end of a query 
                        wp_reset_postdata(); 
                        ?>
                        </ul>
                        <?php
                    }

                    $today = date('Ymd');
                    $homePageEvents = new WP_Query(array(
                        'posts_per_page' => 2,
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
                            ),
                            array(
                                'key' => 'related_program',
                                'compare' => 'LIKE',
                                'value' => '"' . get_the_ID() . '"'
                            )
                        )
                    )); 
                    ?>

                <?php if($homePageEvents->have_posts()){ ?>

                    <hr class="section-break">

                    <h2 class="headline headline--medium">Upcoming <?php echo get_the_title(); ?> Events:</h2>
                    <?php 

                    while($homePageEvents->have_posts()){
                        $homePageEvents->the_post();
                        ?>

                        <div class="event-summary">
                            <a class="event-summary__date t-center" href="#">
                                <span class="event-summary__month">
                                <?php 
                                    $postDate = get_field('event_date', false, false);
                                    $eventDate = new DateTime($postDate);
                                    echo $eventDate->format('M');
                                    // echo $postDate;
                                ?>
                                </span>
                                <span class="event-summary__day">
                                    <?php
                                        echo $eventDate->format('d'); 
                                    ?>
                                </span>  
                            </a>
                            <div class="event-summary__content">
                                <h5 class="event-summary__title headline headline--tiny"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                <p><?php if(has_excerpt()){
                                        // the_excerpt(); bcz it's also printing space above and below
                                        echo get_the_excerpt();
                                    }
                                    else{
                                        echo wp_trim_words(get_the_content(), 10);
                                    } 
                                    ?> <a href="<?php the_permalink(); ?>" class="nu gray">Learn more</a></p>
                            </div>
                        </div>

                        <?php
                    
                    }
                }
                ?>

    </div>

    <?php } ?>

<?php get_footer(); ?>