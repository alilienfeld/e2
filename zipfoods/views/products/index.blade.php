@extends('templates/master')

@section('title')
All products
@endsection

@section('content')
<h2>All Products</h2>

<div id='product-index'>
    @foreach ($products as $product)
    <a test='products' class='product-link' href='/product?sku={{ $product['sku'] }}'>
        <div>
            <div class='product-name'>{{ $product['name'] }}</div>
            <img class='product-thumb' src="/images/products/{{ $product['sku'] }}.jpg">
        </div>
    </a>
    @endforeach
</div>
@endsection