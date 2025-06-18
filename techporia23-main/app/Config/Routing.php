<?php namespace Config;

use CodeIgniter\Config\BaseConfig;

class Routing extends BaseConfig {
    public $defaultController = 'Home';
    public $defaultMethod = 'index';
    public $defaultNamespace = 'App\Controllers';
    public $translateURIDashes = false;
    public $override404 = null; // Can be a closure or a controller/method string
    public $autoRoute = true;
    public $routeFiles = []; // Array of additional route files
    public $prioritize = false; // Whether to sort routes by priority
    public $useSupportedLocalesOnly = false; // Limit routes to supported locales
}