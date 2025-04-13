@extends('layout.mainlayout')


@section('content')
<section class="pb-5">
    <div class="container pt-5">

        {{-- <div class="row mt-4">
            <div class="col-md-6 mb-4">
                <div class="p-4 shadow rounded bg-white h-100">
                    <form action="{{ route('profile.updateAvatar') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <h5 class="mb-3">Update Avatar</h5>
                        <div class="mb-3">
                            <label for="avatar" class="form-label">Choose Avatar</label>
                            <input type="file" name="avatar" class="form-control bg-white">
                        </div>
                        <button type="submit" class="btn btn-primary">Update Avatar</button>
                    </form>
                </div>
            </div>
        </div> --}}
        <div class="row mt-4">
            {{-- Avatar Update --}}
            {{-- <div class="col-md-6 mb-4">
                <div class="p-4 shadow rounded bg-white h-100">
                    <form action="{{ route('profile.updateAvatar') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <h5 class="mb-3">Update Avatar</h5>
                        <div class="mb-3">
                            <label for="avatar" class="form-label">Choose Avatar</label>
                            <input type="file" name="avatar" class="form-control bg-white">
                        </div>
                        <button type="submit" class="btn btn-primary">Update Avatar</button>
                    </form>
                </div>
            </div> --}}

            {{-- Change Password --}}
            <div class="col-md-6 mb-4 offset-md-3">

                <div class="p-4 shadow rounded bg-white h-100">
                    <form action="{{ route('profile.changePassword') }}" method="POST">
                        @csrf
                        <h5 class="text-center mb-3 mb-3">Update Profile</h5>
                        <hr>
                        <div class="mb-3">
                            <label>Current Password</label>
                            <input type="password" name="current_password" class="form-control bg-white">
                            @error('current_password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label>New Password</label>
                            <input type="password" name="new_password" class="form-control bg-white">
                            @error('new_password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>Confirm New Password</label>
                            <input type="password" name="new_password_confirmation" class="form-control bg-white">
                            @error('new_password_confirmation')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Change Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection