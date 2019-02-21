CONSOLE = php bin/console
COMPOSER = composer

cc:
	$(CONSOLE) c:c

install: install_bundle init_db

install_bundle:
	rm -rf bundles/*
	cd bundles && git clone git@github.com:artgris/MediaBundle.git

init_db:
	$(CONSOLE) d:d:c --if-not-exists
	$(CONSOLE) d:s:u --force

test:
	./bin/phpunit tests