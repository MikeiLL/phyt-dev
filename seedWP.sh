#!/usr/bin/env bash

docker-compose exec --user www-data wordpress wp post create --post_type=page --post_title="Front Page" --post_status=published
docker-compose exec --user www-data wordpress wp post create --post_type=page --post_content --post_title="About Us" --post_status=published
docker-compose exec --user www-data wordpress wp post create --post_type=page --post_content --post_title="Patients" --post_status=published
docker-compose exec --user www-data wordpress wp post create --post_type=page --post_content --post_title="Partners" --post_status=published
docker-compose exec --user www-data wordpress wp post create --post_type=page --post_content --post_title="Careers" --post_status=published
docker-compose exec --user www-data wordpress wp menu create "Primary Navigation"
docker-compose exec --user www-data wordpress wp theme activate phyt-theme
docker-compose exec --user www-data wordpress wp plugin install simple-locator --activate
