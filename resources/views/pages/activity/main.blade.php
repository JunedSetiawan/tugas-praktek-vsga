<x-app-layout>
    <div class="bg-base-100 p-6 text-base-content">
        <h1 class="bg-base-100 text-xl py-3 font-semibold">Form Tambah Aktivitas</h1>
        <a href="{{ route('create') }}" class="btn btn-secondary text-base-content mt-3">Tambah Data Aktivitas
        </a>
        <x-splade-table :for="$posts" class="w-5/6" striped />
    </div>
</x-app-layout>