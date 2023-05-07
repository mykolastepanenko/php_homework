<?php

namespace Migrations\Classes;

use Migrations\Interfaces\IMigration;

class Migration implements IMigration
{
    /**
     * @param IMigration[] $services
     */
    public function __construct(
        protected array $services
    )
    {
    }

    public function migrate(): void
    {
        foreach ($this->services as $service) {
            $service->migrate();
        }
    }
}