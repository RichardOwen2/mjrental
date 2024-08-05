@extends('layouts.guest.app')

@section('content')
    <div id="default-carousel" class="relative w-full mb-0 h-[350px]" data-carousel="slide">
        <!-- Carousel wrapper -->
        <div class="relative overflow-hidden h-[350px]">
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

    <section class="bg-white">
        <div class="max-w-screen-xl px-4 py-8 mx-auto space-y-12 lg:space-y-20 lg:py-24 lg:px-6">
            <!-- Row -->
            <div class="items-center gap-8 lg:grid lg:grid-cols-2 xl:gap-16">
                <div class="text-gray-500 sm:text-lg">
                    <h2 class="mb-4 text-3xl font-extrabold tracking-tight text-gray-900">
                        Our Services
                    </h2>
                    <p class="mb-8 font-light lg:text-xl">
                        MJ RENTAL is a company engaged in the field of vehicle rental services, especially motorbikes. We provide the best service for you to enjoy your vacation in Bali.
                    </p>
                    <!-- List -->
                    <ul role="list" class="pt-8 space-y-5 border-t border-gray-200 my-7">
                        <li class="flex space-x-3">
                            <!-- Icon -->
                            <svg class="flex-shrink-0 w-5 h-5 text-purple-500" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-base font-medium leading-tight text-gray-900">
                                Get two helmets for each motorbike
                            </span>
                        </li>
                        <li class="flex space-x-3">
                            <!-- Icon -->
                            <svg class="flex-shrink-0 w-5 h-5 text-purple-500" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-base font-medium leading-tight text-gray-900">
                                You can request a phone holdren and surf rack
                            </span>
                        </li>
                        <li class="flex space-x-3">
                            <!-- Icon -->
                            <svg class="flex-shrink-0 w-5 h-5 text-purple-500" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-base font-medium leading-tight text-gray-900">
                                Full petrol for all motorbikes to be rented
                            </span>
                        </li>
                        <li class="flex space-x-3">
                            <!-- Icon -->
                            <svg class="flex-shrink-0 w-5 h-5 text-purple-500" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-base font-medium leading-tight text-gray-900">
                                We are ready to repair if the motorbike has a problem
                            </span>
                        </li>
                    </ul>
                    {{-- <p class="mb-8 font-light lg:text-xl">Deliver great service experiences fast - without the
                        complexity of traditional ITSM solutions.</p> --}}
                </div>
                <img class="hidden w-full mb-4 rounded-lg lg:mb-0 lg:flex" src="{{ asset('logo/logo_black.png') }}"
                    alt="dashboard feature image">
            </div>
        </div>
    </section>

    <section class="">
        <div
            class="items-center max-w-screen-xl px-4 py-8 mx-auto lg:grid lg:grid-cols-4 lg:gap-16 xl:gap-24 lg:py-24 lg:px-6">
            <div class="col-span-2 mb-8">
                <p class="text-lg font-medium text-purple-600">Trusted Worldwide</p>
                <h2 class="mt-3 mb-4 text-3xl font-extrabold tracking-tight text-gray-900 md:text-3xl">
                    Trusted by over 600 million users and 10,000 teams</h2>
                <p class="font-light text-gray-500 sm:text-xl">Our rigorous security and compliance
                    standards are at the heart of all we do. We work tirelessly to protect you and your customers.</p>
                <div class="pt-6 mt-6 space-y-4 border-t border-gray-200">
                    <div>
                        <a href="#"
                            class="inline-flex items-center text-base font-medium text-purple-600 hover:text-purple-800">
                            Explore Legality Guide
                            <svg class="w-5 h-5 ml-1" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </a>
                    </div>
                    <div>
                        <a href="#"
                            class="inline-flex items-center text-base font-medium text-purple-600 hover:text-purple-800">
                            Visit the Trust Center
                            <svg class="w-5 h-5 ml-1" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-span-2 space-y-8 md:grid md:grid-cols-2 md:gap-12 md:space-y-0">
                <div>
                    <svg class="w-10 h-10 mb-2 text-purple-600 md:w-12 md:h-12" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M2 5a2 2 0 012-2h12a2 2 0 012 2v2a2 2 0 01-2 2H4a2 2 0 01-2-2V5zm14 1a1 1 0 11-2 0 1 1 0 012 0zM2 13a2 2 0 012-2h12a2 2 0 012 2v2a2 2 0 01-2 2H4a2 2 0 01-2-2v-2zm14 1a1 1 0 11-2 0 1 1 0 012 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <h3 class="mb-2 text-2xl font-bold">99.99% uptime</h3>
                    <p class="font-light text-gray-500">For Landwind, with zero maintenance downtime
                    </p>
                </div>
                <div>
                    <svg class="w-10 h-10 mb-2 text-purple-600 md:w-12 md:h-12" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z">
                        </path>
                    </svg>
                    <h3 class="mb-2 text-2xl font-bold">600M+ Users</h3>
                    <p class="font-light text-gray-500">Trusted by over 600 milion users around the
                        world</p>
                </div>
                <div>
                    <svg class="w-10 h-10 mb-2 text-purple-600 md:w-12 md:h-12" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zM4.332 8.027a6.012 6.012 0 011.912-2.706C6.512 5.73 6.974 6 7.5 6A1.5 1.5 0 019 7.5V8a2 2 0 004 0 2 2 0 011.523-1.943A5.977 5.977 0 0116 10c0 .34-.028.675-.083 1H15a2 2 0 00-2 2v2.197A5.973 5.973 0 0110 16v-2a2 2 0 00-2-2 2 2 0 01-2-2 2 2 0 00-1.668-1.973z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <h3 class="mb-2 text-2xl font-bold">100+ countries</h3>
                    <p class="font-light text-gray-500">Have used Landwind to create functional
                        websites</p>
                </div>
                <div>
                    <svg class="w-10 h-10 mb-2 text-purple-600 md:w-12 md:h-12" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z">
                        </path>
                    </svg>
                    <h3 class="mb-2 text-2xl font-bold">5+ Million</h3>
                    <p class="font-light text-gray-500">Transactions per day</p>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-gray-50">
        <div class="max-w-screen-xl px-4 py-8 mx-auto text-center lg:py-24 lg:px-6">
            <figure class="max-w-screen-md mx-auto">
                <svg class="h-12 mx-auto mb-3 text-gray-400" viewBox="0 0 24 27" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M14.017 18L14.017 10.609C14.017 4.905 17.748 1.039 23 0L23.995 2.151C21.563 3.068 20 5.789 20 8H24V18H14.017ZM0 18V10.609C0 4.905 3.748 1.038 9 0L9.996 2.151C7.563 3.068 6 5.789 6 8H9.983L9.983 18L0 18Z"
                        fill="currentColor" />
                </svg>
                <blockquote>
                    <p class="text-xl font-medium text-gray-900 md:text-2xl">"Landwind is just awesome.
                        It contains tons of predesigned components and pages starting from login screen to complex
                        dashboard. Perfect choice for your next SaaS application."</p>
                </blockquote>
                <figcaption class="flex items-center justify-center mt-6 space-x-3">
                    <img class="w-6 h-6 rounded-full"
                        src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/michael-gouch.png"
                        alt="profile picture">
                    <div class="flex items-center divide-x-2 divide-gray-500">
                        <div class="pr-3 font-medium text-gray-900">Micheal Gough</div>
                        <div class="pl-3 text-sm font-light text-gray-500">CEO at Google</div>
                    </div>
                </figcaption>
            </figure>
        </div>
    </section>

    <section class="bg-white">
        <div class="max-w-screen-xl px-4 py-8 mx-auto lg:py-24 lg:px-6 ">
            <h2 class="mb-6 text-3xl font-extrabold tracking-tight text-center text-gray-900 lg:mb-8 lg:text-3xl">
                Frequently asked questions</h2>
            <div class="max-w-screen-md mx-auto">
                <div id="accordion-flush" data-accordion="collapse" data-active-classes="bg-white text-gray-900"
                    data-inactive-classes="text-gray-500">
                    <h3 id="accordion-flush-heading-1">
                        <button type="button"
                            class="flex items-center justify-between w-full py-5 font-medium text-left text-gray-900 bg-white border-b border-gray-200"
                            data-accordion-target="#accordion-flush-body-1" aria-expanded="true"
                            aria-controls="accordion-flush-body-1">
                            <span>Can I use Landwind in open-source projects?</span>
                            <svg data-accordion-icon="" class="w-6 h-6 rotate-180 shrink-0" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </h3>
                    <div id="accordion-flush-body-1" class="" aria-labelledby="accordion-flush-heading-1">
                        <div class="py-5 border-b border-gray-200">
                            <p class="mb-2 text-gray-500">Landwind is an open-source library of
                                interactive components built on top of Tailwind CSS including buttons, dropdowns,
                                modals, navbars, and more.</p>
                            <p class="text-gray-500">Check out this guide to learn how to <a href="#"
                                    class="text-purple-600 hover:underline">get
                                    started</a> and start developing websites even faster with components on top of
                                Tailwind CSS.</p>
                        </div>
                    </div>
                    <h3 id="accordion-flush-heading-2">
                        <button type="button"
                            class="flex items-center justify-between w-full py-5 font-medium text-left text-gray-500 border-b border-gray-200"
                            data-accordion-target="#accordion-flush-body-2" aria-expanded="false"
                            aria-controls="accordion-flush-body-2">
                            <span>Is there a Figma file available?</span>
                            <svg data-accordion-icon="" class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </h3>
                    <div id="accordion-flush-body-2" class="hidden" aria-labelledby="accordion-flush-heading-2">
                        <div class="py-5 border-b border-gray-200">
                            <p class="mb-2 text-gray-500">Landwind is first conceptualized and
                                designed using the Figma software so everything you see in the library has a design
                                equivalent in our Figma file.</p>
                            <p class="text-gray-500">Check out the <a href="#"
                                    class="text-purple-600 hover:underline">Figma design
                                    system</a> based on the utility classes from Tailwind CSS and components from
                                Landwind.</p>
                        </div>
                    </div>
                    <h3 id="accordion-flush-heading-3">
                        <button type="button"
                            class="flex items-center justify-between w-full py-5 font-medium text-left text-gray-500 border-b border-gray-200"
                            data-accordion-target="#accordion-flush-body-3" aria-expanded="false"
                            aria-controls="accordion-flush-body-3">
                            <span>What are the differences between Landwind and Tailwind UI?</span>
                            <svg data-accordion-icon="" class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </h3>
                    <div id="accordion-flush-body-3" class="hidden" aria-labelledby="accordion-flush-heading-3">
                        <div class="py-5 border-b border-gray-200">
                            <p class="mb-2 text-gray-500">The main difference is that the core
                                components from Landwind are open source under the MIT license, whereas Tailwind UI is a
                                paid product. Another difference is that Landwind relies on smaller and standalone
                                components, whereas Tailwind UI offers sections of pages.</p>
                            <p class="mb-2 text-gray-500">However, we actually recommend using both
                                Landwind, Landwind Pro, and even Tailwind UI as there is no technical reason stopping
                                you from using the best of two worlds.</p>
                            <p class="mb-2 text-gray-500">Learn more about these technologies:</p>
                            <ul class="pl-5 text-gray-500 list-disc">
                                <li><a href="#" class="text-purple-600 hover:underline">Landwind Pro</a>
                                </li>
                                <li><a href="#" class="text-purple-600 hover:underline">Tailwind UI</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <h3 id="accordion-flush-heading-4">
                        <button type="button"
                            class="flex items-center justify-between w-full py-5 font-medium text-left text-gray-500 border-b border-gray-200"
                            data-accordion-target="#accordion-flush-body-4" aria-expanded="false"
                            aria-controls="accordion-flush-body-4">
                            <span>What about browser support?</span>
                            <svg data-accordion-icon="" class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </h3>
                    <div id="accordion-flush-body-4" class="hidden" aria-labelledby="accordion-flush-heading-4">
                        <div class="py-5 border-b border-gray-200">
                            <p class="mb-2 text-gray-500">The main difference is that the core
                                components from Landwind are open source under the MIT license, whereas Tailwind UI is a
                                paid product. Another difference is that Landwind relies on smaller and standalone
                                components, whereas Tailwind UI offers sections of pages.</p>
                            <p class="mb-2 text-gray-500">However, we actually recommend using both
                                Landwind, Landwind Pro, and even Tailwind UI as there is no technical reason stopping
                                you from using the best of two worlds.</p>
                            <p class="mb-2 text-gray-500">Learn more about these technologies:</p>
                            <ul class="pl-5 text-gray-500 list-disc">
                                <li><a href="#" class="text-purple-600 hover:underline">Landwind Pro</a>
                                </li>
                                <li><a href="#" class="text-purple-600 hover:underline">Tailwind UI</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End block -->
    <!-- Start block -->
    <section class="bg-gray-50">
        <div class="max-w-screen-xl px-4 py-8 mx-auto lg:py-16 lg:px-6">
            <div class="max-w-screen-sm mx-auto text-center">
                <h2 class="mb-4 mt-2 text-3xl font-extrabold leading-tight tracking-tight text-gray-900">
                    Ready to rent a motorbike?
                </h2>
                <p class="mb-6 font-light text-gray-500 md:text-lg">
                    Rent a motorbike with us and enjoy your vacation in Bali.
                </p>
                <a href="https://wa.me/6281367364350" target="_blank"
                    class="text-white font-semibold bg-green-600 hover:bg-green-700 rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 sm:mr-2 lg:mr-0">
                    <i class="fa-brands fa-whatsapp me-1"></i>
                    Contact Us
                </a>
            </div>
        </div>
    </section>
    <!-- End block -->
@endsection
