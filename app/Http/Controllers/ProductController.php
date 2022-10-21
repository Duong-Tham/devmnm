<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Components\Recusive;
use App\Http\Requests\ProductAddRequest;
use App\Models\category;
use App\Models\Product;
use App\Traits\StoreImgTrait;

class ProductController extends Controller
{
    use StoreImgTrait;
    private $category;
    private $product;
    public function __construct(category $category, Product $product)
    {
        $this->category=$category;
        $this->product=$product;
    }
    public function index(){
        $products = $this->product->paginate(5);
        return view('product.index', compact('products'));
    }

    public function create(){
        $htmlOption= $this->getCategory($id='');
        return view('product.add', compact('htmlOption'));
    }

    public function getCategory($parentId)
    {
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryRecusive($parentId);
        return $htmlOption;
    }

    public function store(ProductAddRequest $request){
        $dataProductCreate=[
            'name' =>$request->name,
            'price' =>$request->price,
            'content' =>$request->content,
            'user_id' => auth()->id(),
            'category_id'=>$request->category_id
        ];
        $dataImgPath= $this->storageTraitUpload($request,'img_path','product');
        if(!empty($dataImgPath)){
            $dataProductCreate['img_name']=$dataImgPath['file_name'];
            $dataProductCreate['img_path']=$dataImgPath['file_path'];
        }
        $this->product->create($dataProductCreate);
        return redirect()->route('product.index');
    }

    public function edit($id){
        $products= $this->product->find($id);
        $htmlOption= $this->getCategory($products->category_id);
        return view('product.edit', compact('htmlOption','products'));
    }

    public function update( Request $request,$id){
        $dataProductUpdate=[
            'name' =>$request->name,
            'price' =>$request->price,
            'content' =>$request->content,
            'user_id' => auth()->id(),
            'category_id'=>$request->category_id
        ];
        $dataImgPath= $this->storageTraitUpload($request,'img_path','product');
        if(!empty($dataImgPath)){
            $dataProductUpdate['img_name']=$dataImgPath['file_name'];
            $dataProductUpdate['img_path']=$dataImgPath['file_path'];
        }
        $this->product->find($id)->update($dataProductUpdate);
        return redirect()->route('product.index');
    }

    public function delete($id){
        $this->product->find($id)->delete();
        return response()->json([
            'code'=>200,
            'message'=>'succes'
        ], 200);
    }
}
