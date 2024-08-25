<div class="bg-white p-6 rounded-lg flex flex-col shadow">
    <h1 class="text-2xl font-bold text-blue-800 mb-[-5px] ">
        {{ $product->name }}
    </h1>

    <h3 class="text-base text-blue-800 mb-2">
        {{ $product->type->name }}
    </h3>

    <div class="overflow-y-auto h-[25vh]">
        {!! $product->description !!}
    </div>
</div>
