@extends('templates/master')

@section('title')
Product Not Found
@endsection

@section('content')
<div id='product-show'>
    <h2>Product Not Found</h2>



    <p test='not-found' class='product-description'>
        Sorry we were not able to find the product you were looking for.
    </p>


</div>

<a test='return-link' href='/products'>&larr; Return to all products</a>
@endsection