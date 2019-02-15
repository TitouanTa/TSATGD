<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTableMessage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('message', function(Blueprint $table)
        {
            $table->integer('id', true);
            $table->tinyInteger('validation');
            $table->string('auteur');
            $table->text('contenu');
            $table->string('mail');
            $table->string('telephone');
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
        Schema::drop('message');
    }
}
