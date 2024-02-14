SHELL := /bin/sh
.POSIX: # enable POSIX compatibility
.SUFFIXES: # no special suffixes
.DEFAULT_GOAL := default

# dummy entry to force make to do nothing by default
.PHONY: default
default:
	@echo "Please choose target explicitly."

.PHONY: get_user
get_user:
	echo "ID:" $$(id --user)

# git helper: push current branch to configured remotes
.PHONY: git_push_current_branch
git_push_current_branch:
	git remote | xargs -L1 git push --verbose

# git helper: push all tags to all configured remotes
.PHONY: git_push_tags
git_push_tags:
	git remote | xargs -L1 git push --verbose --tags

# clean all temporary files (cache, logs, etc)
.PHONY: clean_all
clean_all: website_clean_all

# lint all `composer.json` files
.PHONY: lint_composer_config
lint_composer_config:
	composer --strict --no-check-version --working-dir=modules/core validate
	composer --strict --no-check-version --working-dir=modules/storage validate
	composer --strict --no-check-version --working-dir=website validate

# lint all files against EditorConfig settings
.PHONY: lint_editorconfig
lint_editorconfig:
	docker container run --rm --user=$$(id --user):$$(id --group) --volume=$$PWD:/check mstruebing/editorconfig-checker:2.7.2

# lint PHP coding style across all directories
.PHONY: lint_coding_style
lint_coding_style:
	docker container run --rm --user=$$(id --user):$$(id --group) --volume=$$PWD:/code ghcr.io/php-cs-fixer/php-cs-fixer:3.49-php8.3 check -vvv --show-progress=dots

# fix PHP coding style across all directories
.PHONY: fix_coding_style
fix_coding_style:
	docker container run --rm --user=$$(id --user):$$(id --group) --volume=$$PWD:/code ghcr.io/php-cs-fixer/php-cs-fixer:3.49-php8.3 fix -vvv --show-progress=dots

# website: clean all temporary files (cache, logs, etc)
.PHONY: website_clean_all
website_clean_all: website_clean_assets website_clean_cache website_clean_logs

# website: install dependencies defined for assets
.PHONY: website_install_asset_dependencies
website_install_asset_dependencies:
	php website/bin/console -vvv importmap:install

# website: compile assets for production environment
.PHONY: website_compile_assets
website_compile_assets:
	php website/bin/console -vvv asset-map:compile

# website: remove all compiled assets
.PHONY: website_clean_assets
website_clean_assets:
	rm --force --recursive --verbose website/public/assets/*

# website: remove all cache files
.PHONY: website_clean_cache
website_clean_cache:
	rm --force --recursive --verbose website/var/cache

# website: remove all log files
.PHONY: website_clean_logs
website_clean_logs:
	rm --force --recursive --verbose website/var/log

# website: lint all Twig templates
.PHONY: website_lint_twig_templates
website_lint_twig_templates:
	website/bin/console lint:twig -vvv --show-deprecations
