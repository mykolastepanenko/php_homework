<?php

namespace Migrations\Classes;

use Illuminate\Database\Capsule\Manager;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Migrations\Interfaces\IMigration;

class CodeMigration implements IMigration
{
    public function migrate(): void
    {
        Manager::schema()->create('codes', function (Blueprint $table) {
            $table->string('code')->primary();
            $table->string('url');
        });
    }
}