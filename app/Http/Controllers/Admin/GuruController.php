<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Guru;
use App\Http\Requests\GuruRequest;
class GuruController extends Controller
{ 
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index(Request $request)
   {
       $keyword = $request->get('keyword');
       $guru = Guru::search($keyword)->orderby('nip', 'desc')->paginate(100);
       return view('admin.guru.index', compact('guru'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
       return view('admin.guru.create');
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(GuruRequest $request)
   {
       // Set Password Hash
       $request->merge(['password' => bcrypt($request->password)]);
       $request->merge(['id_admin' => '1']);
       $guru = Guru::create($request->all());
       return redirect()->route('admin.guru.index')->with('success', 'Data berhasil ditambahkan');
   }

   /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function show($id)
   {
       $guru = Guru::findOrFail($id);
       return view('admin.guru.show', compact('guru'));
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
       // Delete Guru
       $guru = Guru::findOrFail($id);
       $guru->delete();
       return redirect()->route('admin.guru.index')->with('success', 'Data berhasil dihapus');
   }
}
