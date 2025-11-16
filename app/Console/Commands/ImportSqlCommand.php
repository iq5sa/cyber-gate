<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ImportSqlCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:import-sql {path : Path to the SQL file}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import an SQL file into the current database connection';

    /**
     * Execute the console command.
     */
    
    public function handle()
    {
        $path = $this->argument('path');

        if (!file_exists($path)) {
            $this->error("File not found at: $path");
            return Command::FAILURE;
        }

        $this->info("Importing SQL file...");

        try {
            DB::unprepared(file_get_contents($path));
            $this->info("✅ SQL imported successfully.");
            return Command::SUCCESS;
        } catch (\Exception $e) {
            $this->error("❌ Failed to import SQL: " . $e->getMessage());
            return Command::FAILURE;
        }
    }
}
