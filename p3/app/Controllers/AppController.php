<?php
namespace App\Controllers;

class AppController extends Controller
{
    /**
     * This method is triggered by the route "/"
     */
    public function index()
    {

        if(!$this->app->old('original')) {
            return $this->app->redirect('/process');
        }

        $first_card = $this->app->old('original');
        //$deck = $this->app->old('deck');
        $won = $this->app->old('won');
        $next_card = $this->app->old('next');
        $answer = $this->app->old('answer');
        $guess = $this->app->old('guess');
        $last_card = $this->app->old('last');
        
        return $this->app->view('index', [
            'original' => $first_card,
            'next' => $next_card,
            'answer' => $answer,
            'guess' => $guess,
            'won' => $won,
            'last' => $last_card

        ]);
    }
    public function process() 
    {   

        if($this->app->input('original')) {
            $this->app->validate([
                'guess' => 'required',
                'original' => 'required'
            ]);
            $deck = [1, 1, 1, 1, 2, 2, 2, 2, 3, 3, 3, 3, 4, 4, 4, 4, 5, 5, 5, 5, 6, 6, 6, 6, 7, 7, 7, 7, 8, 8, 8, 8, 9, 9, 9, 9, 10, 10, 10, 10, 11, 11, 11, 11, 12, 12, 12, 12, 13, 13, 13, 13];
            shuffle($deck);
            $guess = $this->app->input('guess');
            
            $original_card = $this->app->input('original');
            $next_card = array_pop($deck);

            if ($next_card > $original_card) {
                $answer = 'high';
            } elseif($next_card < $original_card) {
                $answer = 'low';
            } else{
                $answer = 'tie';
            }
            $won = ($answer == $guess);
            
            // Persist to DB
            $this->app->db()->insert('rounds', [
                'guess' => $guess,
                'original' => $original_card,
                'draw' => $next_card,
                'answer' => $answer,
                'won' => ($won) ? 1 : 0,
                'timestamp' => date('Y-m-d H:i:s')
            ]);

            $last_card = $next_card;
            return $this->app->redirect('/', [
                'original' => $original_card,
                'next' => $next_card,
                'guess' => $guess,
                'answer' => $answer,
                'won' => $won,
                'last' => $last_card

            ]);
        } 
        
        
        $deck = [1, 1, 1, 1, 2, 2, 2, 2, 3, 3, 3, 3, 4, 4, 4, 4, 5, 5, 5, 5, 6, 6, 6, 6, 7, 7, 7, 7, 8, 8, 8, 8, 9, 9, 9, 9, 10, 10, 10, 10, 11, 11, 11, 11, 12, 12, 12, 12, 13, 13, 13, 13];
        shuffle($deck);
        $original_card = array_pop($deck);
        
        return $this->app->redirect('/', [
            'original' => $original_card,
            //'deck' => $deck,

        ]);
        
        
    }
    public function history() 
    {
        return $this->app->view('history', []);
    }
    public function round() {
        return $this->app->view('round');
    }
}