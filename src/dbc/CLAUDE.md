# src/dbc — ⚠️ bundled port of jtl/connector-dbc

> **External origin.** This directory started as a copy of the standalone package
> **`jtl/connector-dbc`** (namespaced `Jtl\Connector\Dbc\` via PSR-4). Core 6 migrated it to
> DBAL 4; the standalone package is still DBAL 2 and only serves core 5 endpoints, so
> `composer.json` declares `conflict: jtl/connector-dbc`. **Never re-sync from upstream**: that
> would revert the DBAL 4 migration. If a fix also matters for core 5, call it out so it can be
> ported to the standalone package.

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
