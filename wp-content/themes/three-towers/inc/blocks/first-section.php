<?php
function register_first_section_block() {
    if ( function_exists( 'acf_register_block_type' ) ) {
        acf_register_block_type( array(
            'name'              => 'first-section',
            'title'             => __( 'First Section' ),
            'description'       => __( 'A custom block with three columns' ),
            'render_callback'   => 'render_first_section_block',
            'category'          => 'layout',
            'icon'              => 'admin-site',
            'keywords'          => array( 'section', 'columns', 'custom' ),
            'enqueue_style'     => get_template_directory_uri() . '/assets/css/blocks/first-section.css',
        ));
    }
}
add_action( 'acf/init', 'register_first_section_block' );

function render_first_section_block( $block ) {
    $first_section_columns = get_field( 'first_section_columns' );
    $section_title = get_field( 'section_title' );
    $section_description = get_field( 'section_description' );
    $completed_img = get_template_directory_uri() . '/images/material-symbols_check.svg' ?: '';
    ?>
    <section class="first-section">
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
        <div class="first-section__container">
            <?php if ( $first_section_columns ) : ?>
                <?php foreach ( $first_section_columns as $col ) :
                    $status = $col['status'] ?? [];
                    $is_completed = is_array( $status ) && isset( $status[0] ) && $status[0] === 'completed';
                    ?>
                    <div class="first-section__col<?php echo $is_completed ? ' completed' : ''; ?>">
                        <div class="first-section__heading">
                            <div class="first-section__heading-number">
                                <span><?php echo esc_html( $col['number'] ?? '' ); ?></span>
                            </div>
                            <div class="first-section__heading-progress">
                                <?php if ( $is_completed ) : ?>
                                    <span class="first-section__heading-progress--completed"><img src="<?php echo $completed_img ? esc_url( $completed_img ) : ''; ?>" alt=""></span>
                                <?php else : ?>
                                    <span><?php echo $col['progress'] ? esc_html( $col['progress'] ) : '' ; ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="first-section__col-title">
                            <span><?php echo esc_html( $col['title'] ?? '' ); ?></span>
                        </div>
                        <div class="first-section__col-text">
                            <p><?php echo esc_html($col['text'] ?? ''); ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </section>
    <?php
}
