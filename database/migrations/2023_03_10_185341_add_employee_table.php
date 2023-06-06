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
            $table->string('cellphone')->nullable()->default('');
            $table->string('email')->nullable()->default('');
            $table->string('pobox')->nullable()->default('');
            $table->string('nationality')->nullable()->default('');
            $table->string('marital')->nullable()->default('');
            $table->smallInteger('paymode')->default(0);
            $table->string('bank')->nullable()->default('');
            $table->string('branch')->nullable()->default('');
            $table->string('accountno')->nullable()->default('');
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
