#!/usr/bin/env php
<?php
chdir(__DIR__);

fputs(STDOUT, "Running PHP CodeSniffer\n");
passthru('./vendor/bin/phpcs --standard=PSR2 --extensions=php module public', $returnStatus);
if ($returnStatus !== 0) {
    exit(1);
}
