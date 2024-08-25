@extends('layouts.guest.app')

@section('content')
    <div class="max-w-screen-xl px-6 py-8 mx-auto lg:py-12 lg:px-6">
        <h1 class="mb-12 text-center text-5xl font-bold text-blue-900">
            MJRENTAL CATALOG
        </h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 items-center justify-center">
            @foreach ($products as $product)
                @include('components.product', [
                    'id' => $product->id,
                    'image' => asset('storage/product/image/' . $product->cover),
                    'title' => $product->name,
                    'price_day' => \App\Helpers::numberFormat($product->price_day),
                    'price_week' => \App\Helpers::numberFormat($product->price_week),
                    'price_month' => \App\Helpers::numberFormat($product->price_month),
                ])
            @endforeach
        </div>
    </div>
@endsection
