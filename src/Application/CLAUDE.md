# src/Application — request orchestrator

The runtime core. `Application` is the entry point an endpoint boots; it wires everything
together and drives one JSON-RPC request from bytes to response.

## Files

- `Application.php` — the orchestrator (large, ~1.2k LOC). Responsibilities: build the PHP-DI
  container (registering endpoint `ConnectorInterface`, mappers, validators), validate the auth
  token, decode the `RequestPacket`, dispatch `Request`/`Rpc`/`Model`/`Response` events, resolve
  the target controller + action from `Definition\Controller` + `Definition\Action`, invoke it,
  and serialize the `ResponsePacket`.
- `Request.php` — internal request abstraction (controller, action, params, model payload).
- `Response.php` — internal response abstraction wrapping the controller result.

## How it fits

```
boot endpoint ─▶ Application::run()
   ├─ ContainerBuilder → PHP-DI Container
   ├─ TokenValidator (Authentication) authenticates the RPC token
   ├─ RequestPacket decoded (Rpc) → Request (this dir)
   ├─ EventDispatcher fires Request/Rpc/Model events (Event/, Subscriber/)
   ├─ route (Definition\Controller, Definition\Action) → Controller
   └─ Response (this dir) → ResponsePacket (Rpc) → JSON out
```

## Conventions & gotchas

- This class touches nearly every subsystem — read the imports at the top to navigate. Prefer
  extending via **events/subscribers** or DI configuration over adding branches here.
- Controller resolution is driven by `Definition\Controller` + `Definition\Action` constants
  and the endpoint's controller namespace (`ConnectorInterface::getControllerNamespace()`).
  Adding a new action/controller means touching `Definition/` too.
- Keep exception handling routed through `Error/` (`AbstractErrorHandler`) so failures become
  well-formed RPC errors rather than raw throwables.
- Full DocBlocks with `@throws` for the (many) exception types are expected here.

## Related

`Connector/` (interfaces it consumes), `Controller/`, `Rpc/`, `Definition/`, `Event/`,
`Subscriber/`, `Error/`, `Config/`, `Session/`, `Authentication/`.
