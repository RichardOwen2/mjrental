<div id="default-carousel" class="relative w-full mb-0 text-center py-12 bg-white" data-carousel="slide">
    <!-- Carousel wrapper -->
    <h2 class="text-2xl md:text-4xl font-bold mb-12" data-aos="fade-up" data-aos-duration="700">
        Customer Review
    </h2>

    <div class="relative overflow-hidden h-[350px]" data-aos="fade-up" data-aos-duration="700">
        <!-- Item 1 -->

        @foreach ($reviews as $review)
        
        <div class="hidden duration-1000 ease-in-out" data-carousel-item>
            @include('components.rating-item', [
                'avatar' => asset('metronic/media/avatars/300-1.jpg'), 
                'name' => $review->title,
                'comment' => $review->description, 
                'rating' => $review->rating, 
            ])
        </div>
    @endforeach
    
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
