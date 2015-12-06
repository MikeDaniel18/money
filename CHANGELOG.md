# Changelog

All notable changes to `money` will be documented in this file. Updates should follow the [Keep a CHANGELOG](http://keepachangelog.com/) principles. This project adheres to [Semantic Versioning](http://semver.org/).

## [UNRELEASED]

## Removed
- Continuous integration testing for PHP 5.4, which is EOL

## [1.0.2] - 2015-12-05

### Changed
- Bump PHP requirement to >=5.5.0, as 5.4 is EOL.

## [1.0.1] - 2015-10-21

### Changed
- PSR1 / PSR2 compliance.

## [1.0.0] - 2015-07-10

### Added
- `Money` now throws more descriptive `MoneyException`s, for easier debugging.
- Each heading in this file now links to the appropriate github comparison.
- Explicitly state in this changelog that this project follows semantic versioning.

### Changed
- Tagging this as the first 1.0.0 release. However, there are no BC issues, so upgrading will not require any updates to your code.

## [0.1.1] - 2015-03-25

### Removed
- Removed unnecessary empty constructor from `Currency`.

### Fixed
- An empty array passed to `filterMonies` method caused a fatal 'undefined variable' error. This fix initializes the return value.

## 0.1.0 - 2015-03-04

### Added
- Initial commit.

[unreleased]: https://github.com/browner12/money/compare/v1.0.2...HEAD
[1.0.2]: https://github.com/browner12/money/compare/v1.0.1...v1.0.2
[1.0.1]: https://github.com/browner12/money/compare/v1.0.0...v1.0.1
[1.0.0]: https://github.com/browner12/money/compare/v0.1.1...v1.0.0
[0.1.1]: https://github.com/browner12/money/compare/v0.1.0...v0.1.1
