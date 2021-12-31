<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\recapt;
use App\keterangan;
use App\kelas;

class absenController extends Controller
{
    public function index(){
        // @dd(recapt::all());
        return view('home', [
            "title" => "Home",
            "kelas" => kelas::all()
        ]);
    }

    public function insert(Request $request){
        // @dd()

        // $user = User::where('id', $request->id)->first();

        $cek = recapt::where('id_user', $request->id)->where('date', date("Y-m-d"))->get();

        if($cek->count() == 1){
            return back()->with('error', "Murid ini sudah melakukan Absen");
        }

        $update = User::where('id', $request->id)
                ->update([
                'status'    => 1
            ]);
        
        if($update){
            $isi = recapt::create([
                'id_user'   => $request->id,
                'id_keterangan' => $request->keterangan,
                'date'          => date('Y-m-d')
            ]);
    
            if($isi){
                return back(); 
            }
        }
    }

    public function show(kelas $kelas){
        // @dd($kelas->kelas);
        return view('recapt', [
            "user"  => User::where('id_kelas', $kelas->id)->get(),
            "recapts" => recapt::join('users', 'recapts.id_user', '=', 'users.id')
                               ->join('keterangans', 'keterangans.id', '=', 'recapts.id_keterangan')
                               ->where('users.id_kelas', $kelas->id)->where('recapts.date', date("Y-m-d"))
                               ->get(),
            "kelas" => kelas::all(),
            "title" => "Recapt ". $kelas->kelas,
            "dates" => recapt::where('id_user', 1)->get(),
            "parameter" => $kelas->kelas
        ]);
    }

    public function dor(kelas $class){
        // @dd($class->id);
        $parameter = User::all();
        $parameter2 = recapt::join('users', 'users.id', '=', 'recapts.id_user')
                            ->where('date', date('Y-m-d'))
                            ->get();
        
        // if($parameter2->count() == $parameter->count()){
        //     User::where('status', 1)->where('users.id_kelas', $class->id)
        //     ->update([
        //     'status'  => 0
        //     ]);
        // }elseif($parameter2->count() == null){
        //     User::where('status', 1)
        //     ->update([
        //     'status'  => 0
        //     ]);
        // }

        if($parameter2->count() == null){
            User::where('status', 1)
                ->update([
                    'status' => 0
                ]);
        }

        return view('absensi', [
            "users"         => User::where('status', 0)->where('users.id_kelas', $class->id)
                                   ->orderBy('name', 'ASC')->get(),
            "keterangan"    => keterangan::all(),
            "kelas"         => kelas::all(),
            "title"         => "Absen ". $class->kelas
        ]);
    }

    public function der(Recapt $date, $class){
        // @dd($class);

        return view('recaptDate', [
            "recapts"  => recapt::join('users', 'recapts.id_user', '=', 'users.id')
                                ->join('keterangans', 'keterangans.id', '=', 'recapts.id_keterangan')
                                ->join('kelas', 'users.id_kelas', '=', 'kelas.id')
                                ->where('recapts.date', $date->date)->where('kelas.kelas', $class)
                                ->get(),
            "kelas"    => kelas::all(),
            "title"    => $date->date,
            "dates"    => recapt::where('id_user', 1)->get(),
            "parameter"=> $class
        ]);

    }

    // public function coba(Request $request){
    //     @dd($request->all());
    // }
}
