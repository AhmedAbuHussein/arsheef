<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractPointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contract_points', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['inst_cont', 'insp_cont']);
            $table->string('username')->nullable();
            $table->string('est_name')->nullable();
            $table->timestamp('date')->default(Carbon::now());
            $table->timestamp('start_date')->default(Carbon::now()->addDays(6));
            $table->string('total_cost')->nullable();
            $table->string('working_days')->nullable();
            $table->string('inside_camera')->nullable();
            $table->string('outside_camera')->nullable();
            $table->json('other')->nullable();
            $table->foreignId('user_id')->constrained("users", 'id')->cascadeOnDelete();
            
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
        Schema::dropIfExists('contract_points');
    }
}
