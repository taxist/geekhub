<?php define('WP_USE_THEMES', false); get_header(); ?>

        <p class='site-description'><?php bloginfo( 'description' ); ?></p>
        <h3>НАШИ КУРСЫ</h3>
            <ul class="curs">

                <?php
                $args = array(
                    'post_type' => 'scv_courses',
                    'order'     => 'ASC'
                            );

                $scv_courses = new WP_Query( $args );

                 if ($scv_courses-> have_posts() ) {
                    while ($scv_courses-> have_posts() ) {
                        $scv_courses->the_post(); ?>
                        <li id="post<?php the_ID(); ?>">
                            <?php if ( has_post_thumbnail() ) {
                              the_post_thumbnail();
                            } ?>
                            <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                            <?php the_content(); ?>
                        </li>

                    <?php } // end while
                } // end if ?>

            </ul>
    </div>

<?php get_sidebar( 'pre_footer' ); ?>

<?php get_footer();?>
