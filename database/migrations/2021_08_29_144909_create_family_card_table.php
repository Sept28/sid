<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamilyCardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('family_cards', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('family_number')->unique();
            $table->integer('villager_id');
            $table->string('address');
            $table->string('village');
            $table->string('sub_district');
            $table->string('district');
            $table->string('province');
            $table->integer('postal_code');
            $table->string('family_photo');

            $table->softDeletes();
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
        Schema::dropIfExists('family_cards');
    }
}
