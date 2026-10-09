# src/ — code map

All production code. PSR-4 roots (`composer.json`):

- `Jtl\Connector\Core\`         → `src/`
- `Jtl\Connector\MappingTables\` → `src/mapping-tables/` (vendored — see its `CLAUDE.md`)
- `Jtl\Connector\Dbc\`          → `src/dbc/` (vendored — see its `CLAUDE.md`)

Every file: `declare(strict_types=1);`, fully-qualified global calls (`\count`, `\in_array`),
full method DocBlocks, PHPStan level max. See the root `CLAUDE.md` for standards and commands.

## Subsystems (each has its own CLAUDE.md unless noted)

**Request lifecycle**
- `Application/` — the orchestrator: builds the PHP-DI container, authenticates, decodes the
  RPC request, dispatches events, routes to controllers, encodes the response. Start here to
  understand runtime flow.
- `Connector/` — interfaces an endpoint implements to plug into `Application`.
- `Controller/` — controller contracts (`Pull`/`Push`/`Delete`/`Statistic`/`Transactional`)
  and the built-in `ConnectorController`.
- `Rpc/` — JSON-RPC packet value objects (request/response/error/warnings).

**Protocol data**
- `Model/` — 118 protocol DTOs (the wire format) + `Generator/` faker builders. Highest-impact
  directory; changes here ripple to every endpoint and to JTL-Wawi.
- `Definition/` — enums/constant registries (`Model`, `Action`, `Controller`, `Event`,
  `ErrorCode`, `IdentityType`, `RelationType`, `RpcMethod`, `PaymentType`).
- `Serializer/` — JMS serializer setup, custom handlers and subscribers.

**Cross-cutting services**
- `Config/` — layered configuration (`CoreConfigInterface`, schema, file/array backends).
- `Session/` — session handling (SQLite-backed) and helpers.
- `Authentication/` — `TokenValidator(Interface)` for request-token auth (constant-time compare).
- `Checksum/` — checksum interfaces + loader (change detection on models).
- `Linker/` — `IdentityLinker` / `ChecksumLinker`: map host↔endpoint identities & checksums.
- `Mapper/` — `PrimaryKeyMapperInterface`: endpoint-provided host↔endpoint PK mapping.
- `SyncError/` — collect & persist sync errors (SQLite collector).
- `Error/` — error handler abstraction turning throwables into RPC errors.
- `Logger/` — Monolog service + custom `Handler/` and `Processor/`.
- `Subscriber/` — built-in event subscribers (features, request-param transform, sync-error).
- `Event/` — event objects published on the Symfony event dispatcher.
- `Utilities/` — stateless helpers (`Money`, `Str`, `Token`) + `Validator/`.
- `Database/` — `DatabaseInterface` + `Sqlite3` connection wrapper.

**Vendored (external origin — see their CLAUDE.md before editing)**
- `dbc/` — copy of `jtl/connector-dbc` (Doctrine DBAL table-gateway layer).
- `mapping-tables/` — copy of `jtl/connector-mapping-tables`.

## Small single-file subsystems (no dedicated CLAUDE.md)

- `Compression/Zip.php` — zip pack/unpack for image-batch transfer (uses `ext-zip`).
- `Http/JsonResponse.php` — thin JSON HTTP response (Symfony HttpFoundation based).
- `System/Check.php` — runtime/environment capability checks.
- `Plugin/PluginInterface.php` — contract for endpoint plugins registered with the container.

These follow the same standards as everything else; they're just too small to warrant a
separate guide.
