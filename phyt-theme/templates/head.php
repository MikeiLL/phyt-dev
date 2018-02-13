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
<?php echo file_get_contents($site_path."/dist/images/svgs/site-icons.svg"); ?>
