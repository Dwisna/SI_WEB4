<?php 

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Pendidikan;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB,
//     App\Http\Controllers\Controller;

use function Laravel\Prompts\table;

class PendidikanController extends Controller{

public function index(){
    $pendidikan = Pendidikan::get();
    return view('backend.pendidikan.index', compact('pendidikan'));
}
public function create(){
    $pendidikan = null;
    return view('backend.pendidikan.create',compact('pendidikan'));
}
public function store(Request $request){
    Pendidikan::create($request->all());
    return redirect()->route('pendidikan.index')->with('success','Data Pendidikan baru telah berhasil disimpan'); 
}
public function edit(Pendidikan $pendidikan){
    return view('backend.pendidikan.create', compact('pendidikan'));
}
public function update(Request $request, Pendidikan $pendidikan){
    $pendidikan->update($request->all());
    return redirect()->route('pendidikan.index')->with('success','Pendidikan berhasil diperbarui');
}
public function destroy(Pendidikan $pendidikan){
    $pendidikan->delete();
    return redirect()->route('pendidikan.index')->with('success','Data Pendidikan berhasil dihapus.');
}

}