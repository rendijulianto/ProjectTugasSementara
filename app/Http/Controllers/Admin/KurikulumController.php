<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kurikulum;
use App\Http\Requests\KurikulumRequest;
use Auth;
class KurikulumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->get('keyword');
        $kurikulum = Kurikulum::search($keyword)->paginate(100);
        return view('admin.kurikulum.index', compact('kurikulum'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kurikulum.create');
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
            'nama' => 'required|unique:kurikulum',
        ],[
            'nama.required' => 'Nama Kurikulum harus diisi!',
            'nama.unique' => 'Nama Kurikulum sudah ada!',
        ]);

        $request->merge(['id_admin' => Auth::guard('admin')->user()->id_admin]);
        Kurikulum::create($request->all());
        return redirect()->route('admin.kurikulum.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kurikulum = Kurikulum::findOrFail($id);
        return view('admin.kurikulum.show', compact('kurikulum'));
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
        $kurikulum = Kurikulum::findOrFail($id);
        $kurikulum->delete();
        return redirect()->route('admin.kurikulum.index')->with('success', 'Data berhasil dihapus');
    }
}
