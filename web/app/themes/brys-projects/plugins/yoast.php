<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page' );
}

// Use custom image as featured images for SEO og:image tag
function autoset_featured() {
    global $post;

    $already_has_thumb = has_post_thumbnail($post->ID);

    if (!$already_has_thumb)  {

        // Check for hero image
        $hero_bg = get_field('hero_background', $post->ID);
        if ($hero_bg) {
            set_post_thumbnail($post->ID, $hero_bg['ID']);
            return;
        }

        // Check for page content
        $content_blocks = get_field('content_blocks', $post->ID);
        foreach($content_blocks as $block) {
            if(isset($block['block_image'])) {
                set_post_thumbnail($post->ID, $block['block_image']['ID']);
                return;
            }
        }



    }
}
add_action('save_post', 'autoset_featured');
add_action('draft_to_publish', 'autoset_featured');
add_action('new_to_publish', 'autoset_featured');
add_action('pending_to_publish', 'autoset_featured');
add_action('future_to_publish', 'autoset_featured');