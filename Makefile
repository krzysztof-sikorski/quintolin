SHELL := /bin/sh
.POSIX: # enable POSIX compatibility
.SUFFIXES: # no special suffixes
.DEFAULT_GOAL := default

.PHONY: default
default:
	@echo "Please choose target explicitly."

.PHONY: git_push_all
git_push_all:
	git remote | xargs -L1 git push --verbose --all
	git remote | xargs -L1 git push --verbose --tags

.PHONY: install_assets
install_assets:
	php website/bin/console -vvv importmap:install

.PHONY: compile_assets
compile_assets:
	php website/bin/console -vvv asset-map:compile

.PHONY: clean_assets
clean_assets:
	rm --force --recursive --verbose website/public/assets/*

.PHONY: clean_cache
clean_cache:
	rm --force --verbose .php-cs-fixer.cache
	rm --force --recursive --verbose website/var/cache

.PHONY: clean_logs
clean_logs:
	rm --force --recursive --verbose website/var/log

.PHONY: install_php_cs_fixer
install_php_cs_fixer:
	composer --quiet --working-dir=tools/php-cs-fixer install

.PHONY: lint_coding_style
lint_coding_style: install_php_cs_fixer
	tools/php-cs-fixer/vendor/bin/php-cs-fixer check -vvv

.PHONY: fix_coding_style
fix_coding_style: install_php_cs_fixer
	tools/php-cs-fixer/vendor/bin/php-cs-fixer fix -vvv

.PHONY: lint_twig_templates
lint_twig_templates:
	website/bin/console lint:twig -vvv --show-deprecations
