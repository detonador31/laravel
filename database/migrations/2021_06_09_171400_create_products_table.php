<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId(column: 'category_id')->constrained();            
            $table->string(column: 'name');
            $table->text(column: 'description');        
            $table->boolean(column: 'exclusive');                  
            $table->timestamps();
            $table->softDeletes();
            
            // Código abaixo só deve ser usando caso de problema para criar a
            // relação com o uso do método constrained()
            // $table->foreign(columns: 'category_id')
            //       ->references(column: 'id')
            //       ->on(table: 'categories');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
