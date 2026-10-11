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
        Schema::create('sites', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hosting_provider_id')->nullable()->constrained();
            $table->foreignId('developer_contact_id')->nullable()->constrained('contacts');
            $table->foreignId('project_manager_contact_id')->nullable()->constrained('contacts');
            $table->foreignId('product_owner_contact_id')->nullable()->constrained('contacts');
            $table->string('label');
            $table->string('url');
            $table->longText('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sites');
    }
};
