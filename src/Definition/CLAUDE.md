# src/Definition — protocol constant & enum registries

The protocol's controlled vocabulary. `final` classes exposing typed `public const` sets that
the rest of the codebase (and endpoints) reference instead of hard-coding strings/ints.

## Files

- `Model.php` — canonical model-name registry (`Product`, `Category`, …) + `MODEL_NAMESPACE`;
  maps protocol names to model classes.
- `Controller.php` — controller names (route targets).
- `Action.php` — RPC actions (`pull`, `push`, `delete`, `statistic`, core lifecycle actions).
- `Event.php` — event name constants dispatched through the event system.
- `ErrorCode.php` — JSON-RPC error codes (used by `Rpc\Error`).
- `RpcMethod.php` — parsing/definition of the RPC `method` string ↔ controller+action.
- `IdentityType.php` — identity type constants for the `Linker`/identity system.
- `RelationType.php` — relation types (e.g. image relations).
- `PaymentType.php` — payment type constants.

## Conventions

- Classes are `final`; members are **typed class constants** (PHP 8.3), e.g.
  `public const string PRODUCT = 'Product';`. Keep the aligned, grouped formatting already used.
- Several classes throw `DefinitionException` on unknown lookups — preserve that pattern.
- These constants are **public API and protocol contract**. Values must match what JTL-Wawi
  uses. Add new constants; do not repurpose or remove existing values without a breaking-change
  note in `CHANGELOG.md`.

## Related

`Model/`, `Controller/`, `Application/` (routing), `Rpc/`, `Event/`, `Exception\DefinitionException`.
