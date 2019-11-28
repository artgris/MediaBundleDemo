CONSOLE = php bin/console
COMPOSER = composer

install:
	$(CONSOLE) d:d:c --if-not-exists
	$(CONSOLE) d:s:u --force

install_bundle:
	rm -rf bundles/*
	cd bundles && git clone git@github.com:artgris/MediaBundle.git

auto-load:
	composer dump-autoload
