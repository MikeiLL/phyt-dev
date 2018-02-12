<?php
use \SimpleLocator\API\FormShortcode;

include_once('PhytJobs_LifeCycle.php');
include_once('PhytJobs_FilterableScripts.php');

class PhytJobs_Plugin extends PhytJobs_LifeCycle {

    /**
     * See: http://plugin.michael-simpson.com/?page_id=31
     * @return array of option meta data.
     */
    public function getOptionMetaData() {
        //  http://plugin.michael-simpson.com/?page_id=31
        return array(
            //'_version' => array('Installed Version'), // Leave this one commented-out. Uncomment to test upgrades.
            'ATextInput' => array(__('Enter in some text', 'phyt-jobs')),
            'AmAwesome' => array(__('I like this awesome plugin', 'phyt-jobs'), 'false', 'true'),
            'CanDoSomething' => array(__('Which user role can do something', 'phyt-jobs'),
                                        'Administrator', 'Editor', 'Author', 'Contributor', 'Subscriber', 'Anyone')
        );
    }

//    protected function getOptionValueI18nString($optionValue) {
//        $i18nValue = parent::getOptionValueI18nString($optionValue);
//        return $i18nValue;
//    }

    protected function initOptions() {
        $options = $this->getOptionMetaData();
        if (!empty($options)) {
            foreach ($options as $key => $arr) {
                if (is_array($arr) && count($arr > 1)) {
                    $this->addOption($key, $arr[1]);
                }
            }
        }
    }

    public function getPluginDisplayName() {
        return 'Phyt Jobs';
    }

    protected function getMainPluginFileName() {
        return 'phyt-jobs.php';
    }

    /**
     * See: http://plugin.michael-simpson.com/?page_id=101
     * Called by install() to create any database tables if needed.
     * Best Practice:
     * (1) Prefix all table names with $wpdb->prefix
     * (2) make table names lower case only
     * @return void
     */
    protected function installDatabaseTables() {
        //        global $wpdb;
        //        $tableName = $this->prefixTableName('mytable');
        //        $wpdb->query("CREATE TABLE IF NOT EXISTS `$tableName` (
        //            `id` INTEGER NOT NULL");
    }

    /**
     * See: http://plugin.michael-simpson.com/?page_id=101
     * Drop plugin-created tables on uninstall.
     * @return void
     */
    protected function unInstallDatabaseTables() {
        //        global $wpdb;
        //        $tableName = $this->prefixTableName('mytable');
        //        $wpdb->query("DROP TABLE IF EXISTS `$tableName`");
    }


    /**
     * Perform actions when upgrading from version X to version Y
     * See: http://plugin.michael-simpson.com/?page_id=35
     * @return void
     */
    public function upgrade() {
    }

    public function addActionsAndFilters() {

        // Add options administration page
        // http://plugin.michael-simpson.com/?page_id=47
        add_action('admin_menu', array(&$this, 'addSettingsSubMenuPage'));
        
        add_action('init', array(&$this, 'registerJobsPostType'));
        // add_action('init', array(&$this, 'registerJobsTaxonomies'));
        add_action('template_redirect', array(&$this, 'enqueueStyles'));
        add_action('wp_enqueue_scripts', array(&$this, 'loadScripts'));
		add_filter('archive_template', array(&$this, 'get_custom_template'));
		add_filter('single_template', array(&$this, 'get_custom_template'));
   		add_action('wp_ajax__show_jobs', array(&$this, 'ajax_show_jobs'));
   		add_action('wp_ajax_nopriv__show_jobs', array(&$this, 'ajax_show_jobs')); 
   		add_action('pre_get_posts', array(&$this, 'parse_jobs_variable')); 
   		// hook add_query_vars function into query_vars
		add_filter('query_vars', array(&$this, 'add_query_vars'));
		// hook add_rewrite_rules function into rewrite_rules_array
		add_filter('rewrite_rules_array', array(&$this, 'add_rewrite_rules'));
		
   		add_shortcode('link-to-all-jobs', array($this, 'showLink'));
   		if(!is_admin()){
   			add_action( 'init', array(&$this, 'phyt_filter_script_intlization'));
			add_filter('script_l10n', array(&$this, 'se108362_example_filter'), 10 , 3);
		}
	
		// Never got this working.
		//add_action( 'wp_loaded', array(&$this, 'replace_removed_scripts'));
 
        // Example adding a script & style just for the options administration page
        // http://plugin.michael-simpson.com/?page_id=47
        //        if (strpos($_SERVER['REQUEST_URI'], $this->getSettingsSlug()) !== false) {
        //            wp_enqueue_script('my-script', plugins_url('/js/my-script.js', __FILE__));
        //            wp_enqueue_style('my-style', plugins_url('/css/my-style.css', __FILE__));
        //        }


        // Add Actions & Filters
        // http://plugin.michael-simpson.com/?page_id=37


        // Adding scripts & styles to all pages
        // Examples:
        //        wp_enqueue_script('jquery');
        //        wp_enqueue_style('my-style', plugins_url('/css/my-style.css', __FILE__));
        //        wp_enqueue_script('my-script', plugins_url('/js/my-script.js', __FILE__));

        // Register short codes
        // http://plugin.michael-simpson.com/?page_id=39


        // Register AJAX hooks
        // http://plugin.michael-simpson.com/?page_id=41

    }
    
    /**
     * Create Jobs Post Type
     * @return void
     */
    public function registerJobsPostType() {

		/**
		 * Post Type: jobs.
		 */

		$labels = array(
			"name" => __( "Jobs", "phyt-jobs" ),
			"singular_name" => __( "Job", "phyt-jobs" ),
		);

		$args = array(
			"label" => __( "Jobs", "phyt-jobs" ),
			"labels" => $labels,
			"description" => "Descriptions of various job opportunities with the company.",
			"public" => true,
			"publicly_queryable" => true,
			"show_ui" => true,
			"show_in_rest" => false,
			"rest_base" => "",
			"has_archive" => true,
			"show_in_menu" => true,
			"exclude_from_search" => false,
			"capability_type" => "post",
			"map_meta_cap" => true,
			"hierarchical" => false,
			"rewrite" => array( "slug" => "jobs", "with_front" => true ),
			"query_var" => true,
			"menu_icon" => 'dashicons-groups',
			"supports" => array( "title", "editor", "thumbnail", "excerpt", "custom-fields", "revisions", "post-formats" ),
		);

		register_post_type( "Jobs", $args );
	}
	
	public function registerJobsTaxonomies() {

	/**
	 * Taxonomy: job_categories.
	 */

		$labels = array(
			"name" => __( "Job Titles", "phyt-jobs" ),
			"singular_name" => __( "Job Title", "phyt-jobs" ),
		);

		$args = array(
			"label" => __( "Job Title", "phyt-jobs" ),
			"labels" => $labels,
			"public" => true,
			"hierarchical" => false,
			"label" => "Job Title",
			"show_ui" => true,
			"show_in_menu" => true,
			"show_in_nav_menus" => true,
			"query_var" => true,
			"rewrite" => array( 'slug' => 'job-title', 'with_front' => true, ),
			"show_admin_column" => false,
			"show_in_rest" => false,
			"rest_base" => "",
			"show_in_quick_edit" => false,
		);
		register_taxonomy( "Job Title", array( "jobs" ), $args );
	}

	public function loadScripts(){
		wp_enqueue_script(
		 'phyt-jobs-simple-locator-init', 
		 plugins_url('/js/simple2.js', __FILE__), 
		 array('jquery', 'simple-locator')
		 );
		 $localized_data = array(
			'distances' => '1000',
			'mapheight' => '',
			'mapcontainer' => '.wpsl-map',
			'resultscontainer' => '.wpsl-results',
			'buttontext' => __('Search', 'wpsimplelocator'),
			'addresslabel' => __('Zip/Postal Code', 'wpsimplelocator'),
			'mapcontrols' => 'show',
			'mapcontrolsposition' => 'TOP_LEFT',
			'showgeobutton' => 'enabled',
			'geobuttontext' => 'text',
			'placeholder'=> __('Enter a Location', 'wpsimplelocator'),
			'ajax' => 'true',
			'perpage' => get_option('posts_per_page'),
			'noresultstext' => __('No results found.', 'wpsimplelocator'),
			'taxonomies' => '',
			'allowemptyaddress' => 'false',
			'resultswrapper' => '',
			'mapcont' => '.wpsl-map',
			'ajaxurl' => admin_url( 'admin-ajax.php'),
			'security' => wp_create_nonce( 'view-jobs-jobs' ),
			'show_jobs_link' => $this->showLink()
		);
		 wp_localize_script( 
			'phyt-jobs-simple-locator-init', 
			'wpsl_locator_options', 
			$localized_data
		);
		wp_register_script( 'google-maps', 'https://maps.google.com/maps/api/js?key=AIzaSyCMirz9SOgN3mfaTBDdn06lAhDl9EDec_8&libraries=places&ver=4.9.1', null, null, true );
		wp_enqueue_script('google-maps');
	}
	
	public function enqueueStyles(){
		wp_enqueue_style(
		 'phyt-jobs-styles', 
		 plugins_url('/css/style.css', __FILE__)
		);
	}

	/**
	 * Pull in our archive template
	 *
	 * @since 1.0.0
	 * source: http://wordpress.stackexchange.com/a/89832/48604
	 */	

	public function get_custom_template($template) {
			global $wp_query;
			if (is_post_type_archive('jobs')) {
					$templates[] = 'archive-jobs.php';
			} elseif (is_singular('jobs')) {
					$templates[] = 'job.php';
			} else {
				// do nothing
				return;
			}
			$template = self::locate_plugin_template($templates);
			return $template;
	}
	
	/**
	 * Search theme for template, then use the plugin on if not found.
	 *
	 * @since 1.0.0
	 * source: http://wordpress.stackexchange.com/a/89832/48604
	 */	
	public static function locate_plugin_template($template_names, $load = false, $require_once = true ) {
    if (!is_array($template_names)) {
        return '';
    }
    $located = '';  
    
    foreach ( $template_names as $template_name ) {
        if ( !$template_name )
            continue;
        if ( file_exists(STYLESHEETPATH . '/' . $template_name)) {
            $located = STYLESHEETPATH . '/' . $template_name;
            break;
        } elseif ( file_exists(TEMPLATEPATH . '/' . $template_name) ) {
            $located = TEMPLATEPATH . '/' . $template_name;
            break;
        } elseif ( file_exists( plugin_dir_path( __FILE__ ) . 'templates/' . $template_name) ) {
            $located =  plugin_dir_path( __FILE__ ) . 'templates/' . $template_name;
            break;
        }
    }
    if ( $load && $located != '' ) {
        load_template( $located, $require_once );
    }
    return $located;
	}
	
	public function ajax_show_jobs() {
		
		check_ajax_referer( 'view-jobs-jobs', 'security' );

		// args
		$args = array(
			'numberposts'	=> -1,
			'post_type'		=> 'jobs',	
			'nopaging'    => TRUE,	
			 'meta_query' => array(
			   'relation' => 'OR',
				array( //check to see if date has been filled out
						'key' => 'department',
					),
				  array( //if no date has been added show these posts too
						'key' => 'department',
						'compare' => 'NOT EXISTS'
					)
				),
			'orderby'			=> 'meta_value'
			//'meta_key'		=> 'location',
			//'meta_value'	=> 'Melbourne'
		);

		// query
		$the_query = new WP_Query( $args );
		if( $the_query->have_posts() ): 
			$data = array();
			while( $the_query->have_posts() ) : $the_query->the_post();

				$data[get_the_ID()] = array('link' => get_the_permalink(),
											'title' => get_the_title(),
											'address' => get_field('wpsl_address'),
											'city' => get_field('wpsl_city'),
											'state' => get_field('wpsl_state'),
											'zip' => get_field('wpsl_zip'),
											'job_title' => get_field('job_title'),
											'department' => get_field('department'),
											'schedule' => get_field('schedule')
				);
			endwhile;
			print json_encode($data);
			// Don't let IE cache this request
			header("Pragma: no-cache");
			header("Cache-Control: no-cache, must-revalidate");
			header("Expires: Thu, 01 Jan 1970 00:00:00 GMT");
 
			header("Content-type: text/html");
		else:
			$data = json_encode(array("none" => "There are no job listings at this time."));
			echo $output;
			// Don't let IE cache this request
			header("Pragma: no-cache");
			header("Cache-Control: no-cache, must-revalidate");
			header("Expires: Thu, 01 Jan 1970 00:00:00 GMT");
 
			header("Content-type: text/html");
		endif;
		wp_reset_query();	 // Restore global post data stomped by the_post(). 
		
 
		wp_die();
	}
	
	public function showLink(){
		return '<button class="all-jobs-link">All Jobs</button>';
	}
	
	public function add_query_vars($aVars) {
		$aVars[] = "phyt_job_opportunity"; // represents the name of the $_GET key
		return $aVars;
	}
 
	public function add_rewrite_rules($aRules) {
		$aNewRules = array('application/([^/]+)/?$' => 'index.php?pagename=application&phyt_job_opportunity=$matches[1]');
		$aRules = $aNewRules + $aRules;
		return $aRules;
	}
	
	public function parse_jobs_variable(){
		global $wp_query;
		if((is_page('application')) && (isset($wp_query->query_vars['phyt_job_opportunity']))){
			$_GET['phyt_job_opportunity'] = urldecode($wp_query->query_vars['phyt_job_opportunity']);
		}
	}
	
	
	public function phyt_filter_script_intlization() {
		$acf_field_group = $GLOBALS['wp_scripts']->registered['acf-field-group'];
		$acf_input = $GLOBALS['wp_scripts']->registered['acf-input'];
		$GLOBALS['wp_scripts'] = new \PhytJobs\FilterableScripts;
		$GLOBALS['wp_scripts']->registered['acf-field-group'] = $acf_field_group;
		$GLOBALS['wp_scripts']->registered['acf-input'] = $acf_input;
	}

	/*
	 * source: https://wordpress.stackexchange.com/a/236724/48604
	 */
	public function se108362_example_filter($handle, $object_name, $l10n ) {
		if('simple-locator' == $handle && 'wpsl_locator' == $object_name) {
		
			// Example
			$phyt_i10n_settings = array(
				'mapTypeId' => 'roadmap',
				'mapTypeControl' => false,
				'zoom' => 8,
				'panControl' => false,
				'zoomControlOptions' => array('style' => '') // was google.maps.ZoomControlStyle.SMALL]
				);
			
			$l10n['l10n_print_after'] = 'wpsl_locator.map_options = ' . json_encode($phyt_i10n_settings);

			return $l10n;
		}
		return $l10n;
	}
	
	public function replace_removed_scripts() {
		$fscripts = new \PhytJobs\FilterableScripts;

		$missing_scripts = array_diff_key( $GLOBALS['wp_scripts']->registered, $fscripts->registered);
		foreach($missing_scripts as $mscript){
			$fscripts->registered[$mscript->handle] = $mscript;
		}
		$GLOBALS['wp_scripts'] = $fscripts;
	}

	/*
	wpsl_locator.map_options = 
	{
		mapTypeId: 'roadmap',
		mapTypeControl: false,
		zoom: 8,
		styles: wpsl_locator.mapstyles,
		panControl : false,
		zoomControlOptions : {
			style: google.maps.ZoomControlStyle.SMALL,
		}
	};
	*/
	
}


