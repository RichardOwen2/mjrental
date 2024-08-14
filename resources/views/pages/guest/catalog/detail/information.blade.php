<div class="bg-white p-4 rounded-2xl mt-3 shadow">
    <div class="flex items-center mt-2">
        <div class="text-base font-semibold text-gray-500">
            Daily
        </div>
        <div class="flex-1 border-gray-100 border-t mx-2"></div>
        <div class="text-base text-blue-800 font-bold">
            IDR {{ \App\Helpers::numberFormat($product->price_day) }}/day
        </div>
    </div>

    <div class="flex items-center mt-1">
        <div class="text-base font-semibold text-gray-500">
            Weekly
        </div>
        <div class="flex-1 border-gray-100 border-t mx-2"></div>
        <div class="text-base text-blue-800 font-bold">
            IDR {{ \App\Helpers::numberFormat($product->price_week) }}/week
        </div>
    </div>

    <div class="flex items-center mt-1">
        <div class="text-base font-semibold text-gray-500">
            Monthly
        </div>
        <div class="flex-1 border-gray-100 border-t mx-2"></div>
        <div class="text-base text-blue-800 font-bold">
            IDR {{ \App\Helpers::numberFormat($product->price_month) }}/month
        </div>
    </div>

    {{-- <div class="flex flex-1">
        <a href="https://wa.me/6281367364350" target="_blank"
            class="text-white font-semibold bg-blue-800 hover:bg-blue-900 rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 sm:mr-2 lg:mr-0 mt-4 w-full text-center">
            <i class="fa-brands fa-whatsapp me-1"></i>
            Order Now
        </a>
    </div> --}}
</div>
