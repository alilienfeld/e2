<?php
namespace App\Controllers;

class AppController extends Controller
{
    /**
     * This method is triggered by the route "/"
     */
    public function index()
    {
        # If it's the first time visiting the page or the page is refreshed
        # get an initial card draw from process
        if(!$this->app->old('original')) {
            return $this->app->redirect('/process');
        }

        # Otherwise we are arriving on this page  to dispay form or after form submission
        $first_card = $this->app->old('original');
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
        # If we are arriving on the page due to form submission and not intializing the game
        # We validate the form had hidden field for the number we were guessing against
        # Form wll always have original value persisted from first form submission
        if($this->app->input('original')) {
            $this->app->validate([
                'guess' => 'required',
                'original' => 'required'
            ]);
            #Game logic to pull next card and check winner
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
            
            # Persist to DB
            $this->app->db()->insert('rounds', [
                'guess' => $guess,
                'original' => $original_card,
                'draw' => $next_card,
                'answer' => $answer,
                'won' => ($won) ? 1 : 0,
                'timestamp' => date('Y-m-d H:i:s')
            ]);
            # Rotate the next card in the selection
            $last_card = $next_card;
            #Go back home with results
            return $this->app->redirect('/', [
                'original' => $original_card,
                'next' => $next_card,
                'guess' => $guess,
                'answer' => $answer,
                'won' => $won,
                'last' => $last_card

            ]);
        } 
        
        # If we are on this page from index for first card draw we draw an original card
        $deck = [1, 1, 1, 1, 2, 2, 2, 2, 3, 3, 3, 3, 4, 4, 4, 4, 5, 5, 5, 5, 6, 6, 6, 6, 7, 7, 7, 7, 8, 8, 8, 8, 9, 9, 9, 9, 10, 10, 10, 10, 11, 11, 11, 11, 12, 12, 12, 12, 13, 13, 13, 13];
        shuffle($deck);
        $original_card = array_pop($deck);
        
        return $this->app->redirect('/', [
            'original' => $original_card,

        ]);
        
        
    }
    public function history() 
    {
        $rounds = $this->app->db()->all('rounds');
        
        return $this->app->view('history', ['rounds' => $rounds]);
    }
    public function round() {
        $id = $this->app->param('id');
        $round = $this->app->db()->findById('rounds', $id);
        return $this->app->view('round', ['round' => $round]);
    }
}