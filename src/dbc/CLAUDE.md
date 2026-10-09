# src/dbc — ⚠️ vendored from jtl/connector-dbc

> **External origin.** This directory is a copy of the standalone package
> **`jtl/connector-dbc`** (declared in `composer.json` → `provide: jtl/connector-dbc`, and
> namespaced `Jtl\Connector\Dbc\` via PSR-4). It has its own upstream repository and release
> cycle. **Prefer fixing bugs upstream** and re-syncing; edits made only here will be lost on
> the next sync and won't reach other consumers of the package. If you must change it here,
> call that out explicitly so it can be mirrored upstream.

## Purpose

A thin **Doctrine DBAL table-gateway** layer — the persistence foundation the mapping-tables
and other DB-backed features build on.

## Structure

- `DbManager.php` / `Connection.php` — DBAL connection + manager.
- `AbstractTable.php` / `TableCollection.php` — table-gateway base + registry.
- `Query/QueryBuilder.php`, `Schema/TableRestriction.php`, `Types/Uuid4Type.php`,
  `Event/TableEvent.php`, `Session/SessionHandler.php` — query building, schema helpers, custom
  DBAL type, table events, DBAL-backed session handler.
- `Console/Command/` — CLI commands (Symfony Console).

## Conventions

- Doctrine DBAL 4 API. Parameterized queries only.
- Same repo-wide standards apply (strict_types, PSR-12, PHPStan max) — the tree is included in
  `phpcs`/`phpstan` runs.
- Tests live in `tests/src/dbc` (separate `TestCase` base).

## Related

`mapping-tables/` (built on this), `Database/`, upstream `jtl/connector-dbc`.
