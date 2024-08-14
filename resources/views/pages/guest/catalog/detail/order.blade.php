<div class="bg-white p-8 rounded-lg shadow-md">
    <div class="space-y-3">
        <div class="flex gap-2" id="order">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Name*</label>
                <input type="text" id="name" name="name"
                    class="mt-1 block w-full px-3 py-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email*</label>
                <input type="email" id="email" name="email"
                    class="mt-1 block w-full px-3 py-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
            </div>
        </div>
        <div class="flex gap-2">
            <div>
                <label for="date-start" class="block text-sm font-medium text-gray-700">Date Start*</label>
                <input type="date" id="date-start" name="date-start"
                    class="mt-1 block w-full px-3 py-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div>
                <label for="date-end" class="block text-sm font-medium text-gray-700">Date End*</label>
                <input type="date" id="date-end" name="date-end"
                    class="mt-1 block w-full px-3 py-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
            </div>
        </div>
        <div>
            <label for="location" class="block text-sm font-medium text-gray-700">Pickup & Drop
                Location</label>
            <textarea id="location" name="location" rows="3"
                class="mt-1 block w-full px-3 py-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"></textarea>
        </div>
        <div>
            <button type="submit" onclick="onOrder()"
                class="w-full inline-flex justify-center py-1 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gradient-to-r from-cyan-500 to-blue-700">
                Book Now
            </button>
        </div>
    </div>
</div>

<script>
    const onOrder = () => {
        const product = '{{$product->type->name}} - {{$product->name}}';

        const name = document.getElementById('name').value;
        const email = document.getElementById('email').value;
        const dateStart = document.getElementById('date-start').value;
        const dateEnd = document.getElementById('date-end').value;
        const location = document.getElementById('location').value;

        const data = `Hello, I want to order the following product:
Product: ${product}
Date Start: ${dateStart}
Date End: ${dateEnd}
Location: ${location}

Here is my information:
Name: ${name}
Email: ${email}`;

        window.open(`https://wa.me/6281367364350?text=${encodeURIComponent(data)}`, '_blank');
    }
</script>
