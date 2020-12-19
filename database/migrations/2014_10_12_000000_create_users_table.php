<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
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
            $table->string('name');
            $table->string('mobile')->nullable()->unique();
            $table->string('code')->nullable();
            $table->timestamp('code_expire_time')->nullable();
            $table->enum("type",['admin','manager','delivery-man','customer','subscriber'])->default('customer');
            $table->string('provider')->nullable();
            $table->string('provider_id')->nullable();
            $table->string('email')->unique()->nullable();
            $table->boolean('is_account_verified')->default(0);
            $table->timestamp('account_verified_at')->nullable();
            $table->boolean('enabled')->default(0);
            $table->unsignedBigInteger('blocked_by_user_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
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
}
