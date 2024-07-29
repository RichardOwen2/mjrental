@extends('layouts.admin.app')

@section('content')
    <div class="card h-md-100" dir="ltr">
        <div class="card-body d-flex flex-column flex-center">
            <div class="mb-2">

                <h1 class="fw-semibold text-gray-800 text-center lh-lg">Quick form to
                    <br />
                    <span class="fw-bolder">Bid a New Shipment</span>
                </h1>

                <div class="py-10 text-center">
                    <img src="assets/media/svg/illustrations/easy/3.svg" class="theme-light-show w-200px" alt="" />
                    <img src="assets/media/svg/illustrations/easy/3-dark.svg" class="theme-dark-show w-200px" alt="" />
                </div>

            </div>

            <div class="text-center mb-1">
                <a class="btn btn-sm btn-primary me-2" data-bs-target="#kt_modal_bidding" data-bs-toggle="modal">Start
                    Now</a>
                <a class="btn btn-sm btn-light" href="apps/invoices/view/invoice-2.html">Quick Guide</a>
            </div>
        </div>
    </div>
@endsection
