@extends('layouts.layouts')
@section('title', 'Invoice Settings')
@section('content')
    <x-common.bread-crum/>

    <div class="row">
        <div class="col-xxl-12">
            <div class="card">
                <div class="card-body">
                 
                    <ul class="nav nav-pills arrow-navtabs nav-success bg-light mb-3" role="tablist">

                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#arrow-lab"
                                role="tab">
                                <span class="d-block d-sm-none"><i class="mdi mdi-home-variant"></i></span>
                                <span class="d-none d-sm-block">Lab</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#arrow-pharmacy-sell" role="tab">
                                <span class="d-block d-sm-none"><i class="mdi mdi-account"></i></span>
                                <span class="d-none d-sm-block">Pharmacy Sell</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#arrow-pharmacy-purchase" role="tab">
                                <span class="d-block d-sm-none"><i class="mdi mdi-account"></i></span>
                                <span class="d-none d-sm-block">Pharmacy Purchase</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#arrow-inventory" role="tab">
                                <span class="d-block d-sm-none"><i class="mdi mdi-account"></i></span>
                                <span class="d-none d-sm-block">Inventory</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#arrow-payment" role="tab">
                                <span class="d-block d-sm-none"><i class="mdi mdi-email"></i></span>
                                <span class="d-none d-sm-block">Payment Invoice</span>
                            </a>
                        </li>
                        
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content text-muted">
                        <div class="tab-pane active" id="arrow-lab" role="tabpanel">
                            @include('backend.settings.invoice.inc.lab-tab')                            
                        </div>
                        <div class="tab-pane" id="arrow-pharmacy-sell" role="tabpanel">
                            @include('backend.settings.invoice.inc.pharmacy-sell-tab')                            
                        </div>
                        <div class="tab-pane" id="arrow-pharmacy-purchase" role="tabpanel">
                            @include('backend.settings.invoice.inc.pharmacy-purchase-tab')                            
                        </div>
                        <div class="tab-pane" id="arrow-inventory" role="tabpanel">
                            @include('backend.settings.invoice.inc.inventory-tab')                            
                        </div>
                        <div class="tab-pane" id="arrow-payment" role="tabpanel">
                            @include('backend.settings.invoice.inc.payment-tab')
                            
                        </div>
                    </div>
                </div>
                <!-- end card-body -->
            </div>
            <!-- end card -->
        </div>
        <!--end col-->
    </div>
    <!--end row-->
@endsection
