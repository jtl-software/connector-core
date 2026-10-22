# src/Rpc — JSON-RPC packet value objects

The wire envelope. JTL-Connector speaks JSON-RPC 2.0; these classes model the request/response
envelope that wraps the protocol `Model/` payloads.

## Files

- `RequestPacket.php` — incoming JSON-RPC request (id, method, params).
- `ResponsePacket.php` — outgoing JSON-RPC response (id, result, error).
- `Packet.php` — shared base for request/response packets.
- `Method.php` — parses/represents the RPC `method` string (→ controller + action).
- `Error.php` — JSON-RPC error object (code + message + data); pairs with `Definition\ErrorCode`.
- `Warnings.php` — non-fatal warnings attached to a response.

## Conventions

- These are (de)serialized by `Serializer/` — field names and JMS annotations are part of the
  on-the-wire format. Do not rename fields without a protocol reason.
- Error codes come from `Definition\ErrorCode`; use those constants rather than magic numbers.
- `Application` constructs/consumes these — keep them dumb value objects (no business logic).

## Related

`Application/` (builds/consumes packets), `Serializer/`, `Definition/` (`RpcMethod`, `ErrorCode`),
`Error/`.
