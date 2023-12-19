@extends('templates/master')

@section('title')
{{ $product['name'] }}
@endsection

@section('content')
@if($productSaved)
<div class='alert alert-success'>Thanks! Review saved!</div>
@endif
@if($app->errorsExist())
<div class='alert alert-danger'>See errors!</div>
@endif

<form method='POST' id='new' action='/products/save'>
    <h3>New product</h3>

    <div class='form-group'>
        <label for='name'>Name</label>
        <input type='text' class='form-control' name='name' id='name' value='{{$app->old('name')}}'>
    </div>
    <div class='form-group'>
        <label for='description'>Description</label>
        <textarea name='description' id='description' class='form-control'>{{$app->old('description')}}</textarea>
    </div>
    <div class='form-group'>
        <label for='sku'>SKU</label>
        <input type='text' name='sku' id='sku' class='form-control' value='{{$app->old('sku')}}'>
    </div>
    <div class='form-group'>
        <label for='available'>Units Available</label>
        <input type='text' name='available' id='available' class='form-control' value='{{$app->old('available')}}''>
    </div>
    <div class=' form-group'>
        <label for='price'>Price</label>
        <input type='text' name='price' id='price' class='form-control' value='{{$app->old('price')}}''>
    </div>
    <div class=' form-group'>
        <label for='weight'>Weight</label>
        <input type='text' name='weight' id='weight' class='form-control' value='{{$app->old('weight')}}''>
    </div>
    <div class=' form-group'>
        <label for='perishable'>Perishable</label>
        <input type='checkbox' name='perishable' id='perishable' class='form-control'>
    </div>
    <button test=new-submit-button type='submit' class='btn btn-primary'>Submit Product</button>
</form>
@if($app->errorsExist())
<ul test='new-product-error' class='error alert alert-danger'>
    @foreach($app->errors() as $error)
    <li>{{ $error }}</li>
    @endforeach
</ul>
@endif

<a href='/products'>&larr; Return to all products</a>
@endsection