# Ride: CMS CLI

This module adds various CMS commands to the Ride CLI.

## Commands

### cms clean up

This widget cleans up all properties and widget instances which are no longer used.

**Syntax**: ```cms clean up [--force]```
- ```--force```: Add the force flag to actually remove the unused properties

**Alias**: ```ccu```

### cms sitemap

This command generates the sitemap.xml files for all sites.

**Syntax**: ```cms sitemap```

**Alias**: ```csm```

## Related Modules 

- [ride/app](https://github.com/all-ride/ride-app)
- [ride/cli](https://github.com/all-ride/ride-cli)
- [ride/lib-cli](https://github.com/all-ride/ride-lib-cli)
- [ride/lib-cms](https://github.com/all-ride/ride-lib-cms)
- [ride/web](https://github.com/all-ride/ride-web)
- [ride/web-cms](https://github.com/all-ride/ride-web-cms)

## Installation

You can use [Composer](http://getcomposer.org) to install this application.

```
composer require ride/cli-cms
```
