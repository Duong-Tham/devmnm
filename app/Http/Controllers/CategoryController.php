<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Components\Recusive;
use App\Http\Requests\CategoryAddRequest;

class CategoryController extends Controller
{
    private $category;

    public function __construct(Category $category)
    {
        $this->category=$category;
    }

    public function create(){
        return view('category.add');
    }

    public function index()
    {
        $categories = $this->category->paginate(5);
        return view('category.index', compact('categories'));
    }

    public function store(CategoryAddRequest $request)
    {
        $this->category->create([
            'name' => $request->namedm
        ]);

        return redirect()->route('categories.index');

    }


    public function edit($id){
        $category= $this->category->find($id);
        return view('category.edit', compact('category'));
    }   

    public function update($id, Request $request)
    {
        $this->category->find($id)->update([
            'name' => $request->namedm
        ]);
        return redirect()->route('categories.index');

    }

    public function delete($id){
        $this->category->find($id)->delete();
        return response()->json([
            'code'=>200,
            'message'=>'succes'
        ], 200);
    }
}
