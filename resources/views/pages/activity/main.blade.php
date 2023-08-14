<x-app-layout>
    <div class="bg-base-100 p-6 text-base-content">
        <h1 class="bg-base-100 text-xl py-3 font-semibold">Form Tambah Aktivitas</h1>
            <Link href="{{ route('activty.add') }}" class="btn btn-secondary text-base-content mt-3">Tambah Data Aktivitas</Link>
            <x-splade-table :for="$posts" class="w-5/6">
                <x-splade-cell edit>
                    <Link href="/users/{{ $item->id }}/edit"> Edit </Link>
                </x-splade-cell>
            </x-splade-table>
        </div>
</x-app-layout>