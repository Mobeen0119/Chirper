<?php

namespace App\Http\Controllers;
use App\Models\Chirp;
use Illuminate\Http\Request;

class ChirpController extends Controller
{
 public function index(){
   $chirps=Chirp::all();
   return view('home',['chirps'=>$chirps]);
 }
 
 public function store(Request $request){
   $request ->validate([
      'message'=>'required|string|max:300'
   ]);
   Chirp::create(['message'=>$request->message]);
   return redirect()->back();
 }

 public function destroy(Chirp $chirp){
   $chirp->delete();
   return redirect()->back();
 }
}
