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
        Schema::create('otps', function (Blueprint $table) {
            $table->id();
            $table->string('identifier')->unique();
            $table->string('token');
            $table->timestamp('validity');
            $table->boolean('valid')->default(true);
            $table->tinyInteger('type')->default(1);
            $table->unsignedBigInteger('resend_ref_id')->nullable();
            $table->foreign('resend_ref_id')
                ->references('id')
                ->on('otps')
                ->onDelete('cascade');
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
        Schema::dropIfExists('otps');
    }
};
