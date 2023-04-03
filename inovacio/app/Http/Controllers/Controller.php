<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use DB;
use Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
      $obyvacky = DB::table('obyvacky')->orderBy('poradie')->get();
      $kuchyne = DB::table('kuchyne')->orderBy('poradie')->get();
      $detske = DB::table('detske_izby')->orderBy('poradie')->get();
      $spalne = DB::table('spalne')->orderBy('poradie')->get();
      $pracovne = DB::table('pracovne')->orderBy('poradie')->get();
      $kupelne = DB::table('kupelne')->orderBy('poradie')->get();
      $predsiene = DB::table('predsiene')->orderBy('poradie')->get();
      return view('index',['obyvacky' => $obyvacky, 'kuchyne' => $kuchyne, 'detske' => $detske, 'spalne' => $spalne, 'predsiene' => $predsiene,
                           'pracovne' => $pracovne, 'kupelne' => $kupelne]);
    }

    public function realizacie(){
      $realizacie = DB::table('realizacie')->orderBy('poradie')->get();
      $subrealizacie = DB::table('subrealizacie')->orderBy('realizacie_id')->orderBy('poradie')->get();
      $obrazky = DB::table('obrazky')->orderBy('subrealizacie_id')->orderBy('poradie')->get();
      return view('realizacie',['realizacie' => $realizacie, 'subrealizacie' => $subrealizacie, 'obrazky' => $obrazky]);
    }

    public function cennik(){
      $cennik = DB::table('cennik')->orderBy('id')->get();
      return view('cennik',['cennik' => $cennik]);
    }

    public function changepassword(Request $req){
      if (Auth::guard('users')->check()) {
        if(\Hash::check($req->input('oldpassword'),Auth::guard('users')->user()->password)) {
          if($req->input('newpassword') == $req->input('newpassword2')) {
            DB::table('users')->where('id',Auth::guard('users')->user()->id)->update(['password' => \Hash::make($req->input('newpassword'))]);
            return redirect()->back()->with('status','Heslo úspešne zmenené');
          }
          else{
            return redirect()->back()->with('status','Nové heslá sa nezhodujú');
          }
        }
        else{
          return redirect()->back()->with('status','Staré heslo nie je správne');
        }
      }
    }
}
