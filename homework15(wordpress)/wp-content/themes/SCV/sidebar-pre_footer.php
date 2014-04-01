
<?php
// Custom widget area start
if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Custom Widget Area') ) : ?>
<?php endif; ?>

<div class="pre_footer">
    <h5>Наши спонсоры:</h5>
    <ul class="sponsors">
        <?php
        $args = array(
            'post_type' => 'scv_sponsors',
            'order'     => 'ASC'
        );

        $scv_sponsors = new WP_Query( $args );

        if ($scv_sponsors-> have_posts() ) {
            while ($scv_sponsors-> have_posts() ) {
                $scv_sponsors->the_post(); ?>
                <li>
                    <?php if ( has_post_thumbnail() ) {
                        the_post_thumbnail();
                    } ?>

                </li>
            <?php } // end while
        } // end if ?>
    </ul>
</div>