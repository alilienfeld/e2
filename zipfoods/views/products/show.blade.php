@extends('templates/master')

@section('title')
{{ $product['name'] }}
@endsection

@section('content')
@if($reviewSaved)
<div test='review-confirmation' class='alert alert-success'>Thanks!</div>
@endif
@if($app->errorsExist())
<div test='review-error' class='alert alert-danger'>See errors!</div>
@endif
<div id='product-show'>
    <h2>{{ $product['name'] }}</h2>

    <img src='/images/products/{{ $product['sku'] }}.jpg' class='product-thumb'>

    <p class='product-description'>
        {{ $product['description'] }}
    </p>

    <div class='product-price'>${{ $product['price'] }}</div>
</div>
<form method='POST' id='product-review' action='/products/save-review'>
    <h3>Review {{ $product['name'] }}</h3>
    <input type='hidden' name='product_id' value='{{ $product['id'] }}'>
    <input type='hidden' name='sku' value='{{ $product['sku'] }}'>
    <div class='form-group'>
        <label for='name'>Name</label>
        <input test='reviewer-name-input' type='text' class='form-control' name='name' id='name'
            value='{{$app->old('name')}}'>
    </div>

    <div class='form-group'>
        <label for='review'>Review</label>
        <textarea test='review-textarea' name='review' id='review'
            class='form-control'>{{$app->old('review')}}</textarea>
    </div>

    <button test='review-submit-button' type='submit' class='btn btn-primary'>Submit Review</button>
</form>
@if($app->errorsExist())
<ul test='each-error' class='error alert alert-danger'>
    @foreach($app->errors() as $error)
    <li>{{ $error }}</li>
    @endforeach
</ul>
@endif

@if($reviews)
@foreach($reviews as $review)
<div test='reviewer-name'>{{$review['name']}}</div>
<div test='reviewer-content'>{{$review['review']}}</div>
@endforeach
@endif
<a href='/products'>&larr; Return to all products</a>
@endsection