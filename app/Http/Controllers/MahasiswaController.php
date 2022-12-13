<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class MahasiswaController extends Controller
{
   public function tampilmahasiswa(){
    $mahasiswa = Mahasiswa::all();
    return view('tampilmahasiswa',compact('mahasiswa'));
   }

   public function create(){
    return view('mahasiswa');
   }

   public function store(Request $request){
    $mahasiswa = new Mahasiswa;
    $mahasiswa->nama = $request->input('nama');
    $mahasiswa->email = $request->input('email');
    if($request->hasFile('profile_image')){
        $file = $request->file('profile_image');
        $extention = $file->getClientOriginalExtension();
        $filename = time().'.'.$extention;
        $file->storeAs('image/mahasiswa/',$filename);
        $mahasiswa->profile_image = $filename;
    }
    $mahasiswa->save();
    return redirect()->back()->with('status','Data Telah Ditambahkan');

   }


    public function hapusdata($id){
        $mahasiswa = Mahasiswa::find($id);
        $path = 'storage/image/mahasiswa/'.$mahasiswa->profile_image;
        if(File::exists($path)){
            File::delete($path);
        }
        $mahasiswa->delete();
        return redirect()->back()->with('status','Data Telah Dihapus');
        

    }

    public function editdata($id){
        // $mahasiswa = Mahasiswa::find($id);
        // return view('edit-mahasiswa',compact('mahasiswa'));

        $mahasiswa =  Mahasiswa:: find($id);

        return view('edit-mahasiswa', [
            'method'=> "PUT",
            'action'=> "/edit-mahasiswa/{id}",
            'mahasiswa'=> $mahasiswa
        ]);

    }

    public function update(Request $request, $id){

    $mahasiswa = Mahasiswa::find($id); 
               
        $validator = $request -> validate([
            'nama' => 'required',
            'email' => 'required',
            'profile_image' => 'image|file|max:2048,jpeg,png,jpg',  
        ], 
        [
            "nama.required" => "Please enter activity name",
            "email.required" => "Please enter date",
            "profile_image.required" => "Please enter description",
        ]);

        if($request->hasFile('profile_image')){
            $request->validate([
                'profile_image' => 'image|file|max:2048,jpeg,png,jpg',
              ]);
            Storage::delete($mahasiswa->profile_image);
            $file = $request->file('profile_image');
            $extention = $file->getClientOriginalExtension();
            $filename = $request->name.'_'.now()->timestamp.'.'.$extention;
            $file->storeAs('image/mahasiswa/',$filename);
            $mahasiswa->profile_image = $filename;
        }


        $mahasiswa->nama = $request->nama;
        $mahasiswa->email = $request->email;
        $mahasiswa->save();

        return redirect()->back()->with('status','Data Telah Diupdate');

    }
}
