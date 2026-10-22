# src/Exception — typed exceptions

~24 domain-specific exception classes (`ApplicationException`, `AuthenticationException`,
`ConfigException`, `DatabaseException`, `DefinitionException`, `RpcException`,
`CompressionException`, `LinkerException`, …). One exception type per failure domain.

## Conventions

- **Throw the most specific type**, never a bare `\Exception` or `\RuntimeException`, when a
  domain type exists. If none fits, add a new one here following the existing pattern.
- Many classes expose **static named constructors** with a message + code (the code usually
  ties into `Definition\ErrorCode`). Prefer `SomeException::forX(...)` factories over inline
  `new` with a raw string, matching the surrounding files.
- Every method needs a full DocBlock; methods that throw declare `@throws` at call sites
  (PHPStan level max + the JtlConnector comment sniff enforce this).
- Exceptions are caught and mapped to RPC errors in `Error/` — keep them serialization-safe
  (no unserializable state).

## Related

`Error/` (maps these to RPC errors), `Definition\ErrorCode`, `Rpc\Error`, and every subsystem
(each throws its own type).
