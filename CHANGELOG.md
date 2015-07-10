# Changelog

All notable changes to `money` will be documented in this file. Updates should follow the [Keep a CHANGELOG](http://keepachangelog.com/) principles. This project adheres to [Semantic Versioning](http://semver.org/).

## [UNRELEASED]

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

## [0.1.0] - 2015-03-04

### Added
- Initial commit.

[unreleased]: https://github.com/browner12/money/compare/v1.0.0...HEAD
[1.0.0]: https://github.com/browner12/money/compare/v0.1.1...v1.0.0
[0.1.1]: https://github.com/browner12/money/compare/v0.1.0...v0.1.1
