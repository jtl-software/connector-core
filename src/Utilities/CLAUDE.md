# src/Utilities — stateless helpers

Small, dependency-light helper classes. Keep everything here **stateless and side-effect-free**
(pure functions / static helpers) — no I/O, no global state.

## Files

- `Money.php` — money/amount handling (rounding, formatting) — get numeric edge cases right;
  it's used for prices.
- `Str.php` — string helpers.
- `Token.php` — token generation/handling helpers (used by auth/session). Treat output as
  sensitive — never log it.
- `Validator/` — model/value validation (`Validate`), used by `Model/` classes.

## Conventions

- No dependencies on `Application`/controllers — utilities are leaf code that others depend on,
  not the reverse. Adding a dependency back up the stack is a smell.
- Pure and easily unit-testable; add focused tests in `tests/src/Utilities`.

## Related

`Model/` (uses `Validator`), `Authentication/`/`Session/` (use `Token`), `tests/src/Utilities`.
