<address>
    <strong>{{ $address->company_name ?? '' }}</strong><br>
    {{ $address->name }} <br>
    {{ $address->address1 }}<br>
    @if ($address->address2)
            {{ $address->address2 }}<br>
    @endif
    {{ $address->city }}<br>

    {{ $address->state }}<br>

    {{ core()->country_name($address->country) }} @if ($address->postcode) ({{ $address->postcode }}) @endif<br>

    {{ __('admin::app.sales.orders.view.contact') }} : {{ $address->phone }}
</address>