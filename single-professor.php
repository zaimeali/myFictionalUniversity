<?php get_header(); ?>

    <?php while(have_posts()) {?>

        <?php the_post(); ?>

        <!-- calling pageBanner function from functions.php -->
        <?php pageBanner(); ?>

    <!-- <div class="page-banner">
        <div class="page-banner__bg-image" style="background-image: url(
            <?php 
                $pageBanner = get_field('page_banner_background_image'); 
                // echo $pageBanner['url'];
                echo $pageBanner['sizes']['pageBanner'];
            ?>);">
        </div>
        <div class="page-banner__content container container--narrow">
            <h1 class="page-banner__title"><?php the_title(); ?></h1>
            <div class="page-banner__intro">
                <p><?php the_field('page_banner_subtitle'); ?></p>
            </div>
        </div>  
    </div> -->

    <div class="container container--narrow page-section">
        <div class="generic-content">
            <div class="row group">
                <div class="one-third"> 
                    <?php the_post_thumbnail("professorPortrait"); ?>
                </div>
                <div class="two-thirds">
                    <?php
                    
                        $likeCount = new WP_Query(array(
                            'post_type' => 'like',
                            'meta_query' => array(
                                array(
                                    'key' => 'liked_professor_id',
                                    'compare' => '=',
                                    'value' => get_the_ID()
                                )
                            )
                        ));

                        $existStatus = 'no';
                        
                        $existQuery = new WP_Query(array(
                            'author' => get_current_user_id(),
                            'post_type' => 'like',
                            'meta_query' => array(
                                array(
                                    'key' => 'liked_professor_id',
                                    'compare' => '=',
                                    'value' => get_the_ID()
                                )
                            )
                        ));

                        if($existQuery->found_posts){
                            $existStatus = "yes";
                        }
                    
                    ?>
                    <span class="like-box" data-professor="<?php the_ID(); ?>" data-exists="<?php echo $existStatus; ?>">
                        <i class="fa fa-heart-o" aria-hidden="true"></i>
                        <i class="fa fa-heart" aria-hidden="true"></i>
                        <span class="like-count"><?php echo $likeCount->found_posts; ?></span> <!-- found_posts will not create the pagination and give total number of post -->
                    </span>
                    <?php the_content(); ?>
                </div>
            </div>
        </div>

        <?php 
            $relatedPrograms = get_field('related_program');
        ?>

        <?php if($relatedPrograms){?>
            
        <hr class="section-break">

        <?php
            echo "<h2 class='headline headline--medium'>Subject(s) Taught:</h2>";
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