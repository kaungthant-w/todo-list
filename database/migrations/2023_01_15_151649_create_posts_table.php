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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            // $table->string('title')->nullable(true);
            // $table->longText("description")->nullable(true);
            $table->string('title');
            $table->longText("description");
            $table->integer("price")->nullable(true)->default(2000);
            $table->string("address")->nullable(true)->default("pyay");
            $table->double("rating")->nullable(true)->default(0);
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
        Schema::dropIfExists('posts');
    }
};
