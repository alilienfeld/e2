@extends('templates/master')
@section('content')
<h2 test='history-page-header'>History page</h2>
<ul class="list-group list-group-flush">
    @foreach($rounds as $round)
    <li class="list-group-item"><a test='individual-round' href='/round?id={{$round['id']}}'>{{$round['timestamp']}}</a>
    </li>
    @endforeach
</ul>
<a test='back-to-home-page' href='/'>Home</a>
@endsection