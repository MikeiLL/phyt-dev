<?php
namespace PhytJobs;

// source https://wordpress.stackexchange.com/a/236724/48604
class FilterableScripts extends \WP_Scripts
{
	function localize( $handle, $object_name, $l10n )
	{
		$l10n = apply_filters( 'script_l10n', $handle, $object_name, $l10n );
		//mz_pr(array(handle, $object_name, $l10n));
		return parent::localize($handle, $object_name, $l10n);
	}
	
}
