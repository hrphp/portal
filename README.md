Hampton Roads PHP Portal
==========================
[![Travis branch](https://img.shields.io/travis/hrphp/portal.svg?style=flat)](https://travis-ci.org/hrphp/portal) [![Coverage Status](http://img.shields.io/scrutinizer/coverage/g/hrphp/portal.svg?style=flat)](https://scrutinizer-ci.com/g/hrphp/portal/?branch=master) [![Code Quality](http://img.shields.io/scrutinizer/g/hrphp/portal.svg?style=flat)](https://scrutinizer-ci.com/g/hrphp/portal/?branch=master)

Introduction
------------
This is the code behind http://hrphp.org, the Hampton Roads PHP user group's website. It is powered by [ZF2](http://framework.zend.com/manual/2.0/en/user-guide/overview.html).

Installation
------------
### Build the project
In order to build this project, you'll need install both [Node.js](http://nodejs.org/) and [Composer](http://getcomposer.org). Fork and clone the repository to install it locally, then run the following to install the needed dependencies and build the project:

    cd my/project/dir
    git clone git://github.com/username/portal.git hrphp-portal
    cd hrphp-portal
    composer self-update && composer install
    ./vendor/bin/phing build 

### View the site locally
The simplest way to get started, if you are using PHP 5.4 or above, is to start the [internal PHP cli-server](http://php.net/manual/en/features.commandline.webserver.php) in the root directory:

    php -S 0.0.0.0:8080 -t public/ public/index.php

This will start the cli-server on port `8080`, and bind it to all network interfaces.
