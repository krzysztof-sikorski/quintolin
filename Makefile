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

.PHONY: clean_cache
clean_cache:
	rm --force --verbose .php-cs-fixer.cache
	rm --force --recursive --verbose website/var/cache

.PHONY: clean_logs
clean_logs:
	rm --force --recursive --verbose website/var/log

