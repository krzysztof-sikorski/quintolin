SHELL := /bin/sh
.POSIX: # enable POSIX compatibility
.SUFFIXES: # no special suffixes
.DEFAULT_GOAL := default

# dummy entry to force make to do nothing by default
.PHONY: default
default:
	@echo "Please choose target explicitly."

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
clean_all: tools_clean_cache website_clean_all

# tools: remove all cache files
.PHONY: tools_clean_cache
tools_clean_cache:
	rm --force --verbose .php-cs-fixer.cache

# tools: install "PHP Coding Standards Fixer" library
.PHONY: tools_install_php_cs_fixer
tools_install_php_cs_fixer:
	composer --quiet --working-dir=tools/php-cs-fixer install

# tools: lint PHP coding style across all directories
.PHONY: lint_coding_style
lint_coding_style: tools_install_php_cs_fixer
	tools/php-cs-fixer/vendor/bin/php-cs-fixer check -vvv

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
