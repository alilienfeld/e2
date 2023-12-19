@extends('templates/master')

@section('title')
High or Low
@endsection

@section('content')

<h2></h2>
<h2 test='home-page-header'>Instructions:</h2>
<p>You will see a card representing a card from a standard deck</p>

<p>Pick if the next card will be higher lower or the same as that card</p>
<div test='card-shows'>
    @if($last)
    {{$last}}
    @else
    {{$original}}
    @endif
</div>

<form method='POST' action='/process'>
    @if($last)
    <input type='hidden' name='original' value='{{$last}}'>
    @else
    <input type='hidden' name='original' value='{{$original}}'>
    @endif
    <input test='high-radio' type='radio' name='guess' value='high' id='high'><label for='high'>High</label>
    <input test='low-radio' type='radio' name='guess' value='low' id='low'><label for='low'>Low</label>
    <input test='tie-radio' type='radio' name='guess' value='tie' id='tie'><label for='tie'>Tie</label>
    </div>
    <button test='submit-button' type='submit' class='btn btn-primary'>Guess!</button>
</form>
@if($app->errorsExist())
<ul test='form-validation-errors' class='error alert alert-danger'>
    @foreach($app->errors() as $error)
    <li>{{ $error }}</li>
    @endforeach
</ul>
@endif
@if($answer)
<div test='results-div'>Card was <span test='first-card'>{{$original}}</span>. You said <span
        test='player-guess'>{{$guess}}</span>. Next was <span test='next-card'>{{$next}}</span>. Answer was
    <span test='correct-answer'>{{$answer}}</span>.
</div>
@if($won)
<div test='won-message' class='results'>
    <span class='won'>You win!</span>
</div>
@else
<div test='lost-message'>
    <span class='lost'>You lose!</span>
</div>
@endif
@endif
<a test='history-page-link' href='/history'>See History</a>
@endsection