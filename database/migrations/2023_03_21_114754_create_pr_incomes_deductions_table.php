<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrIncomesDeductionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pr_incomes_deductions', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('description');
            $table->decimal('damount',20,2)->default(0);
            $table->smallInteger('itype')->default(1);
            $table->smallInteger('recur')->default(1);
            $table->smallInteger('status')->default(1);
            $table->smallInteger('pen')->default(0);
            $table->string('glaccount');
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
        Schema::dropIfExists('pr_incomes_deductions');
    }
}
