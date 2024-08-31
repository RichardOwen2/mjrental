<section class="bg-white" data-aos="fade-up" data-aos-duration="700">
    <div class="max-w-screen-xl px-4 py-8 mx-auto lg:py-24 lg:px-6">
        <h1 class="text-center mb-12 text-5xl font-bold text-blue-900">
            Our Products
        </h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 items-center justify-center mb-10">
            @foreach ($products as $product)
                @include('components.product', [
                    'id' => $product->id,
                    'image' => asset('public/uploads/public/product/image/' . $product->cover),
                    'title' => $product->name,
                    'price_day' => \App\Helpers::numberFormat($product->price_day),
                    'price_week' => \App\Helpers::numberFormat($product->price_week),
                    'price_month' => \App\Helpers::numberFormat($product->price_month),
                ])
            @endforeach
        </div>
        <div class="flex items-center justify-center w-full">
            <a href="{{ route('catalog.index') }}"
                class="text-white font-semibold bg-gradient-to-r from-cyan-500 to-blue-700 rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 sm:mr-2 lg:mr-0">
                See More Product
            </a>
        </div>
    </div>
</section>
