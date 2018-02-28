PHP CLI
================================

A PHP CLI support library.


## Basic Usage

#### 1. Improt library by composer.

```bash
composer require fenzland/cli
```

```php
require PROJECT_PATH.'/vendor/autoload.php';
```


#### 2. Build your commands.

```php
class FooCmd extends \Fenzland\CLI\ACmd
{
	protected function main( \Fenzland\CLI\IArgs$args ):int
	{
		# TODO code of your command.
	}
}
```


#### 3. Build your cli entry.

##### PlanA: To run a single command.

```bash
vim foo.php
```

```php
#!/usr/bin/env php
<?php

require PROJECT_PATH.'/vendor/autoload.php';

$cmd= new FooCmd;

exit( $cmd->run( $argv ) );
```

```bash
chmod +x foo.php
```


##### PlanB: To run dozens of commands.

```bash
vim app.php
```

```php
#!/usr/bin/env php
<?php

require PROJECT_PATH.'/vendor/autoload.php';

$app= new \Fenzland\CLI\App;

$app->regCmd( 'foo', FooCmd::class );
$app->regCmd( 'bar', BarCmd::class );
# ...

exit( $app->run( $argv ) );
```

```bash
chmod +x app.php
```
