.DEFAULT_GOAL := help

DC = docker compose
EXEC = $(DC) exec php
COMPOSER = $(EXEC) composer

ifndef CI_JOB_ID
	GREEN  := $(shell tput -Txterm setaf 2)
	YELLOW := $(shell tput -Txterm setaf 3)
	RESET  := $(shell tput -Txterm sgr0)
	TARGET_MAX_CHAR_NUM=30
endif

help:
	@echo "API Platform DDD ${GREEN}example${RESET}"
	@awk '/^[a-zA-Z\-\_0-9]+:/ { \
		helpMessage = match(lastLine, /^## (.*)/); \
		if (helpMessage) { \
			helpCommand = substr($$1, 0, index($$1, ":")-1); \
			helpMessage = substr(lastLine, RSTART + 3, RLENGTH); \
			printf "  ${GREEN}%-$(TARGET_MAX_CHAR_NUM)s${RESET} %s\n", helpCommand, helpMessage; \
		} \
		isTopic = match(lastLine, /^###/); \
	    if (isTopic) { \
			topic = substr($$1, 0, index($$1, ":")-1); \
			printf "\n${YELLOW}%s${RESET}\n", topic; \
		} \
	} { lastLine = $$0 }' $(MAKEFILE_LIST)

#################################
Project:

## Enter the application container
php:
	@$(EXEC) sh

## Install the whole dev environment
install:
	@$(DC) build
	@$(MAKE) start -s
	@$(MAKE) vendor -s

## Install composer dependencies
vendor:
	@$(COMPOSER) install --optimize-autoloader

## Start the project
start:
	@$(DC) up -d --remove-orphans --no-recreate

## Stop the project
stop:
	@$(DC) stop
	@$(DC) rm -v --force

.PHONY: php database install vendor start stop

#################################
Tests:

## Run codestyle static analysis
php-cs-fixer:
	@$(EXEC) vendor/bin/php-cs-fixer fix --dry-run --diff

## Rune phpstan
phpstan:
	@$(EXEC) vendor/bin/phpstan analyse --level=5 src

.PHONY: php-cs-fixer psalm phpstan

#################################
Tools:

## Fix PHP files to be compliant with coding standards
fix-cs:
	@$(EXEC) vendor/bin/php-cs-fixer fix

.PHONY: fix-cs
