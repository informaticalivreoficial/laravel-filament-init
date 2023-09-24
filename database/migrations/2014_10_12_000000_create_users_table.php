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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('email1')->nullable();
            $table->string('avatar')->nullable();            
            $table->boolean('status')->default(true);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();

            /** address */
            $table->string('cep')->nullable();
            $table->string('rua')->nullable();
            $table->string('num')->nullable();
            $table->string('complemento')->nullable();
            $table->string('bairro')->nullable();
            $table->string('uf')->nullable();
            $table->string('cidade')->nullable();

            /** contact */
            $table->string('telefone')->nullable();
            $table->string('celular')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('telegram')->nullable();

            /** Redes Sociais */
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('vimeo')->nullable();
            $table->string('youtube')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('instagram')->nullable();
            $table->string('fliccr')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
