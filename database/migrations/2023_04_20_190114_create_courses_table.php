<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('tenKhoaHoc');
            $table->string('moTa');
            $table->string('linkVideo');
            $table->integer('giaCa');
            $table->integer('trangThai');
            $table->integer('idGiangVien');
            $table->integer('idNguoiDung');
            $table->unsignedBigInteger('idDanhMuc');
            $table->foreign('idDanhMuc')->references('id')->on('categories');
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
        Schema::dropIfExists('courses');
    }
}
