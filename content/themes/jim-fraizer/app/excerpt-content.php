<?php

function repeatable_editor_get_meta( $value ) {
	global $post;

	$field = get_post_meta( $post->ID, $value, true );
	if ( ! empty( $field ) ) {
		return is_array( $field ) ? stripslashes_deep( $field ) : stripslashes( wp_kses_decode_entities( $field ) );
	} else {
		return false;
	}
}

function repeatable_editor_add_meta_box() {
	global $_wp_post_type_features;
	/*if (isset($_wp_post_type_features['page']['editor']) && $_wp_post_type_features['page']['editor']) {
		unset($_wp_post_type_features['page']['editor']);
	}*/
	$slug = basename( get_permalink( $post->ID ) );
    if ( 'excerpts' == $slug || 'order' == $slug) {
		add_meta_box(
			'repeatable_editor-repeatable-editor',
			__( 'Repeatable Editor', 'repeatable_editor' ),
			'repeatable_editor_repeatable_editor_html',
			'page',
			'normal',
			'high'
		);
	}
}
add_action( 'add_meta_boxes', 'repeatable_editor_add_meta_box', 0 );

function repeatable_editor_repeatable_editor_html( $post) {
	wp_nonce_field( '_repeatable_editor_repeatable_editor_nonce', 'repeatable_editor_repeatable_editor_nonce' );

	//$contents = repeatable_editor_get_meta( 'repeatable_editor_repeatable_editor_content' );
	$contents = get_post_meta($post->ID,'repeatable_editor_repeatable_editor_content',true );

	if ($contents && !empty($contents)) {
		$contents = unserialize( base64_decode( $contents ) );
	} else {
		$contents = array('');
	}
	for ($i = 0; $i < count($contents); $i++) {
		?><div class="content-row">
			<label for="repeatable_editor_repeatable_editor_content_<?php echo $i; ?>"><?php _e( 'Content', 'repeatable_editor' ); ?></label><br>
			<?php wp_editor( $contents[$i], 'repeatable_editor_repeatable_editor_content_' . $i, array(
			    'wpautop'       => true,
			    'textarea_name' => 'repeatable_editor_repeatable_editor_content[]',
			    'textarea_rows' => 10,
			) ); ?>
			<a class="content-delete" href="#" style="color:#a00;float:right;text-decoration:none">Delete the Above Content</a><br style="clear:both">
		</div><?php
	}
	?>
	<p><a class="button" href="#" id="add_content">New Content</a></p>
	<script>
		var startingContent = <?php echo count($contents) - 1; ?>;
		jQuery('#add_content').click(function(e) {
			e.preventDefault();
			startingContent++;
			var contentID = 'repeatable_editor_repeatable_editor_content_' + startingContent,
				contentRow = '<p class="content-row"><label for="' + contentID + '"><?php _e( 'Content', 'repeatable_editor' ); ?></label><br><textarea name="repeatable_editor_repeatable_editor_content[]" id="' + contentID + '" rows="10"></textarea></p>';

			jQuery('.content-row').eq(jQuery('.content-row').length - 1).after(contentRow);
			tinymce.init({ selector: '#' + contentID });
		});
		jQuery(document).on('click', '.content-delete', function() {
			if (
				jQuery('.content-row').length > 1 &&
				confirm('Are you sure you want to delete this content?')
			) {
				jQuery(this).parent().remove();
			}
		});
	</script>
	<?php
}

function repeatable_editor_repeatable_editor_save( $post_id ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if ( ! isset( $_POST['repeatable_editor_repeatable_editor_nonce'] ) || ! wp_verify_nonce( $_POST['repeatable_editor_repeatable_editor_nonce'], '_repeatable_editor_repeatable_editor_nonce' ) ) return;
	if ( ! current_user_can( 'edit_post' ) ) return;

	if ( isset( $_POST['repeatable_editor_repeatable_editor_content'] ) ) {
		$contents = base64_encode( serialize( $_POST['repeatable_editor_repeatable_editor_content'] ) );
		update_post_meta( $post_id, 'repeatable_editor_repeatable_editor_content', $contents );
	}
}
add_action( 'save_post', 'repeatable_editor_repeatable_editor_save' );