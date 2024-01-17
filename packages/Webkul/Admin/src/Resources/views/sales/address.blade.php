<div class="flex flex-col">
    <p class="text-gray-800 font-semibold leading-6 dark:text-white">
        {{ $address->company_name ?? '' }}
    </p>

    <p class="text-gray-800 font-semibold leading-6 dark:text-white">
        {{ $address->name }}
    </p>
    
<<<<<<< HEAD
    <p class="text-gray-600 dark:text-gray-300 leading-6">
=======
    <p class="text-gray-600 dark:text-gray-300 !leading-6">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        {{ $address->address1 }}<br>

        @if ($address->address2)
            {{ $address->address2 }}<br>
        @endif

        {{ $address->city }}<br>

        {{ $address->state }}<br>

        {{ core()->country_name($address->country) }} @if ($address->postcode) ({{ $address->postcode }}) @endif<br>

        {{ __('admin::app.sales.orders.view.contact') }} : {{ $address->phone }}
    </p>
</div>