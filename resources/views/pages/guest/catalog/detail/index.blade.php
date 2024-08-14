@extends('layouts.guest.app')

@section('content')
    <div class="max-w-screen-xl px-4 py-8 mx-auto lg:py-16 lg:px-6">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            <div>
                @include('pages.guest.catalog.detail.picture', [
                    'images' => [
                        $product->cover,
                        ...$pictures->pluck('image')->toArray(),
                    ],
                ])
            </div>

            <div>
                @include('pages.guest.catalog.detail.description')
                @include('pages.guest.catalog.detail.information')
            </div>

            <div>
                @include('pages.guest.catalog.detail.order')
            </div>
        </div>

        <div>
            @include('pages.guest.catalog.detail.terms')
        </div>
    </div>
@endsection
