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
            $table->string('name', 50)->index();//�û��ǳơ�
            $table->string('email', 64)->unique();
            $table->tinyInteger('identified')->default(0);
            $table->tinyInteger('disabled')->default(0);
            $table->decimal('withdrawable_balance')->default(0.00);//�����������������ѡ����֡�ת�˵ȡ�
            $table->decimal('available_balance')->default(0.00);//���������������ѡ�
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
