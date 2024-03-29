# Socius Client

Socius Client is easy to use client for Socius API

## Installation

Use the [composer(https://getcomposer.org/) to install it in your project.

```bash
composer require grixu/socius-client
```

## Basic usage

Start with fill you `.env` file with proper data for connection with Socius API:

```dotenv
SOCIUS_BASE_URL=""
SOCIUS_OAUTH=""
SOCIUS_CLIENT_ID=""
SOCIUS_CLIENT_KEY=""
```

Then you can use facade `SociusClient` and simply make call to API:

```php
use Grixu\SociusClient\SociusClientFacade as SociusClient;

$query = SociusClient::product()->compose()->addFilter('name', 'SZKLO');
$query->fetch();

$data = $query->parse(DtoClass::class);
```

Use can use `SociusClient` facade to start make query to Socius API, by choosing which module you would like to query:

- `product`
- `productType`
- `category`
- `brand`
- `description`
- `language`
- `operator`
- `operatorRole`
- `branch`
- `customer`
- `warehouse`
- `order`
- `order_element`

After call one of those functions, you can add filters to query or sorting or request related data via
calling `compose()` and one of below methods:

- `addFilter('column_name', ...'values')`
- `addSort('column_name')`
- `addInclude('column_name')`

After that just call `fetch(page_number)` (or without `page_number` to fetch all data) and `getResults`
to receive `DataTransferObjectCollection` object with received data from Socius API.

You can also make a *relationship* call which download extra data which contains relationship details between models. It's easy to use them via calling one of those methods on `SociusClient`:

- `product_relationship`
- `category_relationship`
- `description_relationship`
- `operator_relationship`
- `warehouse_relationship`
- `stock_relationship`
- `order_relationship`
- `order_element_relationship`

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email mateusz.gostanski@gmail.com instead of using the issue tracker.

## Credits

- [Mateusz Gostański](https://github.com/grixu)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
