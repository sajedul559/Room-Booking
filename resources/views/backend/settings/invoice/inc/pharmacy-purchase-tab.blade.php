<form id="payment-invoice-settings" action="{{ route('settings.general.store') }}" method="POST" autocomplete="off" class="payment-invoice-settings" novalidate>
    @csrf
    <div class="card">
        <div class="card-body">
            <div class="mb-3">            
                <x-common.label for="purchase_prefix" title="Prefix" isRequired=true />
                <x-common.input name="types[purchase_prefix]" id="purchase_prefix" value="{{ getSetting('purchase_prefix') }}" placeholder="Enter Prefix"/>
            </div>
            <div class="mb-3">            
                <x-common.label for="purchase_prefix_start" title="Prefix Start" isRequired=true />
                <x-common.input name="types[purchase_prefix_start]" id="purchase_prefix_start" value="{{ getSetting('purchase_prefix_start') }}" placeholder="Enter Prefix number"/>
            </div>
           

        </div>
    </div>

    <div class="text-start mb-3">
        <button type="submit" class="btn btn-success w-sm">Submit</button>
    </div>
</form>