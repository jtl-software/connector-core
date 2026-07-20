# src/Mapper — primary-key mapping contract

## Files

- `PrimaryKeyMapperInterface.php` — endpoint-provided mapping between JTL-Wawi host ids and
  endpoint primary keys. The endpoint implements it and returns it from
  `ConnectorInterface::getPrimaryKeyMapper()`.

## Conventions

- Core only defines the interface; the persistent implementation typically lives in the
  endpoint (often backed by the vendored `mapping-tables/` package).
- `Linker\IdentityLinker` is the main consumer — it calls the mapper to translate identities.
- Additive changes only; this is public, endpoint-facing API.

## Related

`Linker/`, `Connector/`, `mapping-tables/` (typical implementation backing).
