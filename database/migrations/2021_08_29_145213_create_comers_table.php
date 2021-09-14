<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comers', function (Blueprint $table) {
            $table->id();

            $table->integer('villager_id');
            $table->date('arrival_date');
            $table->integer('id_number')->unique();
            $table->string('name');
            $table->integer('age');
            $table->date('birth_date');
            $table->date('birth_place');
            $table->enum('gender', ['L', 'P']);
            $table->enum('blood_type', ['A', 'B', 'AB', 'O']);
            $table->longText('address');
            $table->enum('religion', ['islam', 'kristen', 'hindu', 'budha', 'konguchu']);
            $table->enum('marital_status', ['kawin', 'belum kawin']);
            $table->enum('citizenship', ['WNI', 'WNA']);
            $table->enum('education', ['SD', 'SMP', 'SMA', 'D3', 'S1', 'S2', 'S3']);
            $table->string('parent');

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
        Schema::dropIfExists('comers');
    }
}
