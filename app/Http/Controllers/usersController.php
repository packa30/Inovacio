<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use DB;

class usersController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function get_addmiestnosti($popis){
      $max = DB::table($popis)->max('poradie');
      $max += 1;
      return view('add_miestnosti',['popis' => $popis, 'max' => $max]);
    }

    public function post_addmiestnosti(Request $req,$popis){
      $poradie = $req->input('poradie');
      $description = $req->input('popis');
      $date = $req->input('datum');
      $obr1 = $req->input('obr1');
      $obr2 = $req->input('obr2');
      $obr11 = $req->file('obr1');
      $obr22 = $req->file('obr2');
      if(is_null($poradie) || is_null($description) || is_null($date) || ($_FILES['obr1']['name'] == "") ||($_FILES['obr2']['name'] == "")){
        return redirect()->back()->with('status',"Chýbali niektoré údaje");
      }
      else {
        $idpoc = DB::table('pocitanie')->insertGetId(['popis' => $popis]);
        $data=array(
          'poradie' => $poradie,
          'popis' => $description,
          'date' => $date,
          'obr1' => $_FILES['obr1']['name'],
          'obr2' => $_FILES['obr2']['name'],
          'pocitadlo' => $idpoc
        );

        $this->updatebigger_up($popis,$poradie);
        $idnow = DB::table($popis)->insertGetId($data);


        $source = "images/". $popis . "/" . $idpoc . "/";
        mkdir($source);

        $file1 = "public/" . $source . $_FILES['obr1']['name'];
        $file2 = "public/" . $source . $_FILES['obr2']['name'];
        $file11 = $source . $_FILES['obr1']['name'];
        $file22 = $source . $_FILES['obr2']['name'];
        if (!file_exists($file11)) {
          if ( ! copy($_FILES['obr1']['tmp_name'],base_path($file1)))
          {
              return redirect()->intended(route('index'))->with('status',"chyba pri prenose obrázka skúste znova prosím");
          }
          $this->create_resized_imgs($file11,$obr11->getClientOriginalExtension(),$source,$_FILES['obr1']['name']);
        }
        if (!file_exists($file22)) {
          if ( ! copy($_FILES['obr2']['tmp_name'],base_path($file2)))
          {
              return redirect()->intended(route('index'))->with('status',"chyba pri prenose obrázka skúste znova prosím");
          }
          $this->create_resized_imgs($file22,$obr22->getClientOriginalExtension(),$source,$_FILES['obr2']['name']);
        }

        return redirect()->intended(route('index'))->with('status',"Úspešne pridaný záznam");
      }
    }

    public function updatebigger_up($table,$number){
      DB::table($table)->where('poradie', '>=', $number)->increment('poradie');
    }

    public function updatebigger_down($table,$number){
      DB::table($table)->where('poradie', '>', $number)->decrement('poradie');
    }

    public function updatebetween_up($table,$number1,$number2){
      DB::table($table)->whereBetween('poradie',[$number1,$number2])->increment('poradie');
    }

    public function updatebetween_down($table,$number1,$number2){
      DB::table($table)->whereBetween('poradie',[$number1,$number2])->decrement('poradie');
    }

    public function get_editmiestnosti($popis,$id){
      $zaznam = DB::table($popis)->where('id',$id)->first();
      $max = DB::table($popis)->max('poradie');
      $max += 1;
      return view('edit_miestnosti',['popis' => $popis,'zaznam' => $zaznam,'max' => $max]);
    }

    public function post_editmiestnosti(Request $req, $popis, $id){
      $zaznam = DB::table($popis)->where('id',$id)->first();
      $poradie = $req->input('poradie');
      $description = $req->input('popis');
      $date = $req->input('datum');
      $obr1 = $req->input('obr1');
      $obr2 = $req->input('obr2');
      $obr11 = $req->file('obr1');
      $obr22 = $req->file('obr2');
      $source = "images/". $popis . "/" . $zaznam->pocitadlo . "/";

      if(is_null($poradie) || is_null($description) || is_null($date)){
        return redirect()->back()->with('status',"Chýbali niektoré údaje");
      }
      else {
        if(($_FILES['obr1']['name'] == "") && ($_FILES['obr2']['name'] == "")){
          $data=array(
            'poradie' => $poradie,
            'popis' => $description,
            'date' => $date
          );
        }
        else {
          if (($_FILES['obr1']['name'] != "") && ($_FILES['obr2']['name'] != "")) {
            $data=array(
              'poradie' => $poradie,
              'popis' => $description,
              'date' => $date,
              'obr1' => $_FILES['obr1']['name'],
              'obr2' => $_FILES['obr2']['name']
            );
          }
          elseif($_FILES['obr1']['name'] != "") {
            $data=array(
              'poradie' => $poradie,
              'popis' => $description,
              'date' => $date,
              'obr1' => $_FILES['obr1']['name']
            );
          }
          else {
            $data=array(
              'poradie' => $poradie,
              'popis' => $description,
              'date' => $date,
              'obr2' => $_FILES['obr2']['name']
            );
          }
        }


        if ($_FILES['obr1']['name'] != "") {
          $file1 = "public/" . $source . $_FILES['obr1']['name'];
          $file11 = $source . $_FILES['obr1']['name'];
          if (!file_exists($file11)) {
            if ( ! copy($_FILES['obr1']['tmp_name'],base_path($file1)))
            {
              return redirect()->intended(route('index'))->with('status',"chyba pri prenose obrázka skúste znova prosím");
            }
            $this->delete_trash($source,$zaznam->obr1);
            $this->create_resized_imgs($file11,$obr11->getClientOriginalExtension(),$source,$_FILES['obr1']['name']);
          }
        }
        if ($_FILES['obr2']['name'] != "") {
          $file2 = "public/" . $source . $_FILES['obr2']['name'];
          $file22 = $source . $_FILES['obr2']['name'];
          if (!file_exists($file22)) {
            if ( ! copy($_FILES['obr2']['tmp_name'],base_path($file2)))
            {
              return redirect()->intended(route('index'))->with('status',"chyba pri prenose obrázka skúste znova prosím");
            }
            $this->delete_trash($source,$zaznam->obr2);
            $this->create_resized_imgs($file22,$obr22->getClientOriginalExtension(),$source,$_FILES['obr2']['name']);
          }
        }



        if ($zaznam->poradie != $poradie) {
          if ($zaznam->poradie < $poradie) {
            $this->updatebetween_down($popis,$zaznam->poradie,$poradie);
          }
          else {
            $this->updatebetween_up($popis,$poradie,$zaznam->poradie);
          }
        }

        DB::table($popis)->where('id',$id)->update($data);


        return redirect()->intended(route('index'))->with('status',"Úspešne upravený záznam");
      }
    }

    public function get_deletemiestnosti($popis,$id){
      $zaznam = DB::table($popis)->where('id',$id)->first();
      return view('delete_miestnosti',['popis' => $popis,'zaznam' => $zaznam]);
    }

    public function post_deletemiestnosti(Request $req, $popis, $id){
      $zaznam = DB::table($popis)->where('id',$id)->first();
      $this->updatebigger_down($popis,$zaznam->poradie);
      DB::table($popis)->where('id',$id)->delete();
      return redirect()->intended(route('index'))->with('status',"Záznam úspešne odstránený");
    }

    public function get_addrealizacie(){
        $max = DB::table('realizacie')->max('poradie');
        $max += 1;
        return view('add_realizacie',['max' => $max]);
    }
    public function post_addrealizacie(Request $req){
      $poradie = $req->input('poradie');
      $popis = $req->input('popis');
      $data=array(
        'poradie' => $poradie,
        'popis' => $popis
      );
      $this->updatebigger_up('realizacie',$poradie);
      $id = DB::table('realizacie')->insertGetId($data);
      $source = "images/realizacie/" . $id . "/";
      mkdir($source);
      return redirect()->intended(route('realizacie'))->with('status',"Záznam úspešne pridaný");
    }
    public function get_addsubrealizacie($id){
      $max = DB::table('subrealizacie')->where('realizacie_id',$id)->max('poradie');
      $max += 1;
      return view('add_subrealizacie',['max' => $max,'id' => $id]);
    }

    public function updatebigger_up_sub($id,$number){
      DB::table('subrealizacie')->where('realizacie_id',$id)->where('poradie', '>=', $number)->increment('poradie');
    }
    public function updatebigger_down_sub($id,$number){
      DB::table('subrealizacie')->where('realizacie_id',$id)->where('poradie', '>', $number)->decrement('poradie');
    }
    public function updatebetween_up_sub($id,$number1,$number2){
      DB::table('subrealizacie')->where('realizacie_id',$id)->whereBetween('poradie',[$number1,$number2])->increment('poradie');
    }
    public function updatebetween_down_sub($id,$number1,$number2){
      DB::table('subrealizacie')->where('realizacie_id',$id)->whereBetween('poradie',[$number1,$number2])->decrement('poradie');
    }

    public function updatebigger_up_obr($id,$number){
      DB::table('obrazky')->where('subrealizacie_id',$id)->where('poradie', '>=', $number)->increment('poradie');
    }
    public function updatebigger_down_obr($id,$number){
      DB::table('obrazky')->where('subrealizacie_id',$id)->where('poradie', '>', $number)->decrement('poradie');
    }
    public function updatebetween_up_obr($id,$number1,$number2){
      DB::table('obrazky')->where('subrealizacie_id',$id)->whereBetween('poradie',[$number1,$number2])->increment('poradie');
    }
    public function updatebetween_down_obr($id,$number1,$number2){
      DB::table('obrazky')->where('subrealizacie_id',$id)->whereBetween('poradie',[$number1,$number2])->decrement('poradie');
    }

    public function post_addsubrealizacie(Request $req, $id){
      $poradie = $req->input('poradie');
      $popis = $req->input('popis');
      $data=array(
        'poradie' => $poradie,
        'popis' => $popis,
        'realizacie_id' => $id
      );
      $this->updatebigger_up_sub($id,$poradie);
      $sub_id = DB::table('subrealizacie')->insertGetId($data);
      $source = "images/realizacie/" . $id . "/" . $sub_id . "/";
      mkdir($source);
      $obrpor = 1;
      if ($req->hasFile('files')) {
        foreach ($req->file('files') as $file) {

          $obrserv = $source . $file->getClientOriginalName();
          $obrserv2 = 'public/' . $source . $file->getClientOriginalName();
          if (!file_exists($obrserv)) {
            if ( !copy($file->path(),base_path($obrserv2)))
            {
              return redirect()->intended(route('realizacie'))->with('status',"chyba pri prenose obrázka skúste znova prosím");
            }
            $this->create_resized_imgs($obrserv,$file->getClientOriginalExtension(),$source,$file->getClientOriginalName());
          }
          $data2=array(
            'poradie' => $obrpor,
            'obr' => $file->getClientOriginalName(),
            'subrealizacie_id' => $sub_id
          );
          DB::table('obrazky')->insert($data2);
          $obrpor += 1;
        }

      }
      return redirect()->intended(route('realizacie'))->with('status',"Podblok realizácie úspešne pridaný");
    }

    public function get_editrealizacie($id){
      $max = DB::table('realizacie')->max('poradie');
      $data = DB::table('realizacie')->where('id',$id)->first();
      return view('edit_realizacie',['data' => $data, 'id' => $id, 'max' => $max]);
    }
    public function post_editrealizacie(Request $req, $id){
      $poradie = $req->input('poradie');
      $popis = $req->input('popis');
      $data=array(
        'poradie' => $poradie,
        'popis' => $popis
      );
      $zaznam = DB::table('realizacie')->where('id',$id)->first();
      if ($zaznam->poradie != $poradie) {
        if ($zaznam->poradie < $poradie) {
          $this->updatebetween_down('realizacie',$zaznam->poradie,$poradie);
        }
        else {
          $this->updatebetween_up('realizacie',$poradie,$zaznam->poradie);
        }
      }
      DB::table('realizacie')->where('id',$id)->update($data);
      return redirect()->intended(route('realizacie'))->with('status',"Záznam úspešne urpavený");
    }
    public function get_editsubrealizacie($id){
      $data = DB::table('subrealizacie')->where('id',$id)->first();
      $max = DB::table('subrealizacie')->where('realizacie_id',$data->realizacie_id)->max('poradie');
      $obr = DB::table('obrazky')->where('subrealizacie_id',$id)->get();
      return view('edit_subrealizacie',['data' => $data, 'obr' => $obr, 'id' => $id, 'max' => $max]);
    }
    public function post_editsubrealizacie(Request $req, $id){
      $poradie = $req->input('poradie');
      $popis = $req->input('popis');
      $data=array(
        'poradie' => $poradie,
        'popis' => $popis
      );

      $zaznam = DB::table('subrealizacie')->where('id',$id)->first();
      if ($zaznam->poradie != $poradie) {
        if ($zaznam->poradie < $poradie) {
          $this->updatebetween_down_sub($zaznam->realizacie_id,$zaznam->poradie,$poradie);
        }
        else {
          $this->updatebetween_up_sub($zaznam->realizacie_id,$poradie,$zaznam->poradie);
        }
      }
      DB::table('subrealizacie')->where('id',$id)->update($data);
      $source = "images/realizacie/" . $zaznam->realizacie_id . "/" . $id . "/";
      $obrpor = DB::table('obrazky')->where('subrealizacie_id',$id)->max('poradie');
      if ($req->hasFile('files')) {
        foreach ($req->file('files') as $file) {
          $obrpor += 1;
          $obrserv = $source . $file->getClientOriginalName();
          $obrserv2 = 'public/' . $source . $file->getClientOriginalName();
          if (!file_exists($obrserv)) {
            if ( !copy($file->path(),base_path($obrserv2)))
            {
              return redirect()->intended(route('realizacie'))->with('status',"chyba pri prenose obrázka skúste znova prosím");
            }
            $this->create_resized_imgs($obrserv,$file->getClientOriginalExtension(),$source,$file->getClientOriginalName());
          }
          $data2=array(
            'poradie' => $obrpor,
            'obr' => $file->getClientOriginalName(),
            'subrealizacie_id' => $id
          );
          DB::table('obrazky')->insert($data2);
        }

      }
      return redirect()->intended(route('realizacie'))->with('status',"Podblok realizácie úspešne upravený");
    }
    public function sub_obr_del(Request $req, $id){
      $data = DB::table('obrazky')->where('subrealizacie_id',$id)->get();
      $data2 = DB::table('subrealizacie')->where('id',$id)->first();
      $source = "images/realizacie/" . $data2->realizacie_id . "/" . $id . "/";
      foreach ($data as $value) {
        if(!is_null($req->input($value->id))){
          $this->delete_trash($source,$value->obr);
          $this->del_pic($value->id);
        }
      }
      return redirect()->intended(route('realizacie'))->with('status',"Obrázky úspešne odstránené");

    }

    public function del_pic($id){
      $zaznam = DB::table('obrazky')->where('id',$id)->first();
      DB::table('obrazky')->where('id',$id)->delete();
      $this->updatebigger_down_obr($zaznam->subrealizacie_id,$zaznam->poradie);
    }
    public function del_sub($id){
      $obr = DB::table('obrazky')->where('subrealizacie_id',$id)->get();
      foreach ($obr as $ob) {
        $this->del_pic($ob->id);
      }
      $data = DB::table('subrealizacie')->where('id',$id)->first();
      DB::table('subrealizacie')->where('id',$id)->delete();
      $this->updatebigger_down_sub($data->realizacie_id,$data->poradie);
    }
    public function del_real($id){
      $zaznam = DB::table('realizacie')->where('id',$id)->first();
      $sub = DB::table('subrealizacie')->where('realizacie_id',$id)->get();
      foreach ($sub as $su) {
        $this->del_sub($su->id);
      }
      DB::table('realizacie')->where('id',$id)->delete();
      $this->updatebigger_down('realizacie',$zaznam->poradie);
    }

    public function get_deleterealizacie($id){
      $data = DB::table('realizacie')->where('id',$id)->first();
      return view('delete_realizacie',['data' => $data, 'id' => $id]);
    }
    public function post_deleterealizacie(Request $req,$id){
      $this->del_real($id);
      return redirect()->intended(route('realizacie'))->with('status',"Záznam úspešne vymazaný");
    }
    public function get_deletesubrealizacie($id){
      $data = DB::table('subrealizacie')->where('id',$id)->first();
      return view('delete_subrealizacie',['data' => $data, 'id' => $id]);
    }
    public function post_deletesubrealizacie(Request $req, $id){
      $this->del_sub($id);
      return redirect()->intended(route('realizacie'))->with('status',"Záznam úspešne vymazaný");
    }

    public function get_cennik(){
      $data = DB::table('cennik')->orderBy('id')->get();
      return view('edit_cennik',['data' => $data]);
    }

    public function post_cennik(Request $req){
      $data = DB::table('cennik')->get();
      foreach ($data as $value) {
        $popis = 'popis' . $value->id;
        $cena = 'cena' . $value->id;
        if (is_null($req->input($popis))) {
          DB::table('cennik')->where('id',$value->id)->delete();
        }
        else {
          $data2=array(
            'popis' => $req->input($popis),
            'cena' => $req->input($cena)
          );
          DB::table('cennik')->where('id',$value->id)->update($data2);
        }
      }
      return redirect()->intended(route('cennik'))->with('status',"Cenník úspešne upravený");
    }

    public function create_resized_imgs($file,$type,$path,$filename){
      list($width, $height) = getimagesize($file);
      $r = $width / $height;
      $res = ['500','800','1080','1200'];
      foreach ($res as $re) {
        $newname = $path . $re . "-" .$filename;
        $w = $re;
        $h = $w/$r;
        $src;
        $dst = imagecreatetruecolor($w, $h);
        switch ($type) {
          case 'jpg': case 'jpeg':
            $src = imagecreatefromjpeg($file);
            imagecopyresampled($dst, $src, 0, 0, 0, 0, $w, $h, $width, $height);
            imagejpeg($dst,$newname);
            break;
          case 'bmp':
            $src = imagecreatefromwbmp($file);
            imagecopyresampled($dst, $src, 0, 0, 0, 0, $w, $h, $width, $height);
            imagewbmp($dst,$newname);
            break;
          case 'png':
            $src = imagecreatefrompng($file);
            imagecopyresampled($dst, $src, 0, 0, 0, 0, $w, $h, $width, $height);
            imagepng($dst,$newname);
            break;
          case 'gif':
            $src = imagecreatefromgif($file);
            imagecopyresampled($dst, $src, 0, 0, 0, 0, $w, $h, $width, $height);
            imagegif($dst,$newname);
            break;
          default:
            echo "podporované formáty obrázka : jpg,bmp,png,gif";
            die();
            break;
        }
      }
    }


    public function delete_trash($path,$filename){
      if (file_exists($path.$filename)){
        unlink(base_path("public/" . $path . $filename));
      }
      if (file_exists($path . "500-" . $filename)){
        unlink(base_path("public/" . $path . "500-" . $filename));
      }
      if (file_exists($path . "800-" . $filename)){
        unlink(base_path("public/" . $path . "800-" . $filename));
      }
      if (file_exists($path . "1080-" . $filename)){
        unlink(base_path("public/" . $path . "1080-" . $filename));
      }
      if (file_exists($path . "1200-" . $filename)){
        unlink(base_path("public/" . $path . "1200-" . $filename));
      }

    }



}
