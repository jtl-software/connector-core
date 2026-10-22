# src/Subscriber — built-in event subscribers

The library's own listeners on the event dispatcher. They implement cross-cutting request
behaviour without bloating `Application`.

## Files

- `FeaturesSubscriber.php` — populates/adjusts connector feature flags on the features event.
- `RequestParamsTransformSubscriber.php` — normalizes/transforms incoming request params
  before controllers run.
- `SyncErrorSubscriber.php` — routes recoverable per-item failures into the `SyncError/` collector.

## Conventions

- Implement `EventSubscriberInterface`; subscribe to event names from `Definition\Event`.
- These are registered into the container/dispatcher by `Application` at boot.
- Prefer adding a subscriber here (or in the endpoint) over adding conditional logic inside
  `Application` — this is the intended extension mechanism.

## Related

`Event/`, `Definition\Event`, `Application/` (registration), `SyncError/`.
