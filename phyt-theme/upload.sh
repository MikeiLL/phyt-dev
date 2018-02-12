#!/usr/bin/env bash
if [[ $1 == --production ]] ; then
	rsync -avP creenshot.png ist lib woocommerce screenshot.png templates *.php *.css phyt:public_html/wp-content/themes/phyt-theme
else
	rsync -avP screenshot.png dist lib woocommerce screenshot.png templates *.php *.css phyt:public_html/staging/wp-content/themes/phyt-theme
fi
