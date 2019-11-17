<?php get_header(); ?>


    <div class="page-banner">
        <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('img/library-hero.jpg'); ?>);">
        </div>
        <div class="page-banner__content container t-center c-white">
            <h1 class="headline headline--large">Welcome!</h1>
            <h2 class="headline headline--medium">We think you&rsquo;ll like it here.</h2>
            <h3 class="headline headline--small">Why don&rsquo;t you check out the <strong>major</strong> you&rsquo;re interested in?</h3>
            <a href="<?php echo site_url('/programs'); ?>" class="btn btn--large btn--blue">Find Your Major</a>
        </div>
    </div>

    <div class="full-width-split group">
        <div class="full-width-split__one">
            <div class="full-width-split__inner">
                <h2 class="headline headline--small-plus t-center">Upcoming Events</h2>
        
                <?php
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
                            )
                        )
                    )); 
                    while($homePageEvents->have_posts()){
                        $homePageEvents->the_post();

                        // not full name of a file just a slug name
                        get_template_part('template-parts/content', 'event');
                    }
                ?>
                <!-- <div class="event-summary">
                    <a class="event-summary__date t-center" href="#">
                        <span class="event-summary__month">Apr</span>
                        <span class="event-summary__day">02</span>  
                    </a>
                    <div class="event-summary__content">
                        <h5 class="event-summary__title headline headline--tiny"><a href="#">Quad Picnic Party</a></h5>
                        <p>Live music, a taco truck and more can found in our third annual quad picnic day. <a href="#" class="nu gray">Learn more</a></p>
                    </div>
                </div> -->
        
                <p class="t-center no-margin"><a href="<?php echo site_url('/events'); ?>" class="btn btn--blue">View All Events</a></p>

            </div>
        </div>
        <div class="full-width-split__two">
            <div class="full-width-split__inner">
                <h2 class="headline headline--small-plus t-center">From Our Blogs</h2>

                <?php
                    
                    $homePagePost = new WP_Query(array(
                        'posts_per_page' => 2
                    )); 

                    while($homePagePost->have_posts()){
                        $homePagePost->the_post();
                        ?>
                <div class="event-summary">
                    <a class="event-summary__date event-summary__date--beige t-center" href="<?php the_permalink(); ?>">
                        <span class="event-summary__month"><?php the_time('M'); ?></span>
                        <span class="event-summary__day"><?php the_time('j'); ?></span>  
                    </a>
                    <div class="event-summary__content">
                        <h5 class="event-summary__title headline headline--tiny"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                        <p><?php if(has_excerpt()){
                            // the_excerpt(); bcz it's also printing space above and below
                            echo get_the_excerpt();
                        }
                        else{
                            echo wp_trim_words(get_the_content(), 20);
                        } ?> <a href="<?php the_permalink(); ?>" class="nu gray">Read more</a></p>
                    </div>
                </div>
                <?php
                    }
                    wp_reset_postdata();
                ?>
                <!-- <div class="event-summary">
                    <a class="event-summary__date event-summary__date--beige t-center" href="#">
                        <span class="event-summary__month">Feb</span>
                        <span class="event-summary__day">04</span>  
                    </a>
                    <div class="event-summary__content">
                        <h5 class="event-summary__title headline headline--tiny"><a href="#">Professors in the National Spotlight</a></h5>
                        <p>Two of our professors have been in national news lately. <a href="#" class="nu gray">Read more</a></p>
                    </div>
                </div> -->
        
                <p class="t-center no-margin"><a href="<?php echo site_url('/blog'); ?>" class="btn btn--yellow">View All Blog Posts</a></p>
            </div>
        </div>
    </div>

    <div class="hero-slider">
    <?php
    
        $args = array(
            'post_type' => 'slide'
        );             
        $slider = new WP_Query($args);

        while($slider->have_posts()){
            $slider->the_post();
            
            $image = get_field('slide_photo');
            $url = $image['url'];
            ?>
                <div class="hero-slider__slide" style="background-image: url(<?php echo $url; ?>);">
                    <div class="hero-slider__interior container">
                        <div class="hero-slider__overlay">
                            <h2 class="headline headline--medium t-center"><?php the_field('slide_title'); ?></h2>
                            <p class="t-center"><?php the_field('slide_text'); ?></p>
                            <p class="t-center no-margin"><a href="<?php the_permalink(); ?>" class="btn btn--blue">Learn more</a></p>
                        </div>
                    </div>
                </div>
            <?php
        }
    ?>
    </div>

<?php get_footer(); ?>