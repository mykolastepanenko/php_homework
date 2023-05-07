<?php

namespace Components\Database\Eloquent;

use Components\Database\Interfaces\IDatabaseInitializer;
use Illuminate\Database\Capsule\Manager as Capsule;

class ActiveRecordInitializer implements IDatabaseInitializer
{
    protected Capsule $capsule;

    public function init(): object
    {
        $this->capsule = new Capsule();

        $this->capsule->addConnection([
            'driver' => $_ENV['DB_DRIVER'],
            'host' => $_ENV['DB_HOST'],
            'database' => $_ENV['DB_NAME'],
            'username' => $_ENV['DB_USER'],
            'password' => $_ENV['DB_PASSWORD'],
            'charset' => $_ENV['DB_CHARSET'],
            'collation' => $_ENV['DB_COLLATION'],
            'prefix' => $_ENV['DB_PREFIX'],
        ]);

        $this->capsule->setAsGlobal();
        $this->capsule->bootEloquent();

        return $this->capsule;
    }
}