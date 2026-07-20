# src/mapping-tables — ⚠️ vendored from jtl/connector-mapping-tables

> **External origin.** This directory is a copy of the standalone package
> **`jtl/connector-mapping-tables`** (declared in `composer.json` → `provide:
> jtl/connector-mapping-tables`, namespaced `Jtl\Connector\MappingTables\` via PSR-4). It has
> its own upstream repository and release cycle. **Prefer fixing bugs upstream** and
> re-syncing; edits made only here will be lost on the next sync and won't reach other
> consumers. If you must change it here, flag it so it can be mirrored upstream.

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
