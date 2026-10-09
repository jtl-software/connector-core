# src/Event — event dispatcher payloads

Event objects published on the **Symfony EventDispatcher** during a request. Endpoints (and
built-in `Subscriber/`s) hook these to observe/mutate data at defined points in the lifecycle.

## Files (22)

- **Lifecycle/flow**: `RequestEvent`, `ResponseEvent`, `RpcEvent`, `AckEvent`, `BoolEvent`,
  `StatisticEvent`, `FeaturesEvent`, `QueryFilterEvent`, `ConnectorIdentificationEvent`.
- **Per-model**: `ModelEvent` (generic) plus one per major entity — `ProductEvent`,
  `CategoryEvent`, `CustomerEvent`, `CustomerOrderEvent`, `ImageEvent`, `ManufacturerEvent`,
  `PaymentEvent`, `SpecificEvent`, `CrossSellingEvent`, `DeliveryNoteEvent`,
  `GlobalDataEvent`, `StatusChangeEvent`.

## Conventions

- Extend `Symfony\Contracts\EventDispatcher\Event`. Each event is a small immutable-ish carrier
  exposing a typed getter for its payload (`getProduct(): Product`), set via constructor.
- Event **names** are constants in `Definition\Event` — dispatch/listen using those, not raw
  strings.
- Adding a new event: create the payload class here, register its name in `Definition\Event`,
  and dispatch it from the appropriate point in `Application`.
- Keep events behaviour-free (data carriers). Reactions belong in `Subscriber/` or endpoint code.

## Related

`Definition\Event` (names), `Subscriber/` (built-in listeners), `Application/` (dispatch points),
`Model/`.
