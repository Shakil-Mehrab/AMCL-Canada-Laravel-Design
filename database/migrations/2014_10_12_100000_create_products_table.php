<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePasswordResetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('password_resets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('brand');
            $table->string('sku');
            $table->string('name');
            $table->string('slug');
            $table->text('detail');
            $table->integer('quantity');
            $table->float('weight');
            $table->float('price');
            $table->float('sale_price');
            $table->boolean('status');
            $table->boolean('featured');
            $table->boolean('feature');
            $table->timestamps();
            $table->bigInteger('shop_id');
            $table->string('rating');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('password_resets');
    }
}
