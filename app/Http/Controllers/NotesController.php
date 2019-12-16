<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notes;
use App\User;

class NotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $notes = Notes::all();
        // return view('notes.index', ['notes' => $notes]);
        $notes = Notes::latest()->paginate(5);
        return view('notes.index',compact('notes'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('notes.create', [
            'users' => User::all()
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
        $rules = [
            'address' => 'required|max:15',
            'age' => 'required',
            'leve' => 'required',
        ];

        $messages = [
            'address.required' => ' Vui lòng nhập địac chỉ',
            'address.max' => ' không nhập quá 15 ký tự',
            'age.required' => ' Vui lòng nhạp tuổi ',
            'leve.required' => ' vui lòng nhập leve'
        ];

        $validator = \Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return \Redirect::back()->withErrors($validator)->withInput($request->all());
        }

        $note = Notes::create($request->all());
        return redirect()->action('NotesController@index')->with('status', 'Success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $note = Notes::find($id);
        $users = User::find($id);
        if ($note) {
            return view('notes.show', [
                'note' => $note,
                'users' => $users
            ]);
        }
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $note = Notes::find($id);
        return view('notes.edit', [
            'note' => $note,
            'users' => User::all()
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
         $note = Notes::find($id);
         $note->update($request->all());
         return redirect()->route('Notes.index')->with('success','Student updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Notes::find($id);
        $re="Ban da xoa thanh cong note ('id:$item->id', 'name:$item->name')";
        $item->delete();
        return redirect()->action('NotesController@index')->with('delete', $re);
    }
}
