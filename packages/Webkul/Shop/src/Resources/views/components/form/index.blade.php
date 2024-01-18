<<<<<<< HEAD
{{--
    If a component has the `as` attribute, it indicates that it uses
    the ajaxified form or some customized slot form.
--}}
=======
<!--
    If a component has the `as` attribute, it indicates that it uses
    the ajaxified form or some customized slot form.
-->
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
@if ($attributes->has('as'))
    <v-form {{ $attributes }}>
        {{ $slot }}
    </v-form>

<<<<<<< HEAD
{{--
    Otherwise, a traditional form will be provided with a minimal
    set of configurations.
--}}
=======
<!--
    Otherwise, a traditional form will be provided with a minimal
    set of configurations.
-->
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
@else
    @props([
        'method' => 'POST',
    ])

    @php
        $method = strtoupper($method);
    @endphp

    <v-form
        method="{{ $method === 'GET' ? 'GET' : 'POST' }}"
        :initial-errors="{{ json_encode($errors->getMessages()) }}"
        v-slot="{ meta, errors }"
        {{ $attributes }}
    >
        @unless(in_array($method, ['HEAD', 'GET', 'OPTIONS']))
            @csrf
        @endunless

        @if (! in_array($method, ['GET', 'POST']))
            @method($method)
        @endif

        {{ $slot }}
    </v-form>
@endif
