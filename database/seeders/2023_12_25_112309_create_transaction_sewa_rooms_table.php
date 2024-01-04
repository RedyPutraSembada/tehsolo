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
        Schema::create('transaction_sewa_rooms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_transaction_room')->constrained('transaction_rooms');
            $table->date("arrival");
            $table->date("departure");
            $table->integer("total_orang_dewasa");
            $table->integer("total_anak");
            $table->integer("total_bayi");
            $table->integer("status_sewa");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_sewa_rooms');
    }
};
