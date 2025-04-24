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
        $user = Auth::user();
        $items = $user->items;

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
                'preference' => 'max:20',
                'progress' => 'max:20',
                'good' => 'max:200',
                'bad' => 'max:200',
                'memo' => 'max:1000',
                'site_name' => 'max:30',
                'url' => 'max:1000',
            ], ['name.required' => '名前を入力してください。',
                'name.max' => '名前を100文字以内で入力してください。',
                'preference.max' => '志望度を20文字以内で入力してください。',
                'progress.max' => '詳細を20文字以内で入力してください。',
                'good.max' => '種別を200文字以内で入力してください。',
                'bad.max' => '種別を200文字以内で入力してください。',
                'memo.max' => '種別を1000文字以内で入力してください。',
                'site_name.max' => '種別を30文字以内で入力してください。',
                'url.max' => '種別を1000文字以内で入力してください。',
            ]);

            // 商品登録
            Item::create([
                'user_id' => Auth::user()->id,
                'name' => $request->name,
                'preference' => $request->preference,
                'progress' => $request->progress,
                'good' => $request->good,
                'bad' => $request->bad,
                'memo' => $request->memo,
                'site_name' => $request->site_name,
                'url' => $request->url,
            ]);

            return redirect('/items');
        }
        return view('item.add');
    }

    /**商品情報の編集 */
    public function update(Request $request, $id)
    {
        /**バリデートする */
        $validateData = $request->validate([
            'name' => 'required|max:100',
                'preference' => 'max:20',
                'progress' => 'max:20',
                'good' => 'max:200',
                'bad' => 'max:200',
                'memo' => 'max:1000',
                'site_name' => 'max:30',
                'url' => 'max:1000',
            ], ['name.required' => '名前を入力してください。',
                'name.max' => '名前を100文字以内で入力してください。',
                'preference.max' => '志望度を20文字以内で入力してください。',
                'progress.max' => '詳細を20文字以内で入力してください。',
                'good.max' => '種別を200文字以内で入力してください。',
                'bad.max' => '種別を200文字以内で入力してください。',
                'memo.max' => '種別を1000文字以内で入力してください。',
                'site_name.max' => '種別を30文字以内で入力してください。',
                'url.max' => '種別を1000文字以内で入力してください。',
            ]);

        $item = Item::findOrFail($id);

        /**更新処理 */
        $item->name =$validateData['name'];
        $item->preference = $validateData['preference'];
        $item->progress =$validateData['progress'];
        $item->good =$validateData['good'];
        $item->bad =$validateData['bad'];
        $item->memo =$validateData['memo'];
        $item->site_name =$validateData['site_name'];
        $item->url =$validateData['url'];
        $item->save();
        return redirect('/items');
    }

    /**商品情報の削除 */
    public function delete($id)
    {
        $item = Item::find($id);
        $item->delete();
        return redirect('/items');
    }

}
