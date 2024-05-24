# Collection

Tool for write logs to file

## Requiments

PHP >= 8.0

## Installation

Using [composer](https://getcomposer.org/)

```shell
composer require xtompie/logger
```

## Docs

```php
<?php

use Xtompie\Logger\Logger;
$logger = new Logger('./var/log', 'api');
$logger('Hello world');
```

```php
<?php

use Xtompie\Logger\Logger;

class Api
{
    public function __construct(
        protected Logger $logger,
    ) {
        $this->logger = $logger->withName('api');
    }

    public function doSomething()
    {
        $this->logger->__invoke('Hello world');
    }
}
```
