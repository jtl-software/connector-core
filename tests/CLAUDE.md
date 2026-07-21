# tests/ — test suite

PHPUnit 11 test suite. Run with `composer tests` (or `composer tests:ci` for JUnit output).
Config: `phpunit.xml.dist` (bootstrap `tests/bootstrap.php`, coverage source = `src/`).

## Layout

- `bootstrap.php` — loads the autoloader; defines `TEST_DIR` / `TESTROOT` constants used by tests.
- `src/` — the tests, PSR-4 `Jtl\Connector\Core\Test\` → `tests/src`. Structure **mirrors
  `src/`** (`tests/src/Model`, `tests/src/Serializer`, `tests/src/Controller`, …).
- `src/TestCase.php` — shared base class **all tests extend** (`Jtl\Connector\Core\Test\TestCase`).
  Provides a Faker generator, `ArrayConfig`/`FileConfig` helpers, an `Identity` helper, and
  **vfsStream** for virtual-filesystem tests; its `tearDown` cleans up `plugins/`, `db/`,
  `var/`, and temp config files. It extends the vendored `Jtl\Connector\MappingTables\TestCase`.
- `src/Stub/` — hand-written stubs/doubles (e.g. `Stub/Controller`, `Stub/Logger`).
- `fixtures/` — static fixtures (`images_push.json`, `images_push.zip`, `MyPlugin/`).
- `tmp/` — scratch space for tests; keep it out of committed diffs.
- `src/dbc/` and `src/mapping-tables/` have their **own** `TestCase` bases (for the vendored
  packages) — extend the matching base for the code under test.

## Conventions (match the existing tests)

- `declare(strict_types=1);`, namespace `Jtl\Connector\Core\Test\...` mirroring the SUT path.
- Test classes end in `Test` and `extend TestCase`. One test class per production class.
- **Use PHPUnit attributes, not annotations**: `#[DataProvider('...')]` is the norm (69+ uses);
  data-provider methods are `public static`. Use `#[Test]`/`#[CoversClass]` attributes rather
  than `@test`/`@covers` docblocks.
- Full method DocBlocks apply here too (phpcs runs over `tests`) — including `@throws`.
- Prefer **Faker** (via `TestCase`) and the `Model/Generator` builders to construct models;
  prefer **vfsStream** over touching the real filesystem.
- Same coding standards as `src/` — `composer phpcs`/`phpstan` cover `tests` as well, so tests
  must also pass level-max static analysis and the `JtlConnector` standard.

## Adding tests

Place the test at the mirrored path under `tests/src`, extend the correct `TestCase`, use a
`#[DataProvider]` for table-driven cases, and assert behaviour (round-trips for models/
serializer) rather than implementation details. Note: the suite pins `date.timezone` to UTC in
`phpunit.xml.dist` so tz-naive `DateTime` round-trips (e.g. Doctrine DBAL's `datetime` type) are
deterministic — keep new date-sensitive tests timezone-independent rather than relying on the
host timezone.

## Related

`src/` (mirrored), `Model/Generator` (test data), `phpunit.xml.dist`, root `CLAUDE.md`.
