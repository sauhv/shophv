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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->integer('amount');
            $table->integer('price');
            $table->string('image');
            $table->string('thumbnails');
            $table->text('description');
            $table->text('shortDes');
            $table->boolean('hot')->default(0);
            $table->integer('views')->default(0);
            $table->boolean('hidden')->default(1);
            $table->timestamps();
            $table->bigInteger('model_id')->unsigned()->index();
            $table->foreign('model_id')->references('id')->on('models')->onDelete('cascade');
            $table->bigInteger('category_id')->unsigned()->index();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
