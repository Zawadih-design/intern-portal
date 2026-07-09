<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('performance_reviews', function (Blueprint $table) {

            $table->id();


            $table->foreignId('intern_id')
                ->constrained()
                ->cascadeOnDelete();


            $table->foreignId('supervisor_id')
                ->constrained()
                ->cascadeOnDelete();



            $table->integer('technical_score');

            $table->integer('communication_score');

            $table->integer('teamwork_score');

            $table->integer('problem_solving_score');

            $table->integer('professionalism_score');



            $table->integer('overall_score');



            $table->text('comments')
                ->nullable();



            $table->date('review_date');


            $table->timestamps();


        });
    }


    public function down(): void
    {
        Schema::dropIfExists('performance_reviews');
    }

};