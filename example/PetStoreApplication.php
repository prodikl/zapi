<?php

use prodikl\Zapi\DatabaseConfig;

/**
 * Created by PhpStorm.
 * User: KeithDesktop
 * Date: 9/25/2017
 * Time: 10:09 PM
 */

class PetStoreApplication extends \prodikl\Zapi\Application {

    /**
     * Returns the DatabaseConfig object for Eloquent.
     *
     * @return DatabaseConfig
     */
    public function getDatabaseConfig(): DatabaseConfig {
        return DatabaseConfig::empty();
    }

    /**
     * Whether or not this system should boot the database connection (Eloquent) or not.
     *
     * @return bool
     */
    public function usesDatabase(): bool {
        return false;
    }
}