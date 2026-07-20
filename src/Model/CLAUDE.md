# src/Model — protocol data models (the wire format)

118 DTOs representing every entity exchanged with JTL-Wawi (Product, Category, Customer,
CustomerOrder, and their I18n/Image/Attribute/Price satellites). **This is the single
highest-impact directory in the repo** — these classes ARE the protocol. A field rename or type
change here changes the on-the-wire JSON and can break every endpoint and JTL-Wawi itself.

## Structure

- **Base classes**: `AbstractModel` (root, tracks identification strings, JMS-excluded),
  `AbstractIdentity` (models with a host/endpoint `Identity`), `AbstractI18n`,
  `AbstractImage`, `AbstractOrderAddress`.
- **Identity system**: `Identity`, `Identities`, `IdentityInterface`, `Identity.php` — the
  dual host/endpoint id pair that runs through the whole protocol.
- **Interfaces/traits**: `I18nInterface`, `ItemsInterface`, `TranslatableAttributesInterface`
  + `TranslatableAttributesTrait`.
- **Entity DTOs**: one file per protocol entity (`Product.php`, `Category.php`, …).
- `Generator/` — faker-based builders that produce populated models for tests/fixtures.

## Conventions (follow the existing files exactly)

- `declare(strict_types=1);`, namespace `Jtl\Connector\Core\Model`.
- Extend the right base: identity-bearing entities extend `AbstractIdentity`; translations
  extend `AbstractI18n`; images extend `AbstractImage`.
- **JMS Serializer via PHP 8 attributes** on `protected` typed properties:
  ```php
  #[Serializer\Type('integer')]
  #[Serializer\SerializedName('sort')]
  #[Serializer\Accessor(getter: 'getSort', setter: 'setSort')]
  protected int $sort = 0;
  ```
  Class-level `#[Serializer\AccessType(['value' => 'public_method'])]`; array/collection
  properties use `#[Serializer\Type('array<Jtl\Connector\Core\Model\Foo>')]` and often
  `AccessType 'reflection'`.
- **Fluent setters** return `self`/`$this`; getters are typed. `SerializedName` is the wire
  key (camelCase) — it is the contract, not the PHP property name.
- Every property has an initializer/default and a DocBlock `@var` (arrays document element type).
- **Properties are always concretely typed — never `mixed`.** PHPStan runs at level max and
  will reject `mixed`; use a concrete type, a union, or an array shape (`array<string, Foo>`),
  never a suppression.
- Validation helpers live in `Utilities/Validator` (`Validate`).

## Agentic rules

- **Adding a new model**: create the DTO, register its name in `Definition\Model`, add the
  matching `Definition\Controller`/`Action` wiring if it's addressable, add a `Generator/`
  builder, and add tests under `tests/src/Model`. Update `CHANGELOG.md`.
- **Never** change `SerializedName`, property types, or remove fields without a protocol reason
  — that's a breaking wire change. Flag it explicitly.
- Keep models as pure data — no I/O, no business logic. Behaviour belongs in controllers/services.

## Related

`Definition\Model` (name registry), `Serializer/` ((de)serialization), `Linker/` (identity
mapping), `Checksum/`, `tests/src/Model`.
