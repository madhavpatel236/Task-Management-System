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
        Schema::create('task_list', function (Blueprint $table) {
            $table->id();
            $table->string('manager_name');
            $table->string('title');
            $table->string('description');
            $table->string('priority');
            $table->dateTime('due date');
            $table->string('assignees');
            $table->string('status');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        //
    }
};
