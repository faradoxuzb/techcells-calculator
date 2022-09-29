<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Calculator extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'calculate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('This is a simple Calculator');

        $left = $this->ask('Enter number:');
        if (!$left || !is_numeric($left) ) {
            $this->error('Please enter a number!');
            return 1;
        }
        $operation = $this->choice('Enter operation:',['+','-', '*', '/']);
        if ($operation->isEmpty()) {
            $this->error('Please enter an operation!');
            return 1;
        }
        $right = $this->ask('Enter second number:');
        if ($operation == '/' and $right == 0) {
            $this->error('Division by zero is not permitted');
            return 1;
        }
        if (!$right || !is_numeric($right) ) {
            $this->error('Please enter a number!');
            return 1;
        }

        $this->info('Calculating...');
        $result = $left . $operation. $right;
        $this->info($result . '=' . eval("return $result;"));

        return 0;
    }
}
