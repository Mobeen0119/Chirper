<?php

namespace App\Http\Controllers;
use App\Models\Chirp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ChirpController extends Controller
{
 public function index(){

   return \view('dashboard',[
    'chirps'=>Chirp::with('user')->latest()->get()
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
 public function edit(Chirp $chirp){
  Gate::authorize('update', $chirp);
  return view('chirps.edit',[
    'chirp'=>$chirp
  ]);
 }
 public function update(Request $request, Chirp $chirp){
  Gate::authorize('update', $chirp);
  $validated=$request ->validate([
    'message'=>'required|string|max:300'
  ]);
  $chirp->update($validated);
  return redirect(route('dashboard'));
 }
}