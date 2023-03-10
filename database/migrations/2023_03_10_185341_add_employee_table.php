<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('staffno')->unique();
            $table->string('staffnames');
            $table->string('idno',10);
            $table->string('gender',10);
            $table->smallInteger('status')->default(1);
            $table->string('pinno')->nullable();
            $table->string('nhifno')->nullable();
            $table->string('nssfno')->nullable();
            $table->smallInteger('payetype')->default(1);
            $table->smallInteger('no_relief')->default(1);
            $table->smallInteger('nhif_relief')->default(1);
            $table->string('department')->nullable();
            $table->date('dob');
            $table->date('emp_date');
            $table->date('term_date')->nullable();
            $table->string('cellphone')->default('');
            $table->string('email')->default('');
            $table->string('pobox')->default('');
            $table->string('city')->default('');
            $table->string('nationality')->default('');
            $table->string('marital')->default('');
            $table->string('paymode')->default('');
            $table->string('bank')->default('');
            $table->string('branch')->default('');
            $table->string('accountno')->default('');
            $table->string('nok')->nullable();
            $table->string('nokcellphone')->nullable();
            $table->string('nokrelation')->nullable();
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
        Schema::dropIfExists('employees');
    }
}
