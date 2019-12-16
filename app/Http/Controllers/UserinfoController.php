<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Uinfo;
use App\User;

class UserinfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Uinfos = Uinfo::latest()->paginate(5);
        return view('userInfo.index',compact('Uinfos'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('userInfo.create', [
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
            'content' => 'required',
        ];

        $messages = [
            'content.required' => ' Vui lòng nhập địa chỉ',
        ];

        $validator = \Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return \Redirect::back()->withErrors($validator)->withInput($request->all());
        }

        $Uinfo = Uinfo::create($request->all());
        return redirect()->action('UserinfoController@index')->with('status', 'Success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Uinfo = Uinfo::find($id);
        $users = User::find($id);
        if ($Uinfo) {
            return view('userInfo.show', [
                'Uinfo' => $Uinfo,
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
        $Uinfo = Uinfo::find($id);
        return view('userInfo.edit', [
            'Uinfo' => $Uinfo,
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
         $Uinfo = Uinfo::find($id);
         $Uinfo->update($request->all());
         return redirect()->route('Uinfo.index')->with('success','Student updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Uinfo::find($id);
        $re="Ban da xoa thanh cong content cua user ('$item->id')";
        $item->delete();
        return redirect()->action('UserinfoController@index')->with('success', $re);
    }
}
