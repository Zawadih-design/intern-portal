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
    Schema::create('tasks', function (Blueprint $table) {

        $table->id();

        $table->foreignId('intern_id')
              ->constrained()
              ->cascadeOnDelete();

        $table->foreignId('supervisor_id')
              ->constrained()
              ->cascadeOnDelete();

        $table->string('title');

        $table->text('description');

        $table->enum('priority', [
            'Low',
            'Medium',
            'High'
        ])->default('Medium');

        $table->enum('status', [
    'Pending',
    'In Progress',
    'Submitted',
    'Approved',
    'Completed'
])->default('Pending');

        $table->date('deadline');

        $table->timestamp('completed_at')->nullable();

        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
