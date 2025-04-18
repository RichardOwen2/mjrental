<section class="bg-gray-300 h-[300px] md:h-[500px]"
    style="background-image: url('{{ $image }}'); background-size: cover; background-position: center;">
    <div class="grid max-w-screen-xl px-4 pt-16 md:pt-28 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 lg:pt-20">
        <div class="mr-auto place-self-center lg:col-span-7">
            <h1 class="text-white max-w-2xl mb-4 text-4xl font-extrabold leading-none tracking-tight md:text-5xl xl:text-6xl"
                style="text-shadow: 0px 5px 10px rgba(0, 0, 0, 0.27);">
                {{ $title }}
            </h1>
            <p class="max-w-2xl mb-6 text-white font-bold lg:mb-8 md:text-lg lg:text-xl"
                style="text-shadow: 0px 5px 10px rgba(0, 0, 0, 0.27);">
                {{ $content }}
            </p>
        </div>
    </div>
</section>
