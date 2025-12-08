<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('kanban_tickets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kanban_column_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->integer('position')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kanban_tickets');
    }
};
