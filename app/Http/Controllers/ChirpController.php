<?php

namespace App\Http\Controllers;
use App\Models\Chirp;
use Illuminate\Http\Request;

class ChirpController extends Controller
{
 public function index(){
   return \view('dashboard',[
    'chirps'=>Chirp::with('user')->get()
   ]);
   
 }
 
 public function store(Request $request){
   $validated=$request ->validate([
      'message'=>'required|string|max:300'
   ]);
$request->user()->chirps()->create($validated);
   return redirect(route('dashboard'));
 }

 public function destroy(Chirp $chirp){
  if($chirp->user_id!==auth()->id()){
    abort(403, 'This is not your chirp to delete!');
  }
   $chirp->delete();
   return redirect()->back();
 }
}