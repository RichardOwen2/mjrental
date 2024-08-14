@extends('layouts.guest.app')

@section('content')
    <div class="max-w-screen-xl px-6 py-8 mx-auto lg:py-12 lg:px-6">
        <h1 class="mb-12 text-center text-5xl font-bold">
            MJRENTAL CATALOG
        </h1>

        <div class="flex flex-wrap gap-2 items-center justify-center">
            @foreach ($products as $product)
                @include('components.product', [
                    'id' => 1,
                    'image' => asset('storage/product/image/' . $product->cover),
                    'title' => $product->name,
                    'price_day' => $product->price_day,
                    'price_week' => $product->price_week,
                    'price_month' => $product->price_month,
                ])
            @endforeach
        </div>
    </div>
@endsection
