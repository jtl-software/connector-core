# src/Authentication — request-token validation

Authenticates incoming RPC requests by validating the connector token.

## Files

- `TokenValidatorInterface.php` — contract: `validate(string $token): bool` (endpoint-provided).
- `TokenValidator.php` — default implementation.

## Conventions & security

- **Compare tokens in constant time** — use `\hash_equals()`, never `===`/`==` on secrets.
  (A regression here was fixed in `TokenValidator`; see git history / `CHANGELOG.md` —
  CO-3468.) Preserve constant-time comparison in any change to token handling.
- The endpoint supplies its validator via `ConnectorInterface::getTokenValidator()`; the core
  default should stay minimal and safe.
- Auth failures must surface as proper RPC errors via `Error/` (`AuthenticationException` →
  `Definition\ErrorCode`), not raw exceptions.
- Never log token values (see `Logger/` PII rules).

## Related

`Application/` (authenticates before routing), `Connector/`, `Error/`,
`Exception\AuthenticationException`.
