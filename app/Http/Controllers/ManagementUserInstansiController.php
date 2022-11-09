<?php

namespace App\Http\Controllers;

use App\Models\ManagementUserInstansi;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ManagementUserInstansiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ManagementUserInstansi::latest()->get();
        return view('pages.management-user.instansi.index',compact('data'));
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
        $request->validate([
            'nama_instansi' => 'required',
            'alamat' => 'required',
        ]);
        try {
            $add = new ManagementUserInstansi();
            $add->nama_instansi = $request->get('nama_instansi');
            $add->alamat = $request->get('alamat');
            // return $add;
            $add->save();
            return redirect()->route('instansi.index')->withStatus('Berhasil menambahkan data');
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
        try {
            $data = ManagementUserInstansi::find($id);
            return view('pages.management-user.instansi.show',compact('data'));
        } catch (Exception $e) {
            return redirect()->route('instansi.index')->withError('Terjadi kesalahan.');
        } catch (QueryException $e){
            return redirect()->route('instansi.index')->withError('Terjadi kesalahan.');

        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $data = ManagementUserInstansi::find($id);
            return view('pages.management-user.instansi.edit',compact('data'));
        } catch (Exception $e) {
            return redirect()->route('faq-kategori.index')->withError('Terjadi kesalahan.');
        } catch (QueryException $e){
            return redirect()->route('faq-kategori.index')->withError('Terjadi kesalahan.');

        }
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
            'nama_instansi' => 'required',
            'alamat' => 'required',
        ]);
        try {
            $update = ManagementUserInstansi::findOrFail($id);
            $update->nama_instansi = $request->get('nama_instansi');
            $update->alamat = $request->get('alamat');
            // return $update;
            $update->save();
            return redirect()->route('instansi.index')->withStatus('Berhasil menambahkan data');
        } catch (Exception $e) {
            return redirect()->back()->withError('Terjadi kesalahan');
        } catch (QueryException $e){
            return redirect()->back()->withError('Terjadi kesalahan');
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
            $delete = ManagementUserInstansi::findOrFail($id);
            $delete->delete();
            return redirect()->route('instansi.index')->withStatus('Berhasil menghapus data.');
        } catch (Exception $e) {
            return redirect()->route('instansi.index')->withError('Terjadi kesalahan.');
        } catch (QueryException $e){
            return redirect()->route('instansi.index')->withError('Terjadi kesalahan.');
        }
    }
}
