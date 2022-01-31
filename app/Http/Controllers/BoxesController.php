<?php

namespace App\Http\Controllers;

use App\Models\Box;
use App\Models\Item;
use App\Models\User;
use App\Repositories\BoxRepository;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

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

        if (Auth::check()) {
            $userId = Auth::id();
            $user = User::find($userId);

            $user->boxes()->save($newBox);
        }
        
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

        if (! Gate::allows('insert-items', [ $box ])) {
            abort(403);
        }
        
        $validated = $request->validate([
            'item_name' => [ 'required', 'alpha_dash' ],
        ]);

        $newItem = new Item(); 
        $newItem->name = $validated['item_name'];

        $existedItem = null;

        foreach ($box->items as $item) {
            if ($item->name === $newItem->name) {
                $existedItem = $item;
                $existedItem->count = $existedItem->count + 1;
            }
        }

        $box->items()->save($existedItem ?? $newItem);

        return redirect()->route('items', [ 'box_name' => $boxName ]);
    }
}
