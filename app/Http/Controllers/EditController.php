<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;

class EditController extends Controller
{
    public function edit($id)
    {
    $item = Item::find($id);
    return view('item.edit',[
        'item' => $item,
    ]);
    }
}
