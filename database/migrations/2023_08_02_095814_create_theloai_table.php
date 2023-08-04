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
        if(!Schema::hasTable('the_loai')){
            Schema::create('the_loai', function (Blueprint $table) {
                $table->increments('id');
                $table->string('created_by');
                $table->dateTime('created_date');
                $table->string('modified_by');
                $table->dateTime('modified_date');
                $table->string('ten_the_loai');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('theloai');
    }
};
