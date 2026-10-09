# src/Linker — identity & checksum linking

Resolves the protocol's dual-id system and checksums onto/off models as they flow through
`Application`.

## Files

- `IdentityLinker.php` — links/unlinks `Model\Identity` values (the host↔endpoint id pair)
  using the endpoint's `PrimaryKeyMapperInterface`. On pull it fills host ids; on push it
  resolves endpoint ids.
- `ChecksumLinker.php` — attaches/verifies model checksums via `Checksum\ChecksumLoaderInterface`.

## Conventions

- The linker sits between the serializer/controller and the mapper — it's how abstract
  protocol identities become concrete endpoint primary keys and back.
- Identity types come from `Definition\IdentityType`; use those constants.
- Behaviour is exercised heavily by tests — keep round-trip (link → unlink) symmetry.

## Related

`Mapper/` (`PrimaryKeyMapperInterface`), `Checksum/`, `Model/` (Identity system), `Application/`,
`Definition\IdentityType`.
