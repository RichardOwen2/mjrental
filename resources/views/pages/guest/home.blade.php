@extends('layouts.guest.app')

@section('content')
    <div id="default-carousel" class="relative w-full mb-0" data-carousel="slide">
        <!-- Carousel wrapper -->
        <div class="relative overflow-hidden h-56 md:h-72">
            <!-- Item 1 -->
            @for ($i = 0; $i < 20; $i++)
                <div class="hidden duration-1000 ease-in-out" data-carousel-item>
                    @include('components.hero', [
                        'image' => asset('media/background1.webp'),
                        'title' => 'MJ RENTAL',
                        'subtitle' => 'Rent bike bali',
                        'content' => 'Easy, Comfortable and Affordable Motorbike Rental!',
                    ])
                </div>
            @endfor
        </div>
        <button type="button"
            class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
            data-carousel-prev>
            <span
                class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-gray-800/30 group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5 1 1 5l4 4" />
                </svg>
                <span class="sr-only">Previous</span>
            </span>
        </button>
        <button type="button"
            class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
            data-carousel-next>
            <span
                class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-gray-800/30 group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 9 4-4-4-4" />
                </svg>
                <span class="sr-only">Next</span>
            </span>
        </button>
    </div>

    @include('components.service')

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
                    class="text-white font-semibold bg-gradient-to-r from-cyan-500 to-blue-700 rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 sm:mr-2 lg:mr-0">
                    <i class="fa-brands fa-whatsapp me-1"></i>
                    Contact Us
                </a>
            </div>
        </div>
    </section>
    <!-- End block -->
@endsection
