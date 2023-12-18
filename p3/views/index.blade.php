@extends('templates/master')



@section('content')

<h2></h2>
<h2>Instructions:</h2>
<p>Pick if the next card will be high or low</p>
@if($last)
{{$last}}
@else
{{$original}}
@endif

<form method='POST' action='/process'>
    @if($last)
    <input type='hidden' name='original' value='{{$last}}'>
    @else
    <input type='hidden' name='original' value='{{$original}}'>
    @endif
    <input type='radio' name='guess' value='high' id='high'><label for='high'>High</label>
    <input type='radio' name='guess' value='low' id='low'><label for='low'>Low</label>
    <input type='radio' name='guess' value='tie' id='tie'><label for='tie'>Tie</label>
    <button type='submit' class='btn btn-primary'>Guess!</button>
</form>
@if($answer)
Card was {{$original}}. You said {{$guess}}. Next was {{$next}}. Answer was {{$answer}}.
@if($won)
You win!
@else
You lose!
@endif
@endif

@endsection