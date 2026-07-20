# src/Checksum — change detection

Contracts for checksum-based change detection on models (so unchanged entities can be skipped
during sync). Works together with `Linker/ChecksumLinker`.

## Files

- `ChecksumInterface.php` — a checksum value attached to a model (e.g. `Model\Checksum`).
- `ChecksumLoaderInterface.php` — endpoint-provided loader that reads/writes persisted
  checksums, so the connector can tell whether a model changed since last sync.

## Conventions

- Endpoints opt in via `Connector\UseChecksumInterface` and provide a `ChecksumLoaderInterface`.
- Keep interfaces additive — they're part of the endpoint-facing contract.
- The actual link between a model and its checksum is applied in `Linker/ChecksumLinker`.

## Related

`Linker/` (`ChecksumLinker`), `Connector\UseChecksumInterface`, `Model\Checksum`, `Application/`.
