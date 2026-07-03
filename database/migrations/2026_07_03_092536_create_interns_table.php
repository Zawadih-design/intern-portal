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
    Schema::create('interns', function (Blueprint $table) {
        $table->id();

        // LOGIN ACCOUNT
        $table->foreignId('user_id')->constrained()->onDelete('cascade');

        // RELATIONSHIPS
        $table->foreignId('university_id')->constrained()->onDelete('cascade');
        $table->foreignId('department_id')->constrained()->onDelete('cascade');
        $table->foreignId('supervisor_id')->constrained()->onDelete('cascade');

        // INTERN DETAILS
        $table->string('student_number')->unique();
        $table->string('programme')->nullable();
        $table->integer('year_of_study')->nullable();

        $table->string('phone')->nullable();
        $table->string('emergency_contact')->nullable();

        $table->date('start_date')->nullable();
        $table->date('end_date')->nullable();

        $table->string('status')->default('active');

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('interns');
    }
};
