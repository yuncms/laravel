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
            $table->increments('id');
            $table->string('username', 50)->unique()->nullable();//用户名。
            $table->string('email', 64)->unique()->nullable();//邮箱
            $table->string('phone')->unique()->nullable();//手机号码
            $table->string('avatar', 255)->nullable();//头像地址
            $table->string('gender', 10)->nullable();//性别。MALE：男，FEMALE：女。
            $table->boolean('identified')->default(false)->nullable();//是否经过实名认证。
            $table->boolean('disabled')->default(false)->nullable();//是否被禁用
            $table->decimal('withdrawable_balance')->default(0.00)->nullable();//可提现余额，可用于消费、提现、转账等。
            $table->decimal('available_balance')->default(0.00)->nullable();//可用余额，可用于消费。
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
