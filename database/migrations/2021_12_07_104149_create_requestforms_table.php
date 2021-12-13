<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestformsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requestforms', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id'); //name requester
            $table->string('name')->nullable(); //requester department
            $table->string('department')->nullable(); //requester department
            $table->string('service_type')->nullable(); 
            $table->string('remarks')->nullable(); //description
            $table->string('status')->nullable(); 
            $table->string('case_id')->nullable();
            $table->timestamp('date_registered')->nullable(); 
            $table->string('actions')->nullable(); //notes to the task accepter
            $table->string('assign_to')->nullable(); 
            $table->string('approved_by')->nullable(); //hod requestor name
            $table->timestamp('approved_at')->nullable();
            $table->string('verified_by')->nullable(); //admin IT
            $table->timestamp('verified_at')->nullable();
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
        Schema::dropIfExists('requestforms');
    }
}
