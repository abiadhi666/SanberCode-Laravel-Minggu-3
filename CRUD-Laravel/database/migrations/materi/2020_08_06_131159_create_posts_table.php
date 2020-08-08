<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title'); //ini seperti typedata VarChar di SQL. lihat web laravel biar lebih jelas
            $table->longText('body'); //ini seperti typedata longText di SQL 
           /* 
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');      
            //sebelumnya kita lupa memasukkan FK, lalu menambahkan column baru untuk FK. 
            //but, yang terjadi adalah migration tidak melakukan apa2. karena dia berbeda dengan git server yang bisa berubah ketika ada perubahan
            //sehingga harus dibuat table migration baru dengan cara 
                //  $php artisan make:migration add_user_id_to_posts
            */
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
        Schema::dropIfExists('posts');
    }
}
