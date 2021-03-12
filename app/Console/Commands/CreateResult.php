<?php

namespace App\Console\Commands;

use App\Models\Game;
use Illuminate\Console\Command;

class CreateResult extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:result';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates result for a match';

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
     * @return int
     */
    public function handle()
    {
        $games = Game::all();

        foreach ($games as $game) {
            $num1 = rand(1, 20);
            $num2 = rand(1, 20);
            $game->result = $num1 . ":" . $num2;
            $game->is_finished = 1;
            $game->save();

            if ($game->save()) {
                $this->info('Result created!');
            } else {
                $this->error('An error occured!');
            }
        }
    }
}