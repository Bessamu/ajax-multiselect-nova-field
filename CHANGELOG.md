# Changelog
All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [1.2.3]

### Fixed

- Field fixes

## [1.2.2]

### Added

- field.js.LICENSE.txt

### Changed

- Update dependents

### Fixed

- JSON.parse problems [#12](https://github.com/Bessamu/ajax-multiselect-nova-field/pull/12/files)

## [1.2.1]

### Changed
- Bump ssri from 6.0.1 to 6.0.2

## [1.2.0]

### Added

- Field options `orderBy()`. Now you can oreder your output data by column value.

### Changed

- README.md

### Fixes

- yarn.lock added
- for `.multiselect__content-wrapper` position changed on `relative!important` for fix problem with last field on page, value wasn't visible on page.

## [1.1.0] - 2021-01-20

### Added

- Field options `queryWhere()`, [more here](https://github.com/Bessamu/ajax-multiselect-nova-field/issues/2).

## [1.0.0] - 2020-03-03

### Added

- Field options `optionsModel()` and `optionsLabel()`

### Removed

- Field option `model()`

## [1.0.0-alpha.2] - 2020-02-27

### Changed

- Now values saved as array of ids

## [1.0.0-alpha.1] - 2020-02-27

### Added

- Gif for the documentation

### Changed

- Update documentation  

## [1.0.0-alpha] - 2020-02-26

### Added

- Package "[vue-multiselect](https://vue-multiselect.js.org/)" work with ajax requests
- Data saved as json string into db table
- Field options for custom model id
