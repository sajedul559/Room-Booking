<div class="col-lg-4">
    <div class="card">
        <div class="card-body">
            <h4 class="header-title mb-3">{{ isset($editPermission) ?  'Update' : 'New' }} Permission</h4>
                @isset($editPermission)
                <form class="" action="{{ route('permissions.update', $editPermission->id) }}" method="POST">
                    @method('PUT')
                @else

                <form class="" action="{{ route('permissions.store') }}" method="POST">
                @endisset
                @csrf
                <div class="mb-3">
                    <x-common.label for="name" title="Name" isRequired=true />
                    <x-common.input id="name" name="name" value="{{ isset($editPermission)  ? $editPermission->name : '' }}"/>
                </div>
                {{-- <div class="mb-3">
                    <x-common.label for="route" title="Route" isRequired=true />
                    <x-common.input id="route" name="route" value="{{ isset($editPermission)  ? $editPermission->route : '' }}"/>
                </div> --}}
                <div class="mb-3">
                    <x-common.label for="parent_route" title="Parent Route" isRequired=false />
                    <x-common.select2 name="parent_route" id="parent_route">
                        <option value="" >Select Parent Permission</option>
                            @foreach ($parent_routes as $item)                                
                             <option value="{{ $item->route }}">{{ $item->name }}</option>
                            @endforeach
                    </x-common.select2>
                </div>
            
               

                <button class="btn btn-success" type="submit">{{ isset($editPermission) ?  'Update' : 'Submit' }}</button>
            </form>

        </div> <!-- end card-body-->
    </div> <!-- end card-->
</div> <!-- end col-->
