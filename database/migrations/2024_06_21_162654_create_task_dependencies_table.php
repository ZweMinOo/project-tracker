<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *     dependency_id INT PRIMARY KEY AUTO_INCREMENT,
    dependent_task_id INT,
    dependency_task_id INT,
    FOREIGN KEY (dependent_task_id) REFERENCES Tasks(task_id),
    FOREIGN KEY (dependency_task_id) REFERENCES Tasks(task_id)
     */
    public function up(): void
    {
        Schema::create('task_dependencies', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('dependent_task_id')->nullable();
            $table->unsignedBigInteger('dependency_task_id')->nullable();
            $table->timestamps();

            $table->foreign('dependent_task_id')->references('id')->on('tasks')->onDelete('no action');
            $table->foreign('dependency_task_id')->references('id')->on('tasks')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('task_dependencies');
    }
};
