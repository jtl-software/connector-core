# src/Serializer — JMS serialization layer

Configures **JMS Serializer** to translate between the JSON wire format and `Model/` DTOs /
`Rpc/` packets. This is where protocol-specific (de)serialization quirks are handled.

## Files

- `SerializerBuilder.php` — builds the configured JMS `Serializer` (registers handlers,
  subscribers, the object constructor, naming strategy). Registered into the DI container.
- `Json.php` — JSON (de)serialization entry helper.
- `ObjectConstructor.php` — custom object instantiation during deserialization.
- `Handler/` — custom type handlers: `IdentityHandler` (the host/endpoint `Identity` pair),
  `FeaturesHandler` (connector feature flags).
- `Subscriber/` — JMS event subscribers that patch (de)serialization per model:
  `NullValuesSubscriber`, `LanguageIsoSubscriber`, `ImageSubscriber`,
  `ProductAttributeSubscriber`, `ProductStockLevelSubscriber`, `CrossSellingSubscriber`.

## Conventions

- Model serialization is driven primarily by attributes **on the models themselves** (see
  `Model/CLAUDE.md`); this dir handles the cross-cutting/edge behaviour that attributes can't
  express. Prefer a subscriber/handler here over special-casing a model.
- When a model's wire representation needs custom logic (null handling, ISO conversion, nested
  identity), add/extend a `Handler` or `Subscriber` and register it in `SerializerBuilder`.
- Changes here can silently alter the wire format for many models — test round-trips
  (serialize → deserialize) and check `tests/src/Serializer`.

## Related

`Model/`, `Rpc/`, `Application/` (uses the serializer), `tests/src/Serializer`.
