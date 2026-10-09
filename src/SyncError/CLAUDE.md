# src/SyncError — sync error collection

Collects and persists non-fatal errors encountered while syncing individual models, so a batch
can continue and report per-item problems back to JTL-Wawi.

## Files

- `SyncErrorEntry.php` — a single recorded sync error (model, identity, message, context).
- `SyncErrorCollectorInterface.php` — contract for collecting entries.
- `SqliteSyncErrorCollector.php` — default SQLite-backed collector.
- `SyncErrorCollectorAwareInterface.php` — for injecting the collector into consumers.

## Conventions

- Wired into the request flow via `Subscriber\SyncErrorSubscriber`.
- Use this for recoverable, per-item failures; hard failures go through `Error/` as RPC errors.
- Persistence uses the `Database/` SQLite layer.

## Related

`Subscriber/` (`SyncErrorSubscriber`), `Error/`, `Database/`, `Application/`.
