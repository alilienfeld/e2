@extends('templates/master')

@section('title')
Round History
@endsection
@section('content')
<h2 test='history-page-header'>History page</h2>
<ul class="list-group list-group-flush">
    @foreach($rounds as $round)
    <li class="list-group-item"><a test='individual-round' href='/round?id={{$round['id']}}'>{{$round['timestamp']}}</a>
    </li>
    @endforeach
</ul>
<a class="link-danger link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover" test='back-to-home-page'
    href='/'>Home</a>
@endsection