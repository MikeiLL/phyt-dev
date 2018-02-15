<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
  <script type="text/javascript">
  /* Create path variable for our custom font load script */
  var customPath = '<?= get_bloginfo("template_url"); ?>/dist/fonts';
  </script>
  <style type="text/css">
    .no-svg .svg {
      display: none;
    }

    .fallback {
      display: none;
    }

    .no-svg .fallback {
      display: block;
    }
</style>
</head>
<?php $site_path = get_template_directory_uri(); ?>
<?php //TODO swap when on live server this line with next echo file_get_contents($site_path."/dist/images/svgs/site-icons.svg"); ?>
<svg aria-hidden="true" style="position:absolute;width:0;height:0" version="1.1" xmlns="http://www.w3.org/2000/svg" overflow="hidden"><defs><symbol id="icon-phone" viewBox="0 0 32 32"><title>phone</title><path d="M22 20c-2 2-2 4-4 4s-4-2-6-4-4-4-4-6 2-2 4-4-4-8-6-8-6 6-6 6c0 4 4.109 12.109 8 16s12 8 16 8c0 0 6-4 6-6s-6-8-8-6z"/></symbol><symbol id="icon-location" viewBox="0 0 32 32"><title>location</title><path d="M16 0C10.477 0 6 4.477 6 10c0 10 10 22 10 22s10-12 10-22c0-5.523-4.477-10-10-10zm0 16a6 6 0 1 1 0-12 6 6 0 0 1 0 12z"/></symbol><symbol id="icon-location2" viewBox="0 0 32 32"><title>location2</title><path d="M16 0C10.477 0 6 4.477 6 10c0 10 10 22 10 22s10-12 10-22c0-5.523-4.477-10-10-10zm0 16.125a6.125 6.125 0 1 1 0-12.25 6.125 6.125 0 0 1 0 12.25zM12.125 10a3.875 3.875 0 1 1 7.75 0 3.875 3.875 0 0 1-7.75 0z"/></symbol><symbol id="icon-info" viewBox="0 0 32 32"><title>info</title><path d="M14 9.5c0-.825.675-1.5 1.5-1.5h1c.825 0 1.5.675 1.5 1.5v1c0 .825-.675 1.5-1.5 1.5h-1c-.825 0-1.5-.675-1.5-1.5v-1zM20 24h-8v-2h2v-6h-2v-2h6v8h2z"/><path d="M16 0C7.163 0 0 7.163 0 16s7.163 16 16 16 16-7.163 16-16S24.837 0 16 0zm0 29C8.82 29 3 23.18 3 16S8.82 3 16 3s13 5.82 13 13-5.82 13-13 13z"/></symbol><symbol id="icon-facebook" viewBox="0 0 32 32"><title>facebook</title><path d="M19 6h5V0h-5c-3.86 0-7 3.14-7 7v3H8v6h4v16h6V16h5l1-6h-6V7c0-.542.458-1 1-1z"/></symbol><symbol id="icon-facebook2" viewBox="0 0 32 32"><title>facebook2</title><path d="M29 0H3C1.35 0 0 1.35 0 3v26c0 1.65 1.35 3 3 3h13V18h-4v-4h4v-2c0-3.306 2.694-6 6-6h4v4h-4c-1.1 0-2 .9-2 2v2h6l-1 4h-5v14h9c1.65 0 3-1.35 3-3V3c0-1.65-1.35-3-3-3z"/></symbol><symbol id="icon-twitter" viewBox="0 0 32 32"><title>twitter</title><path d="M32 7.075a12.941 12.941 0 0 1-3.769 1.031 6.601 6.601 0 0 0 2.887-3.631 13.21 13.21 0 0 1-4.169 1.594A6.565 6.565 0 0 0 22.155 4a6.563 6.563 0 0 0-6.563 6.563c0 .512.056 1.012.169 1.494A18.635 18.635 0 0 1 2.23 5.195a6.56 6.56 0 0 0-.887 3.3 6.557 6.557 0 0 0 2.919 5.463 6.565 6.565 0 0 1-2.975-.819v.081a6.565 6.565 0 0 0 5.269 6.437 6.574 6.574 0 0 1-2.968.112 6.588 6.588 0 0 0 6.131 4.563 13.17 13.17 0 0 1-9.725 2.719 18.568 18.568 0 0 0 10.069 2.95c12.075 0 18.681-10.006 18.681-18.681 0-.287-.006-.569-.019-.85A13.216 13.216 0 0 0 32 7.076z"/></symbol><symbol id="icon-linkedin" viewBox="0 0 32 32"><title>linkedin</title><path d="M29 0H3C1.35 0 0 1.35 0 3v26c0 1.65 1.35 3 3 3h26c1.65 0 3-1.35 3-3V3c0-1.65-1.35-3-3-3zM12 26H8V12h4v14zm-2-16c-1.106 0-2-.894-2-2s.894-2 2-2c1.106 0 2 .894 2 2s-.894 2-2 2zm16 16h-4v-8c0-1.106-.894-2-2-2s-2 .894-2 2v8h-4V12h4v2.481C18.825 13.35 20.087 12 21.5 12c2.488 0 4.5 2.238 4.5 5v9z"/></symbol><symbol id="icon-linkedin2" viewBox="0 0 32 32"><title>linkedin2</title><path d="M12 12h5.535v2.837h.079c.77-1.381 2.655-2.837 5.464-2.837C28.92 12 30 15.637 30 20.367V30h-5.769v-8.54c0-2.037-.042-4.657-3.001-4.657-3.005 0-3.463 2.218-3.463 4.509V30H12V12zM2 12h6v18H2V12zm6-5a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/></symbol><symbol id="icon-clock" viewBox="0 0 32 32"><title>clock-o</title><path d="M20.586 23.414L14 16.828V8h4v7.172l5.414 5.414zM16 0C7.163 0 0 7.163 0 16s7.163 16 16 16 16-7.163 16-16S24.837 0 16 0zm0 28C9.373 28 4 22.627 4 16S9.373 4 16 4s12 5.373 12 12-5.373 12-12 12z"/></symbol><symbol viewBox="0 0 1024 574" id="ant-down"><title>icon down</title><path d="M1015 10q-10-10-23-10t-23 10L512 492 55 10Q45 0 32 0T9 10Q0 20 0 34t9 24l480 506q10 10 23 10t23-10l480-506q9-10 9-24t-9-24z"/></symbol><symbol viewBox="0 0 1101 750" id="chevron-down"><title>icon chevron-down</title><path d="M1101 199L551 750 0 199 198 0l353 353L904 0z"/></symbol><symbol id="icon-plus" viewBox="0 0 32 32"><title>plus</title><path d="M31 12H20V1a1 1 0 0 0-1-1h-6a1 1 0 0 0-1 1v11H1a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h11v11a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V20h11a1 1 0 0 0 1-1v-6a1 1 0 0 0-1-1z"/></symbol><symbol viewBox="0 0 1200 1000" aria-labelledby="cisi-bootstrap-envelope-title" id="si-bootstrap-envelope"><title id="cisi-bootstrap-envelope-title">icon envelope</title><path d="M25 0h1150q10 0 12.5 5t-5.5 13L618 585q-8 8-18 8t-18-8L18 18q-8-8-5.5-13T25 0zm-7 218l264 264q8 8 8 18t-8 18L18 782q-8 8-13 5.5T0 775V225q0-10 5-12.5t13 5.5zm900 264l264-264q8-8 13-5.5t5 12.5v550q0 10-5 12.5t-13-5.5L918 518q-8-8-8-18t8-18zM818 618l364 364q8 8 5.5 13t-12.5 5H25q-10 0-12.5-5t5.5-13l364-364q8-8 18-8t18 8l164 164q8 8 18 8t18-8l164-164q8-8 18-8t18 8z"/></symbol></defs></svg>
