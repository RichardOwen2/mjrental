<div id="default-carousel" class="relative w-full mb-0" data-carousel="slide">
    <!-- Carousel wrapper -->
    <div class="relative overflow-hidden h-[300px] md:h-[500px]">
        @foreach ($articles as $article)
            <div class="hidden duration-1000 ease-in-out" data-carousel-item>
                @include('components.hero-item', [
                    'image' => asset('public/uploads/public/article/' . $article->image),
                    'title' => $article->title,
                    'content' => $article->content,
                ])
            </div>
        @endforeach
        @foreach ($articles as $article)
            <div class="hidden duration-1000 ease-in-out" data-carousel-item>
                @include('components.hero-item', [
                    // 'image' => asset('public/uploads/public/article/' . $article->image),
                    'image' => "https://www.mjrentbike.my.id/public/uploads/public/article/1727512095_jojo_bg.png",
                    'title' => $article->title,
                    'content' => $article->content,
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
