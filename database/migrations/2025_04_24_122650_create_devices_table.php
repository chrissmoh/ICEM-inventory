<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('devices', function (Blueprint $table) {
        $table->id();
        $table->string('device_name');
        $table->string('category');
        $table->string('serial_number')->after('category');
        $table->integer('quantity');
        $table->date('purchase_date');
        $table->enum('status', ['active', 'inactive']);
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('devices');
    }


};
