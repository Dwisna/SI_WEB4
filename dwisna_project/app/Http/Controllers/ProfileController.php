<?php 

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\http\Request;
class ProfileController extends Controller{
    public function index(){
        return"ini adalah halaman pengguna";
    }
    public function show(){
        return "ini adalah halaman profile user7";
    }
}