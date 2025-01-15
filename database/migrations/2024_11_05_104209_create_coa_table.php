<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('coa', function (Blueprint $table) {
            $table->id(); 
            $table->string('code')->unique();
            $table->string('name');
            $table->string('type');
            $table->integer('level')->default(1);
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->string('group');
            $table->string('control')->default('active');
            $table->string('currency', 3)->default('USD');
            $table->string('department')->nullable();
            $table->enum('gain_loss', ['gain', 'loss', null])->nullable();
            $table->foreign('parent_id')->references('id')->on('coa')->onDelete('SET NULL');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('coa');
    }
};
