<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->increments('id')->comment('ID');
            $table->unsignedBigInteger('user_id');
            $table->string('name',20);
            $table->string('picture')->nullable();
            $table->integer('amount')->nullable();
            $table->integer('activity_frequency')->nullable();
            $table->string('keyword')->nullable();
            $table->text('content',560)->nullable(); 
            $table->timestamps();
            $table->foreign('user_id') //外部キーの宣言
            ->references('id') //参照先
            ->on('users') //参照テーブル
            ->onDelete('cascade'); //参照テーブルカラムが消えたら同時に消す
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('groups');
    }
}
