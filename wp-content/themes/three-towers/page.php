<?php get_header(); ?>
<main class="page-content">
    <div class="page-layout">
        <?php if ( get_field( 'show_sidebar' ) ) :
            $sidebar_top = get_field( 'sidebar_top' );
            $image = ( $sidebar_top['image'] ) ?: '';
            $blank_image = ( get_template_directory_uri() . '/images/user.jpg' ) ?: '';
            $name = ( $sidebar_top['name'] ) ?: '';
            $surname = ( $sidebar_top['surname'] ) ?: '';
            $position = ( $sidebar_top['position'] ) ?: '';
            $points = get_field( 'points' );
            $title = ( $points['title'] ) ?: '';
            $number = ( $points['number'] ) ?: '';
            $range = ( $points['range'] ) ?: '';
            $level_start = ( $points['level_start'] ) ?: '';
            $level_end = ( $points['level_end'] ) ?: '';
            ?>
            <aside class="sticky-sidebar">
                <div class="sticky-sidebar__top">
                    <div class="sticky-sidebar__top-image">
                        <img src="<?php echo ! empty( $image['url'] ) ? esc_url( $image['url'] ) : esc_url( get_template_directory_uri() . '/images/user.jpg' ); ?>" alt="">
                    </div>
                    <div class="sticky-sidebar__top-info">
                        <span><?php echo $name ? esc_html( $name ) : ''; ?></span>
                        <span><?php echo $surname ? esc_html( $surname ) : ''; ?></span>
                        <span><?php echo $position ? esc_html( $position ) : ''; ?></span>
                    </div>
                </div>
                <div class="sticky-sidebar__points">
                    <div class="sticky-sidebar__points-wrap">
                        <span class="sticky-sidebar__points-title"><?php echo $title ? esc_html( $title ) : ''; ?></span>
                        <span class="sticky-sidebar__points-number"><?php echo $number ? esc_html( $number ) : ''; ?></span>
                    </div>
                    <?php if ( $range ) : ?>
                    <div class="range-bar">
                        <div class="range-bar__line">
                            <div class="range-fill" style="width: <?php echo esc_attr( $range ); ?>%;"></div>
                        </div>
                        <div class="range-bar__levels">
                            <span>LVL <?php echo $level_start ? esc_attr( $level_start ) : ''; ?></span>
                            <span>LVL <?php echo $level_end ? esc_attr( $level_end ) : ''; ?></span>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </aside>
        <?php endif; ?>
        <div class="content">
            <?php the_content(); ?>
        </div>
    </div>
</main>
<?php get_footer(); ?>