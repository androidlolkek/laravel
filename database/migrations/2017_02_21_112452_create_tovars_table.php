<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateTovarsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('tovars',function(Blueprint $table){
            $table->increments("id");
            $table->string("name");
            $table->text("body")->nullable();
            $table->string("picture")->nullable();
            $table->integer("categories_id")->references("id")->on("categories")->nullable();
            $table->enum("showhide", ["show", "hide", ])->nullable();
            $table->string("url")->nullable();
            $table->integer("user_id")->references("id")->on("user")->nullable();
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
        Schema::drop('tovars');
    }

}