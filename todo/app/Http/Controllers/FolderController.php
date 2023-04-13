<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\CreateFolder;

class FolderController extends Controller
{
    public function showCreateForm()
    {
        return view( 'folders/create' );
    }

    public function create( CreateFolder $request )
    {
        // フォルダモデルのインスタンスを作成する
        $folder = new Folder();

        //タイトルに入力値を代入する
        $folder -> title = $request -> title;

		//ユーザーに紐づけて保存
		Auth::user() -> folders() -> save($folder);

        //インスタンスの状態を DB に書き込む
        $folder -> save();

        return redirect() -> route( 'tasks.index', [
            'id' => $folder -> id,
        ] );
    }
}
