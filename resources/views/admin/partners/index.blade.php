@extends('layouts.admin')

@section('content')
<header class="flex justify-between items-center mb-10">
    <div class="flex justify-between items-center w-full">
    <div>
        <h1 class="text-3xl font-black">Manajemen Partner</h1>
        <p class="text-slate-500 font-medium">
            Kelola semua Partner event di platform ini
        </p>
    </div>

    <form method="GET" action="{{ route('admin.partners.index') }}">
        <input
            type="text"
            name="search"
            value="{{ request('search') }}"
            placeholder="Cari Partner..."
            class="px-5 py-3 border border-slate-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-indigo-500">
    </form>
</div>
    <button onclick="openAddModal()"
        class="px-8 py-4 bg-indigo-600 text-white rounded-2xl font-bold shadow-lg shadow-indigo-200 hover:bg-indigo-700 transition">
        + Tambah Partner
    </button>
</header>

<!-- Categories Table -->
<div class="bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr class="border-b border-slate-100 bg-slate-50">
    <th class="px-6 py-4">No</th>
    <th class="px-6 py-4">Logo</th>
    <th class="px-6 py-4">Nama Partner</th>
    <th class="px-6 py-4">Dibuat</th>
    <th class="px-6 py-4 text-center">Aksi</th>
</tr>
            </thead>
            <tbody class="divide-y divide-slate-100">

    @forelse ($partners as $partner)
    <tr class="hover:bg-slate-50 transition">

    <td class="px-6 py-4">
        {{ $loop->iteration }}
    </td>

    <td class="px-6 py-4">
        <img src="{{ $partner->logo_url }}"
             class="w-14 h-14 object-cover rounded-xl">
    </td>

    <td class="px-6 py-4 font-bold">
        {{ $partner->name }}
    </td>

    <td class="px-6 py-4 text-slate-500">
        {{ $partner->created_at->format('d M Y') }}
    </td>

    <td class="px-6 py-4">
        <div class="flex gap-2 justify-center">

            <button
                onclick="openEditModal(
                    {{ $partner->id }},
                    '{{ $partner->name }}',
                    '{{ $partner->logo_url }}'
                )"
                class="px-4 py-2 bg-blue-50 text-blue-600 rounded-xl font-bold text-sm hover:bg-blue-100">
                Edit
            </button>

            <form
                action="{{ route('admin.partners.destroy', $partner->id) }}"
                method="POST"
                onsubmit="return confirm('Yakin ingin menghapus partner ini?')">

                @csrf
                @method('DELETE')

                <button
                    type="submit"
                    class="px-4 py-2 bg-red-50 text-red-600 rounded-xl font-bold text-sm hover:bg-red-100">
                    Hapus
                </button>

            </form>

        </div>
    </td>

</tr>

    @empty
    <tr>
        <td colspan="5" class="text-center py-10 text-slate-500">
            Data Partner belum tersedia
        </td>
    </tr>
    @endforelse

</tbody>
            </tbody>
        </table>
    </div>
</div>

<!-- Add/Edit Category Modal -->
<div id="categoryModal"
    class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm z-50 hidden items-center justify-center p-6">
    <div class="bg-white w-full max-w-lg rounded-3xl shadow-2xl overflow-hidden">
        <!-- Modal Header -->
        <div class="bg-gradient-to-r from-indigo-600 to-indigo-700 px-8 py-6 flex justify-between items-center">
            <h2 id="modalTitle" class="text-xl font-bold text-white">Tambah Partner Baru</h2>
            <button onclick="closeCategoryModal()" class="text-white hover:bg-indigo-700 p-2 rounded-lg">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>
        </div>

        <!-- Modal Body -->
        <div class="p-8">
            <form
    id="categoryForm"
    method="POST"
    action="{{ route('admin.partners.store') }}"
    class="space-y-6">



    @csrf

    <input type="hidden" id="methodField" name="_method" value="POST">
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2 uppercase tracking-wide">Nama Partner
                        *</label>
                    <input id="categoryName" name="name" type="text" placeholder="Contoh: Seminar"
                        class="w-full px-5 py-3 bg-white border-2 border-slate-100 rounded-2xl focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-600 outline-none transition font-medium"
                        required>
                </div>

                <div>
    <label class="block text-sm font-bold text-slate-700 mb-2 uppercase tracking-wide">
        URL Logo
    </label>

    <input
        id="partnerLogo"
        name="logo_url"
        type="text"
        placeholder="https://example.com/logo.png"
        class="w-full px-5 py-3 bg-white border-2 border-slate-100 rounded-2xl focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-600 outline-none transition font-medium"
        required>
</div>

                <div class="flex gap-4 justify-end pt-4">
                    <button type="button" onclick="closeCategoryModal()"
                        class="px-6 py-3 border-2 border-slate-200 text-slate-700 rounded-xl font-bold hover:bg-slate-50 transition">
                        Batal
                    </button>
                    <button type="submit"
                        class="px-8 py-3 bg-indigo-600 text-white rounded-xl font-bold hover:bg-indigo-700 transition shadow-lg shadow-indigo-200">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('extra-styles')
<style>
    /* Add smooth transitions for modals */
    #categoryModal,
    #deleteModal {
        transition: opacity 0.3s ease;
    }

    #categoryModal.hidden,
    #deleteModal.hidden {
        opacity: 0;
        pointer-events: none;
    }

    #categoryModal.flex,
    #deleteModal.flex {
        opacity: 1;
    }
</style>
@endsection

@section('extra-scripts')
<script>
    let currentEditId = null;

    function openAddModal() {

    document.getElementById('modalTitle').textContent =
        'Tambah Partner Baru';

    document.getElementById('categoryName').value = '';

    document.getElementById('categoryForm').action =
        `/admin/partners`;

    document.getElementById('methodField').value = 'POST';

    document.getElementById('categoryModal').classList.remove('hidden');
    document.getElementById('categoryModal').classList.add('flex');
}


function openEditModal(id, name, logo) {

    document.getElementById('modalTitle').textContent =
        'Edit Partner';

    document.getElementById('categoryName').value = name;

    document.getElementById('partnerLogo').value = logo;

    document.getElementById('categoryForm').action =
        `/admin/partners/${id}`;

    document.getElementById('methodField').value = 'PUT';

    document.getElementById('categoryModal').classList.remove('hidden');
    document.getElementById('categoryModal').classList.add('flex');
}


function closeCategoryModal() {

    document.getElementById('categoryModal').classList.add('hidden');

    document.getElementById('categoryModal').classList.remove('flex');
}

</script>
@endsection