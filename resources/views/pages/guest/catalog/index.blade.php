@extends('layouts.guest.app')

@section('content')
    <div class="max-w-screen-xl px-6 py-16 mx-auto lg:py-24 lg:px-6">
        <h1 class="mb-12 text-center text-5xl font-bold text-blue-900">
            MJRENT CATALOG
        </h1>

        <div class="flex flex-1 justify-end mb-3">
            <div class="flex flex-col space-y-2 w-full max-w-md">
                <label for="product-type" class="text-lg font-semibold text-gray-800">Pilih Tipe Produk</label>
                <select id="product-type" class="select2 w-full">
                    <option value="*">Semua Tipe</option>
                    @foreach ($types as $type)
                    <option value="{{ $type->name }}">{{ $type->name }}</option>
                    @endforeach
                </select>
            </div>

        </div>

        @if ($products->isEmpty())
            <div class="text-center h-[50vh] flex justify-center items-center text-gray-500">
                <p>

                    Produk tidak ditemukan
                </p>
            </div>
        @endif
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 items-center justify-center">
            @foreach ($products as $product)
                @include('components.product', [
                    'id' => $product->id,
                    'image' => asset('public/uploads/public/product/image/' . $product->cover),
                    'title' => $product->name,
                    'price_day' => \App\Helpers::numberFormat($product->price_day),
                    'price_week' => \App\Helpers::numberFormat($product->price_week),
                    'price_month' => \App\Helpers::numberFormat($product->price_month),
                    'type' => $product->type_id,
                ])
            @endforeach
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        const url = new URL(window.location.href);
        const type = url.searchParams.get('type') ?? '*';

        $(document).ready(function() {
            $('#product-type').select2({
                placeholder: 'Semua Tipe',
                width: 'resolve'
            });

            $('#product-type').val('{{ request('type') }}').trigger('change');

            $('#product-type').on('change', function() {
                window.location.href = '{{ route('catalog.index') }}?type=' + $(this).val();
            });
        });
    </script>
@endsection
