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
        Schema::create('orcid_access', function (Blueprint $table) {
            $table->id();

	    // ORCID iD like "0000-0002-1825-0097" (19 chars incl. hyphens)
            $table->string('orcid_id', 19)->unique();
            $table->json('scopes')->nullable();
            $table->text('access_token');
            $table->text('id_token')->nullable();     
            $table->text('refresh_token')->nullable(); 

            // Keep the raw API response for auditing/debugging
            $table->json('payload')->nullable();

	    $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orcid_access');
    }
};
