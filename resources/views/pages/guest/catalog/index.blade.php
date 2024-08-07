@extends('layouts.guest.app')

@section('content')
    <div class="max-w-screen-xl px-6 py-8 mx-auto lg:py-12 lg:px-6">
        <h1 class="mb-12 text-center text-5xl font-bold">
            MJRENTAL CATALOG
        </h1>

        <div class="flex flex-wrap gap-2 items-center justify-center">
            @for ($i = 0; $i < 20; $i++)
                @include('components.product', [
                    'id' => 1,
                    'image' => asset('media/honda.webp'),
                    'title' => 'Honda Vario 150',
                    'price_day' => '50.000',
                    'price_week' => '300.000',
                    'price_month' => '1.000.000',
                ])
            @endfor
        </div>
    </div>
@endsection
