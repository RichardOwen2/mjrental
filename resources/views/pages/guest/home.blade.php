@extends('layouts.guest.app')

@section('content')
    <div class="relative">
        @include('components.hero')

        @include('components.customer')
    </div>

    <div class="bg-white pt-60 sm:pt-44 md:pt-40 lg:pt-20 xl:pt-28">
        @include('components.home-product')

        @include('components.service')
    </div>

    @include('components.feature')

    @include('components.rating')

    @include('components.faq')

    <section class="bg-gray-50" data-aos="fade-up" data-aos-duration="700">
        <div class="max-w-screen-xl px-4 py-8 mx-auto lg:py-16 lg:px-6">
            <div class="max-w-screen-sm mx-auto text-center">
                <h2 class="mb-4 mt-2 text-3xl font-extrabold leading-tight tracking-tight text-gray-900">
                    Ready to rent a motorbike?
                </h2>
                <p class="mb-6 font-light text-gray-500 md:text-lg">
                    Rent a motorbike with us and enjoy your vacation in Bali.
                </p>
                <a href="https://wa.me/6281367364350" target="_blank"
                    class="text-white font-semibold bg-blue-800 hover:bg-blue-900 rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 sm:mr-2 lg:mr-0">
                    <i class="fa-brands fa-whatsapp me-1"></i>
                    Contact Us
                </a>
            </div>
        </div>
    </section>
@endsection
