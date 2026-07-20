# src/Session — session handling

Manages connector session state across the multi-request sync lifecycle (auth → pull/push →
finish). SQLite-backed by default.

## Files

- `SessionHandlerInterface.php` — session-handler contract.
- `SqliteSessionHandler.php` — default implementation persisting sessions in SQLite
  (`ext-sqlite3`).
- `SessionHelper.php` — helper utilities for session access.

## Conventions

- The session id is established during `auth` (see `Controller\ConnectorController::auth`) and
  reused on subsequent requests.
- Storage is SQLite via the `Database/` layer; keep file paths configurable through `Config/`.
- Endpoints may swap the handler by binding a different `SessionHandlerInterface` in the container.

## Related

`Application/`, `Controller/` (auth/session lifecycle), `Database/`, `Config/`,
`Exception\SessionException`.
