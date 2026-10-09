# CLAUDE.md — connector-core (jtl/connector)

Root guide for agents working in this repository. Nested `CLAUDE.md` files exist in each
meaningful `src/` subsystem and in `tests/`; they are loaded automatically when you work in
that subtree and refine the rules below with directory-specific detail.

> Context note: these guides were bootstrapped by inspecting the code, config, and CI. They
> describe **observed** conventions. When a rule here conflicts with what the surrounding code
> actually does, follow the surrounding code and flag the discrepancy — don't silently "fix"
> established patterns.

## What this project is

`jtl/connector` is the **official PHP implementation of the JTL-Connector protocol** — the
JSON-RPC protocol spoken between **JTL-Wawi** (ERP) and endpoint implementations (e.g. shop
connectors). It is a **library**, consumed by endpoint packages; it is not a runnable
application on its own. Endpoints depend on it to stay compatible with future JTL-Wawi versions.

- Packagist: `jtl/connector` · License: MIT · Owner: JTL Software GmbH
- Docs: https://jtl-devguide.readthedocs.io/projects/jtl-connector

## Tech stack

- **PHP ≥ 8.3** (typed class constants and other 8.3 features are used — see `src/Definition/Model.php`).
- **PHP-DI** (`php-di/php-di`) — dependency injection container built in `Application`.
- **JMS Serializer** — (de)serialization of protocol models via PHP 8 attributes.
- **Symfony components** — `event-dispatcher`, `http-foundation`, `console`, `finder`, `filesystem`.
- **Monolog** — logging. **Doctrine DBAL / Collections**. **SQLite3** — local session / mapping / sync-error storage.
- **fakerphp/faker** — test-data generation for models.

## Commands (always prefer these)

Run via Composer scripts — they encode the exact flags CI uses:

| Task | Command | Notes |
|------|---------|-------|
| Full static analysis | `composer analyse` | runs `phpcs` **and** `phpstan` |
| Coding-standard check | `composer phpcs` | `JtlConnector` standard over `src` + `tests` |
| **Auto-fix style** | `composer phpcs:fix` | `phpcbf`; run before committing |
| Static analysis | `composer phpstan` | PHPStan **level max** |
| Tests | `composer tests` | PHPUnit 11 |

There is no `justfile` in this repo; Composer scripts are the canonical entrypoints. Install
deps with `composer install`.

## Coding standards (detected — enforced in CI)

The `JtlConnector` phpcs standard lives in the dev-dependency `jtl/connector-cq`
(`vendor/jtl/connector-cq/ConnectorStandard.xml`). Observed, enforced rules:

- **`declare(strict_types=1);`** at the top of every PHP file — no exceptions.
- **PSR-12** base + **Slevomat Coding Standard** (Commenting, TypeHints, Namespaces).
- **Fully-qualified global functions & constants**: call `\in_array(...)`, `\count(...)`,
  `\is_string(...)` with a leading backslash. This is enforced
  (`SlevomatCodingStandard.Namespaces.FullyQualifiedGlobalFunctions/Constants`) — plain
  `in_array(...)` will fail the build.
- **Full DocBlocks on functions/methods** (`JtlConnector.Commenting.FunctionComment`): every
  method documents `@param`, `@return`, and thrown `@throws`. Match the style already in the
  file you're editing.
- **PHPStan level max** with **zero errors** — add precise types and array shapes
  (`array<string, Foo>`) rather than suppressing.
- **Strict typing everywhere**: typed properties, typed params, typed returns. **`mixed` is
  never allowed** — properties, parameters, and returns are always concretely typed (use union
  types, generics/array shapes like `array<string, Foo>`, or a dedicated interface). PHPStan
  runs at **level max**, which flags `mixed`; resolve it with a real type, never by suppression.

Formatting: PSR-12 (4-space indent, braces, etc.). When in doubt, run `composer phpcs:fix`.

## Architecture in one screen

Request flow (JSON-RPC over the protocol):

```
JTL-Wawi ──▶ Application (src/Application)
                │  builds PHP-DI container, validates auth token, decodes RpcRequest,
                │  dispatches events, routes to the right Controller by (controller, action)
                ▼
          Controller  (src/Controller + the endpoint's own controllers)
                │  implements Pull / Push / Delete / Statistic / Transactional
                ▼
          Model DTOs  (src/Model)  ◀── (de)serialized by src/Serializer (JMS)
                │
          Response (src/Application/Response) ──▶ RpcResponse (src/Rpc) ──▶ JTL-Wawi
```

Supporting subsystems: `Definition` (protocol constants/enums), `Event` (dispatcher payloads),
`Config`, `Session`, `Authentication`, `Checksum`, `Linker`, `Mapper`, `SyncError`, `Error`,
`Logger`, `Subscriber`, `Utilities`. See `src/CLAUDE.md` for the full code map.

**Endpoint extension points** (what a consuming package implements): `ConnectorInterface`
(`src/Connector`), controllers (`src/Controller` interfaces), `PrimaryKeyMapperInterface`
(`src/Mapper`), `TokenValidatorInterface` (`src/Authentication`), `ChecksumLoaderInterface`
(`src/Checksum`).

## Agentic workflow rules

- **This is a published library — the public API is a contract.** Changing public
  method/class/constant signatures, protocol model fields, or `Definition` constants can break
  every downstream endpoint. Treat these as breaking changes: call them out explicitly and
  update `CHANGELOG.md`.
- **Protocol models are the wire format.** Field names, `#[Serializer\SerializedName]`, and
  types must match what JTL-Wawi sends/expects. Do not rename or restructure without protocol
  justification. See `src/Model/CLAUDE.md`.
- **CHANGELOG.md** follows the existing style — add an entry for any behavioural or API change.
- **Repo hygiene**: never commit IDE/OS cruft — `.idea`, `.code`, or `.DS_Store` files
  (outside `vendor/`) must not be committed.
- **Vendored sub-packages**: `src/dbc` and `src/mapping-tables` are code from the separate
  upstream packages `jtl/connector-dbc` and `jtl/connector-mapping-tables` (see `provide` in
  `composer.json`). Prefer fixing those upstream; see their local `CLAUDE.md` before editing.
- **Before finishing any change**: run `composer phpcs:fix`, then `composer analyse` and
  `composer tests`, and report the actual results.

## CI

The project is hosted **solely on GitHub** and gated by **GitHub Actions**
(`.github/workflows/`):

- `ci.yml` — runs on pushes to `master`/`develop` and on every pull request. Jobs:
  `no-cruft` (fails on committed `.idea`/`.code`/`.DS_Store`), `phpcs` (`composer phpcs`),
  `phpstan` (`composer phpstan`), and `tests` on a PHP `8.3`/`8.4` matrix (`composer tests`).
  All four are hard gates — a failure fails the pipeline. The suite pins `date.timezone` to
  UTC (`phpunit.xml.dist`) so tz-naive `DateTime` round-trips are deterministic on any host.
- `close-issue.yml` — issue-staleness automation (unrelated to code quality).

The CI gate is authoritative, but keep the local gate too: before pushing, always run
`composer phpcs:fix`, `composer analyse`, and `composer tests` and keep them green. The `:ci`
composer script variants
(`phpcs:ci`/`phpstan:ci`/`tests:ci`) still exist for machine-readable (GitLab-format) reports
but are not used by the GitHub workflows.
