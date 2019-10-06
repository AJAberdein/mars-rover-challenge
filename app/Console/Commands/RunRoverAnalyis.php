<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\MarsRoverAnalysis;

class RunRoverAnalyis extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'run:rover';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run the anaysis of a Mars Rover Challange';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info("Welcome to the Mars Rover Challange");
        $assesment_data = [];
        $assesment_data[] = $this->ask('Please Provide the Map Coordinates (eg. "5 5")');

        $input = '';
        $impl_type = "loc";
        $first = true;

        while(strtolower($input) != 'end') {
            if($impl_type == 'loc') {
                $first 
                    ? $input = $this->ask('Please provide a starting position for your first Rover (eg. "1 2 N")')
                    : $input = $this->ask('Please provide a starting position for your next Rover (eg. "1 2 N"), or type "end"');
            }

            if($impl_type == 'mov') {
                $first 
                    ? $input = $this->ask('Please provide movements for your first Rover (eg. "LRMMMLR")')
                    : $input = $this->ask('Please provide movements for your next Rover (eg. "LRMMMLR") or type "end');

                $first = false;
            }

            $impl_type == "loc" ? $impl_type = "mov" : $impl_type = "loc";
    
            if(strtolower($input) != 'end') {
                $assesment_data[] = $input;
            } else {
                break;
            }

        }

        $rover_analyser = new MarsRoverAnalysis();
        $result = $rover_analyser->assess($assesment_data);

        $this->info("Your Mars Rover Challange analysis is complete:");
        $this->info($result);






    }
}
