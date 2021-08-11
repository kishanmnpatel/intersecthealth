<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id()->unique();
            $table->string('name')->unique();
            $table->string('excerpt')->nullable();
            $table->text('description')->nullable();
            $table->string('picture')->nullable();
            $table->foreignId('category_id')->constrained('categories');
            $table->string('status')->nullable();
            $table->date('date')->nullable();
            $table->boolean('show_on_homepage')->default(0);
            $table->text('options')->nullable()->default(null);
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
}
