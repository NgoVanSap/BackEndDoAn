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
            $table->string('tenKhoaHoc');
            $table->integer('giaCa');
            $table->integer('trangThai');
            $table->integer('idGiangVien');
            $table->integer('idDanhMuc');
            $table->integer('idNguoiDung');
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