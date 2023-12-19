@extends('templates/master')
@section('content')
<h2 test='round-details-header'>Round details</h2>
<ul class="list-group list-group-flush">
    <li class="list-group-item">Round Id: {{$round['id']}}</li>
    <li class="list-group-item">Original Card: {{$round['original']}}</li>
    <li class="list-group-item">Player's Guess: {{$round['guess']}}</li>
    <li class="list-group-item">Next Draw: {{$round['draw']}}</li>
    <li class="list-group-item">Correct Answer: {{$round['answer']}}</li>
    <li class="list-group-item">Outcome: {{$round['won'] ? 'Won' : 'Lost'}}</li>
    <li class="list-group-item">Time: {{$round['timestamp']}}</li>
</ul>
<a test='back-to-history-link' href='/history'>Back to history</a>
@endsection