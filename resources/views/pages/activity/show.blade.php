<x-guest-layout>
    <x-home-navbar />
    <div class=" w-full px-5 py-24 mx-auto lg:px-32">
        <div class="flex flex-col w-full mx-auto mb-2 prose text-left prose-md">
            <div class="mb-5 border-b border-gray-200">
                <div class="flex flex-wrap items-baseline -mt-2 font-semibold">
                    <h5>{{ $data->created_at->diffForHumans() }} by</h5>
                    <p class="mt-1 ml-2 uppercase">{{ $data->user->name }}</p>
                </div>
            </div>
            <h1>{{ $data->title }}</h1>
            {!! $data->body !!}
        </div>
    </div>
</x-guest-layout>