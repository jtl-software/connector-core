# src/Database — SQLite connection layer

Low-level database access used by the connector's local persistence (sessions, sync errors,
mapping/checksums). SQLite by default (`ext-sqlite3` / `ext-pdo`).

## Files

- `DatabaseInterface.php` — connection abstraction.
- `Sqlite3.php` — SQLite implementation.

## Conventions

- This is the shared low-level layer; `Session/`, `SyncError/` and the vendored `dbc/` +
  `mapping-tables/` build persistence on top of it.
- Use parameterized queries — never interpolate values into SQL.
- Database file location comes from `Config/`; don't hard-code paths.

## Related

`Session/`, `SyncError/`, `dbc/`, `mapping-tables/`, `Config/`,
`Exception\DatabaseException`.
