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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete(); //amarando o conteudo ao id
            $table->string('title', 255);
            $table->string('slug', 255);
            $table->text('content');
            $table->timestamp("created_at")->default(DB::raw("CURRENT_TIMESTAMP"));
            $table->timestamp("updated_at")->default(DB::raw("CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP"));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
