<?php

/**
 * Configuration for database connection
 *
 */

$host       = "mysql";
$username   = "root";
$password   = "password";
$dbname     = "test";
$dsn        = "mysql:host=$host;dbname=$dbname";
$options    = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
              );