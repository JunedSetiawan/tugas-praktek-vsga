<x-app-layout>
    <div class="bg-base-100 p-6 text-base-content">
        <h1 class="bg-base-100 text-xl py-3 font-semibold">Form Tambah Aktivitas</h1>
        <x-splade-form class="space-y-3" action="{{ route('activity.update', $post->id) }}" :default="$post">
            <x-splade-input name="title" label="Judul" placeholder="Masukkan judul.." />

            <x-splade-wysiwyg name="body" label="Isi Kegiatan" />

            <x-splade-file name="image" filepond preview />

            <x-splade-submit class="mt-4" />
        </x-splade-form>
    </div>
</x-app-layout>