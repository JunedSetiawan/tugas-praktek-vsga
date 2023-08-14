<div {{ $attributes->merge([
        'class' => 'card bg-base-100 dark:bg-base-900 rounded-md shadow-sm lg:w-3/4 md-w-auto',
    ])->except('body-class') }}>

    <div class="card-body {{ $attributes->get('body-class') }}">
        {{ $slot }}
    </div>

</div>
