<?php
namespace Veneridze\LaravelHoliday\Commands;

use Illuminate\Console\Command;
use Veneridze\LaravelHoliday\Models\Holiday;

class UpdateHolidays extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'holiday:update {year}';
 
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update holidays list';
 
    /**
     * Execute the console command.
     */
    public function handle(int $year = null): void
    {
        Holiday::updateDays($year);
        $this->info('Выходные обновлены');
    }
}