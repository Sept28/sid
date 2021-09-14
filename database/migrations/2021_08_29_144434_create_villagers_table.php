<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVillagersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('villagers', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('id_number')->unique();
            $table->integer('family_card_id')->nullable();
            $table->string('name');
            $table->integer('age');
            $table->date('birth_date');
            $table->string('birth_place');
            $table->enum('gender', ['L','P']);
            $table->enum('blood_type', ['A', 'B', 'AB', 'O']);
            $table->longText('address');
            $table->enum('religion', ['islam', 'kristen', 'hindu', 'budha', 'konguchu']);
            $table->enum('marital_status', ['kawin', 'belum kawin']);
            $table->enum('citizenship', ['WNI', 'WNA']);
            $table->enum('education', ['SD', 'SMP', 'SMA', 'D3', 'S1', 'S2', 'S3']);
            $table->string('parent');
            $table->string('id_photo');
            $table->enum('kinship', ['kepala', 'istri', 'anak', 'menantu', 'mertua']);
            $table->string('status')->default('ada');

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
        Schema::dropIfExists('villagers');
    }
}
