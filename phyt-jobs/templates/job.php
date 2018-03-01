<?php
/**
 * Template used for single posts and other post-types
 * that don't have a specific template.
 *
 * @package Avada
 * @subpackage Templates
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}
?>
<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

		
		<?php $title = get_the_title(); ?>
		<h1><?php echo $title; ?></h1>
		<?php $page = get_page_by_title('application'); ?>
		<?php $application_link = get_permalink($page); ?>
		<?php
		// Pull in ACF fields
		$department = get_field_object("division");
		$schedule = get_field_object("schedule");
		$minimum_requirements = get_field_object("minimum_requirements");
		?>
		<?php if (!empty($department['value'])) { echo '<span><span>' . $department['label'] . '</span>: ' . $department['value'] . '</span>'; } ?> 
		<?php if (!empty($schedule['value'])) { echo '<span><span>' . $schedule['label'] . '</span>: ' . $schedule['value'] . '</span>'; } ?> 
		<div class="thumbnail" style="float:right">
		<?php
		// php 5.4 shim
		$thumbnailID = get_post_thumbnail_id();
		$thing = wp_get_attachment_url( $thumbnailID );
		if (!empty($thing)):
			the_post_thumbnail('medium', array(
							//'class' => 'alignright',
							'alt'    => the_title_attribute(array( 'after' => ' Portrait', 'echo' => false)),
						) );
		endif;
		?>
		</div>
		<?php the_content(); ?>
		
		<div class="phyt-job-min-requirements">
		
			<?php if (!empty($minimum_requirements['value'])) { echo $minimum_requirements['label'] . ': <br />' . $minimum_requirements['value']; } ?> 
		
		</div>
		
		
		<div class="container-fluid">
			<div class="row mx-auto mb-3">
				<a href="<?php echo $application_link . urlencode($title); ?>" class="btn btn-primary text-white btn-block">Apply for this Position</a> 
			</div>
		</div>
					
		<SCRIPT LANGUAGE="JavaScript">
		function checkEmailAddress(o){o.value.match(/\b(^(\S+@).+((\.com)|(\.net)|(\.edu)|(\.mil)|(\.gov)|(\.org)|(\.info)|(\.sex)|(\.biz)|(\.aero)|(\.coop)|(\.museum)|(\.name)|(\.pro)|(\..{2,2}))$)\b/gi)?good=!0:(alert("Please enter a valid address."),o.focus(),o.select(),good=!1)}function mailThisUrl(){good=!1,checkEmailAddress(document.eMailer.email),good&&(window.location="mailto:"+document.eMailer.email.value+"?subject="+initialsubj+"&body="+initialmsg)}var initialsubj="Potential Job with the #PhytSquad",initialmsg="Hi:\n You may want to check out this job: "+window.location,good;u=window.location;
		</script>
		
		
		<div class="container-fluid ">
			<div class="row m-1">
				<div class="col-12 col.md-4 d-flex justify-content-center">
					<form method="post" name="eMailer" class="form-inline">
						<div class="form-group mb-2">
							<label for="email" class="mr-1">Tell a friend:</label>
							<input type="text" class="form-control" id="email" style="display:inline" name="email" value="Enter Address Here" onFocus="this.value=''" onMouseOver="window.status='Enter email address here and tell a friend about this site...'; return true" onMouseOut="window.status='';return true">
						</div>
						<button type="submit" class="btn btn-primary mb-2 ml-1">Send</button>
					</form>
				</div>
			</div>
		</div>
		
		
<?php endwhile; ?>
<?php wp_reset_postdata(); 

/* Omit closing PHP tag to avoid "Headers already sent" issues. */
