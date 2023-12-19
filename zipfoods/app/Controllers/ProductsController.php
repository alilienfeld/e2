<?php
namespace App\Controllers;
use App\Products;


class ProductsController extends Controller
{
    
    public function index() {
        $products = $this->app->db()->all('products');
        return $this->app->view('products/index', ['products' => $products]);
    }
    public function show() {
        $sku = $this->app->param('sku');
        if(is_null($sku)) {
            $this->app->redirect('/products');
        }
        $productQuery = $this->app->db()->findByColumn('products', 'sku', '=', $sku);


        if(empty($productQuery)) {
            return $this->app->view('products/missing');
        } else {
            $product = $productQuery[0];
        }
        $productId = $product['id'];
        $reviewQuery = $this->app->db()->findByColumn('reviews', 'product_id', '=', $productId);


        $reviewSaved = $this->app->old('reviewSaved');
        return $this->app->view('products/show', [
            'product' => $product,
            'reviewSaved' => $reviewSaved,
            'reviews' => $reviewQuery
        ]);
    }
    public function saveReview() {
        $this->app->validate([
            'product_id' => 'required',
            'sku' => 'required',
            'name' => 'required',
            'review' => 'required|minLength:200'
        ]);
        #if validation fails everything halts and redirects
        $product_id = $this->app->input('product_id');
        $name = $this->app->input('name');
        $review = $this->app->input('review');
        $sku = $this->app->input('sku');
        
        $this->app->db()->insert('reviews', [
            'product_id' => $product_id,
            'name' => $name,
            'review'=> $review
        ]);
        
        return $this->app->redirect('/product?sku='. $sku, ['reviewSaved' => true]);
    }
    public function new() {
        $productSaved = $this->app->old('productSaved');
        $sku = $this->app->old('sku');

        return $this->app->view('/products/new', [
            'productSaved' => $productSaved,
            'sku' => $sku
        ]);
    }
    public function save() {
        $this->app->validate([
            'name' => 'required',
            'sku' => 'required|alphaNumericDash',
            'price' => 'required|numeric',
            'description' => 'required',
            'available' => 'required|numeric',
            'weight' => 'required|numeric'
        ]);
        $this->app->db()->insert('products', $this->app->inputAll());
        
        return $this->app->redirect('/products/new', [
            'productSaved' => true,
            'sku' => $this->app->input('sku')
        ]);
    }
}