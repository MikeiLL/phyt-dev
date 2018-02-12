<?php
use Roots\Sage\Extras;
	/**
	 * Add a hero option to pages
	 */


	/**
	 * Create the metabox default values
	 */
	function puredemo_page_hero_metabox_defaults() {
		return array(
			'content' => '',
			'content_markdown' => '',
			'image' => '',
			'overlay' => 'off',
			'min_height' => '',
			'overlay_styling' => '',
		);
	}


	/**
	 * Create a metabox
	 */
	function puredemo_page_hero_box() {

		add_meta_box( 'puredemo_page_hero_textarea', 'Page Hero', 'puredemo_page_hero_textarea', 'page', 'normal', 'default' );

	}
	add_action( 'add_meta_boxes', 'puredemo_page_hero_box' );



	/**
	 * Add fields to the metabox
	 */
	function puredemo_page_hero_textarea() {

		global $post;

		// Get hero content
		$saved = get_post_meta( $post->ID, 'puredemo_page_hero', true );
		$defaults = puredemo_page_hero_metabox_defaults();
		$hero = wp_parse_args( $saved, $defaults );

		?>

			<p>Use this section to display a banner above the primary page content.</p>

			<h3>Text and Calls-to-Action</h3>

			<fieldset>
				<?php wp_editor(
					stripslashes( Extras\get_jetpack_markdown( $hero, 'content' ) ),
					'puredemo_page_hero_content',
					array(
						'wpautop' => false,
						'textarea_name' => 'puredemo_page_hero_content',
						'textarea_rows' => 8,
					)
				); ?>
				<label class="description" for="hero_content"><?php _e( 'Add text and calls to action.', 'puredemo' ); ?></label>
			</fieldset>

			<h3>Image or Video</h3>

			<fieldset>
				<label for="puredemo_page_hero_image_upload"><?php printf( __( '[Optional] Select an image or video using the Media Uploader. Alternatively, paste the URL for a video hosted on YouTube, Vimeo, Viddler, Instagram, TED, %sand more%s. Example: %s', 'puredemo' ), '<a target="_blank" href="http://www.oembed.com/#section7.1">', '</a>', '<code>http://youtube.com/watch/?v=12345abc</code>' ); ?></label>
				<input type="text" class="large-text" name="puredemo_page_hero_image" id="puredemo_page_hero_image" value="<?php echo stripslashes( $hero['image'] ); ?>"><br>
				<button type="button" class="button" id="puredemo_page_hero_image_upload_btn" data-puredemo-page-hero="#puredemo_page_hero_image"><?php _e( 'Select an Image or Video', 'puredemo' )?></button>
			</fieldset>

			<h3>Background Images</h3>

			<p>To add a background image to your hero banner, set a <em>Featured Image</em>.</p>

			<fieldset>
				<input type="checkbox" id="puredemo_page_hero_overlay" name="puredemo_page_hero_overlay" value="on" <?php checked( 'on',  $hero['overlay'] ); ?>>
				<label for="puredemo_page_hero_overlay"><?php _e( 'Add a semi-transparent overlay to the background image to make the text easier to read', 'puredemo' ); ?></label>
			</fieldset>

			<h3>Minimum Height</h3>

			<fieldset>
				<label for="puredemo_page_hero_image_upload"><?php printf( __( '[Optional] Make sure the hero never gets too small by providing a minimum height. Example: %s', 'puredemo' ), '<code>300px</code>' ); ?></label>
				<input type="text" class="large-text" name="puredemo_page_hero_min_height" id="puredemo_page_hero_min_height" value="<?php echo stripslashes( $hero['min_height'] ); ?>">
			</fieldset>

			<h3>Overlay Styling</h3>
			Find RGBA codes at: <a href="https://developer.mozilla.org/en-US/docs/Web/CSS/CSS_Colors/Color_picker_tool">RGB color picker</a>

			<fieldset>
				<label for="puredemo_page_hero_overlay_styling"><?php printf( __( '[Optional] Change overlay color and transparency from default. Example: %s', 'puredemo' ), '<code>rgba(0, 0, 0, 0.5)</code>' ); ?></label>
				<input type="text" class="large-text" name="puredemo_page_hero_overlay_styling" id="puredemo_page_hero_overlay_styling" value="<?php echo stripslashes( $hero['overlay_styling'] ); ?>">
			</fieldset>

		<?php

		// Security field
		wp_nonce_field( 'puredemo-page-hero-nonce', 'puredemo-page-hero-process' );

	}



	/**
	 * Save field data
	 * @param  number $post_id The post ID
	 * @param  Array $post     The post data
	 */
	function puredemo_save_page_hero_textarea( $post_id, $post ) {

		// Verify data came from edit screen
		if ( !isset( $_POST['puredemo-page-hero-process'] ) || !wp_verify_nonce( $_POST['puredemo-page-hero-process'], 'puredemo-page-hero-nonce' ) ) {
			return $post->ID;
		}

		// Verify user has permission to edit post
		if ( !current_user_can( 'edit_post', $post->ID )) {
			return $post->ID;
		}

		// Get hero data
		$hero = array();

		if ( isset( $_POST['puredemo_page_hero_content'] ) ) {
			$hero['content'] = Extras\process_jetpack_markdown( wp_filter_post_kses( $_POST['puredemo_page_hero_content'] ) );
			$hero['content_markdown'] = wp_filter_post_kses( $_POST['puredemo_page_hero_content'] );
		}

		if ( isset( $_POST['puredemo_page_hero_image'] ) ) {
			$hero['image'] = wp_filter_post_kses( $_POST['puredemo_page_hero_image'] );
		}

		if ( isset( $_POST['puredemo_page_hero_color'] ) ) {
			$hero['color'] = wp_filter_nohtml_kses( $_POST['puredemo_page_hero_color'] );
		}

		if ( isset( $_POST['puredemo_page_hero_overlay'] ) ) {
			$hero['overlay'] = wp_filter_nohtml_kses( $_POST['puredemo_page_hero_overlay'] );
		}

		if ( isset( $_POST['puredemo_page_hero_overlay_styling'] ) ) {
			$hero['overlay_styling'] = wp_filter_nohtml_kses( $_POST['puredemo_page_hero_overlay_styling'] );
		}

		if ( isset( $_POST['puredemo_page_hero_min_height'] ) ) {
			$hero['min_height'] = wp_filter_nohtml_kses( $_POST['puredemo_page_hero_min_height'] );
		}

		// Update hero settings
		update_post_meta( $post->ID, 'puredemo_page_hero', $hero );

	}
	add_action('save_post', 'puredemo_save_page_hero_textarea', 1, 2);



	// Save the data with revisions
	function puredemo_save_revisions_page_hero_textarea( $post_id ) {

		// Check if it's a revision
		$parent_id = wp_is_post_revision( $post_id );

		// If is revision
		if ( $parent_id ) {

			// Get the data
			$parent = get_post( $parent_id );
			$hero = get_post_meta( $parent->ID, 'puredemo_page_hero', true );

			// If data exists, add to revision
			if ( !empty( $hero ) && is_array( $hero ) ) {
				if ( array_key_exists( 'content', $hero ) ) {
					add_metadata( 'post', $post_id, 'puredemo_page_hero_content', $hero['content'] );
				}

				if ( array_key_exists( 'content_markdown', $hero ) ) {
					add_metadata( 'post', $post_id, 'puredemo_page_hero_content_markdown', $hero['content'] );
				}

				if ( array_key_exists( 'image', $hero ) ) {
					add_metadata( 'post', $post_id, 'puredemo_page_hero_image', $hero['image'] );
				}

				if ( array_key_exists( 'color', $hero ) ) {
					add_metadata( 'post', $post_id, 'puredemo_page_hero_color', $hero['color'] );
				}

				if ( array_key_exists( 'overlay', $hero ) ) {
					add_metadata( 'post', $post_id, 'puredemo_page_hero_overlay', $hero['overlay'] );
				}

				if ( array_key_exists( 'overlay_styling', $hero ) ) {
					add_metadata( 'post', $post_id, 'puredemo_page_hero_overlay_styling', $hero['overlay_styling'] );
				}

				if ( array_key_exists( 'min_height', $hero ) ) {
					add_metadata( 'post', $post_id, 'puredemo_page_hero_min_height', $hero['min_height'] );
				}
			}

		}

	}
	add_action( 'save_post', 'puredemo_save_revisions_page_hero_textarea' );



	// Restore the data with revisions
	function puredemo_restore_revisions_page_hero_textarea( $post_id, $revision_id ) {

		// Variables
		$post = get_post( $post_id );
		$revision = get_post( $revision_id );
		$hero = get_post_meta( $post_id, 'puredemo_page_hero', true );
		$hero_content = get_metadata( 'post', $revision->ID, 'puredemo_page_hero_content', true );
		$hero_content_markdown = get_metadata( 'post', $revision->ID, 'puredemo_page_hero_content_markdown', true );
		$hero_image = get_metadata( 'post', $revision->ID, 'puredemo_page_hero_image', true );
		$hero_color = get_metadata( 'post', $revision->ID, 'puredemo_page_hero_color', true );
		$hero_overlay = get_metadata( 'post', $revision->ID, 'puredemo_page_hero_overlay', true );
		$hero_min_height = get_metadata( 'post', $revision->ID, 'puredemo_page_hero_min_height', true );
		$hero_overlay_styling = get_metadata( 'post', $revision->ID, 'puredemo_page_hero_overlay_styling', true );

		// Update content
		if ( !empty( $hero_content ) ) {
			$hero['content'] = $hero_content;
		}
		if ( !empty( $hero_content_markdown ) ) {
			$hero['content_markdown'] = $hero_content_markdown;
		}
		if ( !empty( $hero_image ) ) {
			$hero['image'] = $hero_image;
		}
		if ( !empty( $hero_color ) ) {
			$hero['color'] = $hero_color;
		}
		if ( !empty( $hero_overlay ) ) {
			$hero['overlay'] = $hero_overlay;
		}
		if ( !empty( $hero_overlay ) ) {
			$hero['overlay_styling'] = $hero_overlay_styling;
		}
		if ( !empty( $hero_overlay ) ) {
			$hero['min_height'] = $hero_min_height;
		}
		mz_pr($hero);
		update_post_meta( $post_id, 'puredemo_page_hero', $hero );

	}
	add_action( 'wp_restore_post_revision', 'puredemo_restore_revisions_page_hero_textarea', 10, 2 );



	// Get the data to display the revisions page
	function puredemo_get_revisions_field_page_hero_textarea( $fields ) {
		$fields['puredemo_page_hero_content'] = 'Page Hero Content';
		$fields['puredemo_page_hero_content_markdown'] = 'Page Hero Markdown Content';
		$fields['puredemo_page_hero_image'] = 'Page Hero Image or Video';
		$fields['puredemo_page_hero_color'] = 'Page Hero Background and Text Color';
		$fields['puredemo_page_hero_overlay'] = 'Page Hero Background Overlay';
		$fields['puredemo_page_hero_min_height'] = 'Page Hero Minimum Height';
		$fields['puredemo_page_hero_overlay_styling'] = 'Page Hero Overlay Styling';
		return $fields;
	}
	add_filter( '_wp_post_revision_fields', 'puredemo_get_revisions_field_page_hero_textarea' );



	// Display the data on the revisions page
	function puredemo_display_revisions_field_page_hero_textarea( $value, $field ) {
		global $revision;
		return get_metadata( 'post', $revision->ID, $field, true );
	}
	add_filter( '_wp_post_revision_field_my_meta', 'puredemo_display_revisions_field_page_hero_textarea', 10, 2 );



	// Load required scripts and styles
	function puredemo_add_page_hero_scripts( $hook ) {

		global $typenow;
		if ( in_array( $typenow, array( 'page', 'post' ) ) ) {
			wp_enqueue_media();

			// Registers and enqueues the required javascript.
			wp_register_script( 'meta-box-image', get_template_directory_uri() . '/lib/page-hero/page-hero.js', array( 'jquery' ) );
			wp_localize_script( 'meta-box-image', 'meta_image',
				array(
					'title' => __( 'Choose or Upload an Image', 'puredemo' ),
					'button' => __( 'Use this image', 'puredemo' ),
				)
			);
			wp_enqueue_script( 'meta-box-image' );
		}

	}
	add_action( 'admin_enqueue_scripts', 'puredemo_add_page_hero_scripts', 10, 1 );



	// Load page render functions
	require_once( dirname( __FILE__) . '/page-hero-render.php' );
