<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use App\Models\Task;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index( int $id )
    {
        //すべてのフォルダを取得
        $folders = Folder::all();

        //選択されたフォルダを取得
        $current_folder = Folder::find( $id );

        //選択されたフォルダに紐づくタスクを取得
        // $tasks = Task::where( 'folder_id', $current_folder->id ) -> get();
        $tasks = $current_folder -> tasks() -> get();


        return view( 'tasks/index', [
            'folders' => $folders,
            'current_folder_id' => $current_folder->id,
            'tasks' => $tasks,
        ] );
    }
}
