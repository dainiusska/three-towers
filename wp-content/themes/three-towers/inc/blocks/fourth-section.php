<?php
function register_fourth_section_block() {
    if ( function_exists( 'acf_register_block_type' ) ) {
        acf_register_block_type( array(
            'name'              => 'fourth-section',
            'title'             => __( 'Fourth Section' ),
            'description'       => __( 'Slider Section' ),
            'render_callback'   => 'render_fourth_section_block',
            'category'          => 'layout',
            'icon'              => 'admin-site',
            'keywords'          => array( 'section', 'columns', 'slider' ),
            'enqueue_assets' => function () {
                wp_enqueue_style(
                    'fourth-section-style',
                    get_template_directory_uri() . '/assets/css/blocks/fourth-section.css'
                );

                wp_enqueue_script(
                    'swiper',
                    get_template_directory_uri() . '/assets/js/swiper-bundle.min.js',
                    array(),
                    null,
                    true
                );

                wp_enqueue_script(
                    'fourth-section-script',
                    get_template_directory_uri() . '/assets/js/fourth-section.js',
                    array( 'swiper' ),
                    null,
                    true
                );
            },
        ));
    }
}
add_action( 'acf/init', 'register_fourth_section_block' );

function render_fourth_section_block( $block ) {
    $section_title = get_field( 'section_title' );
    $slider = get_field( 'slider' );

    $arrow_prev = get_template_directory_uri() . '/images/prev.svg' ?: '';
    $arrow_next = get_template_directory_uri() . '/images/next.svg' ?: '';
    ?>
    <section class="fourth-section">
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
            <div class="fourth-section__container">
                <div class="fourth-swiper-container">
                    <div class="swiper-wrapper">
                        <?php foreach ( $slider as $slide ) : ?>
                            <div class="swiper-slide">
                                <div class="white-overflow"></div>
                                <div class="swiper-slide__col-left">
                                    <div class="swiper-slide__col-top">
                                        <span class="fourth-name">
                                            <?php echo $slide['name'] ? esc_html( $slide['name'] ) : ''; ?>
                                        </span>
                                        <p class="fourth-text">
                                            <?php echo $slide['text'] ? esc_html( $slide['text'] ) : ''; ?>
                                        </p>
                                    </div>
                                    <div class="swiper-slide__col-bottom">
                                        <span class="fourth-earnings-text">
                                            <?php echo $slide['points_text'] ? esc_html( $slide['points_text'] ) : ''; ?>
                                        </span>
                                        <span class="fourth-earnings-number">
                                            <?php echo $slide['points_number'] ? esc_html( $slide['points_number'] ) : ''; ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="swiper-slide__col-right">
                                    <span class="fourth-number">
                                        <?php echo $slide['number'] ? esc_html( $slide['number'] ) : ''; ?>
                                    </span>
                                    <span class="fourth-image">
                                        <img src="<?php echo $slide['logo']['url'] ? esc_html( $slide['logo']['url'] ) : ''; ?>" alt="">
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