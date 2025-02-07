<?php
function register_third_section_block() {
    if ( function_exists( 'acf_register_block_type' ) ) {
        acf_register_block_type( array(
            'name'              => 'third-section',
            'title'             => __( 'Third Section' ),
            'description'       => __( 'Slider Section' ),
            'render_callback'   => 'render_third_section_block',
            'category'          => 'layout',
            'icon'              => 'admin-site',
            'keywords'          => array( 'section', 'columns', 'slider' ),
            'enqueue_assets' => function () {
                wp_enqueue_style(
                    'third-section-style',
                    get_template_directory_uri() . '/assets/css/blocks/third-section.css'
                );

                wp_enqueue_script(
                    'swiper',
                    get_template_directory_uri() . '/assets/js/swiper-bundle.min.js',
                    array(),
                    null,
                    true
                );

                wp_enqueue_script(
                    'third-section-script',
                    get_template_directory_uri() . '/assets/js/third-section.js',
                    array( 'swiper' ),
                    null,
                    true
                );
            },
        ));
    }
}
add_action( 'acf/init', 'register_third_section_block' );

function render_third_section_block( $block ) {
    $section_title = get_field( 'section_title' );
    $slider = get_field( 'slider' );
    $completed_img = get_template_directory_uri() . '/images/material-symbols_check.svg' ?: '';
    $arrow_prev = get_template_directory_uri() . '/images/prev.svg' ?: '';
    $arrow_next = get_template_directory_uri() . '/images/next.svg' ?: '';
    ?>
    <section class="third-section">
        <div class="section-headings">
            <?php if ( $section_title ) : ?>
                <h2 class="section-heading__title">
                    <?php echo wp_kses_post( $section_title ); ?>
                </h2>
            <?php endif; ?>
            <div class="slider-arrows">
                <div class="slider-arrow slider-arrow--prev">
                    <img src="<?php echo esc_url( $arrow_prev ); ?>" alt="">
                </div>
                <div class="slider-arrow slider-arrow--next">
                    <img src="<?php echo esc_url( $arrow_next ); ?>" alt="">
                </div>
            </div>
        </div>
        <?php if ( $slider ) : ?>
            <div class="third-section__container">
                <div class="third-swiper-container">
                    <div class="swiper-wrapper">
                        <?php foreach ( $slider as $slide ) :
                        $status = $slide['status'] ?? [];
                        $is_completed = is_array( $status ) && isset( $status[0] ) && $status[0] === 'completed';
                        ?>
                            <div class="swiper-slide<?php echo $is_completed ? ' completed' : ''; ?>">
                                <div class="slide__top">
                                    <span class="slide__top-number">
                                        <?php echo $slide['number'] ? esc_html( $slide['number'] ) : ''; ?>
                                    </span>
                                    <?php if ( $is_completed ) : ?>
                                        <span class="first-section__heading-progress--completed">
                                            <img src="<?php echo $completed_img ? esc_url( $completed_img ) : ''; ?>" alt="">
                                        </span>
                                    <?php else : ?>
                                        <span class="slide__top-progress"><?php echo $slide['progress'] ? esc_html( $slide['progress'] ) : '' ; ?></span>
                                    <?php endif; ?>
                                </div>
                                <div class="slide__bottom">
                                    <span class="slide__bottom-name">
                                        <?php echo $slide['name'] ? esc_html( $slide['name'] ) : ''; ?>
                                    </span>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </section>
    <?php
}