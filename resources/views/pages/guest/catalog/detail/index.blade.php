@extends('layouts.guest.app')

@section('content')
    <div class="max-w-screen-xl px-4 py-8 mx-auto lg:py-16 lg:px-6">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            <div>
                @include('pages.guest.catalog.detail.picture')
                @include('pages.guest.catalog.detail.information')
            </div>

            <div class="col-span-2">
                @include('pages.guest.catalog.detail.description')
            </div>
        </div>

        @include('pages.guest.catalog.detail.terms')
    </div>
@endsection
