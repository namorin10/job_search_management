<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;

class ItemController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * 商品一覧
     */
    public function index()
    {
        // 商品一覧取得
        $items = Item::all();

        return view('item.index', compact('items'));
    }

    /**
     * 商品登録
     */
    public function add(Request $request)
    {
        // POSTリクエストのとき
        if ($request->isMethod('post')) {
            // バリデーション
            $this->validate($request, [
                'name' => 'required|max:100',
                'type' => 'required|max:50',
                'detail' => 'required|max:100',
            ], ['name.required' => '名前を入力してください。',
                'name.max' => '名前を100文字以内で入力してください。',
                'type.required' => '種別を入力してください。',
                'type.max' => '種別を50文字以内で入力してください。',
                'detail.required' => '詳細を入力してください。',
                'detail.max' => '詳細を100文字以内で入力してください。',
            ]);

            // 商品登録
            Item::create([
                'user_id' => Auth::user()->id,
                'name' => $request->name,
                'type' => $request->type,
                'detail' => $request->detail,
            ]);

            return redirect('/items');
        }
        return view('item.add');
    }

    /**商品情報の削除 */
    public function delete($id)
    {
        $item = Item::find($id);
        $item->delete($id);
        return redirect('/items');
    }

}
