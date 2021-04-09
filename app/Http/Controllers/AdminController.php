<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Collection;
use App\MainCollection;
use App\Item;
use App\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function createItem()
    {
        $products = Product::all();
        $collections = Collection::all();
        return view('admin.create_item',
            ['products' => $products,
             'collections' => $collections
            ]
        );
    }

    public function postItem(Request $request)
    {

        $request->validate([
            'kategorija' => 'required',
            'ime' => 'required',
            'opis' => 'required',
            'cena' => ['required'],
            'slike' => 'required',
            'mogucnost' => 'required',
            'kolicina' => 'required',
        ]);


        if($request->hasfile('slike')){

            foreach ($request->file('slike') as $image){

                $name = $image->getClientOriginalName();


                $image->move(public_path().'/images/', $name);
                $data[] = $name;

            }
        }

        $json = json_encode($data);


        $item = Item::create([
            'product_id' => $request->kategorija,
            'collection_id' => $request->kolekcija,
            'name' => $request->ime,
            'price' => $request->cena,
            'image' => $json,
            'description' => $request->opis,
            'in_stock' => $request->kolicina,
            'available_to_make' =>$request->mogucnost

        ]);

        return redirect('/home')->with('status', 'Uspešno ste uneli  proizvod!');
    }


    public function indexEdit(Request $request)
    {
       $items = Item::all();
       $products = Product::all();



        return view('admin.edit_item', ['items' => $items, 'products' => $products]);
    }

    public function editCreate(Item $item)
    {

        $products = Product::all();
        $collections = Collection::all();

        $selected_product = DB::table('products')->find($item->product_id);

        $selected_collection = DB::table('collections')->find($item->collection_id);


        return view('admin.edit_create',
            ['item' => $item,
            'products' => $products,
            'collections' => $collections,
            'selected_product' => $selected_product,
            'selected_collection' => $selected_collection
            ]);
    }

    public function editItem(Request $request, Item $item)
    {
        $request->validate([
            'kategorija' => 'required',
            'kolekcija' => 'required',
            'ime' => 'required',
            'opis' => 'required',
            'cena' => 'required',
            'popust' => 'required',
            'kolicina' => 'required',
            'mogucnost' => 'required',

        ]);

        Item::where('id', $item->id)->update(
            ['product_id' => $request->kategorija,
             'collection_id' => $request->kolekcija,
             'name' => $request->ime,
             'description' => $request->opis,
             'price' => $request->cena,
             'discount' => $request->popust,
             'in_stock' => $request->kolicina,
             'available_to_make' => $request->mogucnost


            ]);

        return redirect('/edit_item')->with('status', 'Uspešno ste izmenili proizvod!');

    }


    public function destroy(Item $item)
    {

    $convert_image = json_decode($item->image);


        foreach ($convert_image as $image) {


            if(file_exists(public_path('images/'.$image))){

                unlink(public_path('images/'.$image));

            }


        }


        $item = Item::find($item->id);
        $item->delete();

        return redirect('/edit_item')->with('status', 'Uspešno ste obrisali proizvod!');
    }

    public function createCollection()
    {
        return view('admin.create_collection');
    }

    public function storeCollection(Request $request)
    {

        $request->validate([
            'kolekcija' => 'required',
            'slika' => 'required',

        ]);

        if($request->slika){
            $imageName = time().'.'.$request->slika->getClientOriginalExtension();
            $request->slika->move(public_path('/svg'), $imageName);

            Collection::create([
                'name' => $request->kolekcija,
                'image' => $imageName
            ]);

        }

        return redirect('/home')->with('status', 'Uspešno ste uneli  kolekciju!');
    }


    public function editMainCollection()
    {
        $main_collection = MainCollection::all();

        $collections = Collection::all();
        return view('admin.edit_collection', ['collections' => $collections, 'main_collection' => $main_collection[0]]);
    }



    public function updateMainCollection(Request $request, MainCollection $collection)
    {

        $coll_name = Collection::find($request->kolekcija);

        MainCollection::where('id', $collection->id)->update([
            'name' => $coll_name->name,
            'collection_id' => $request->kolekcija,
            'image' => $coll_name->image
        ]);

        return redirect('/home')->with('status', 'Uspešno ste izmenili kolekciju!');
    }

    public function readCollections()
    {
       $collections = Collection::all();

       return view('admin.delete_collection', ['collections' => $collections]);
    }

    public function destroy_collection(Collection $collection)
    {

        $collection_image = $collection->image;

            if(file_exists(public_path('svg/'.$collection_image))){

                unlink(public_path('svg/'.$collection_image));

            }

        $collection = Collection::find($collection->id);
        $collection->delete();

        return redirect('/read_collection')->with('status', 'Uspešno ste izbrisali kolekciju!');

    }


    public function createCategory()
    {
        $products = Product::all();
        return view('admin.create_category', ['products' => $products]);
    }


    public function storeCategory(Request $request)
    {
        $request->validate([
            'kategorija' => 'required',
            'slika' => 'required',

        ]);

        if($request->slika){

            $imageName = time().'.'.$request->slika->getClientOriginalExtension();
            $request->slika->move(public_path('/svg'), $imageName);

            Product::create([
                'name' => $request->kategorija,
                'image' => $imageName
            ]);

        }

        return redirect('/home')->with('status', 'Uspešno ste uneli  kategoriju!');
    }


    public function destroyCategory(Request $request)
    {
        $category_id = $request->kategorija;

        $category = Product::find($category_id);

        if(file_exists(public_path('svg/'.$category->image))){

            unlink(public_path('svg/'.$category->image));

        }


        $category->delete();

        return redirect('/create/category')->with('status', 'Uspešno ste obrisali kategoriju!');
    }

}
