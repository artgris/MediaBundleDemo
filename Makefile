CONSOLE = php bin/console
COMPOSER = composer

install:
	$(CONSOLE) d:d:c --if-not-exists
	$(CONSOLE) d:s:u --force

auto-load:
	composer dump-autoload
