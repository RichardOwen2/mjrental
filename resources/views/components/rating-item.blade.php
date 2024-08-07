<div class="w-full">
    <img class="rounded-full shadow-lg mb-6 mx-auto object-cover" src="{{ $avatar }}" alt="avatar"
        style="width: 150px; height: 150px;" />
    <div class="flex flex-wrap justify-center">
        <div class="grow-0 shrink-0 basis-auto w-full lg:w-8/12 px-3">
            <h5 class="text-lg font-bold mb-3">{{ $name }}</h5>
            <p class="text-gray-500 mb-6">
                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="quote-left"
                    class="w-6 pr-2 inline-block" role="img" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 512 512">
                    <path fill="currentColor"
                        d="M464 256h-80v-64c0-35.3 28.7-64 64-64h8c13.3 0 24-10.7 24-24V56c0-13.3-10.7-24-24-24h-8c-88.4 0-160 71.6-160 160v240c0 26.5 21.5 48 48 48h128c26.5 0 48-21.5 48-48V304c0-26.5-21.5-48-48-48zm-288 0H96v-64c0-35.3 28.7-64 64-64h8c13.3 0 24-10.7 24-24V56c0-13.3-10.7-24-24-24h-8C71.6 32 0 103.6 0 192v240c0 26.5 21.5 48 48 48h128c26.5 0 48-21.5 48-48V304c0-26.5-21.5-48-48-48z">
                    </path>
                </svg>
                {{ $comment }}
            </p>
            <ul class="flex justify-center mb-0">
                @for ($i = 0; $i < $rating; $i++)
                    <li>
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star"
                            class="w-4 text-yellow-500" role="img" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 576 512">
                            <path fill="currentColor"
                                d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z">
                            </path>
                        </svg>
                    </li>
                @endfor
                @for ($i = $rating; $i < 5; $i++)
                    <li>
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star"
                            class="w-4 text-gray-300" role="img" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 576 512">
                            <path fill="currentColor"
                                d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z">
                            </path>
                        </svg>
                @endfor
            </ul>
        </div>
    </div>
</div>
