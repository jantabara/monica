<?php

use App\Models\Contact;
use App\Models\LifeMetric;
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
        Schema::create('life_metric_entry', function (Blueprint $table) {
            $table->foreignIdFor(Contact::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(LifeMetric::class)->constrained()->cascadeOnDelete();
            $table->unsignedInteger('value');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('life_metric_entry');
    }
};
