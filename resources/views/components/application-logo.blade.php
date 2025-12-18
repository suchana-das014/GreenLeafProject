<div {{ $attributes->merge(['class' => 'flex items-center gap-4']) }}>
    <img
        src="{{ asset('images/leafLogo.jpg') }}"
        alt="GreenLeaf Logo"
        class="h-12 w-12 object-contain"
    />

    <span class="text-4xl font-extrabold tracking-wide text-green-700">
        Green<span class="text-green-500">Leaf</span>
    </span>
</div>
