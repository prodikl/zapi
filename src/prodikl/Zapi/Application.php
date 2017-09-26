<?php
/**
 * Created by PhpStorm.
 * User: family
 * Date: 8/30/2017
 * Time: 11:38 PM
 */

namespace prodikl\Zapi;

use Illuminate\Database\Capsule\Manager;
use PDO;
use Silex\Provider\ServiceControllerServiceProvider;

/**
 * Class Application
 *
 * The ZAPI application. By default uses Controllers.
 *
 * @package prodikl\Zapi
 */
abstract class Application extends \Silex\Application
{
    /** @var Routes         The Routes instance */
    private $routes;

    /**
     * Returns the DatabaseConfig object for Eloquent.
     *
     * @return DatabaseConfig
     */
    public abstract function getDatabaseConfig() : DatabaseConfig;

    /**
     * Whether or not this system should boot the database connection (Eloquent) or not.
     *
     * @return bool
     */
    public abstract function usesDatabase() : bool;

    /**
     * Application constructor.
     *
     * @param Routes    $routes         A Route object that defines routes
     * @param array     $values         Additional data to set to this Application
     */
    public function __construct(Routes $routes, array $values = []){
        parent::__construct($values);

        // SERVICES
        $this->register(new ServiceControllerServiceProvider());

        // ROUTES
        $this->routes = $routes;
        $this->addRoutes();

        // DATABASE
        if($this->usesDatabase()){
            $this->setUpEloquent();
        }
    }

    /**
     * Adds the routes from the Routes instance
     */
    private function addRoutes() {
        foreach($this->routes->getRoutes() as $route){
            $this->{$route->method}($route->route, $route->to);
        }
    }

    /**
     * Boots eloquent using the config found in $this->getDatabaseConfig()
     */
    private function setUpEloquent() {
        $databaseConfig = $this->getDatabaseConfig();
        $capsule = new Manager();
        $capsule->addConnection([
            'host' => $databaseConfig->host,
            'port' => $databaseConfig->port,
            'database' => $databaseConfig->database,
            'username' => $databaseConfig->username,
            'password' => $databaseConfig->password,
            'driver' => $databaseConfig->driver,
            'charset' => $databaseConfig->charset,
            'collation' => $databaseConfig->collation
        ]);
        $capsule->setFetchMode(PDO::FETCH_ASSOC);
        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }
}