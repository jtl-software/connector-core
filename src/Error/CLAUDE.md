# src/Error — error handling

Turns thrown exceptions into well-formed JSON-RPC error responses instead of leaking stack
traces to the caller.

## Files

- `AbstractErrorHandler.php` — base error-handling behaviour (mapping throwables → RPC errors,
  logging).
- `ErrorHandler.php` — the concrete handler registered by `Application`.

## Conventions

- Every throwable that reaches the top of a request should be converted here into an
  `Rpc\Error` with a `Definition\ErrorCode`. Don't let raw exceptions escape.
- Log through the `Logger/` service (respect PII rules — never log tokens/secrets).
- New failure categories: add a code in `Definition\ErrorCode` + a typed exception in
  `Exception/`, then map it here.

## Related

`Application/`, `Rpc\Error`, `Definition\ErrorCode`, `Exception/`, `Logger/`.
