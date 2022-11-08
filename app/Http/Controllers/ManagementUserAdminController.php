<?php

namespace App\Http\Controllers;

use App\Models\ManagementUser;
use App\Models\User;
use App\Models\UserRole;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ManagementUserAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::select('*','user_role.role')
                    ->join('user_role','user_role.id','users.id_role')
                    ->where('user_role.role','admin')
                    ->orderBy('users.created_at','DESC')
                    ->get();
        // return $data;
        return view('pages.management-user.admin.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = User::latest()->get();
        return view('pages.management-user.admin.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => "required|min:8",
            'id_role' => 'required',
        ],
        [
            'required' => 'Field ini wajib disi',
        ]);
        try{
            $add = new User();
            $add->name = $request->get('name');
            $add->email = $request->get('email');
            $add->password = $request->get('password');
            $add->id_role = 'administrator';
            $add->created_at = now();
            $add->updated_at = null;
        return $add;
            $add->save();
            return redirect()->route('admin.index')->withStatus('Berhasil menambahkan data.');
        } catch (Exception $e) {
            return redirect()->route('admin.index')->withError('Terjadi kesalahan.');
        } catch (QueryException $e){
            return redirect()->route('admin.index')->withError('Terjadi kesalahan.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
