all:
	./unify-composer
	./unify-static
	./unify
	./format-xml
	find $$(dirname $$(pwd)) -maxdepth 2 -type f -name composer.json | xargs -I% dirname % | xargs -I% bash -c "echo % && cd % && composer update"
