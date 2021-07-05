<?php

function add_custom_image_field_meta_box() {
    add_meta_box(
        'custom_image_field_meta_box', // $id
        'Custom Image', // $title
        'show_custom_image_field_meta_box', // $callback
        'page', // $screen
        'normal', // $context
        'high' // $priority
    );
}
add_action( 'add_meta_boxes', 'add_custom_image_field_meta_box' );
function show_custom_image_field_meta_box() {
    global $post;  
    
    $meta = get_post_meta( $post->ID, 'custom_image_field', true ); ?>
        
  <input type="hidden" name="your_meta_box_nonce" value="<?php echo wp_create_nonce( basename(__FILE__) ); ?>">

 

  	<p>
        <label for="custom_image_field[custom-image-field]">Custom Image Field</label>
        <input type="text" name="custom_image_field[custom-image-field]" id="custom_image_field[custom-image-field]" class="meta-image regular-text" value="<?php echo isset($meta['custom-image-field']) ? $meta['custom-image-field']: ''; ?>">
        <input type="button" class="button image-upload" value="Browse">
    </p>

    <div class="image-preview">
        <img src="<?php echo isset($meta['custom-image-field']) ? $meta['custom-image-field'] : ''; ?>" style="max-width: 250px;">
    </div>


  <script>
    jQuery( document ).ready(function($) {
// Instantiates the variable that holds the media library frame.
var file_frame, meta_image_preview, meta_image;
$('.image-upload').on('click', function( event ){

    meta_image_preview = $(this).parent().next('.image-preview');
    meta_image = $(this).parent().children('.meta-image');
    event.preventDefault();

    // If the media frame already exists, reopen it.
    if ( file_frame ) {
        // Open frame
        file_frame.open();
        return;
    }

    // Create the media frame.
    file_frame = wp.media.frames.file_frame = wp.media({
        title: 'Select a image to upload',
        button: {
            text: 'Use this image',
        },
        multiple: false // Set to true to allow multiple files to be selected
    });

    // When an image is selected, run a callback.
    file_frame.on( 'select', function() {

        // We set multiple to false so only get one image from the uploader
        media_attachment = file_frame.state().get('selection').first().toJSON();

        // Do something with attachment.id and/or attachment.url here
        meta_image.val(media_attachment.url);
        
        meta_image_preview.children('img').attr('src', media_attachment.url);
    });
        // Finally, open the modal
    file_frame.open();

});
});
  </script>

  <?php }
function save_custom_image_field_meta( $post_id ) {   
    // verify nonce
    if ( isset($_POST['your_meta_box_nonce']) 
            && !wp_verify_nonce( $_POST['your_meta_box_nonce'], basename(__FILE__) ) ) {
            return $post_id; 
        }
    // check autosave
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return $post_id;
    }
    // check permissions
    if (isset($_POST['post_type'])) { //Fix 2
        if ( 'page' === $_POST['post_type'] ) {
            if ( !current_user_can( 'edit_page', $post_id ) ) {
                return $post_id;
            } elseif ( !current_user_can( 'edit_post', $post_id ) ) {
                return $post_id;
            }  
        }
    }
    
    $old = get_post_meta( $post_id, 'custom_image_field', true );
        if (isset($_POST['custom_image_field'])) { //Fix 3
            $new = $_POST['custom_image_field'];
            if ( $new && $new !== $old ) {
                update_post_meta( $post_id, 'custom_image_field', $new );
            } elseif ( '' === $new && $old ) {
                delete_post_meta( $post_id, 'custom_image_field', $old );
            }
        }
}
add_action( 'save_post', 'save_custom_image_field_meta' );