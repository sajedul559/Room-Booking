<div class="mb-3">
    <x-common.label for="name" title="Name" isRequired="true" />
    <x-common.input name="name" placeholder="Enter name" 
                    value="{{ old('name', $user->name ?? '') }}" required />
    @error('name')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="mb-3">
    <x-common.label for="email" title="E-Mail Address" isRequired="true" />
    <x-common.input name="email" type="email" placeholder="Enter email" 
                    value="{{ old('email', $user->email ?? '') }}" required />
    @error('email')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="mb-3">
    <x-common.label for="password" title="Password" :isRequired="Route::currentRouteName() == 'admins.create'" />
    <x-common.input name="password" type="password" placeholder="Enter password" 
                    :required="Route::currentRouteName() == 'admins.create'" />
    @error('password')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="mb-3">
    <x-common.label for="password_confirmation" title="Confirm Password" :isRequired="Route::currentRouteName() == 'admins.create'" />
    <x-common.input name="password_confirmation" type="password" placeholder="Confirm password" 
                    :required="Route::currentRouteName() == 'admins.create'" />
    @error('password_confirmation')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>


<div class="mb-3">
    <x-common.label for="role" title="Role" isRequired="true" />
    <x-common.select2 name="role">
        @foreach($roles as $role)
            <option value="{{ $role->name }}" 
                {{ old('role', $user_role ?? '') == $role->name ? 'selected' : '' }}>
                {{ $role->name }}
            </option>
        @endforeach
    </x-common.select2>
    @error('role')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>


