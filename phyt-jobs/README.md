# phyt-jobs
CPT to interface with Simple Locator Plugin and ACF.

## Simple Locator Settings

 * Post Type Setting: Jobs
 * Load google.maps in Admin, but not in Front end.
 * "Show Default Map on Page Load" unchecked
 * GeoCode Fields set to `wpsl_latitude` and `wpsl_longitude`
 * Google MAP Options has "Customize Javscript Map Options" checked, which may not matter
 * Results Display is set like this:
 
 ```
 <strong><a href="[post_permalink]">[post_title]</a></strong>
 <em>Distance: [distance]</em>
 [wpsl_address]
 [wpsl_city], [wpsl_state] [wpsl_zip]
 [wpsl_phone]
 <a href="[wpsl_website]">[wpsl_website]</a>
 ```
 

Here is an example of the Search page:

```
Phyt rehab is always looking for capable, qualified and compassionate people to join our team. Use the search function below to find openings by geographic area or key word. Our recruitment team is always accepting resumes and can help identify positions for qualified individuals. Please submit your contact information below.

[wp_simple_locator distances="5,10,20,50,100,2000" buttontext="location search" addresslabel="U.S. Zip Code or City" mapcontrols="show" mapcontrolsposition="RIGHT_BOTTOM" placeholder="Enter U.S. Location"]

<hr class="clearfix" width="100%" />

[contact-form-7 id="1003" title="Contact form 1"]
```
