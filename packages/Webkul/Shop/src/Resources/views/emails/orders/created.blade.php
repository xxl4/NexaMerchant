@component('shop::emails.layout')
<div style="margin-bottom: 34px;">
    <span style="font-size: 22px;font-weight: 600;color: #121A26">
        @lang('shop::app.emails.orders.created.title')
    </span> <br>

    <p style="font-size: 16px;color: #5E5E5E;line-height: 24px;">
        @lang('shop::app.emails.dear', ['customer_name' => $order->customer_full_name]),👋
    </p>

    <p style="font-size: 16px;color: #5E5E5E;line-height: 24px;">
        {!! __('shop::app.emails.orders.created.greeting', [
        'order_id' => '<a href="' . route('shop.customers.account.orders.view', $order->id) . '" style="color: #2969FF;">#' . $order->increment_id . '</a>',
        'created_at' => core()->formatDate($order->created_at, 'Y-m-d H:i:s')
        ])
        !!}
    </p>
</div>

<div style="font-size: 20px;font-weight: 600;color: #121A26">
    @lang('shop::app.emails.orders.created.summary')
</div>

<div style="display: flex;flex-direction: row;margin-top: 20px;justify-content: space-between;margin-bottom: 40px;">
    @if ($order->shipping_address)
    <div style="line-height: 25px;">
        <div style="font-size: 16px;font-weight: 600;color: #121A26;">
            @lang('shop::app.emails.orders.shipping-address')
        </div>

        <div style="font-size: 16px;font-weight: 400;color: #384860;margin-bottom: 40px;">
            {{ $order->shipping_address->company_name ?? '' }}<br />

            {{ $order->shipping_address->name }}<br />

            {{ $order->shipping_address->address1 }}<br />

            {{ $order->shipping_address->postcode . " " . $order->shipping_address->city }}<br />

            {{ $order->shipping_address->state }}<br />

            ---<br />

            @lang('shop::app.emails.orders.contact') : {{ $order->billing_address->phone }}
        </div>

        <div style="font-size: 16px;font-weight: 600;color: #121A26;">
            @lang('shop::app.emails.orders.shipping')
        </div>

        <div style="font-size: 16px;font-weight: 400;color: #384860;">
            {{ $order->shipping_title }}
        </div>
    </div>
    @endif

    @if ($order->billing_address)
    <div style="line-height: 25px;">
        <div style="font-size: 16px;font-weight: 600;color: #121A26;">
            @lang('shop::app.emails.orders.billing-address')
        </div>

        <div style="font-size: 16px;font-weight: 400;color: #384860;margin-bottom: 40px;">
            {{ $order->billing_address->company_name ?? '' }}<br />

            {{ $order->billing_address->name }}<br />

            {{ $order->billing_address->address1 }}<br />

            {{ $order->billing_address->postcode . " " . $order->billing_address->city }}<br />

            {{ $order->billing_address->state }}<br />

            ---<br />

            @lang('shop::app.emails.orders.contact') : {{ $order->billing_address->phone }}
        </div>

        <div style="font-size: 16px;font-weight: 600;color: #121A26;">
            @lang('shop::app.emails.orders.payment')
        </div>

        <div style="font-size: 16px;font-weight: 400;color: #384860;">
            {{ core()->getConfigData('sales.payment_methods.' . $order->payment->method . '.title') }}
        </div>

        @php $additionalDetails = \Webkul\Payment\Payment::getAdditionalDetails($order->payment->method); @endphp

        @if (! empty($additionalDetails))
        <div style="font-size: 16px; color: #384860;">
            <div>{{ $additionalDetails['title'] }}</div>
            <div>{{ $additionalDetails['value'] }}</div>
        </div>
        @endif
    </div>
    @endif
</div>

<div style="padding-bottom: 40px;border-bottom: 1px solid #CBD5E1;">
    <table style="overflow-x: auto; border-collapse: collapse;
        border-spacing: 0;width: 100%">
        <thead>
            <tr style="color: #121A26;border-top: 1px solid #CBD5E1;border-bottom: 1px solid #CBD5E1;">
                @foreach (['sku', 'name', 'price', 'qty'] as $item)
                <th style="text-align: left;padding: 15px">
                    @lang('shop::app.emails.orders.' . $item)
                </th>
                @endforeach
            </tr>
        </thead>

        <tbody style="font-size: 16px;font-weight: 400;color: #384860;">
            @foreach ($order->items as $item)
            <tr>
                <td style="text-align: left;padding: 15px">{{ $item->getTypeInstance()->getOrderedItem($item)->sku }}</td>

                <td style="text-align: left;padding: 15px">
                    {{ $item->name }}

                    @if (isset($item->additional['attributes']))
                    <div>

                        @foreach ($item->additional['attributes'] as $attribute)
                        <b>{{ $attribute['attribute_name'] }} : </b>{{ $attribute['option_label'] }}</br>
                        @endforeach

                    </div>
                    @endif
                </td>

                <td style="text-align: left;padding: 15px">{{ core()->formatPrice($item->price, $order->order_currency_code) }}
                </td>

                <td style="text-align: left;padding: 15px">{{ $item->qty_ordered }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div style="display: grid;justify-content: end;font-size: 16px;color: #384860;line-height: 30px;padding-top: 20px;padding-bottom: 20px;">
    <div style="display: grid;gap: 100px;grid-template-columns: repeat(2, minmax(0, 1fr));">
        <span>
            @lang('shop::app.emails.orders.subtotal')
        </span>

        <span style="text-align: right;">
            {{ core()->formatPrice($order->sub_total, $order->order_currency_code) }}
        </span>
    </div>

    @if ($order->shipping_address)
    <div style="display: grid;gap: 100px;grid-template-columns: repeat(2, minmax(0, 1fr));">
        <span>
            @lang('shop::app.emails.orders.shipping-handling')
        </span>

        <span style="text-align: right;">
            {{ core()->formatPrice($order->shipping_amount, $order->order_currency_code) }}
        </span>
    </div>
    @endif

    @foreach (Webkul\Tax\Helpers\Tax::getTaxRatesWithAmount($order, false) as $taxRate => $taxAmount )
    <div style="display: grid;gap: 100px;grid-template-columns: repeat(2, minmax(0, 1fr));">
        <span>
            @lang('shop::app.emails.orders.tax') {{ $taxRate }} %
        </span>

        <span style="text-align: right;">
            {{ core()->formatPrice($taxAmount, $order->order_currency_code) }}
        </span>
    </div>
    @endforeach

    @if ($order->discount_amount > 0)
    <div style="display: grid;gap: 100px;grid-template-columns: repeat(2, minmax(0, 1fr));">
        <span>
            @lang('shop::app.emails.orders.discount')
        </span>

        <span style="text-align: right;">
            {{ core()->formatPrice($order->discount_amount, $order->order_currency_code) }}
        </span>
    </div>
    @endif

    <div style="display: grid;gap: 100px;grid-template-columns: repeat(2, minmax(0, 1fr));font-weight: bold">
        <span>
            @lang('shop::app.emails.orders.grand-total')
        </span>

        <span style="text-align: right;">
            {{ core()->formatPrice($order->grand_total, $order->order_currency_code) }}
        </span>
    </div>
</div>
<!-- <table style="height:100%!important;width:100%!important;border-spacing:0;border-collapse:collapse">
    <tbody>
        <tr>
            <td
                style="font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif">
                <table class="m_2996325991420880361header"
                    style="width:100%;border-spacing:0;border-collapse:collapse;margin:40px 0 20px">
                    <tbody>
                        <tr>
                            <td
                                style="font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif">
                                <center>

                                    <table class="m_2996325991420880361container"
                                        style="width:560px;text-align:left;border-spacing:0;border-collapse:collapse;margin:0 auto">
                                        <tbody>
                                            <tr>
                                                <td
                                                    style="font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif">

                                                    <table style="width:100%;border-spacing:0;border-collapse:collapse">
                                                        <tbody>
                                                            <tr>
                                                                <td class="m_2996325991420880361shop-name__cell"
                                                                    style="font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif">
                                                                    <img
                                                                        src="https://ci3.googleusercontent.com/meips/ADKq_NbtemJ7DtrBsDN8-fxoZ_r_e8G69d30JH19Ly2D5Cov-sKgnW2VVMoLDI_X8fweDQMhhsRAY2ADEr9lEaIrELsw69dj7vgd7KPGcy2aqUmyRzGgmX2nfRUyLiBXbiOTRhIs3Jk8Ou6WXdgWGLyZ9b88W0SEJ8nqSGP51JvEVtAQqQ50RD-eB3Y=s0-d-e1-ft#https://cdn.shopify.com/s/files/1/0771/1411/4355/files/20230526164352_086567a2-d10e-49d5-9154-0c58512dcc28.png?633"
                                                                        alt="Wmbra" width="108" class="CToWUd" data-bit="iit">

                                                                    @if ($logo = core()->getCurrentChannel()->logo_url)
                                                                    <img src="{{ $logo }}" alt="{{ config('app.name') }}" width="108" class="CToWUd"
                                                                        data-bit="iit" />
                                                                    @else
                                                                    <img src="{{ bagisto_asset('images/logo.svg', 'shop') }}"
                                                                        alt="{{ config('app.name') }}" width="108" class="CToWUd" data-bit="iit" />
                                                                    @endif
                                                                </td>

                                                                <td
                                                                    style="font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="m_2996325991420880361order-number__cell"
                                                                    style="font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif;text-transform:uppercase;font-size:14px;color:#999"
                                                                    align="right">
                                                                    <span style="font-size:16px">
                                                                        Bestellung BH#{{ $order->increment_id}}
                                                                    </span>
                                                                </td>
                                                            </tr>


                                                        </tbody>
                                                    </table>

                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </center>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <table style="width:100%;border-spacing:0;border-collapse:collapse">
                    <tbody>
                        <tr>
                            <td
                                style="font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif;padding-bottom:40px;border-width:0">
                                <center>
                                    <table class="m_2996325991420880361container"
                                        style="width:560px;text-align:left;border-spacing:0;border-collapse:collapse;margin:0 auto">
                                        <tbody>
                                            <tr>
                                                <td
                                                    style="font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif">

                                                    <h2 style="font-weight:normal;font-size:24px;margin:0 0 10px">

                                                        Vielen Dank für deinen Einkauf!

                                                    </h2>
                                                    <p style="color:#777;line-height:150%;font-size:16px;margin:0">
                                                        Wir bereiten deine Bestellung gerade für den Versand vor. Wir benachrichtigen dich, sobald
                                                        die Bestellung verschickt wurde.
                                                    </p>
                                                    <table style="width:100%;border-spacing:0;border-collapse:collapse;margin-top:20px">
                                                        <tbody>
                                                            <tr>
                                                                <td
                                                                    style="font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif;line-height:0em">
                                                                    &nbsp;</td>
                                                            </tr>
                                                            <tr>
                                                                <td
                                                                    style="font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif">
                                                                    <table class="m_2996325991420880361button m_2996325991420880361main-action-cell"
                                                                        style="border-spacing:0;border-collapse:collapse;float:left;margin-right:15px">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td
                                                                                    style="font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif;border-radius:4px"
                                                                                    align="center" bgcolor="#ea4f8b"><a
                                                                                        href="https://www.wmbra.de/_t/c/A1030004-181A221BDDB91DF8-D46A4451?l=AAAruGCMbYFxOA%2FjY3oSOU1BcuundXCtvOw5Lrf2UO8LG7xOjInK5BjET%2FDbYD764AMgajsVbaCPpQ7mg0WcmzwWDVb2ph9HJbc4pB13Eul6RLBRMwtTEp%2B15bX2y1U8ToCme6P53Z7Pg7w7%2FSXAvhiyuc%2F%2F9NwYWwsXZ0GRUXA67pHrPNdFpCZycdDx43nY7ON8OUHls9Q%2BlMQKyyU%2B9cEnvM9nSIWiz0ug6qhlYISC8QbufM4FIR7cB6%2BL4abvKuSpNSmXmROBXjnSCRwgarAfxpPJ7xasMetV2OdYcKJ2vPKDllGJKUYZdUgMbNm%2F7dwVxqgk%2BypFzeF6AVic8ECenusdlG6r0Ms%3D&amp;c=AACsPNZyRTuNDhlyIy8uZ3E%2FAC0Lq66xWKds3bLjpVB9wz1Tguorp9sjwKgn10iaXQ7kodyWl7CdJ%2FWdWaAz%2FKtIAZyqxX%2FTeWSAkafaU3SSHxvE%2F7qi0%2BOqHQn0wNtjGul3nZWgrQy%2BjsSahzZ1QkZ3kqtPrIJzQyfaUB092Y7QFJtCGe7fnDv1jCeVNEHjybN08g6Fswja%2FgphDfPrOaVjo8W2lkgDn%2BPZLCUk3K2nwf93aW7waEHnLjaunftDpx0tj2jaXZjuZM5ukUnqno2YPUAbbTSLzkdf81nlZNvBbfe%2BODqkIqYw3wfmln4DuzpM%2BSkXi8AO%2BN9mdBf043mMEL7w3C6UBWb3NmMriFricU4Y53NlvWmpSnEnLJ7J9K15vFHBfmfrejbZlAREdTgv%2FngTCLyV5XB1x%2F4H7%2Fc4cKuFprmuyXaFGp1EP1W9YcsZmYrbbAii37sziUFJFkgu"
                                                                                        class="m_2996325991420880361button__text"
                                                                                        style="font-size:16px;text-decoration:none;display:block;color:#fff;padding:20px 25px"
                                                                                        target="_blank"
                                                                                        data-saferedirecturl="https://www.google.com/url?q=https://www.wmbra.de/_t/c/A1030004-181A221BDDB91DF8-D46A4451?l%3DAAAruGCMbYFxOA%252FjY3oSOU1BcuundXCtvOw5Lrf2UO8LG7xOjInK5BjET%252FDbYD764AMgajsVbaCPpQ7mg0WcmzwWDVb2ph9HJbc4pB13Eul6RLBRMwtTEp%252B15bX2y1U8ToCme6P53Z7Pg7w7%252FSXAvhiyuc%252F%252F9NwYWwsXZ0GRUXA67pHrPNdFpCZycdDx43nY7ON8OUHls9Q%252BlMQKyyU%252B9cEnvM9nSIWiz0ug6qhlYISC8QbufM4FIR7cB6%252BL4abvKuSpNSmXmROBXjnSCRwgarAfxpPJ7xasMetV2OdYcKJ2vPKDllGJKUYZdUgMbNm%252F7dwVxqgk%252BypFzeF6AVic8ECenusdlG6r0Ms%253D%26c%3DAACsPNZyRTuNDhlyIy8uZ3E%252FAC0Lq66xWKds3bLjpVB9wz1Tguorp9sjwKgn10iaXQ7kodyWl7CdJ%252FWdWaAz%252FKtIAZyqxX%252FTeWSAkafaU3SSHxvE%252F7qi0%252BOqHQn0wNtjGul3nZWgrQy%252BjsSahzZ1QkZ3kqtPrIJzQyfaUB092Y7QFJtCGe7fnDv1jCeVNEHjybN08g6Fswja%252FgphDfPrOaVjo8W2lkgDn%252BPZLCUk3K2nwf93aW7waEHnLjaunftDpx0tj2jaXZjuZM5ukUnqno2YPUAbbTSLzkdf81nlZNvBbfe%252BODqkIqYw3wfmln4DuzpM%252BSkXi8AO%252BN9mdBf043mMEL7w3C6UBWb3NmMriFricU4Y53NlvWmpSnEnLJ7J9K15vFHBfmfrejbZlAREdTgv%252FngTCLyV5XB1x%252F4H7%252Fc4cKuFprmuyXaFGp1EP1W9YcsZmYrbbAii37sziUFJFkgu&amp;source=gmail&amp;ust=1736827134813000&amp;usg=AOvVaw2G_sG8OUqwrK0Sf6uM4v8H">Bestellung
                                                                                        ansehen</a></td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>

                                                                    <table class="m_2996325991420880361secondary-action-cell"
                                                                        style="border-spacing:0;border-collapse:collapse;margin-top:19px">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td
                                                                                    style="font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif;border-radius:4px"
                                                                                    align="center">oder <a
                                                                                        href="https://www.wmbra.de/_t/c/A1030004-181A221BDDB91DF8-D46A4451?l=AADKKXdPYlgS2H%2Fj04NRHlj0EP%2FAKCaPY%2F5bnNpGmfXYDccW%2BuHmAbTxQjJyIuEsLF1xc%2F3h6P6KCf%2FNwj4dfJvC3so14ghlr1oVR%2FQIf3LUM2OrwXBPH%2BvH98IEV0idnW%2BEUjpPjVSiOAHRYlloVWJeoQDA9GXljnI6mRRxPSi66JYCgAuFtpGEtwxncnVbLT0NQcvn7PW5nIXpEf96&amp;c=AACPe2hSmU3%2FRhBxXztTXL1VasjGmU7K2E3UpByylq4vi5xr74IKx7%2Ba%2BEUh8c7pUR1OblcUMYiCgzYFh6pceE4f2gg7REUp63aXC8OfDtZltfX7XX6khpEu8%2BwrzUq88rAMJbUVKOQdjE60pSYDLh9etozNQ1Sto8bqwRLrMZu4uYeIV5I1O8x%2Fmm8Y%2Fzy2udI9UPqE8HMM1hd6iKL%2FcwroZQ34s916Bi6fHklSqCAhNqN6UdEd1BuuGkwsg7d8ZfoC10j8j%2FX4gw3cG5%2Bb50bCcGgAmT4U5GI5%2FONhMvZrAyVQMqeeAcqOMGbML2%2BeKKTof3vkuuvJbqF5%2F3qaK93K4RbxvheNzNwNhg0zSAhLlNNirF42M%2FmHBuDJ8I8Mo5BUFoUE%2BqZAIb9iUOk4kovlK%2BfsAw6hjbWO2u1dH7mmB%2FRdVhwGFn5DKUSp%2Bo7%2FGFU5nmmKrE7ckIuqQMzUySjf"
                                                                                        style="font-size:16px;text-decoration:none;color:#ea4f8b" target="_blank"
                                                                                        data-saferedirecturl="https://www.google.com/url?q=https://www.wmbra.de/_t/c/A1030004-181A221BDDB91DF8-D46A4451?l%3DAADKKXdPYlgS2H%252Fj04NRHlj0EP%252FAKCaPY%252F5bnNpGmfXYDccW%252BuHmAbTxQjJyIuEsLF1xc%252F3h6P6KCf%252FNwj4dfJvC3so14ghlr1oVR%252FQIf3LUM2OrwXBPH%252BvH98IEV0idnW%252BEUjpPjVSiOAHRYlloVWJeoQDA9GXljnI6mRRxPSi66JYCgAuFtpGEtwxncnVbLT0NQcvn7PW5nIXpEf96%26c%3DAACPe2hSmU3%252FRhBxXztTXL1VasjGmU7K2E3UpByylq4vi5xr74IKx7%252Ba%252BEUh8c7pUR1OblcUMYiCgzYFh6pceE4f2gg7REUp63aXC8OfDtZltfX7XX6khpEu8%252BwrzUq88rAMJbUVKOQdjE60pSYDLh9etozNQ1Sto8bqwRLrMZu4uYeIV5I1O8x%252Fmm8Y%252Fzy2udI9UPqE8HMM1hd6iKL%252FcwroZQ34s916Bi6fHklSqCAhNqN6UdEd1BuuGkwsg7d8ZfoC10j8j%252FX4gw3cG5%252Bb50bCcGgAmT4U5GI5%252FONhMvZrAyVQMqeeAcqOMGbML2%252BeKKTof3vkuuvJbqF5%252F3qaK93K4RbxvheNzNwNhg0zSAhLlNNirF42M%252FmHBuDJ8I8Mo5BUFoUE%252BqZAIb9iUOk4kovlK%252BfsAw6hjbWO2u1dH7mmB%252FRdVhwGFn5DKUSp%252Bo7%252FGFU5nmmKrE7ckIuqQMzUySjf&amp;source=gmail&amp;ust=1736827134813000&amp;usg=AOvVaw3yZRr2bIKW6gvcFXJmrTWz">Zu
                                                                                        unserem Shop</a>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>


                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </center>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <table style="width:100%;border-spacing:0;border-collapse:collapse">
                    <tbody>
                        <tr>
                            <td
                                style="font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif;padding:40px 0">
                                <center>
                                    <table class="m_2996325991420880361container"
                                        style="width:560px;text-align:left;border-spacing:0;border-collapse:collapse;margin:0 auto">
                                        <tbody>
                                            <tr>
                                                <td
                                                    style="font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif">
                                                    <h3 style="font-weight:normal;font-size:20px;margin:0 0 25px">Bestellübersicht</h3>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="m_2996325991420880361container"
                                        style="width:560px;text-align:left;border-spacing:0;border-collapse:collapse;margin:0 auto">
                                        <tbody>
                                            <tr>
                                                <td
                                                    style="font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif">

                                                    <table style="width:100%;border-spacing:0;border-collapse:collapse">

                                                        <tbody>
                                                            <tr style="width:100%">
                                                                <td
                                                                    style="font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif">
                                                                    <table style="border-spacing:0;border-collapse:collapse">
                                                                        <tbody>
                                                                            @foreach ($order->items as $item)
                                                                            <tr>
                                                                                <td
                                                                                    style="font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif">


                                                                                </td>
                                                                                <td
                                                                                    style="font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif;width:100%">

                                                                                    <span style="font-size:16px;font-weight:600;line-height:1.4;color:#555">
                                                                                        {{ $item->name }}&nbsp;×&nbsp;{{ $item->qty_ordered }}</span><br>


                                                                                    <span style="font-size:14px;color:#999;font-weight:400">
                                                                                        @foreach ($item->additional['attributes'] as $attribute)
                                                                                        <b>{{ $attribute['attribute_name'] }} : </b>{{ $attribute['option_label']
                                              }}</br>
                                                                                        @endforeach
                                                                                    </span><br>

                                                                                </td>
                                                                                <td
                                                                                    style="font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif;white-space:nowrap">

                                                                                    <p style="color:#555;line-height:150%;font-size:16px;font-weight:600;margin:4px 0 0 15px"
                                                                                        align="right">

                                                                                        {{ core()->formatPrice($item->price, $order->order_currency_code) }}

                                                                                    </p>
                                                                                </td>
                                                                            </tr>
                                                                            @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>

                                                    <table
                                                        style="width:100%;border-spacing:0;border-collapse:collapse;margin-top:15px;border-top-width:1px;border-top-color:#e5e5e5;border-top-style:solid">
                                                        <tbody>
                                                            <tr>
                                                                <td class="m_2996325991420880361subtotal-spacer"
                                                                    style="font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif;width:40%">
                                                                </td>
                                                                <td
                                                                    style="font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif">
                                                                    <table style="width:100%;border-spacing:0;border-collapse:collapse;margin-top:20px">



                                                                        <tbody>
                                                                            <tr>
                                                                                <td
                                                                                    style="font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif;padding:2px 0">
                                                                                    <p style="color:#777;line-height:1.2em;font-size:16px;margin:4px 0 0">
                                                                                        <span style="font-size:16px">Zwischensumme</span>
                                                                                    </p>
                                                                                </td>
                                                                                <td
                                                                                    style="font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif;padding:2px 0"
                                                                                    align="right">
                                                                                    <strong style="font-size:16px;color:#555">
                                                                                        {{ core()->formatPrice($order->sub_total, $order->order_currency_code) }}
                                                                                    </strong>
                                                                                </td>
                                                                            </tr>
                                                                            @if ($order->shipping_address)
                                                                            <tr>
                                                                                <td
                                                                                    style="font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif;padding:2px 0">
                                                                                    <p style="color:#777;line-height:1.2em;font-size:16px;margin:4px 0 0">
                                                                                        <span style="font-size:16px">Versand</span>
                                                                                    </p>
                                                                                </td>
                                                                                <td
                                                                                    style="font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif;padding:2px 0"
                                                                                    align="right">
                                                                                    <strong style="font-size:16px;color:#555">
                                                                                        {{ core()->formatPrice($order->shipping_amount,
                                              $order->order_currency_code) }}
                                                                                    </strong>
                                                                                </td>
                                                                            </tr>
                                                                            @endif

                                                                            <tr>
                                                                                <td
                                                                                    style="font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif;padding:2px 0">
                                                                                    <p style="color:#777;line-height:1.2em;font-size:16px;margin:4px 0 0">
                                                                                        <span style="font-size:16px">Steuern</span>
                                                                                    </p>
                                                                                </td>
                                                                                <td
                                                                                    style="font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif;padding:2px 0"
                                                                                    align="right">
                                                                                    <strong style="font-size:16px;color:#555">
                                                                                        {{ core()->formatPrice($taxAmount, $order->order_currency_code) }}
                                                                                    </strong>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                    @if ($order->discount_amount > 0)
                                                                    <table
                                                                        style="width:100%;border-spacing:0;border-collapse:collapse;margin-top:20px;border-top-width:2px;border-top-color:#e5e5e5;border-top-style:solid">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td
                                                                                    style="font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif;padding:20px 0 0">
                                                                                    <p style="color:#777;line-height:1.2em;font-size:16px;margin:4px 0 0">
                                                                                        <span style="font-size:16px">Gesamt</span>
                                                                                    </p>
                                                                                </td>
                                                                                <td
                                                                                    style="font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif;padding:20px 0 0"
                                                                                    align="right">
                                                                                    <strong style="font-size:24px;color:#555">
                                                                                        {{ core()->formatPrice($order->discount_amount,
                                              $order->order_currency_code) }}
                                                                                    </strong>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </center>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <table style="width:100%;border-spacing:0;border-collapse:collapse">
                    <tbody>
                        <tr>
                            <td
                                style="font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif;padding:40px 0">
                                <center>
                                    <table class="m_2996325991420880361container"
                                        style="width:560px;text-align:left;border-spacing:0;border-collapse:collapse;margin:0 auto">
                                        <tbody>
                                            <tr>
                                                <td
                                                    style="font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif">
                                                    <h3 style="font-weight:normal;font-size:20px;margin:0 0 25px">Kundeninformationen</h3>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="m_2996325991420880361container"
                                        style="width:560px;text-align:left;border-spacing:0;border-collapse:collapse;margin:0 auto">
                                        <tbody>
                                            <tr>
                                                <td
                                                    style="font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif">

                                                    <table style="width:100%;border-spacing:0;border-collapse:collapse">
                                                        <tbody>
                                                            <tr>
                                                                @if ($order->shipping_address)
                                                                <td class="m_2996325991420880361customer-info__item"
                                                                    style="font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif;padding-bottom:40px;width:50%"
                                                                    valign="top">
                                                                    <h4 style="font-weight:500;font-size:16px;color:#555;margin:0 0 5px">Lieferadresse
                                                                    </h4>
                                                                    <p style="color:#777;line-height:150%;font-size:16px;margin:0">{{
                                      $order->shipping_address->name }}<br>{{ $order->shipping_address->address1 }}
                                                                        <br>{{ $order->shipping_address->postcode . " " . $order->shipping_address->city
                                      }}<br>{{ $order->shipping_address->state }}<br>{{ $order->shipping_address->locale
                                      }}
                                                                    </p>
                                                                </td>
                                                                @endif

                                                                @if ($order->billing_address)
                                                                <td class="m_2996325991420880361customer-info__item"
                                                                    style="font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif;padding-bottom:40px;width:50%"
                                                                    valign="top">
                                                                    <h4 style="font-weight:500;font-size:16px;color:#555;margin:0 0 5px">
                                                                        Rechnungsadresse</h4>
                                                                    <p style="color:#777;line-height:150%;font-size:16px;margin:0"> {{
                                      $order->billing_address->name }}<br />{{ $order->billing_address->address1
                                      }}<br />
                                                                        {{ $order->billing_address->postcode . " " . $order->billing_address->city
                                      }}<br />

                                                                        {{ $order->billing_address->state }}<br />{{ $order->billing_address->locale
                                      }}
                                                                    </p>
                                                                </td>
                                                                @endif
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <table style="width:100%;border-spacing:0;border-collapse:collapse">
                                                        <tbody>
                                                            <tr>


                                                                <td class="m_2996325991420880361customer-info__item"
                                                                    style="font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif;padding-bottom:40px;width:50%"
                                                                    valign="top">
                                                                    <h4 style="font-weight:500;font-size:16px;color:#555;margin:0 0 5px">Zahlung</h4>
                                                                    <p style="color:#777;line-height:150%;font-size:16px;margin:0">
                                                                        {{ $order->shipping_title }}<br>
                                                                    </p>
                                                                </td>
                                                                <td class="m_2996325991420880361customer-info__item"
                                                                    style="font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif;padding-bottom:40px;width:50%"
                                                                    valign="top">
                                                                    <h4 style="font-weight:500;font-size:16px;color:#555;margin:0 0 5px">Zahlung</h4>
                                                                    <p style="color:#777;line-height:150%;font-size:16px;margin:0">
                                                                        {{ core()->getConfigData('sales.payment_methods.' . $order->payment->method .  '.title') }}<br>
                                                                    </p>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>

                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </center>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <table
                    style="width:100%;border-spacing:0;border-collapse:collapse;border-top-width:1px;border-top-color:#e5e5e5;border-top-style:solid">
                    <tbody>
                        <tr>
                            <td
                                style="font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif;padding:35px 0">
                                <center>
                                    <table class="m_2996325991420880361container"
                                        style="width:560px;text-align:left;border-spacing:0;border-collapse:collapse;margin:0 auto">
                                        <tbody>
                                            <tr>
                                                <td
                                                    style="font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif">

                                                    <p style="color:#999;line-height:150%;font-size:14px;margin:0">Falls du Fragen hast,
                                                        antworte auf diese E-Mail oder kontaktiere uns unter <a href="mailto:info@wmbra.de"
                                                            style="font-size:14px;text-decoration:none;color:#ea4f8b"
                                                            target="_blank">info@wmbra.de</a>.</p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </center>
                            </td>
                        </tr>
                    </tbody>
                </table>

            </td>
        </tr>
    </tbody>
</table> -->
@endcomponent