<form id="sell-invoice-settings" action="{{ route('settings.general.store') }}" method="POST" autocomplete="off" class="sell-invoice-settings" novalidate>
    @csrf
    <div class="card">
        <div class="card-body">
            <div class="mb-3">            
                <x-common.label for="sell_prefix" title="Prefix" isRequired=true />
                <x-common.input name="types[sell_prefix]" id="sell_prefix" value="{{ getSetting('sell_prefix') }}" placeholder="Enter Prefix"/>
            </div>
            <div class="mb-3">            
                <x-common.label for="sell_prefix_start" title="Prefix Start" isRequired=true />
                <x-common.input name="types[sell_prefix_start]" id="sell_prefix_start" value="{{ getSetting('sell_prefix_start') }}" placeholder="Enter Prefix number"/>
            </div>
           

        </div>
    </div>

    <div class="text-start mb-3">
        <button type="submit" class="btn btn-success w-sm">Submit</button>
    </div>
</form>