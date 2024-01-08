<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHospitalinvoiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospitalinvoice', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('mr_admission_date');
            $table->string('mr_discharge_date');
            $table->string('doctorname');
            $table->string('patientname');
            $table->string('selecttype');
            $table->string('roomtype');
            $table->string('paymenttype');
            $table->string('payment_amount');
            $table->string('procedure');
            $table->string('details');
            $table->string('patienttype');
            $table->string('paymenttypeone');
            $table->string('discType');
            $table->string('discRate');
            $table->string('discount');
            $table->string('price');
            $table->string('ttlamt');
            $table->string('category');
            $table->string('subcategory');
            $table->string('productname');
           
         
            
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hospitalinvoice');
    }
}
