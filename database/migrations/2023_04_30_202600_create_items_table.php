<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->string('item_name');
            $table->decimal('price');
            $table->longText('description');
            $table->string('item_condition');
            $table->string('item_type');
            $table->string('item_photo');
            $table->string('owner_name');
            $table->string('contact_number');
            $table->longText('address');
            $table->longText('location');
            $table->enum('status', ['Publish', 'Unpublish'])->default('Unpublish');
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
        Schema::dropIfExists('items');
    }
};
