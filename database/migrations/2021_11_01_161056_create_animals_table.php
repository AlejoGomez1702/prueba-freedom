<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('dangerousness', ['low', 'medium', 'high']);
            $table->unsignedSmallInteger('age');
            $table->timestamps();

            // Un animal pertenece a un corral.
            $table->foreignId('corral_id')
                                        ->nullable()
                                        ->constrained()
                                        ->onUpdate('cascade')
                                        ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('animals');
    }
}
