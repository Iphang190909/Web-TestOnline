<?php

namespace App\Http\Controllers;

use App\Models\ManagementUserInstansi;
use App\Models\Token;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TokenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Token::select('token.id', 'token.name', 'token.expired', 'token.status', 'token.created_at','user_role.role', 'user_role.id AS role_id', 'instansi.id AS instansi.id_instansi', 'instansi.nama_instansi')
                    ->join('user_role','user_role.id','token.id_role')
                    ->join('instansi', 'instansi.id', 'token.id_instansi')
                    // ->where('user_role.role','peserta')
                    ->orderBy('token.created_at','DESC')
                    ->withTrashed()
                    ->get();
                    // return $data;
        $instansi = ManagementUserInstansi::withTrashed()->latest()->get();
        // return $instansi;
        return view('pages.token.index',compact('data', 'instansi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $request->validate([
            'token' => 'required',
            'id_instansi' => 'required',
            'tgl_expired' => 'required',
        ]);
        try {
            $add = new Token;
            $add->id_user = Auth::user()->id;
            $add->name = $request->get('token');
            $add->expired = $request->get('tgl_expired');
            $add->id_instansi = $request->get('id_instansi');
            $add->id_role = Auth::user()->id_role;
            $add->status = 'true';
            // return $add;
            $add->save();
            return redirect()->route('token.index')->withStatus('Berhasil menambahkan data');
        } catch (Exception $e) {
            return redirect()->back()->withError('Terjadi kesalahan');
        } catch (QueryException $e){
            return redirect()->back()->withError('Terjadi kesalahan');
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
        try {
            $update = Token::withTrashed()->findOrFail($id);
            $update->status = 'false';
            $update->update();
            $delete = Token::findOrFail($id);
            $delete->delete();
            return redirect()->route('token.index')->withStatus('Berhasil mengganti data.');
        } catch (Exception $e) {
            return redirect()->route('token.index')->withError('Terjadi kesalahan.');
        } catch (QueryException $e){
            return redirect()->route('token.index')->withError('Terjadi kesalahan.');
        }
    }
    public function restore($id)
    {
        try {
            $update = Token::withTrashed()->findOrFail($id);
            // return $update;
            $update->status = 'true';
            $update->update();
            $restore = Token::withTrashed()->findOrFail($id);
            if($restore->trashed()){
                $restore->restore();
                return redirect()->route('token.index')->withStatus('Berhasil mengganti status data.');
            }else{
                return redirect()->route('token.index')->withError('Data is not in trash.');
            }
        } catch (Exception $e) {
            return $e;
            return redirect()->route('token.index')->withError('Terjadi kesalahan.');
        } catch (QueryException $e){
            return $e;
            return redirect()->route('token.index')->withError('Terjadi kesalahan.');

        }
    }

    public function deletePermanent($id)
    {
        $data = Token::withTrashed()->findOrFail($id);
        if(!$data->trashed())
        {
            $data->forceDelete();
            return redirect()->route('token.index')->with('status', 'Data berhasil dihapus permanent!');
        } else {
            $data->forceDelete();
            return redirect()->route('token.index')->with('status', 'Data berhasil dihapus permanen!');
        }
    }
}
