<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->string('recipeImage',64);
            $table->string('name');
            $table->text('description');
            $table->string('category');
            $table->float('netcarb',8,2);
            $table->decimal('netcarb_p',8,2);
            $table->float('totalcarb',8,2);
            $table->decimal('totalcarb_p',8,2);
            $table->float('netcal',8,2);
            $table->float('totalfat',8,2);
            $table->decimal('totalfat_p',8,2);
            $table->float('choles',8,2);
            $table->decimal('choles_p',8,2);
            $table->float('sod',8,2);
            $table->decimal('sod_p',8,2);
            $table->float('pot',8,2);
            $table->decimal('pot_p',8,2);
            $table->foreignId('buser_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('recipes');
        $table->dropForeign('recipes_buser_id_foreign');
    }
}
