<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CalculatorTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {

        $this->artisan('calculate')
            ->expectsQuestion('Enter number:', '2')
            ->expectsChoice('Enter operation:', '+', ['+','-','*','/',] )
            ->expectsQuestion('Enter second number:' , '2')
            ->expectsOutput('Calculating...')
            ->assertExitCode(0);

    }
}
