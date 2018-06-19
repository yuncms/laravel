<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->string('name', 50)->index();//用户昵称。
            $table->string('email', 64)->unique();
            $table->tinyInteger('identified')->default(0);
            $table->tinyInteger('disabled')->default(0);
            $table->decimal('withdrawable_balance')->default(0.00);//可提现余额，可用于消费、提现、转账等。
            $table->decimal('available_balance')->default(0.00);//可用余额，可用于消费。
            $table->string('password', 100);
            $table->string('access_token', 100)->nullable();
            $table->rememberToken();
            $table->softDeletes();
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
}
