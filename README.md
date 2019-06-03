<div align="center"><img src="https://raw.githubusercontent.com/simplepie/.github/master/logo.png" width="500"><br></div>

----

# SimplePie “Unify”

Tools for maintaining a unified SimplePie development environment.

> **NOTE:** Consistency in the SimplePie _community_ (e.g., issue templates, code of conduct, security reporting) is managed in [simplepie/.github](https://github.com/simplepie/.github).

## What is this and why should I care?

This repo is intended for _developers of SimplePie_ and is not useful for _consumers_ of SimplePie. As new chunks of functionality are developed to replace the old SimplePie codebase, we want to ensure that the _way_ they are developed shares a certain uniformity.

This repo contains scripts which are designed to uniformly update things like `composer.json`, `Makefile`, and other shared-style tasks and tools.

## Details

### `composer.json`

Composer Schema is documented at <https://getcomposer.org/doc/04-schema.md>.

| Key | Description |
| --- | ----------- |
| `config` | Standardized configuration, optimized for performance. |
| `license` | Always set to [Apache 2.0](https://www.apache.org/licenses/LICENSE-2.0). |
| `minimum-stability` | Allow us to specify a single package as `dev` without impacting the other packages, as per `prefer-stable`. |
| `prefer-stable` | Always _prefer_ stable versions, even when `minimum-stability` is set to `dev`. |
| `readme` | `README.md` |
| `require-dev` | A standard set of packages that are shared across all projects for development purposes. |
| `require` | Set the supported PHP versions + any packages that are shared across all projects. Custom sorted as `php` first, then `ext-`, then `lib-`, then other packages. |
| `suggest` | Any packages which can be _suggested_ by all projects. Monolog and PSR packages are good examples of this. |
| `type` | Always set to `library`. |

### Static Files

There are certain parts of the project which are fairly standardized. Tags (which begin and end with `@@`) are replaced with the latest contents of the templates defined here.

* `Makefile`
* `README.md`

### Configuration Files

* `.phpcs.dist`
