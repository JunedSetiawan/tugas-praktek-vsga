@props(['active', 'as' => 'Link'])

@php
$classes = ($active ?? false)
? 'active bg-base-300'
: '';
@endphp

<{{ $as }} {{ $attributes->class($classes) }}>
    {{ $slot }}
</{{ $as }}>