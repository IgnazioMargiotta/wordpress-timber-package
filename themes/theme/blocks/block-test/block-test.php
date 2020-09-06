<?php

add_action( 'acf/init', 'block_test' );

function block_test() {
    // Bail out if function doesn’t exist.
    if ( ! function_exists( 'acf_register_block' ) ) {
        return;
    }

    // Register a new block.
    acf_register_block( array(
        'name'            => 'block_test',
        'title'           => __( 'Block Test', 'theme' ),
        'description'     => __( 'Block Test', 'theme' ),
        'render_callback' => 'render__block_test',
        'category'        => 'blocks',
        'icon'            => 'admin-comments',
        'keywords'        => array( 'block test' ),
    ) );
}

// Function render block
function render__block_test( $block, $content = '', $is_preview = false ) {
    $context = Timber::context();

    // Store block values.
    $context['block'] = $block;

    // Store field values.
    $context['fields'] = get_fields();

    // Store $is_preview value.
    $context['is_preview'] = $is_preview;

    // Render the block.
    Timber::render( 'blocks/block-test.twig', $context );
}