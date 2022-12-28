<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $data = [
            'categories' => $categories,
        ];
        return view('admin.categories.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => 'Tambah Kategori',
            'url' => route('admin.categories.store'),
        ];
        return view('admin.categories.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'string|required',
            'benefit' => 'required|string',
        ]);
        if (Category::create($data)) {
            flash()->addSuccess('Berhasil menambahkan kategori!');
        } else {
            flash()->addError('Gagal menambahkan kategori!');
        }
        return redirect()->route('admin.categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $data = [
            'title' => 'Ubah Category',
            'category' => $category,
            'url' => route('admin.categories.update', $id)
        ];
        return view('admin.categories.form', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\categorie  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $data = $request->validate([
            'name' => 'string|required',
            'benefit' => 'required|string',
        ]);
        if ($category->update($data)) {
            flash()->addSuccess('Berhasil memperbarui kategori!');
        } else {
            flash()->addError('Gagal memperbarui kategori!');
        }
        return redirect()->route('admin.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $name = $category->name;
        if ($category->delete()) {
            flash()->addSuccess('Berhasil menghapus kategori ' . $name . '!');
        } else {
            flash()->addError('Gagal menghapus kategori!');
        }
        return redirect()->route('admin.periods.index');
    }
}
