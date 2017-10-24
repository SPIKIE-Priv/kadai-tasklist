<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Tasklist;    // 追加

class TasksController extends Controller


{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Tasklist::all();

        return view('tasks.index', [
            'tasks' => $tasks,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tasks = new Tasklist;

        return view('tasks.create', [
            'tasks' => $tasks,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $this->validate($request, [
            'content' => 'required|max:255',
            'status' => 'required|max:10',   // 追加
        ]);
        $tasks = new Tasklist;
        $tasks->content = $request->content;
        $tasks->status = $request->status;    // 追加
        $tasks->save();

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tasks = Tasklist::find($id);

        return view('tasks.show', [
            'tasks' => $tasks,
        ]);
    }

    /**
     * Show the form for editingmysql the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tasks = Tasklist::find($id);

        return view('tasks.edit', [
            'tasks' => $tasks,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            $this->validate($request, [
            'content' => 'required|max:255',
            'status' => 'required|max:10',   // 追加
        ]);
        
        $tasks = Tasklist::find($id);
        $tasks->content = $request->content;
        $tasks->status = $request->status;    // 追加
        $tasks->save();

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tasks = Tasklist::find($id);
        $tasks->delete();

        return redirect('/');
    }
}
