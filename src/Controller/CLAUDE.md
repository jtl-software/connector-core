# src/Controller — controller contracts

Defines the controller pattern the protocol uses. An endpoint provides one controller per
model/domain; `Application` routes each request to a controller method by action.

## Files

- `PullInterface.php` — `pull(QueryFilter $queryFilter): array` — read data from the endpoint.
- `PushInterface.php` — `push(AbstractModel ...$model): array` — write data to the endpoint.
- `DeleteInterface.php` — `delete(AbstractModel ...$model): array` — delete data.
- `StatisticInterface.php` — `statistic(QueryFilter $queryFilter): int` — count pending items.
- `TransactionalInterface.php` — `beginTransaction()/commit()/rollback()` for push/delete atomicity.
- `ConnectorController.php` — the **built-in** controller (implements `LoggerAwareInterface`):
  handles core actions `init`, `auth`, `features`, `identify`, `ack`, `clear`, `finish` — i.e.
  the connector's own lifecycle, not domain models.

## Conventions

- Actions map to `Definition\Action` constants; controller names map to `Definition\Controller`.
  Adding an action/controller requires a matching `Definition/` entry.
- The `*Interface` set is a **capability** model — an endpoint controller implements only the
  interfaces it supports (e.g. a read-only controller implements just `PullInterface` +
  `StatisticInterface`). `Application` checks `instanceof` before dispatching.
- Signatures use protocol models from `Model/` and `QueryFilter`; keep them intact — they are
  part of the public contract.
- Return shapes (`array` of models / results) must match what `Application` expects to
  serialize back into an `RpcResponse`.

## Related

`Application/` (dispatches here), `Definition/` (Action/Controller constants), `Model/`,
`Rpc/`, `Error/`.
