#!/bin/sh
set -e

# first arg is `-f` or `--some-option`
if [ "${1#-}" != "$1" ]; then
	set -- php-fpm "$@"
fi

symfony server:start -d --port=8000 --listen-ip=0.0.0.0

chown -R www-data var
exec docker-php-entrypoint "$@"
