<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryModel;


class CategoryController extends Controller
{

    public function category_list()
    {
        $categories = CategoryModel::all();
        return view('admin.category.crud', compact('categories'));
    }

    public function category_add(Request $request)
    {
        $validatedData = $request->validate([
            'category_title' => 'required|string|regex:/^[a-zA-Z\s]+$/|max:50|unique:tbl_categories',
        ]);

        $category = new CategoryModel();
        $category->category_title = $request->category_title;
        $category->save();

        return redirect(url('admin/category'))->with('success', 'Category added successfully.');
    }
    public function category_update(Request $request, $id)
    {
        $category = CategoryModel::findOrFail($id);

        $validatedData = $request->validate([
            'category_title' => 'required|string|regex:/^[a-zA-Z\s]+$/|max:50|unique:tbl_categories',
        ]);

        $category->category_title = $validatedData['category_title'];

        $category->save();

        return redirect('admin/category')->with('success', 'Category updated successfully.');
    }

    public function category_delete(Request $request)
    {
        $adminController = new AdminController();
        return $adminController->deleteItems($request, 'category_id', CategoryModel::class, 'Category');
    }
}
