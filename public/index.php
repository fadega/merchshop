<?php
session_start();

/**
 * The line of code requires all the necessary files for the index file to load its view(home.php)
 */
require_once '../app/initializer.php';

/**
 * App is responsible to instantiate all classes after processing the given url
 * If not corresponding contoller is found, the default page(home) is loaded
 */
$app = new App();

