<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partner;

class PartnerController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $partners = Partner::when($search, function ($query) use ($search) {
            $query->where('name', 'LIKE', '%' . $search . '%');
        })->latest()->get();

        return view('admin.partners.index', compact('partners'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'logo_url' => 'required|url'
        ]);

        Partner::create([
            'name' => $request->name,
            'logo_url' => $request->logo_url
        ]);

        return redirect()
            ->route('admin.partners.index')
            ->with('success', 'Partner berhasil ditambahkan');
    }

    public function update(Request $request, Partner $partner)
    {
        $request->validate([
            'name' => 'required',
            'logo_url' => 'required|url'
        ]);

        $partner->update([
            'name' => $request->name,
            'logo_url' => $request->logo_url
        ]);

        return redirect()
            ->route('admin.partners.index')
            ->with('success', 'Partner berhasil diperbarui');
    }

    public function destroy(Partner $partner)
    {
        $partner->delete();

        return redirect()
            ->route('admin.partners.index')
            ->with('success', 'Partner berhasil dihapus');
    }
}