<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donners', function (Blueprint $table) {
            $table->id();
            $table->string('first_name',100);
            $table->string('last_name',100);
            $table->string('phone',50);
            $table->string('email',100);
            $table->string('city',100);
            $table->string('district',100);
            $table->string('address');
            $table->string('profile_image');
            $table->integer('age');
            $table->date('dob');
            $table->string('donner_job',100);
            $table->integer('height');
            $table->float('weight');
            $table->integer('blood_group')->comment('1=>A+ve,2=>B+ve,3=>AB+ve,4=>o+ve,5=>A-ve,6=>B-ve,7=>AB-ve,8=>O-ve');
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
        Schema::dropIfExists('donners');
    }
}
