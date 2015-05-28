<?php
/**
 * This file is part of the hrphp-portal package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

error_reporting(E_ALL | E_STRICT);
chdir(dirname(__DIR__));

require_once 'vendor/autoload.php';

ApplicationTest\Bootstrap::init();
