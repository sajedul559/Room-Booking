@extends('layouts.layouts')
@section('content')

    <x-common.bread-crum />
    <div class="row pt-1">
        <div class="col-12">
            <div class="card p-4 border-0 shadow-sm">
                <div class="row">
                    <form method="POST" action="{{ route('expenses.store') }}" enctype="multipart/form-data">
                        @csrf
                        @include('backend.expenses.form', ['submitButtonText' => 'Add'])
                    </form>

                </div> <!-- Row -->
            </div> <!-- Card -->
        </div> <!-- Col-12 -->
    </div>
@endsection
