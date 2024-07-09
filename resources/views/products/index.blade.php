@extends('layouts.app')
<html lang="en">
<title>Products</title>

@section('content')
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />


    <div class="container d-flex">
        <div class="container">
            <h4> პროდუქტების რაოდენობა {{ count($products) }}</h4>
        </div>

        <div class="button w-50">
            <a href="{{ route('product.create') }}" class="btn btn-primary">Add Product</a>
        </div>
    </div>
    @if (session('add_successful'))
        <div class="alert alert-success">
            {{ session('add_successful') }}
        </div>
    @endif
    @if (session('update_successful'))
        <div class="alert alert-success">
            {{ session('update_successful') }}
        </div>
    @endif

    @if (session('delete_successful'))
        <div class="alert alert-success">
            {{ session('delete_successful') }}
        </div>
    @endif

    @foreach ($products as $product)
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            {{ $product->name }}
                        </div>
                        <div class="card-body">
                            <p>{{ $product->description }}</p>
                            <p>{{ $product->price / 100 }}₾</p>
                            <p> ატვირთულია : {{ $product->created_at }}</p>
                            <p> რაოდენობა : {{ $product->stock }}</p>

                        </div>
                        <div class="card-footer">
                            <a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary me-2">Edit</a>
                            <a href="{{ route('product.show', $product->id) }}" class="btn btn-primary me-5">Show</a>

                            <form method="POST" action="/products/{{ $product['id'] }}">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger">delete</button>

                            </form>

                        </div>

                    </div>
                </div>
            </div>
    @endforeach
@endsection
