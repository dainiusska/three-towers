<?php
function register_second_section_block() {
    if ( function_exists( 'acf_register_block_type' ) ) {
        acf_register_block_type( array(
            'name'              => 'second-section',
            'title'             => __( 'Second Section' ),
            'description'       => __( 'CTA Banner Section' ),
            'render_callback'   => 'render_second_section_block',
            'category'          => 'layout',
            'icon'              => 'admin-site',
            'keywords'          => array( 'section', 'columns', 'banner' ),
            'enqueue_style'     => get_template_directory_uri() . '/assets/css/blocks/second-section.css',
        ));
    }
}
add_action( 'acf/init', 'register_second_section_block' );

function render_second_section_block( $block ) {
    $section_title = get_field( 'section_title' );
    $section_description = get_field( 'section_description' );
    $banner = get_field( 'banner' );
    $button_img_src = get_template_directory_uri() . '/images/Button.svg';
 ?>
    <section class="second-section">
        <div class="section-headings with-description">
            <?php if ( $section_title ) : ?>
                <h2 class="section-heading__title">
                    <?php echo wp_kses_post( $section_title ); ?>
                </h2>
            <?php endif; ?>
            <?php if ( $section_description ) : ?>
                <div class="section-heading__description">
                    <p><?php echo wp_kses_post( $section_description ); ?></p>
                </div>
            <?php endif; ?>
        </div>
        <div class="second-section__container">
            <div class="second-section__col col-text">
                <div class="second-section__col-top">
                    <div class="second-section__col-title">
                        <?php echo $banner['title'] ? esc_html( $banner['title'] ) : ''; ?>
                    </div>
                    <div class="second-section__col-description">
                        <p><?php echo $banner['text'] ? esc_html( $banner['text'] ) : ''; ?></p>
                    </div>
                </div>
                <div class="second-section__col-bottom">
                    <a href="<?php echo $banner['link_url'] ? esc_url( $banner['link_url'] ) : ''; ?>">
                        <img src="<?php echo $button_img_src ? esc_url( $button_img_src ) : ''; ?>" alt="">
                    </a>
                    <span><?php echo $banner['number'] ? esc_html( $banner['number'] ) : ''; ?></span>
                </div>
            </div>
            <div class="second-section__col col-img">
                <img src="<?php echo $banner['image']['url'] ? esc_url( $banner['image']['url'] ) : ''; ?>" alt="">
            </div>
        </div>
    </section>
    <?php
}