<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('navlinks', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->bigInteger('parentId')->unsigned()->nullable();
            $table->string('link')->nullable();
            $table->timestamps();

            $table->foreign('parentId')->references('id')->on('navlinks')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('navlinks');
    }
};
