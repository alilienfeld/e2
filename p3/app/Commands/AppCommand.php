<?php

namespace App\Commands;
use Faker\Factory;

class AppCommand extends Command
{
    public function fresh()
    {
        $this->migrate();
        $this->seed();
    }
    public function migrate()
    {
        $this->app->db()->createTable('rounds', [
            'guess' => 'varchar(4)',
            'won' => 'tinyint(1)', #Boolean
            'timestamp' => 'timestamp',
            'answer' => 'varchar(4)',
            'original' =>'varchar(2)', #The card the player guesses against
            'draw' => 'varchar(2)' #The card that determines the result
        ]);   
        dump('Migration Complete');
    }
    public function seed()
    {
        $faker = Factory::create();
        for($i = 10; $i > 0; $i--) {
            $original =  ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13'][rand(0,12)];
            $draw = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13'][rand(0,12)];
            $guess = ['high', 'low', 'tie'][rand(0,2)];
            if ($original > $draw) {
                $answer = 'low';
            } elseif($original < $draw) {
                $answer = 'high';
            } else {
                $answer = 'tie';
            }
            $won = ($guess == $answer) ? 1 : 0;
            $this->app->db()->insert('rounds', [
                'guess' => $guess,
                'draw' => $draw,
                'original' => $original,
                'answer' => $answer,
                'won' => $won,
                'timestamp' => $faker->dateTimeBetween('-'.$i.'days', '-'.$i.'days')->format('Y-m-d H:i:s')
            ]);
        }
    dump('Seed Complete');
    }
}