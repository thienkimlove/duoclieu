<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeTablePostVarCharlength extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->string('title', 191)->change();
            $table->string('seo_title', 191)->change();
            $table->string('slug', 191)->change();
            $table->string('image', 191)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->string('title', 255)->change();
            $table->string('seo_title', 255)->change();
            $table->string('slug', 255)->change();
            $table->string('image', 255)->change();
        });
    }
}
