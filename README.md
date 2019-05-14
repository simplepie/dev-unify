# SimplePie “Unify”

Tools for maintaining a unified SimplePie development environment.

## What is this and why should I care?

This repo is intended for _developers of SimplePie_ and is not useful for _consumers_ of SimplePie. As new chunks of functionality are developed to replace the old SimplePie codebase, we want to ensure that the _way_ they are developed shares a certain uniformity.

This repo contains scripts which are designed to uniformly update things like `composer.json`, `Makefile`, and other shared-style tasks and tools.

## Details

### `composer.json`

| Key | Description |
| --- | ----------- |
| `type` | Always set to `library`. |
| `license` | Always set to [Apache 2.0](https://www.apache.org/licenses/LICENSE-2.0). |
| `prefer-stable` | Always _prefer_ stable versions, even when `minimum-stability` is set to `dev`. |
| `minimum-stability` | Allow us to specify a single package as `dev` without impacting the other packages, as per `prefer-stable`. |
| `require` | Set the supported PHP versions + any packages that are shared across all projects. Custom sorted as `php` first, then `ext-`, then `lib-`, then other packages. |
| `require-dev` | A standard set of packages that are shared across all projects for development purposes. |
| `suggest` | Any packages which can be _suggested_ by all projects. Monolog and PSR packages are good examples of this. |
| `config` | Standardized configuration, optimized for performance. |

### `Makefile`

TBD

### `.phpcs.dist`

TBD

### Static Files

TBD
