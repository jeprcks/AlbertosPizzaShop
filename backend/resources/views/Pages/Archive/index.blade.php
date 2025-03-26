@extends('Layout.app')

@section('title', 'Archived Products')

@include('Components.NaBar.navbar')

@section('content')
    <div class="container-fluid" style="background-color: white; min-height: 100vh; padding: 20px;">
        <div class="container">
            <h1
                style="text-align: center; margin-bottom: 2rem; font-size: 2.5rem; color: rgb(255, 153, 0); font-weight: bold;">
                Archived Products
            </h1>

            <div class="row row-cols-1 row-cols-md-3 g-4">
                @if (count($archivedProducts) > 0)
                    @foreach ($archivedProducts as $product)
                        @if ($product['user_id'] === $userId)
                            <div class="col">
                                <div
                                    style="background-color: #ffa600; border-radius: 15px; padding: 20px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); height: 100%;">
                                    <div style="height: 300px; overflow: hidden; margin-bottom: 15px; border-radius: 8px;">
                                        <img src="{{ asset('images/' . ($product['product_image'] ?? 'default.jpg')) }}"
                                            alt="{{ $product['product_name'] }}"
                                            style="width: 100%; height: 100%; object-fit: contain;">
                                    </div>
                                    <h2 style="font-size: 1.5rem; color: black; margin-bottom: 10px;">
                                        {{ $product['product_name'] }}
                                    </h2>
                                    <p style="color: black; margin-bottom: 8px;">₱{{ $product['product_price'] }}</p>
                                    <p style="color: black; margin-bottom: 15px;">{{ $product['description'] }}</p>

                                    <form action="{{ route('product.restore', $product['product_id']) }}" method="POST">
                                        @csrf
                                        <button type="submit"
                                            style="width: 100%; padding: 10px; background-color: #ffe600; color: black; border: none; border-radius: 8px; cursor: pointer; font-weight: bold;">
                                            Restore Product
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @else
                    <div class="col-12 text-center">
                        <p style="color: #666;">You have no archived products.</p>
                    </div>
                @endif
            </div>

            <div style="text-align: center; margin-top: 20px;">
                <a href="{{ route('product.index', ['user_id' => $userId]) }}"
                    style="display: inline-block; padding: 10px 20px; background-color: #ffa600; color: black; text-decoration: none; border-radius: 8px;">
                    Back to Products
                </a>
            </div>
        </div>
    </div>
@endsection
