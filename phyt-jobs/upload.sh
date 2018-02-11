#!/usr/bin/env bash
if [[ $1 == --production ]] ; then
	rsync -avP templates languages css images js *.php phyt:public_html/wp-content/plugins/phyt-jobs
else
	rsync -avP templates languages css images js *.php phyt:public_html/staging/wp-content/plugins/phyt-jobs
fi
