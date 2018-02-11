/*
Interface with simple-locator script to also handle showing all of the jobs.
*/

// Message we add to the page after each search.
var jobs_message = '<div class="job-results-note" class="clearfix">We have frequent employment opportunities. If you don\'t see a specific listing that meets your qualifications, submit your info below and we\'ll let you know when there\'s a match for your skill set.</div>';

// WP Simple Locator Callbacks
function wpsl_before_submit(active_form, formelements){
	clear_results();
};

function wpsl_success(resultcount, results, active_form){
	jQuery('.simple-locator-form').after(jobs_message);
}

// Runs if no results were returned from the query
function wpsl_no_results(location, active_form){
	clear_results();
}	

// Runs after map & results render
function wpsl_after_render(active_form){
	/* For now do not display map on this page */
	/* If we eventually want to, for consistency, 
	 we need to also display Map for the All Jobs 
	 search results. These results might also 
	 display the "distance" from the users location. */
	jQuery('.wpsl-map').css('display', 'none');
}

jQuery('.geo_button_cont').bind('click', clear_results);

function clear_results() {
	jQuery('.job-results-container').remove();
	jQuery('.job-results-note').remove();
}

jQuery(document).ready(function($) {

	// Add removed l10n settings back in manually.
	wpsl_locator.map_options.zoomControlOptions.style = google.maps.ZoomControlStyle.SMALL;
	wpsl_locator.map_options.styles = wpsl_locator.mapstyles;

	// wpsl_locator_options is our l10n settings TODO: hard code it here, no?
	$('.submit').append('<button class="all-jobs-link">All Jobs</button>');

	$('.all-jobs-link').click(function(e){
		e.preventDefault();
		// Hide the simple-locator results
		$('.wpsl-results').css('display', 'none');
		// Remove old containers
		$('.job-results-container').remove();
		$('.job-results-note').remove();
		
		var resultsContainer = '<div class="job-results-container"><div class="loading-jobs"></div></div>';
		$('.simple-locator-form').after(resultsContainer);
	
		$.ajax({
			type: 'POST',
			url: wpsl_locator_options.ajaxurl,
			dataType: 'json',
			data: { 
				action: '_show_jobs',
				contentType: "application/json; charset=utf-8",
				dataType: 'json',
				security: wpsl_locator_options.security
			},
			success: function(data){
				$('.loading-jobs').remove();
				jobs_listings = '',
				count = Object.keys(data).length;
				var opening = (count > 1) ? 'openings' : 'opening';
				
				for (var key in data) {
					jobs_listings += '<p>',
					jobs_listings += '<a href="'+data[key].link+'">'+data[key].title+'</a><br />';
					jobs_listings += '<span>' + data[key].address + '</span><br />';
					jobs_listings += '<span>' + data[key].city + ' ' + data[key].state + ', ' + data[key].zip + '</span><br />';
					jobs_listings += "<span>";
					if (data[key].job_title){
						jobs_listings += '<strong>Job Title</strong>: ' + data[key].job_title + ' ';
					}
					if (data[key].department){
						jobs_listings += '<strong>Department</strong>: ' + data[key].department + ' ';
					}
					if (data[key].schedule){
						jobs_listings += '<strong>Schedule</strong>: ' + data[key].schedule + ' ';
					}
					jobs_listings += "</span>"; // End of details span
				jobs_listings += "</p>";
				}
				var heading = '<h3 class="wpsl-results-header" data-fontsize="22" data-lineheight="48">'+count+' currently listed job ' + opening + '.</h3>';
				
				var jobs = '<div class="job-results">' + jobs_listings + '</div>';
				$('.job-results-container').append(heading);
				$('.job-results-container').append(jobs);
				$('.job-results-container').append(jobs_message);
			},
			error: function (data, errorThrown) {
				console.log(errorThrown);
			}
		});
	});
	
});//End jQuery
