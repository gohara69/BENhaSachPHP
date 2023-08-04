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
        if(!Schema::hasTable('sach')){
            Schema::create('sach', function (Blueprint $table) {
                $table->increments('id');
                $table->string('created_by');
                $table->dateTime('created_date');
                $table->string('modified_by');
                $table->dateTime('modified_date');
                $table->double('gia_ban');
                $table->double('gia_ban_dau');
                $table->text('gioi_thieu');
                $table->string('ngon_ngu');
                $table->integer('so_luong');
                $table->integer('so_trang');
                $table->string('ten_sach');
                $table->string('thumbnail');
                $table->unsignedInteger('the_loai_id');
                $table->foreign('the_loai_id')->references('id')->on('the_loai')->onDelete('cascade');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_sach');
    }
};
