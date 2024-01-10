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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('locale')->default('no');
            $table->string('social_id')->unique()->nullable();
            $table->string('social_type')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('avatar_path')->nullable();
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamp('last_active_at')->nullable();
            $table->timestamp('anonymized_at')->nullable();
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
        Schema::dropIfExists('users');
    }
};
