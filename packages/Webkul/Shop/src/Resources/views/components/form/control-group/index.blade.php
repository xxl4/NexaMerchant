<<<<<<< HEAD
<div
    {{ $attributes }}
>
=======
<div {{ $attributes->merge(['class' => 'mb-4']) }}>
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
    {{ $slot }}
</div>
