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
        Schema::create('buskets', function (Blueprint $table) {
            $table->id();
            $table->Integer('Number')->default(1);
            $table->Integer('Count')->default(1);
            $table->string('UserName');
            $table->double('price');
            $table->double('totalcost');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buskets');
    }
};
