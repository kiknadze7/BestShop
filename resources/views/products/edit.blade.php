@extends('layouts.app')
<html lang="en">
<title>Edit Products</title>

@section('content')
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />


    <div class="container d-flex">
        <div class="container">
            <h4> პროდუქტების ედიტი </h4>
        </div>

        <div class="button w-50">
            <a href="{{ route('products') }}" class="btn btn-primary">back</a>
        </div>

        <div class="container">
            <form action="/products/{{ $product['id'] }}" method="POST">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter name"
                        value="{{ $product['name'] }}">

                    <label for="description">Description</label>
                    <input type="text" class="form-control" id="description" name="description"
                        value="{{ $product['description'] }}" placeholder="Enter description">

                    <label for="price">Price</label>
                    <input type="number" class="form-control" id="price" name="price" placeholder="Enter price"
                        value="{{ $product['price'] / 100 }}">

                    <label for="stock">stock</label>
                    <input type="number" class="form-control" id="stock" name="stock" placeholder="Enter stock"
                        value="{{ $product['stock'] }}" value="1">

                    <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
    @endsection
