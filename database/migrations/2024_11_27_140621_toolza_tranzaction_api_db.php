<?php

use Illuminate\Database\{
    Migrations\Migration,
    Schema\Blueprint,
};
use Illuminate\Support\Facades\{
    DB,
    Schema,
};

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dic_transaction_types', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
        });

        DB::table('dic_transaction_types')->insert([
            [
                'name' => 'deposit',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'withdrawal',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamps();
        });

        DB::table('users')->insert([
            [
                'name' => 'test',
                'email' => 'test@test.com',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);

        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->bigInteger('amount');
            $table->foreignId('type_id')->constrained('dic_transaction_types')->cascadeOnDelete();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transactions');
        Schema::dropIfExists('dic_transaction_types');
        Schema::dropIfExists('users');
    }
};
