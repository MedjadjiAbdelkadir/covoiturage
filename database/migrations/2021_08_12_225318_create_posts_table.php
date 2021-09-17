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
            $table->id();
            $table->integer('user_id') ->comment('The Id Of User To Post This Annonce'); 
            // Step 1
            $table->string('state_départ') ->comment('State Of Depart');
            $table->string('municipal_départ')->comment('Municipal Of Départ') ;

            $table->string('state_arrivé') ->comment('State Of Arrivé');
            $table->string('municipal_arrive')->comment('Municipal Of Arrivé') ;

            $table->date('date_départ')->comment('The Date Of Départ') ;
            $table->time('time_départ')->comment('The Time Of Départ') ;
            //  Step 2
            $table->string('make_voiture')->comment('The Make Of Voiture') ;
            $table->string('model_voiture')->comment('The Model Of Voiture') ;

            $table->integer('nbr_place')->comment('The Nbr de Place Disponible') ;
            $table->float('prix')->comment('The Prix Of The Place') ;

            $table->string('animale')->default('false');
            $table->string('smoking')->default('false');
            $table->string('music')->default('false');
            $table->string('climatiseur')->default('false');

            $table->string('photo_voiture' )->comment('The Photos Voiture') ;
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
