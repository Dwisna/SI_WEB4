<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
class ManagementUserController extends Controller{
    public function index(){
        $name = "Hesti Nurhayati";
        $nim = "E41232454";
        $prodi = "Teknik Informatika";

        return view('home', compact('nama', 'nim', 'prodi'));
    }
    public function create(){
        return "menampilkan halaman form tambah data";
    }
    public function store(Request $request){
        return "untuk menciptakan data admin yang baru";
    }
    public function show(){
        return "adalah halaman show";
    }
    public function edit($id){
        return "menampilkan form untuk mengubah dan edit dengan id = ".$id;
    }
    public function update(Request $request, $id){
        return"digunakan untuk mengubah data admin dengan id = ";
    }
    public function destroy($id){
        return "digunakan untuk menghapus data admin dengan id =". $id;
    }
    
}