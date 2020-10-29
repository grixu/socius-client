# Socius Client

Socius Client is easy to use client for Socius API

## Installation

Use the [composer(https://getcomposer.org/) to install it in your project.

```bash
composer require grixu/socius-client
```

## Basic usage

```php
SociusClient::product()->addFilter('name', 'SZKLO')->fetch()->getResults();
```

Use can use `SociusClient` facade to start make query to Socius API, then you can choose
which module you would like to query:
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
- `stock`

After calling one of those functions, facade will return a `SociusQuery` class. Which
provide methods:
- `addFilter('column_name', ...'values')`
- `addSort('column_name')`
- `addInclude('column_name')`
- `fetch(page_number)`
- `getResults`

#### Fetching all data
There is possible to fetch all data from module. To do so, just call `fetch()` without 
page param.

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email mg@grixu.dev instead of using the issue tracker.

## Credits

- [Mateusz Gostański](https://github.com/grixu)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
