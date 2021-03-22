<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AlterCategoryNameToUnique extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('passports', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('date');
            $table->string('email')->unique();
            $table->integer('number');
            $table->string('office');
            $table->string('filename');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('notification_categories', function ($table) {
            $table->dropUnique('notification_categories_name_unique');
        });
    }
}
