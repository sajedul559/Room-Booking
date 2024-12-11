@extends('layouts.layouts')
@section('title', 'Category')
@section('content')
    <x-common.bread-crum/>

    <div class="row">
        @include('permissions.form')
        @include('permissions.list')
        <!-- end col-->
    </div>
@endsection
