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
    Schema::create('students', function (Blueprint $table) {
        $table->id('student_id'); 
        $table->string('student_name');
        $table->string('gender');
        $table->date('dob'); 
        $table->string('enrollment'); 
        $table->date('enrollment_date');
        $table->text('description')->nullable();
        
        $table->unsignedBigInteger('dept_id');
        $table->foreign('dept_id')->references('dept_id')->on('departments')->onDelete('cascade');
        
        $table->timestamps();
    });
}
};
