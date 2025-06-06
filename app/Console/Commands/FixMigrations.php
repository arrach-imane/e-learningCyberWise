<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class FixMigrations extends Command
{
    protected $signature = 'migrations:fix';
    protected $description = 'Fix the migrations table to match current migration files';

    public function handle()
    {
        $this->info('Starting migration fix...');

        // Drop and recreate migrations table
        Schema::dropIfExists('migrations');
        Schema::create('migrations', function ($table) {
            $table->id();
            $table->string('migration');
            $table->integer('batch');
        });

        // List of all migrations (using only the newer personal_access_tokens migration)
        $migrations = [
            '2025_06_06_000009_create_personal_access_tokens_table', // Using the newer version
            '2025_06_06_000001_create_bank_table',
            '2025_06_06_000001_create_users_table',
            '2025_06_06_000002_create_categories_table',
            '2025_06_06_000002_create_password_reset_tokens_table',
            '2025_06_06_000003_create_courses_table',
            '2025_06_06_000004_create_lessons_table',
            '2025_06_06_000004_create_reviews_table',
            '2025_06_06_000005_add_course_video_url_to_courses',
            '2025_06_06_000005_create_enrolls_table'
        ];

        // Insert all migrations
        foreach ($migrations as $migration) {
            DB::table('migrations')->insert([
                'migration' => $migration,
                'batch' => 1
            ]);
            $this->info("Added migration: {$migration}");
        }

        $this->info('Migration fix completed!');
    }
}
