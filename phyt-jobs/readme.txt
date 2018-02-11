=== Phyt Jobs ===
Contributors: mzoo, LexWebDev
Donate link:
Tags:
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl-3.0.html
Requires at least: 3.5
Tested up to: 4.5
Stable tag: 1.0

Job Postings for GeoSearch Interface

== Description ==

Job Postings for GeoSearch Interface. This plugin works with Simple Locator plugin.

It will

	1. Create a page called `application`.
	2. Create a `jobs` custom post type.
	3. Add a button for `All Jobs` to the Simple Locator shortcode form
	4. Add a template page for Jobs which includes a link to the Application page, with one $_GET parameter

I am using it with contact-form-7, of which I put a contact form on the automatically-generated Application page.

This plugin also adds a query_string parameter: phyt_job_opportunity which is used in the button on the Job template page
to add the Job (page) Title to the query string when going to the Application page.

Using the contact-form-7-dynamic-text-extension plugin and adding a dynamictext and/or dynamichiidden parameter: CF7_GET key='phyt_job_opportunity', 
the specific job will be included in the Application.

NOTE: Advance Custom Fields plugin can be used to create a `department` Custom Field, which will be used to Sort the All Jobs listing.


== Installation ==

Within plugins directory run `git clone git@github.com:MikeiLL/phyt-jobs.git`.


== Frequently Asked Questions ==


== Screenshots ==


== Changelog ==

= 0.1 =
- Initial Revision

= 1.0 =
- Minimum Viable Product
