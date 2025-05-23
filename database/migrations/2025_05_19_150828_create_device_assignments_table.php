<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateDeviceAssignmentsTable extends Migration
{
  public function up()
{
    Schema::create('device_assignments', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('device_id');
        $table->string('assignee_type');
        $table->unsignedBigInteger('staff_id')->nullable();
        $table->unsignedBigInteger('lab_id')->nullable();
        $table->date('assigned_date');
        $table->date('expected_return_date')->nullable();
        $table->date('returned_date')->nullable();
        $table->enum('status', ['active', 'overdue', 'returned'])->default('active');
        $table->text('purpose')->nullable();
        $table->text('condition_assigned')->nullable();
        $table->text('condition_returned')->nullable();
        $table->text('notes')->nullable();
        $table->unsignedBigInteger('assigned_by');
        $table->timestamps();
    });

    // Add constraints only if tables exist
    if (Schema::hasTable('devices') && Schema::hasTable('users') && Schema::hasTable('computer_labs')) {
        Schema::table('device_assignments', function (Blueprint $table) {
            $table->foreign('device_id')->references('id')->on('devices')->onDelete('cascade');
            $table->foreign('staff_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('lab_id')->references('id')->on('computer_labs')->onDelete('cascade');
            $table->foreign('assigned_by')->references('id')->on('users')->onDelete('cascade');
        });
    }
}
}
