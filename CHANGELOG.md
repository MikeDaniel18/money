# Changelog

All Notable changes to `money` will be documented in this file. Updates should follow the [Keep a CHANGELOG](http://keepachangelog.com/) principles.

## UNRELEASED

## 0.1.1 - 2015-03-25

### Removed
- Removed unnecessary empty constructor from `Currency`.

### Fixed
- An empty array passed to `filterMonies` method caused a fatal 'undefined variable' error. This fix initializes the return value.

## 0.1.0 - 2015-03-04

### Added
- Initial commit.
