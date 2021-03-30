<?php

function add_your_fields_meta_box() {
    global $post;
    $slug = basename( get_permalink( $post->ID ) );
    if ( 'excerpts' == $slug || 'order' == $slug) {
        add_meta_box(
            'your_fields_meta_box', // $id
            'Order Fields', // $title
            'show_your_fields_meta_box', // $callback
            'page', // $screen
            'normal', // $context
            'high' // $priority
        );
    }
}
add_action( 'add_meta_boxes', 'add_your_fields_meta_box' );
function show_your_fields_meta_box() {
    global $post;  
    
    $meta = get_post_meta( $post->ID, 'your_fields', true ); ?>
        
  <input type="hidden" name="your_meta_box_nonce" value="<?php echo wp_create_nonce( basename(__FILE__) ); ?>">

  <p>
    <label for="your_fields[hardback-price]">Hardback Price</label>
    <input type="text" name="your_fields[hardback-price]" id="your_fields[hardback-price]" class="regular-text" value="<?php if (is_array($meta) && isset($meta['hardback-price'])) { echo $meta['hardback-price']; } ?>">
  </p>

 <p>
    <label for="your_fields[hardback-link]">Hardback Link</label>
    <input type="text" name="your_fields[hardback-link]" id="your_fields[hardback-link]" class="regular-text" value="<?php if (is_array($meta) && isset($meta['hardback-link'])) { echo $meta['hardback-link']; } ?>">
  </p>

  <p>
    <label for="your_fields[paperback-price]">Paperback Price</label>
    <input type="text" name="your_fields[paperback-price]" id="your_fields[paperback-price]" class="regular-text" value="<?php if (is_array($meta) && isset($meta['paperback-price'])) { echo $meta['paperback-price']; } ?>">
  </p>
  <p>
    <label for="your_fields[paperback-link]">Paperback Link</label>
    <input type="text" name="your_fields[paperback-link]" id="your_fields[paperback-link]" class="regular-text" value="<?php if (is_array($meta) && isset($meta['paperback-link'])) { echo $meta['paperback-link']; } ?>">
  </p>
  <p>
    <label for="your_fields[ebook-price]">Ebook Price</label>
    <input type="text" name="your_fields[ebook-price]" id="your_fields[ebook-price]" class="regular-text" value="<?php if (is_array($meta) && isset($meta['ebook-price'])) { echo $meta['ebook-price']; } ?>">
  </p>
  <p>
    <label for="your_fields[ebook-link]">Ebook Link</label>
    <input type="text" name="your_fields[ebook-link]" id="your_fields[ebook-link]" class="regular-text" value="<?php if (is_array($meta) && isset($meta['ebook-link'])) { echo $meta['ebook-link']; } ?>">
  </p>
  <p>
    <label for="your_fields[kindle-price]">Kindle Price</label>
    <input type="text" name="your_fields[kindle-price]" id="your_fields[kindle-price]" class="regular-text" value="<?php if (is_array($meta) && isset($meta['kindle-price'])) { echo $meta['kindle-price']; } ?>">
  </p>
  <p>
    <label for="your_fields[kindle-link]">Kindle Link</label>
    <input type="text" name="your_fields[kindle-link]" id="your_fields[kindle-link]" class="regular-text" value="<?php if (is_array($meta) && isset($meta['kindle-link'])) { echo $meta['kindle-link']; } ?>">
  </p>
  <p>
    <label for="your_fields[nook-book-price]">Nook Book Price</label>
    <input type="text" name="your_fields[nook-book-price]" id="your_fields[nook-book-price]" class="regular-text" value="<?php if (is_array($meta) && isset($meta['nook-book-price'])) { echo $meta['nook-book-price']; } ?>">
  </p>
    <p>
    <label for="your_fields[nook-book-price]">Nook Book Price</label>
    <input type="text" name="your_fields[nook-book-price]" id="your_fields[nook-book-price]" class="regular-text" value="<?php if (is_array($meta) && isset($meta['nook-book-price'])) { echo $meta['nook-book-price']; } ?>">
  </p>
  
  
  
  <p>
        <label for="your_fields[amazon-image]">Amazon Image</label>
        <input type="text" name="your_fields[amazon-image]" id="your_fields[amazon-image]" class="meta-image regular-text" value="<?php echo isset($meta['amazon-image']) ? $meta['amazon-image']: ''; ?>">
        <input type="button" class="button image-upload" value="Browse">
    </p>

    <div class="image-preview">

        <img src="<?php echo isset($meta['amazon-image']) ? $meta['amazon-image'] : ''; ?>" style="max-width: 250px;">

    </div>

<p>
    <label for="your_fields[amazon-link]">Amazon Link</label>
    <input type="text" name="your_fields[amazon-link]" id="your_fields[amazon-link]" class="regular-text" value="<?php if (is_array($meta) && isset($meta['amazon-link'])) { echo $meta['amazon-link']; } ?>">
  </p>

  <p>
        <label for="your_fields[litfire-image]">Litfire Image</label>
        <input type="text" name="your_fields[litfire-image]" id="your_fields[litfire-image]" class="meta-image regular-text" value="<?php echo isset($meta['litfire-image']) ? $meta['litfire-image']: ''; ?>">
        <input type="button" class="button image-upload" value="Browse">
    </p>

    <div class="image-preview">
        <img src="<?php echo isset($meta['litfire-image']) ? $meta['litfire-image'] : ''; ?>" style="max-width: 250px;">
    </div>

    <p>
    <label for="your_fields[litfire-link]">Litfire Link</label>
    <input type="text" name="your_fields[litfire-link]" id="your_fields[litfire-link]" class="regular-text" value="<?php if (is_array($meta) && isset($meta['litfire-link'])) { echo $meta['litfire-link']; } ?>">
  </p>

  <p>
        <label for="your_fields[barnes-and-noble-image]">Barnes and Noble Image</label>
        <input type="text" name="your_fields[barnes-and-noble-image]" id="your_fields[barnes-and-noble-image]" class="meta-image regular-text" value="<?php echo isset($meta['barnes-and-noble-image']) ? $meta['barnes-and-noble-image']: ''; ?>">
        <input type="button" class="button image-upload" value="Browse">
    </p>

    <div class="image-preview">
        <img src="<?php echo isset($meta['barnes-and-noble-image']) ? $meta['barnes-and-noble-image'] : ''; ?>" style="max-width: 250px;">
    </div>

    <p>
    <label for="your_fields[barnes-and-noble-link]">Barnes and Noble Link</label>
    <input type="text" name="your_fields[barnes-and-noble-link]" id="your_fields[barnes-and-noble-link]" class="regular-text" value="<?php if (is_array($meta) && isset($meta['barnes-and-noble-link'])) { echo $meta['barnes-and-noble-link']; } ?>">
  </p>


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
function save_your_fields_meta( $post_id ) {   
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
    
    $old = get_post_meta( $post_id, 'your_fields', true );
        if (isset($_POST['your_fields'])) { //Fix 3
            $new = $_POST['your_fields'];
            if ( $new && $new !== $old ) {
                update_post_meta( $post_id, 'your_fields', $new );
            } elseif ( '' === $new && $old ) {
                delete_post_meta( $post_id, 'your_fields', $old );
            }
        }
}
add_action( 'save_post', 'save_your_fields_meta' );