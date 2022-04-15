<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;
use App\Http\Requests\ContentRequest;

class TodoController extends Controller
{
    public function index()
    {
        $items = Content::all();
        return view('index', ['items' => $items]);
    }
    public function create(ContentRequest $request)
    {
        $form = $request->all();
        Content::create($form);
        return redirect('/');
    }
    public function update(ContentRequest $request)
    {
        $form = $request->all();
        unset($form['_token']);
        Content::where('id', $request->id)->update($form);
        return redirect('/');
    }
    public function delete(Request $request)
    {
        Content::find($request->id)->delete();
        return redirect('/');
    }
}
