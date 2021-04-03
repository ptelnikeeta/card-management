<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AlterCardsAddCreateUpdated extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $sql= "
            ALTER TABLE `cards` ADD `created_at` TIMESTAMP NULL AFTER `slug`, ADD `updated_at` TIMESTAMP NULL AFTER `created_at`;
        ";
        DB::statement($sql);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
