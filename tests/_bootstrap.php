<?php
// This is global bootstrap for autoloading

\Codeception\Util\Autoload::registerSuffix('Group', __DIR__ . DIRECTORY_SEPARATOR . '_groups');
\Codeception\Util\Autoload::register('Joomla3', 'Page', __DIR__ . DIRECTORY_SEPARATOR . '_pages' . DIRECTORY_SEPARATOR . 'joomla3');
\Codeception\Util\Autoload::register('Joomla3\installation\installation', 'Page', __DIR__. '/_pages/joomla3/installation');
