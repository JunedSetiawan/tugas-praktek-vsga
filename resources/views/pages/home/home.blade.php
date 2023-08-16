<x-guest-layout>
    <x-home-navbar>
        <x-slot name="hero">
            <div class="container px-6 pt-16 pb-6 mx-auto text-center">
                <div class="mx-auto">
                    <h1 class="text-3xl font-bold text-base-content lg:text-4xl">Balai Pengembangan Sumber Daya Manusia
                        dan Penelitian Komunikasi dan Informatika Surabaya
                    </h1>
                    <p class="mt-6 text-base-content">Badan Penelitian dan Pengembangan Sumber Daya Manusia -
                        Kementerian Komunikasi dan Informatika Republik Indonesia</p>
                    <x-splade-form class="mx-auto flex flex-row ">
                        <div class="flex mx-auto space-x-2">
                            <x-splade-input name="search" float="true" label="Cari Kegiatan.." size="60" />
                            <x-splade-submit label="Search" class="my-5 bg-base-content text-base-200 border-0" />
                        </div>
                    </x-splade-form>
                </div>
            </div>
        </x-slot>
    </x-home-navbar>
    <div class="container px-6 py-3 mx-auto">
        <h1 class="mb-5 font-semibold text-2xl text-base-content">All blog posts</h1>
        <div class="mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl py-4">
            <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3 sm:mx-auto lg:max-w-full">
                @foreach ($posts as $post)
                <div class="overflow-hidden transition-shadow duration-300 rounded shadow-sm">
                    {{-- <img src="{{ route('get.image',['folder' => 'image', 'image' => $post->image]) }}" class="object-cover
                    w-full h-48 sm:h-56" /> --}}
                    <img src="{{ asset($post->image ? 'storage/image/' . $post->image : 'storage/image/default.jpg') }}"
                        class="object-cover
                    w-full h-48 sm:h-56" />
                    <div class="pt-5">
                        <p class="mb-3 text-xs font-semibold tracking-wide uppercase">
                            <span class="text-base-content">Admin — {{ $post->created_at->diffForHumans() }}</span>
                        </p>
                        <Link href="{{ route('activity.show',$post->id) }}"
                            class="text-base-content inline-block mb-3 text-lg font-semibold transition-colors duration-200">
                        {{ $post->title }}</Link>
                        <p class="mb-2 text-base-content">
                            {!! Str::limit($post->body, 120) !!}
                        </p>
                        <div class="mt-4 space-x-2 font-semibold underline">
                            Baca Selengkapnya...
                        </div>
                    </div>
                </div>

                @endforeach

            </div>
        </div>
    </div>
    <div class="mt-14 inset-x-0 top-0 h-2 bg-gradient-to-l from-pink-500 via-red-500 to-yellow-500"></div>
    <div class="container px-6 pt-4 pb-4 mx-auto text-center" id="about">
        <div class="mx-auto">
            <h1 class="text-3xl font-bold text-base-content lg:text-3xl pb-4">Tentang Kami
            </h1>
            <h1 class="text-2xl font-bold text-base-content lg:text-2xl">Balai Pengembangan Sumber Daya Manusia
                dan Penelitian Komunikasi dan Informatika Surabaya
            </h1>
            <p class="mt-6 font-semibold text-base-content">Badan Penelitian dan Pengembangan Sumber Daya Manusia -
                Kementerian Komunikasi dan Informatika Republik Indonesia</p>
            <p class="mt-6 font-medium text-base-content">Alamat: Jl. Raya Ketajen No.36, Ketajen, Kec. Gedangan,
                Kabupaten Sidoarjo, Jawa Timur 61254
                Telepon: (031) 8011944
                Provinsi: Jawa Timur
            </p>
        </div>
    </div>
    <x-footer></x-footer>

</x-guest-layout>