<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            // creiamo la chiave esterna
            $table->unsignedBigInteger('type_id');

            // definiamo la colonna come chiave esterna
            $table->foreign('type_id')->references('id')->on('types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            // Eliminiamo la chiave sterna
            $table->dropForeign('projects_types_id_foreign');

            // eliminiamo  la colonna

            $table->dropColumn('type_id');
        });
    }
};
