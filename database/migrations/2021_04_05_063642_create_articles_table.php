<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title', 250);
            $table->string('slug', 300);
            $table->text('cover');
            $table->integer("visibility")->default(1)->comment("0:hidden; 1:public");
            $table->longText('content');
            $table->text('summary')->nullable();
            $table->integer('visit')->default(0);
            $table->integer('created_by');
            $table->string('optional_1')->nullable();
            $table->string('optional_2')->nullable();
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
        Schema::dropIfExists('articles');
    }
}
