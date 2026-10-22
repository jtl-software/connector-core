# src/mapping-tables — ⚠️ bundled port of jtl/connector-mapping-tables

> **External origin.** This directory started as a copy of the standalone package
> **`jtl/connector-mapping-tables`** (namespaced `Jtl\Connector\MappingTables\` via PSR-4).
> Core 6 migrated it to DBAL 4; the standalone package is still DBAL 2 and only serves core 5
> endpoints, so `composer.json` declares `conflict: jtl/connector-mapping-tables`. **Never
> re-sync from upstream**: that would revert the DBAL 4 migration. If a fix also matters for
> core 5, flag it so it can be ported to the standalone package.

## Purpose

Persists the mapping between JTL-Wawi **host identities** and **endpoint primary keys** — the
storage backing an endpoint's `PrimaryKeyMapperInterface` (`src/Mapper`). Built on top of the
`dbc/` DBAL layer.

## Structure

- `TableManager.php` — orchestrates the mapping tables.
- `TableInterface.php` / `AbstractTable.php` / `TableProxy.php` / `TableDummy.php` — the table
  abstraction + a no-op dummy.
- `TableCollection.php`, `Validator.php`, `Schema/EndpointColumn.php` — registry, validation,
  schema for composite endpoint keys.

## Conventions

- Depends on `dbc/`. Same repo-wide standards (strict_types, PSR-12, PHPStan max).
- Tests live in `tests/src/mapping-tables` (separate `TestCase` base extending the package's).

## Related

`Mapper/` (the interface this backs), `Linker/IdentityLinker` (consumer), `dbc/`,
upstream `jtl/connector-mapping-tables`.
