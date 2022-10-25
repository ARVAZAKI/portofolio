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
        Schema::create('project', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("id_siswa")->unsigned();
            $table->foreign("id_siswa")->references("id")->on("siswa")
            ->onDelete("cascade")
            ->onUpdate("cascade");
            $table->string("nama_project");
            $table->date("tanggal");
            $table->string("deskripsi");
            $table->char("foto");
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
        Schema::dropIfExists('project');
    }
};
