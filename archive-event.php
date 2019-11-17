<?php get_header(); ?>

<?php pageBanner(array(
    'title' => 'All Events',
    'subtitle' => 'See what is going on in our world.'
)); ?>


    <!-- <div class="page-banner">
        <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('img/ocean.jpg'); ?>);"></div>
        <div class="page-banner__content container container--narrow">
            <h1 class="page-banner__title">
                All Events
            </h1>
            <div class="page-banner__intro">
                <p>See what's going on in our world.</p>
            </div>
        </div>  
    </div> -->

    <div class="container container--narrow page-section">
        <?php while(have_posts()){ ?>
            <?php the_post(); 
                get_template_part('template-parts/content', 'event');
            } 
            ?>
        <?php echo paginate_links(); ?>

        <hr class="section-break">
        
        <p>Looking for recap of Past Events? <a href="<?php echo site_url('/past-events'); ?>">Click Here</a></p>
    </div>


<!-- 
    <div class="page-banner">
        <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('img/library-hero.jpg'); ?>);">
        </div>
        <div class="page-banner__content container t-center c-white">
            <h1 class="headline headline--large">Welcome!</h1>
            <h2 class="headline headline--medium">We think you&rsquo;ll like it here.</h2>
            <h3 class="headline headline--small">Why don&rsquo;t you check out the <strong>major</strong> you&rsquo;re interested in?</h3>
            <a href="#" class="btn btn--large btn--blue">Find Your Major</a>
        </div>
    </div>

    <div class="full-width-split group">
        <div class="full-width-split__one">
            <div class="full-width-split__inner">
                <h2 class="headline headline--small-plus t-center">Upcoming Events</h2>
        
                <div class="event-summary">
                    <a class="event-summary__date t-center" href="#">
                        <span class="event-summary__month">Mar</span>
                        <span class="event-summary__day">25</span>  
                    </a>
                    <div class="event-summary__content">
                        <h5 class="event-summary__title headline headline--tiny"><a href="#">Poetry in the 100</a></h5>
                        <p>Bring poems you&rsquo;ve wrote to the 100 building this Tuesday for an open mic and snacks. <a href="#" class="nu gray">Learn more</a></p>
                    </div>
                </div>
                <div class="event-summary">
                    <a class="event-summary__date t-center" href="#">
                        <span class="event-summary__month">Apr</span>
                        <span class="event-summary__day">02</span>  
                    </a>
                    <div class="event-summary__content">
                        <h5 class="event-summary__title headline headline--tiny"><a href="#">Quad Picnic Party</a></h5>
                        <p>Live music, a taco truck and more can found in our third annual quad picnic day. <a href="#" class="nu gray">Learn more</a></p>
                    </div>
                </div>
        
                <p class="t-center no-margin"><a href="#" class="btn btn--blue">View All Events</a></p>

            </div>
        </div>
        <div class="full-width-split__two">
            <div class="full-width-split__inner">
                <h2 class="headline headline--small-plus t-center">From Our Blogs</h2>

                <div class="event-summary">
                    <a class="event-summary__date event-summary__date--beige t-center" href="#">
                        <span class="event-summary__month">Jan</span>
                        <span class="event-summary__day">20</span>  
                    </a>
                    <div class="event-summary__content">
                        <h5 class="event-summary__title headline headline--tiny"><a href="#">We Were Voted Best School</a></h5>
                        <p>For the 100th year in a row we are voted #1. <a href="#" class="nu gray">Read more</a></p>
                    </div>
                </div>
                <div class="event-summary">
                    <a class="event-summary__date event-summary__date--beige t-center" href="#">
                        <span class="event-summary__month">Feb</span>
                        <span class="event-summary__day">04</span>  
                    </a>
                    <div class="event-summary__content">
                        <h5 class="event-summary__title headline headline--tiny"><a href="#">Professors in the National Spotlight</a></h5>
                        <p>Two of our professors have been in national news lately. <a href="#" class="nu gray">Read more</a></p>
                    </div>
                </div>
        
                <p class="t-center no-margin"><a href="#" class="btn btn--yellow">View All Blog Posts</a></p>
            </div>
        </div>
    </div>

    <div class="hero-slider">
        <div class="hero-slider__slide" style="background-image: url(<?php echo get_theme_file_uri('img/bus.jpg'); ?>);">
            <div class="hero-slider__interior container">
                <div class="hero-slider__overlay">
                    <h2 class="headline headline--medium t-center">Free Transportation</h2>
                    <p class="t-center">All students have free unlimited bus fare.</p>
                    <p class="t-center no-margin"><a href="#" class="btn btn--blue">Learn more</a></p>
                </div>
            </div>
        </div>
        <div class="hero-slider__slide" style="background-image: url(<?php echo get_theme_file_uri('img/apples.jpg'); ?>);">
            <div class="hero-slider__interior container">
                <div class="hero-slider__overlay">
                    <h2 class="headline headline--medium t-center">An Apple a Day</h2>
                    <p class="t-center">Our dentistry program recommends eating apples.</p>
                    <p class="t-center no-margin"><a href="#" class="btn btn--blue">Learn more</a></p>
                </div>
            </div>
        </div>
        <div class="hero-slider__slide" style="background-image: url(<?php echo get_theme_file_uri('img/bread.jpg'); ?>);">
            <div class="hero-slider__interior container">
                <div class="hero-slider__overlay">
                    <h2 class="headline headline--medium t-center">Free Food</h2>
                    <p class="t-center">Fictional University offers lunch plans for those in need.</p>
                    <p class="t-center no-margin"><a href="#" class="btn btn--blue">Learn more</a></p>
                </div>
            </div>
        </div>
    </div> 
-->

<?php get_footer(); ?>