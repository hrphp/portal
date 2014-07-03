Hampton Roads PHP Website
=======================
[![Build Status](https://travis-ci.org/hrphp/portal.png)](https://travis-ci.org/hrphpmeetup/portal)  

Introduction
------------
This is the code that powers http://hrphp.org, the Hampton Roads PHP user group's website. It is powered by [ZF2](http://framework.zend.com/manual/2.0/en/user-guide/overview.html).

Installation
------------
Fork and clone the repository to install it locally, then run [composer](http://getcomposer.org) to install the needed dependencies:

    cd my/project/dir
    git clone git://github.com/username/portal.git hrphp-portal
    cd hrphp-portal
    composer self-update
    composer install

Web Server Setup
----------------

### PHP CLI Server

The simplest way to get started, if you are using PHP 5.4 or above, is to start the internal PHP cli-server in the root directory:

    php -S 0.0.0.0:8080 -t public/ public/index.php

This will start the cli-server on port 8080, and bind it to all network interfaces.

**Note: ** The built-in CLI server is *for development only*.

### Apache Setup

To setup `apache`, setup a virtual host to point to the `public/` directory of the
project and you should be ready to go! Use the provided [example.conf.dist](example.conf.dist) file as a template.
