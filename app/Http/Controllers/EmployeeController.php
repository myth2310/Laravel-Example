<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(){
        $data = Employee::all();
        return view('dataPegawai',compact('data'));
    }

    public function tambahpegawai(){
        return view('tambahPegawai');
    }

    public function insertdata(Request $request){
       // dd($request->all());
        $data = Employee::create($request->all());
        if($request->hasFile('image')){
            $request->file('image')->move('imagepegawai/', $request->file('image')->getClientOriginalName());
            $data->image = $request->file('image')->getClientOriginalName();
            $data->save;
        }
        return redirect()->route('pegawai')->with('success',' Data Berhasil Ditambahkan ');
    }

    public function tampilData($id){
        $data = Employee::find($id);
        //dd($data);
        return view('tampilData',compact('data'));
    }

    public function updateData(Request $request, $id){
        $data = Employee::find($id);    
        $data->update($request->all());
        return redirect()->route('pegawai')->with('success',' Data Berhasil Diupdate ');
    }
    
    //public function deleteData($id){
      //  $data = Employee::find($id);
        //$data->delete();
        //return redirect()->route('pegawai')->with('success',' Data Berhasil Dihapus ');
    //}
}
