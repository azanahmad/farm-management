<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('batches', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('name')->nullable();
            $table->unsignedBigInteger('code')->autoIncrement();
            $table->unsignedBigInteger('formula_id')->nullable();
            $table->unsignedBigInteger('quantity')->nullable();
            $table->timestamps();
        });

        DB::statement('ALTER TABLE batches AUTO_INCREMENT = 1001;');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('batches');
    }
};
