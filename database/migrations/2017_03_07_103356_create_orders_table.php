<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateOrdersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('orders',function(Blueprint $table){
            $table->increments("id");
            $table->integer("user_id")->references("id")->on("user")->nullable();
            $table->text("body")->nullable();
            $table->string("status")->nullable();
            $table->string("phone");
            $table->string("contacts")->nullable();
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
        Schema::drop('orders');
    }

}