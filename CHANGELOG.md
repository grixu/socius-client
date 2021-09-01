# Changelog
All notable changes to this project will be documented in this file.

The format based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## 2.5.1 - 2021-09-01

- Added PHPStan
- Added PHP_CS_Fixer
- Added config for PHPStan & PHP_CS_Fixer
- Added PHP Insights
- Added separate pipeline for PHP Insights
- Code style fixed
- Bug fixed in RelationshipParser

## 2.5.0 - 2021-05-25

- Updated `synchronizer` to v4.2.0
- Updated `ApiLoader` due to changes in synchronizer
- Updated `api-client` to v3.3.3

## 2.4.0 - 2021-05-21

- Updated URL paths
- Updated `api-client` to v3.3
- Updated to `synchronizer` v4

## 2.3.0 - 2021-04-30

- Updated `relationship-data-transfer-object` 
- DTO v3
- Created Parsers & Loaders for easy using Socius API in Laravel project which need to sync data

## 2.2.2 - 2021-03-30

- Updated dependencies

## 2.2.1 - 2021-03-30

- Updated API urls in config file due to changes in Socius

## 2.2.0 - 2021-03-30

- Added `_dataset` requests which was added in Socius v3.2.0

## 2.1.0 - 2021-03-09

- Added order & order_element modules

## 2.0.0 - 2021-02-12

- Completely rebuild project
- Now uses API Client 2.0 (`grixu/api-client`)
- Require PHP8
- Much simpler & more tolerant for changes in filters, includes, sorts names due to moves allowed values to config

## 1.3.2 - 2021-01-26

- An added getter for RawResults in SociusQuery

## 1.3.1 - 2021-01-26

- Bug fixed in DTO Collections (problem after update spatie/data-transfer-objects to 2.7.0)

## 1.3.0 - 2021-01-26

- Use of `grixu/socius-models` 
- Refactor actual DTOs to extend those from `grixu/socius-models`
- Removed Factory (for DTOs), instead use `grixu/data-factories`
- An updated filter, include and sort enums to used camelCased params
- An updated actions to parse data from Socius v 3.0 
- Updated to PHP8

## 1.2.0 - 2021-01-04

- Using `grixu/api-client` instead fo CallApiAction
- Code cleaned in tests and SociusQuery
- Moved allowed filters, includes, sorts & parsers into config

## 1.1.1 - 2020-12-17

- Add 2 new filters for Product

## 1.1.0 - 2020-12-02

- Updated filters (changes in Socius 2.3.0)
- Updated tests: unified names, reduced PHPDoc
- New method in SociusQuery - `getUrl` which return ready to use URL for an API call

## 1.0.4 - 2020-11-19

- Added support for a new field (simplyLeaseCategory) in products

## 1.0.3 - 2020-11-06

- Added support for Socius 2.0 API

## 1.0.2 - 2020-11-02

- Added support for Eshop price in Product

## 1.0.1 - 2020-11-02

- Bugfix in AddSortAction

## 1.0.0 - 2020-10-29
- Initial release
