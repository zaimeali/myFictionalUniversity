<?php get_header(); ?>

    <?php while(have_posts()) {?>

        <?php the_post(); ?>

        <!-- pageBanner Function -->
        <?php pageBanner(); ?>

    <!-- <div class="page-banner">
        <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('img/ocean.jpg'); ?>);"></div>
        <div class="page-banner__content container container--narrow">
            <h1 class="page-banner__title"><?php the_title(); ?></h1>
            <div class="page-banner__intro">
                <p>DON'T FORGET TO REPLACE ME LATER.</p>
            </div>
        </div>  
    </div> -->

    <div class="container container--narrow page-section">

        <?php $theParent = wp_get_post_parent_id(get_the_ID()); ?>
        <?php if($theParent){ ?>
        <div class="metabox metabox--position-up metabox--with-home-link">
            <p><a class="metabox__blog-home-link" href="<?php echo get_permalink($theParent); ?>"><i class="fa fa-home" aria-hidden="true"></i> Back to <?php echo get_the_title($theParent); ?></a> 
            <span class="metabox__main"><?php the_title(); ?></span></p>
        </div>
        <?php } ?>

        <?php
        
            $testArray = get_pages(array(
                'child_of' => get_the_ID()
            ));

        ?>
    
        <?php if($theParent or $testArray){ ?>
        <div class="page-links">
            <h2 class="page-links__title"><a href="<?php echo get_permalink($theParent); ?>"><?php echo get_the_title($theParent); ?></a></h2>
            <ul class="min-list">
                <?php

                if($theParent){
                    $findChildrenOf = $theParent;
                }
                else{
                    $findChildrenOf = get_the_ID();
                }
                wp_list_pages(array(
                    'title_li' => NULL,
                    'child_of' => $findChildrenOf,
                    'sort_column' => 'menu_order'
                ));

                ?>
                <!-- <li class="current_page_item"><a href="#">Our History</a></li>
                <li><a href="#">Our Goals</a></li> -->
            </ul>
        </div>
        <?php } ?>

        <div class="generic-content">
            <form class="search-form" method="get" action="<?php echo esc_url(site_url('/')); ?>">
                <label class="headline headline--medium" for="s">Perform a new search..</label>
                <div class="search-form-row">
                    <input class="s" id="s" type="search" name="s" placeholder="What are you looking for?">
                    <input class="search-submit" type="submit" value="Search">
                </div>
            </form>
        </div>
    </div>

    <?php } ?>

<?php get_footer(); ?>