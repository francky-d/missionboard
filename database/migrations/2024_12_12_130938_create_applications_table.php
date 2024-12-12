<?php

use App\Enum\ApplicationStatusEnum;
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
        Schema::create('applications', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->foreignUuid("mission_id")->constrained();
            $table->foreignUuid("applicant_id")->constrained("users");
            $table->enum("status", ApplicationStatusEnum::allValueAsArray())
                ->default(ApplicationStatusEnum::PENDING->value);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
