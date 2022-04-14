<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $items = Content::all();
        return view('index', ['items' => $items]);
    }
    public function create(Request $request)
    {
        $form = $request->all();
        Content::create($form);
        return redirect('/');
    }
    public function update(Request $request)
    {
        $form = $request->all();
        unset($form['_token']);
        Content::where('id', $request->id)->update($form);
        return redirect('/');
    }
    public function delete(Request $request)
    {
        $items = Content::find($request->id);
        $item->delete();
        return redirect('/');
    }
}
