<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $categories = Category::withCount('events')
            ->when($search, function ($query) use ($search) {
                $query->where('name', 'LIKE', '%' . $search . '%');
            })
            ->latest()
            ->get();

        return view('admin.categories.index', compact('categories'));
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|unique:categories,name'
    ]);

    \App\Models\Category::create([
        'name' => $request->name,
        'slug' => \Illuminate\Support\Str::slug($request->name)
    ]);

    return redirect()
        ->route('admin.categories.index')
        ->with('success', 'Kategori berhasil ditambahkan');
}

    public function update(Request $request, $id)
{
    $category = \App\Models\Category::findOrFail($id);

    $request->validate([
        'name' => 'required|unique:categories,name,' . $id
    ]);

    $category->update([
        'name' => $request->name,
        'slug' => \Illuminate\Support\Str::slug($request->name)
    ]);

    return redirect()
        ->route('admin.categories.index')
        ->with('success', 'Kategori berhasil diperbarui');
}

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Kategori berhasil dihapus');
    }
}