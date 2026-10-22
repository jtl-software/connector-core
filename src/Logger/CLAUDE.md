# src/Logger — logging

Monolog-based logging for the connector.

## Files

- `LoggerService.php` — configures/provides the Monolog logger (channels, level, handlers).
- `Handler/` — custom Monolog handler(s).
- `Processor/` — custom Monolog processors that enrich log records.

## Conventions & PII rules

- Consumers receive a PSR-3 `LoggerInterface` (e.g. via `LoggerAwareInterface`, as
  `ConnectorController` does) — depend on the interface, not the concrete service.
- **Never log secrets or PII**: no auth tokens, no full customer records. Log identifiers and
  counts, not payloads. This matters — the connector handles customer/order data.
- Default to `DEBUG` for detailed traces and keep interface-boundary logging minimal and
  structured. Add context via a `Processor` rather than string-concatenating into messages.

## Related

`Application/`, `Error/` (logs handled errors), Monolog (`monolog/monolog`).
