<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('kanban_columns', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('position')->default(0);
            $table->string('color')->default('#3b82f6'); // biru default
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kanban_columns');
    }
};
