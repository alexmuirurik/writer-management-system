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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->integer('project_id');
            $table->string('slug')->unique();
            $table->string('title');
            $table->string('project');
            $table->text('client_content')->nullable();
            $table->text('writer_content')->nullable();
            $table->text('editor_content')->nullable();
            $table->json('all_content')->nullable();
            $table->text('meta')->nullable();
            $table->text('copyscape')->nullable();
            $table->string('writer');
            $table->string('client');
            $table->string('manager');
            $table->string('developer');
            $table->string('status');
            $table->text('instructions');
            $table->biginteger('writer_deadline');
            $table->biginteger('publication_deadline');
            $table->biginteger('wordcount');
            $table->decimal('pay', 10, 2);
            $table->text('file')->nullable();
            $table->biginteger('submitted_at')->nullable();
            $table->biginteger('published_at')->nullable();
            $table->integer('rating')->nullable();
            $table->text('comments')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
