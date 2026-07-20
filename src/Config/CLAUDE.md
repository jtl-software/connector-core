# src/Config — layered configuration

Configuration abstraction for the connector. Backed by `hassankhan/config`; exposes a typed
core-config contract plus a declarative schema.

## Files

- `CoreConfigInterface.php` — the typed config contract the rest of the code depends on.
- `ConfigSchema.php` / `ConfigSchemaConfigInterface.php` — declarative schema: known
  parameters, defaults, validation.
- `ConfigParameter.php` — a single schema parameter (key, type, default).
- `FileConfig.php` — file-backed config (JSON/etc. via `hassankhan/config`).
- `ArrayConfig.php` — in-memory config (handy for tests and defaults).

## Conventions

- Depend on `CoreConfigInterface`, not concrete implementations. New config keys go through
  `ConfigSchema` (declare parameter + default) so they're discoverable and validated.
- Config is provided to the endpoint via `ConnectorInterface::initialize()`.
- Don't read raw env/files ad-hoc elsewhere — route configuration through this subsystem.

## Related

`Application/` (builds + injects config), `Connector/` (`initialize`), `Exception\ConfigException`.
