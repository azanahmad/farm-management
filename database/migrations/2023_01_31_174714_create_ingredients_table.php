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
        Schema::create('ingredients', function (Blueprint $table) {
            $table->uuid('id');
            $table->unsignedBigInteger('code')->autoIncrement();
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->float('price')->nullable();
            $table->float('quantity')->nullable();
            $table->unsignedBigInteger('quantity_alert')->nullable();
            $table->timestamps();
        });

        DB::statement('ALTER TABLE ingredients AUTO_INCREMENT = 1001;');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingredients');
    }
};
