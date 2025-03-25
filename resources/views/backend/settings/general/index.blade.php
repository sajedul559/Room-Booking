@extends('layouts.layouts')
@section('title', 'General Settings')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Settings</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Settings</a></li>
                        <li class="breadcrumb-item active">General Settings</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- start page title -->
    <!-- end page title -->
    <div class="row">
        <div class="col-xxl-12">
            <h5 class="mb-3">General Settings</h5>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="nav nav-pills flex-column nav-pills-tab custom-verti-nav-pills text-center"
                                role="tablist" aria-orientation="vertical">
                                @foreach ($settingLists as $key => $item)
                                    <a class="nav-link {{ $key == 0 ? 'active show' : '' }}"
                                        id="custom-v-{{ $item['value'] }}-tab" data-bs-toggle="pill"
                                        href="#custom-v-{{ $item['value'] }}" role="tab"
                                        aria-controls="custom-v-{{ $item['value'] }}" aria-selected="true">
                                        <i class="ri-home-4-line"></i>

                                        <span>{{ $item['name'] }}</span>
                                    </a>
                                @endforeach

                            </div>
                        </div> <!-- end col-->
                        <div class="col-lg-9">
                            <div class="tab-content text-muted mt-3 mt-lg-0">
                                @foreach ($settingLists as $key => $item)
                                    @php
                                        $view = '_' . $item['value'] . '_tab';
                                    @endphp
                                    <div class="tab-pane fade {{ $key == 0 ? 'active show' : '' }}"
                                        id="custom-v-{{ $item['value'] }}" role="tabpanel"
                                        aria-labelledby="custom-v-{{ $item['value'] }}-tab">
                                        @include("backend.settings.general.tabs.$view")
                                    </div>
                                @endforeach

                            </div>
                        </div> <!-- end col-->
                    </div> <!-- end row-->
                </div><!-- end card-body -->
            </div>
            <!--end card-->
        </div>
    </div>
@endsection
