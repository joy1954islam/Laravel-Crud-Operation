<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Carbon;
use App\Models\Category;
use Illuminate\Support\Facades\DB;


class CategoryController extends Controller
{
    public function AllCat()
    {
        $categories = Category::latest()->get();
        return view('admin.category.index', compact('categories'));
    }
    public function AddCategory(Request $request)
    {
        $request->validate([
            'category_name' => 'required|max:255',
        ]);
        Category::insert([
            'category_name' => $request ->category_name,
            'user_id'=> Auth::user()->id,
            'created_at' => Carbon::now()
        ]);

        return Redirect()->back()->with('success', 'Category Inserted');

        // $category = new Category;
        // $category->category_name = $request->category_name;
        // $category->user_id = Auth::user()->id;
        // $category.save();
    
    }
    public function EditCategory($id)
    {
        $categories = Category::find($id);
        return view('admin.category.update',compact('categories'));
    }
  
    public function UpdateCategory(Request $request, $id)
    {
        $validatedData = $request->validate([
            'category_name' => 'required|max:255',
        ]);
        Category::whereId($id)->update($validatedData);
        return Redirect()->route('all_category')->with('success', 'Category Update');

    }
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
    
        return Redirect()->back()->with('success', 'Category Deleted');
    }

}
