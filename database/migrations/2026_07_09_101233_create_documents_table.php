<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('documents', function (Blueprint $table) {


            $table->id();


            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();


            $table->string('title');


            $table->enum('type', [

                'CV',
                'Letter',
                'Report',
                'Certificate',
                'Other'

            ]);


            $table->string('file_path');


            $table->enum('status', [

                'Pending',
                'Approved',
                'Rejected'

            ])
            ->default('Pending');



            $table->text('comments')
                ->nullable();



            $table->timestamps();


        });
    }



    public function down(): void
    {
        Schema::dropIfExists('documents');
    }

};