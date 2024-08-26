<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

<section class="bg-white pt-12" data-aos="fade-right" data-aos-duration="700">
    <div class="max-w-screen-xl px-4 py-8 mx-auto space-y-12 lg:space-y-20 lg:py-24 lg:px-6">
        <!-- Row -->
        <div class="items-center gap-8 lg:grid lg:grid-cols-2 xl:gap-16">
            <div class="text-gray-500 sm:text-lg mb-12">
                <h2 class="mb-4 text-3xl font-extrabold tracking-tight text-gray-900">
                    Location
                </h2>
                <p class="mb-8 font-light lg:text-xl">
                    Visit our office in the MJ area of Bali by clicking on the map MJ RENTAL
                </p>
                <hr class="border-t py-3 border-t-gray-200 w-full">
                <h3 class="mt-2">
                    <i class="fa-solid fa-map-marker-alt me-2 text-blue-500"></i>
                    Jl. Pantai Mengening, Cemagi, Kec. Mengwi, Kabupaten Badung, Bali 80351
                </h3>
                <div class="flex items-center">
                    <i class="fa-solid fa-phone me-2 text-blue-500 text-xl"></i>
                    <div class="ml-2">
                        <div>+62 813-6736-4350</div>
                        <div>+62 878-6307-3231</div>
                    </div>
                </div>
                
                {{--  <h3 class="mt-2">
                    <i class="fa-solid fa-envelope me-2 text-blue-500"></i>
                    lorem@gmail.com
                </h3>  --}}
            </div>
            <div id="map" class="h-[400px]"></div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var map = L.map('map').setView([-8.627569, 115.1145472], 13);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        L.marker([-8.627569, 115.1145472]).addTo(map)
            .bindPopup('MJ RENTAL')
            .openPopup();
    });
</script>
