<?php

namespace App\Http\Controllers;

use App\Models\ManagementUser;
use App\Models\User;
use App\Models\UserRole;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
        ],
        [
            'required' => 'Field ini wajib disi',
        ]);
        try{
            $add = new User();
            $add->name = $request->get('name');
            $add->email = $request->get('email');
            $add->password =  Hash::make($request['password']);
            $add->id_role = '1';
            $add->created_at = now();
            $add->updated_at = null;
            $add->save();
            // return $add;
            return redirect()->route('admin.index')->withStatus('Berhasil menambahkan data.');
        } catch (Exception $e) {
            // return $e;
            return redirect()->route('admin.index')->withError('Terjadi kesalahan.');
        } catch (QueryException $e){
            // return $e;
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
        // return $id;
        $data = User::find($id);
        return view('pages.management-user.admin.edit', compact('data'));
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
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => "required|min:8",
        ],
        [
            'required' => 'Field ini wajib disi',
        ]);
        try{
            $update = User::findOrFail($id);
            $update->name = $request->get('name');
            $update->email = $request->get('email');
            $update->password =  Hash::make($request['password']);
            $update->id_role = '1';
            $update->updated_at = now();
            $update->update();
            return redirect()->route('admin.index')->withStatus('Berhasil mengganti data.');
        } catch (Exception $e) {
            // return $e;
            return redirect()->route('admin.index')->withError('Terjadi kesalahan.');
        } catch (QueryException $e){
            // return $e;
            return redirect()->route('admin.index')->withError('Terjadi kesalahan.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $delete = User::findOrFail($id);
            $delete->delete();
            return redirect()->route('admin.index')->withStatus('Berhasil menghapus data.');
        } catch (Exception $e) {
            return redirect()->route('admin.index')->withError('Terjadi kesalahan.');
        } catch (QueryException $e){
            return redirect()->route('admin.index')->withError('Terjadi kesalahan.');
        }
    }
}
