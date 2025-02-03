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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('firstname', 100);
            $table->string('lastname', 100);
            $table->string('telephone', 50);
            $table->string('bvn', 50);
            $table->string('dob', 50);
            $table->string('residential_address', 200);
            $table->string('state', 50);
            $table->string('bankcode', 50);
            $table->string('accountnumber', 50);
            $table->string('company_id', 50);
            $table->string('email', 200);
            $table->string('city', 200);
            $table->string('country', 200);
            $table->string('id_card', 255)->nullable();
            $table->string('voters_card', 255)->nullable();
            $table->string('drivers_licence', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
