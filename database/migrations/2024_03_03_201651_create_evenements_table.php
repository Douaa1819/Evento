<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('evenements', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->text('description');
            $table->unsignedBigInteger('category_id'); 
             $table->string('lieu');
            $table->integer('place_disponible');
            $table->boolean('validation');
            $table->boolean('admin_validation');
            $table->date('date');
            $table->string('image');
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
{
    Schema::table('evenements', function (Blueprint $table) {
        $table->dropForeign(['category_id']);
        $table->foreign('category_id')->references('id')->on('categories');
    });
}
};
