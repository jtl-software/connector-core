# src/Connector — endpoint entry contracts

The interfaces a consuming **endpoint** implements so `Application` can drive it. This is the
primary extension seam of the whole library.

## Files

- `ConnectorInterface.php` — the main contract. `initialize(config, container, dispatcher)`,
  plus `getPrimaryKeyMapper()`, `getTokenValidator()`, `getControllerNamespace()`,
  `getEndpointVersion()`, `getPlatformVersion()`, `getPlatformName()`. The endpoint's
  implementation is registered into the DI container and used by `Application`.
- `HandleRequestInterface.php` — opt-in hook for endpoints that want to intercept/handle the
  raw request themselves.
- `ModelInterface.php` — marker/behaviour for endpoint model handling.
- `UseChecksumInterface.php` — opt-in: signals the endpoint uses checksum-based change
  detection (ties into `Checksum/` + `Linker/`).

## Conventions

- These are **interfaces** — additive changes only. Adding a method is a breaking change for
  every endpoint; if unavoidable, document it in `CHANGELOG.md` and prefer a new opt-in
  interface (the `*Interface` "capability" pattern used here) over widening the core one.
- Method DocBlocks are the contract documentation — keep `@param`/`@return` precise.

## Related

`Application/` (consumes these), `Mapper/` (`PrimaryKeyMapperInterface`),
`Authentication/` (`TokenValidatorInterface`), `Checksum/`, `Controller/`.
