<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Item;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Hashing\Hasher;
use Illuminate\Support\Facades\DB;

use Auth;
use App\User;
use Validator;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use App\Kapal;
use App\Pemakaian;
use App\Permintaan;
Auth::routes();

class PemakaianController extends Controller
{
  public function __construct()
    {
        $this->middleware('auth');
    }

  public function create($id)
    {
      $permintaan= Permintaan::whereId($id)->first();
      $pemakaians = DB::table('pemakaian')->join('permintaan', 'pemakaian.id_permintaan', '=', 'permintaan.id')
                                        ->select('pemakaian.*')
                                        ->where('pemakaian.id_permintaan', $id)
                                        ->get();
      foreach ($pemakaians as $p ) {
          $idmin = $p->id;
          $pakai = Pemakaian::whereId($idmin)->first();
          $time = $p->tanggal;
          $time1 = strtotime($time);
          $time2 = $time1 + 86400;
          $tgl = date("m/d/Y", $time2);
          $tggl = date("m/d/Y", strtotime($tgl));
      }
      return view('pemakaian.create')->with(compact('permintaan'))
                                      ->with(compact('pakai'))
                                      ->with(compact('tggl'));
    }
  public function store(Request $request, $id)
     {
       request()->validate([
         'tanggal' => 'required',
         'mulai' => 'required',
         'selesai' => 'required',
       ]);
       Pemakaian::create($request->all());
       $permintaan = Permintaan::whereId($id)->first();
       $kapal = DB::table('kapal')->join('permintaan', 'permintaan.id_kapal', '=', 'kapal.id')
                                           ->where('permintaan.id', $id)
                                           ->max('kapal.id');
       $kapals = DB::table('kapal')->join('permintaan', 'permintaan.id_kapal', '=', 'kapal.id')
                                           ->where('permintaan.id', $id)
                                           ->max('kapal.name');

       $pemakaians = DB::table('pemakaian')->join('permintaan', 'pemakaian.id_permintaan', '=', 'permintaan.id')
                                         ->select('pemakaian.*')
                                         ->where('pemakaian.id_permintaan', $id)
                                         ->get();


      foreach ($pemakaians as $p) {
        $p->pakai_jam = $p->selesai - $p->mulai;
        Pemakaian::find($p->id)->update(['pakai_jam' => $p->pakai_jam]);
      }


      $pakaijam = DB::table('pemakaian')->select('pemakaian.pakai_jam')->get();
      $kapal_me = DB::table('kapal')->join('permintaan', 'permintaan.id_kapal', '=', 'kapal.id')
                                      ->where('permintaan.id', $id)
                                      ->avg('kapal.hrm_me');
      $kapal_ae = DB::table('kapal')->join('permintaan', 'permintaan.id_kapal', '=', 'kapal.id')
                                      ->where('permintaan.id', $id)
                                      ->avg('kapal.hrm_ae');
      foreach ($pemakaians as $p) {
          $p->bbm_me = $p->pakai_jam * $kapal_me;
          $p->bbm_ae = $p->pakai_jam * $kapal_ae;
          Pemakaian::find($p->id)->update(['bbm_ae' => $p->bbm_ae]);
          Pemakaian::find($p->id)->update(['bbm_me' => $p->bbm_me]);
      }

      $totalbbm_me = DB::table('pemakaian')->join('permintaan', 'pemakaian.id_permintaan', '=', 'permintaan.id')
                                             ->where('pemakaian.id_permintaan', $id)
                                             ->sum('pemakaian.bbm_me');
      $totalbbm_ae = DB::table('pemakaian')->join('permintaan', 'pemakaian.id_permintaan', '=', 'permintaan.id')
                                            ->where('pemakaian.id_permintaan', $id)
                                            ->sum('pemakaian.bbm_ae');

       $totalbbm = $totalbbm_ae + $totalbbm_me;
         Permintaan::find($id)->update(['v_pemakaian' => $totalbbm]);
         Permintaan::find($id)->update(['v_me' => $totalbbm_me]);
         Permintaan::find($id)->update(['v_ae' => $totalbbm_ae]);
      $sisa = $permintaan->v_awal - $permintaan->v_pemakaian;
         Permintaan::find($id)->update(['v_sisa' => $sisa]);

      $makstgl = DB::table('pemakaian')->join('permintaan', 'pemakaian.id_permintaan', '=', 'permintaan.id')
                                        ->where('pemakaian.id_permintaan', $id)
                                        ->max('pemakaian.tanggal');
      return view('pemakaian.index')->with(compact('pemakaians'))
                                      ->with(compact('permintaan'))
                                      ->with(compact('kapals'))
                                      ->with(compact('kapal'))
                                      ->with(compact('makstgl'));
     }


       public function edit($id)
         {
           $pemakaians= Pemakaian::whereId($id)->first();
           $permintaan_id = DB::table('permintaan')->join('pemakaian', 'pemakaian.id_permintaan', '=', 'permintaan.id')
                                         ->where('pemakaian.id', $id)
                                         ->max('permintaan.id');

           return view('pemakaian.edit')->with(compact('permintaan_id'))
                                           ->with(compact('pemakaians'));
         }
       public function update(Request $request, $id)
          {
            $pemakaian1 = Pemakaian::findOrFail($id);
            $this->validate($request, [
              'tanggal' => 'required',
              'mulai' => 'required',
              'selesai' => 'required',
            ]);
            $input = $request->all();
            $pemakaian1->fill($input)->save();

            $permintaan_id = DB::table('permintaan')->join('pemakaian', 'pemakaian.id_permintaan', '=', 'permintaan.id')
                                          ->where('pemakaian.id', $id)
                                          ->max('permintaan.id');
            $permintaan = Permintaan::whereId($permintaan_id)->first();
            $kapal = DB::table('kapal')->join('permintaan', 'permintaan.id_kapal', '=', 'kapal.id')
                                                ->where('permintaan.id', $permintaan_id)
                                                ->max('kapal.id');
            $kapals = DB::table('kapal')->join('permintaan', 'permintaan.id_kapal', '=', 'kapal.id')
                                                ->where('permintaan.id', $permintaan_id)
                                                ->max('kapal.name');

            $pemakaians = DB::table('pemakaian')->join('permintaan', 'pemakaian.id_permintaan', '=', 'permintaan.id')
                                              ->select('pemakaian.*')
                                              ->where('pemakaian.id_permintaan', $permintaan_id)
                                              ->get();


           foreach ($pemakaians as $p) {
             $p->pakai_jam = $p->selesai - $p->mulai;
             Pemakaian::find($p->id)->update(['pakai_jam' => $p->pakai_jam]);
           }


           $pakaijam = DB::table('pemakaian')->select('pemakaian.pakai_jam')->get();
           $kapal_me = DB::table('kapal')->join('permintaan', 'permintaan.id_kapal', '=', 'kapal.id')
                                           ->where('permintaan.id', $permintaan_id)
                                           ->avg('kapal.hrm_me');
           $kapal_ae = DB::table('kapal')->join('permintaan', 'permintaan.id_kapal', '=', 'kapal.id')
                                           ->where('permintaan.id', $permintaan_id)
                                           ->avg('kapal.hrm_ae');
           foreach ($pemakaians as $p) {
               $p->bbm_me = $p->pakai_jam * $kapal_me;
               $p->bbm_ae = $p->pakai_jam * $kapal_ae;
               Pemakaian::find($p->id)->update(['bbm_ae' => $p->bbm_ae]);
               Pemakaian::find($p->id)->update(['bbm_me' => $p->bbm_me]);
           }

           $totalbbm_me = DB::table('pemakaian')->join('permintaan', 'pemakaian.id_permintaan', '=', 'permintaan.id')
                                                  ->where('pemakaian.id_permintaan', $permintaan_id)
                                                  ->sum('pemakaian.bbm_me');
           $totalbbm_ae = DB::table('pemakaian')->join('permintaan', 'pemakaian.id_permintaan', '=', 'permintaan.id')
                                                 ->where('pemakaian.id_permintaan', $permintaan_id)
                                                 ->sum('pemakaian.bbm_ae');

            $totalbbm = $totalbbm_ae + $totalbbm_me;
              Permintaan::find($permintaan_id)->update(['v_pemakaian' => $totalbbm]);
              Permintaan::find($permintaan_id)->update(['v_me' => $totalbbm_me]);
              Permintaan::find($permintaan_id)->update(['v_ae' => $totalbbm_ae]);
           $sisa = $permintaan->v_awal - $permintaan->v_pemakaian;
              Permintaan::find($permintaan_id)->update(['v_sisa' => $sisa]);

           $makstgl = DB::table('pemakaian')->join('permintaan', 'pemakaian.id_permintaan', '=', 'permintaan.id')
                                             ->where('pemakaian.id_permintaan', $permintaan_id)
                                             ->max('pemakaian.tanggal');
           return view('pemakaian.index')->with(compact('pemakaians'))
                                           ->with(compact('permintaan'))
                                           ->with(compact('kapals'))
                                           ->with(compact('kapal'))
                                           ->with(compact('makstgl'));
          }


  public function destroy($id)
      {
             DB::delete('delete from pemakaian where id = ?',[$id]);
             echo "Record deleted successfully.<br/>";
             return redirect()->back();
      }
  public function Pemakaian($id)
    {
      $permintaan = Permintaan::whereId($id)->first();
      $kapal = DB::table('kapal')->join('permintaan', 'permintaan.id_kapal', '=', 'kapal.id')
                                          ->where('permintaan.id', $id)
                                          ->max('kapal.id');
      $kapals = DB::table('kapal')->join('permintaan', 'permintaan.id_kapal', '=', 'kapal.id')
                                          ->where('permintaan.id', $id)
                                          ->max('kapal.name');

      $pemakaians = DB::table('pemakaian')->join('permintaan', 'pemakaian.id_permintaan', '=', 'permintaan.id')
                                        ->select('pemakaian.*')
                                        ->where('pemakaian.id_permintaan', $id)
                                        ->get();

      foreach ($pemakaians as $p) {
        $p->pakai_jam = $p->selesai - $p->mulai;
        Pemakaian::find($p->id)->update(['pakai_jam' => $p->pakai_jam]);
      }

      $pakaijam = DB::table('pemakaian')->select('pemakaian.pakai_jam')->get();
      $kapal_me = DB::table('kapal')->join('permintaan', 'permintaan.id_kapal', '=', 'kapal.id')
                                      ->where('permintaan.id', $id)
                                      ->avg('kapal.hrm_me');
      $kapal_ae = DB::table('kapal')->join('permintaan', 'permintaan.id_kapal', '=', 'kapal.id')
                                        ->where('permintaan.id', $id)
                                        ->avg('kapal.hrm_ae');
      foreach ($pemakaians as $p) {
        $p->bbm_me = $p->pakai_jam * $kapal_me;
        $p->bbm_ae = $p->pakai_jam * $kapal_ae;
        Pemakaian::find($p->id)->update(['bbm_ae' => $p->bbm_ae]);
        Pemakaian::find($p->id)->update(['bbm_me' => $p->bbm_me]);
      }

      $totalbbm_me = DB::table('pemakaian')->join('permintaan', 'pemakaian.id_permintaan', '=', 'permintaan.id')
                                            ->where('pemakaian.id_permintaan', $id)
                                            ->sum('pemakaian.bbm_me');
      $totalbbm_ae = DB::table('pemakaian')->join('permintaan', 'pemakaian.id_permintaan', '=', 'permintaan.id')
                                          ->where('pemakaian.id_permintaan', $id)
                                          ->sum('pemakaian.bbm_ae');

      $totalbbm = $totalbbm_ae + $totalbbm_me;
        Permintaan::find($id)->update(['v_pemakaian' => $totalbbm]);
        Permintaan::find($id)->update(['v_sisa' => $permintaan->v_awal - $totalbbm]);
        Permintaan::find($id)->update(['v_me' => $totalbbm_me]);
        Permintaan::find($id)->update(['v_ae' => $totalbbm_ae]);

      $makstgl = DB::table('pemakaian')->join('permintaan', 'pemakaian.id_permintaan', '=', 'permintaan.id')
                                            ->where('pemakaian.id_permintaan', $id)
                                            ->max('pemakaian.tanggal');
      return view('pemakaian.index')->with(compact('pemakaians'))
                                    ->with(compact('permintaan'))
                                    ->with(compact('kapals'))
                                    ->with(compact('kapal'))
                                    ->with(compact('makstgl'));
    }



}
