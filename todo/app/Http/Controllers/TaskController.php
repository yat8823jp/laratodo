<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use App\Models\Task;

use App\Http\Requests\CreateTask;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TaskController extends Controller
{
	public function index( int $id )
	{

		$folders = Auth::user() -> folders() -> get();

		//すべてのフォルダを取得
		// $folders = Folder::all();

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

	/*
		* GET /folders/{id}/tasks/create
		*/
	public function showCreateForm( int $id )
	{
		return view( 'tasks/create', [
			'folder_id' => $id,
		] );
	}

	/*
	 * create
	 */
	public function create( int $id, CreateTask $request )
	{
		$current_folder = Folder::find( $id );

		$task = new Task();
		$task -> title = $request -> title;
		$task -> due_date = $request -> due_date;

		$current_folder -> tasks() -> save( $task );

		return redirect() -> route( 'tasks.index', [
			'id' => $current_folder -> id,
		] );
	}

	/*
	 * GET /folders/{id}/tasks/{task_id}/edit
	 */
	public function showEditForm( int $id, int $task_id )
	{
		$task = Task::find( $task_id );

		return view( 'tasks/edit', [
			'task' => $task,
		] );
	}
}
