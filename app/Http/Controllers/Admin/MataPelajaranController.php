<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kurikulum;
use App\Http\Requests\MataPelajaranRequest;
use App\Models\MataPelajaran;

class MataPelajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
   {
       $keyword = $request->get('keyword');
       $id_kurikulum = $request->get('id_kurikulum');
       $kurikulum = Kurikulum::orderby('id_kurikulum', 'desc')->get();
       $mataPelajaran = MataPelajaran::search($keyword)->kurikulum($id_kurikulum)->paginate(10);
       return view('admin.mataPelajaran.index', compact('mataPelajaran', 'kurikulum'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
       $kurikulum = Kurikulum::orderby('id_kurikulum', 'desc')->get();
       return view('admin.mataPelajaran.create', compact('kurikulum'));
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(MataPelajaranRequest $request)
   {
       $request->merge(['id_admin' => '1']);
       $mataPelajaran = MataPelajaran::create($request->all());
       return redirect()->route('admin.mataPelajaran.index')->with('success', 'Data berhasil ditambahkan');
   }

   /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function show($id)
   {
       $mataPelajaran = MataPelajaran::findOrFail($id);
       return view('admin.mataPelajaran.show', compact('mataPelajaran'));
   }

   public function mataPelajaranDetail(MataPelajaran $mataPelajaran)
   {
       if(!$mataPelajaran) {
              abort(404);
       } 
       return view('admin.mataPelajaran.detail', compact('mataPelajaran'));
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
       // Delete MataPelajaran
       $mataPelajaran = MataPelajaran::findOrFail($id);
       $mataPelajaran->delete();
       return redirect()->route('admin.mataPelajaran.index')->with('success', 'Data berhasil dihapus');
   }
}
