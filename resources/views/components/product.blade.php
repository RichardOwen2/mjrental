<div class="w-[290px] bg-white border border-gray-200 rounded-lg shadow" data-aos="fade-up" data-aos-duration="700">
    <img class="rounded-t-lg w-[290px] h-[290px]" src="{{ $image }}" alt="" />
    <div class="p-5 mt-2">
        <h5 class="mb-1 text-2xl font-bold tracking-tight text-gray-900">
            {{ $title }}
        </h5>
        <div class="flex justify-between px-1">
            <div class="flex items-center justify-center gap-1">
                <div>
                    <i class="text-sm fa-solid fa-helmet-un"></i>
                </div>
                <div class="text-xs font-normal text-gray-700">
                    2 Helmet
                </div>
            </div>
            <div class="flex items-center justify-center gap-1">
                <div>
                    <i class="text-sm fa-solid fa-handshake-angle"></i>
                </div>
                <div class="text-xs font-normal text-gray-700">
                    24 hours
                </div>
            </div>
            <div class="flex items-center justify-center gap-1">
                <div>
                    <i class="text-sm fa-solid fa-truck"></i>
                </div>
                <div class="text-xs font-normal text-gray-700">
                    Most Area
                </div>
            </div>
        </div>

        <div class="flex items-center mt-2">
            <div class="text-sm font-semibold text-gray-500">
                Daily
            </div>
            <div class="flex-1 border-gray-100 border-t mx-2"></div>
            <div class="text-sm font-semibold">
                IDR {{ $price_day }}/day
            </div>
        </div>

        <div class="flex items-center mt-1">
            <div class="text-sm font-semibold text-gray-500">
                Weekly
            </div>
            <div class="flex-1 border-gray-100 border-t mx-2"></div>
            <div class="text-sm font-semibold">
                IDR {{ $price_week }}/week
            </div>
        </div>

        <div class="flex items-center mt-1">
            <div class="text-sm font-semibold text-gray-500">
                Monthly
            </div>
            <div class="flex-1 border-gray-100 border-t mx-2"></div>
            <div class="text-sm font-semibold">
                IDR {{ $price_month }}/month
            </div>
        </div>

        <div class="flex justify-center mt-5">
            <a href="{{ route('catalog.detail', ["id" => $id]) }}"
                class="flex justify-center items-center w-full py-2 text-sm font-medium text-white rounded-lg bg-gradient-to-r from-cyan-500 to-blue-700">
                <div class="flex justify-center items-center font-semibold">
                    Detail
                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </div>
            </a>
        </div>
    </div>
</div>
