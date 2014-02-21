#!/usr/bin/env php
<?php
chdir(__DIR__);

fputs(STDOUT, "Running composer install\n");
$returnStatus = null;
passthru('composer install --dev', $returnStatus);
if ($returnStatus !== 0) {
    exit(1);
}

