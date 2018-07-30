#!/usr/bin/env bash

docker-compose run --user www-data --rm wp-cli wp post create --post_type=page --post_title="Front Page" --post_status=publish
docker-compose run --user www-data --rm wp-cli wp post create --post_type=page --post_content="" --post_title="About Us" --post_status=publish
docker-compose run --user www-data --rm wp-cli wp post create --post_type=page --post_content="" --post_title="Patients" --post_status=publish
docker-compose run --user www-data --rm wp-cli wp post create --post_type=page --post_content="" --post_title="Partners" --post_status=publish
docker-compose run --user www-data --rm wp-cli wp post create --post_type=page --post_content="" --post_title="Careers" --post_status=publish
docker-compose run --user www-data --rm wp-cli wp post create --post_type=page --post_content="" --post_title="Contact" --post_status=publish
docker-compose run --user www-data --rm wp-cli wp menu create "Primary Navigation"
docker-compose run --user www-data --rm wp-cli wp theme activate phyt-theme
docker-compose run --user www-data --rm wp-cli wp plugin install advanced-custom-fields simple-locator --activate
docker-compose run --user www-data --rm wp-cli wp plugin activate phyt-jobs
docker-compose run --user www-data --rm wp-cli wp plugin install contact-form-7 --activate
docker-compose run --user www-data --rm wp-cli wp plugin install contact-form-7-city-field-extension contact-form-7-dynamic-text-extension --activate
