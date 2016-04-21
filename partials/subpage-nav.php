<nav class="c-subpage-nav">
    <ul class="o-inline-list o-inline-list--spaced">
        <?php
        $top_parent = ww_get_top_parent();
        $current_id = $post->ID;
        ?>
        <li <?php if( $top_parent->ID === $current_id ) echo 'class="curent-menu-item"'; ?>>
            <a href="<?php the_permalink( $top_parent->ID ); ?>"><?php echo $top_parent->post_title; ?></a>
        </li>
        <?php
        $args = [
            'post_type' => 'page',
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'orderby' => 'menu_order',
            'order' => 'asc',
            'post_parent' => $top_parent->ID,
        ];
        $query = new WP_Query( $args );
        if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post();
        ?>
            <li <?php if( $post->ID === $current_id ) echo 'class="curent-menu-item"'; ?>>
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </li>
        <?php endwhile; endif; wp_reset_postdata(); ?>
    </ul>
</nav>