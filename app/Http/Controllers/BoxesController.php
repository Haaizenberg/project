<?php

namespace App\Http\Controllers;

use App\Models\Box;
use App\Models\Item;
use App\Repositories\BoxRepository;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class BoxesController extends Controller
{
    //
    public function index()
    {
        return view('pages.boxes', [
            'boxes' => Box::all(),
        ]);
    }


    public function create(Request $request)
    {
        $validated = $request->validate([
            'color' => [ 'required', 'alpha', Rule::in(BoxRepository::getColors()), 'unique:App\Models\Box,color' ],
            'name' => [ 'required', 'alpha_dash', 'unique:App\Models\Box,name' ],
        ]);

        $newBox = new Box;
        $newBox->color = $validated['color'];
        $newBox->name = $validated['name'];

        $newBox->save();
        
        return redirect()->route('boxes');
    }


    public function items($boxName)
    {
        $box = Box::where('name', $boxName)->first();
        
        if (! $box) {
            abort(404);
        }

        return view('pages.box', [
            'box' => $box,
        ]);
    }


    public function insert(Request $request, $boxName)
    {
        $box = Box::where('name', $boxName)->first();
        
        if (! $box) {
            abort(404);
        }
        
        $validated = $request->validate([
            'item_name' => [ 'required', 'alpha_dash' ],
        ]);

        $newItem = new Item(); 
        $newItem->name = $validated['item_name'];

        $existedItem = null;

        dd($box->items->collection());
        foreach ($box->items()->collection as $item) {
            dd($item);
            if ($item->name === $newItem->name) {
                $existedItem = $item;
                $existedItem->count = $existedItem->count + 1;
            }
        }

        dd($existedItem);
        $box->items()->save($existedItem ?? $newItem);

        return redirect()->route('items', [ 'box_name' => $boxName ]);
    }
}
