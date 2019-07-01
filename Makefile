all: psalm
	./psalm-schema
	./unify-composer
	./unify-static
	./unify
	./format-xml
	@ # find $$(dirname $$(pwd)) -maxdepth 2 -type f -name composer.json | xargs -I% dirname % | xargs -I% bash -c "echo % && cd % && composer update"

.PHONY: psalm
psalm:
	wget -O psalm-schema.xml https://psalm.dev/schema/config
