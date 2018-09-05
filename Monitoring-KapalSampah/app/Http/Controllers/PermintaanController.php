<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Item;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Hashing\Hasher;
use Illuminate\Support\Facades\DB;
use PDF;
use Auth;
use App\User;
use Validator;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use App\Kapal;
use App\Pemakaian;
use App\Permintaan;
Auth::routes();

class PermintaanController extends Controller
{
  public function __construct()
    {
        $this->middleware('auth');
    }
  public function create($id)
    {
      $kapal = Kapal::whereId($id)->first();
      $permintaans = DB::table('permintaan')->join('kapal', 'permintaan.id_kapal', '=', 'kapal.id')
                                        ->select('permintaan.*', 'kapal.name')
                                        ->where('permintaan.id_kapal', $id)
                                        ->get();
      return view('permintaan.create', compact('kapal'), compact('permintaans'));
    }
  public function store(Request $request, $id)
     {
       request()->validate([
         'juru_mudi' => 'required',
         'tanggal_isi' => 'required',
         'v_permintaan' => 'required',
       ]);
       //
       Permintaan::create($request->all());
       $kapal = Kapal::whereId($id)->first();
       $kapal_name = $kapal->name;
       $kapal_id = $kapal->id;
       $permintaans = DB::table('permintaan')->join('kapal', 'permintaan.id_kapal', '=', 'kapal.id')
                                         ->select('permintaan.*')
                                         ->where('permintaan.id_kapal', $id)
                                         ->get();
       foreach ($permintaans as $p) {
           $p->v_awal = $p->v_permintaan;
           Permintaan::find($p->id)->update(['v_awal' => $p->v_awal]);
           $idmin = $p->id - 1;
           if ($p->id > 1) {
             $sebelum = Permintaan::whereId($idmin)->first();
             $sisa = $sebelum->v_sisa;
             $awal = $p->v_permintaan + $sisa;
             Permintaan::find($p->id)->update(['v_awal' => $awal]);
           }
       }
       foreach ($permintaans as $p) {
           $p->v_sisa = $p->v_awal - $p->v_pemakaian;
           Permintaan::find($p->id)->update(['v_sisa' => $p->v_sisa]);
       }
       return view('permintaan.index')->with(compact('kapal_name'))
                                       ->with(compact('kapal_id'))
                                       ->with(compact('permintaans'))
                                       ->with(compact('awal'));
     }
     public function edit($id)
       {
         $kapal_name = DB::table('kapal')->join('permintaan', 'permintaan.id_kapal', '=', 'kapal.id')
                                             ->where('permintaan.id', $id)
                                             ->max('kapal.name');
         $kapal_id = DB::table('kapal')->join('permintaan', 'permintaan.id_kapal', '=', 'kapal.id')
                                       ->where('permintaan.id', $id)
                                       ->max('kapal.id');
         $permintaans = Permintaan::whereId($id)->first();
         return view('permintaan.edit')->with(compact('kapal_name'))
                                        ->with(compact('kapal_id'))
                                        ->with(compact('permintaans'));
       }
     public function update(Request $request, $id)
        {
          $permintaan1 = Permintaan::findOrFail($id);
          $this->validate($request, [
            'juru_mudi' => 'required',
            'tanggal_isi' => 'required',
            'v_permintaan' => 'required',
          ]);
          $input = $request->all();
          $permintaan1->fill($input)->save();
          $kapal_name = DB::table('kapal')->join('permintaan', 'permintaan.id_kapal', '=', 'kapal.id')
                                              ->where('permintaan.id', $id)
                                              ->max('kapal.name');
          $kapal_id = DB::table('kapal')->join('permintaan', 'permintaan.id_kapal', '=', 'kapal.id')
                                        ->where('permintaan.id', $id)
                                        ->max('kapal.id');
          $permintaans = Permintaan::whereId($id)->first();

              $permintaans->v_awal = $permintaans->v_permintaan;
              Permintaan::find($permintaans->id)->update(['v_awal' => $permintaans->v_awal]);
              $idmin = $permintaans->id - 1;
              if ($permintaans->id > 1) {
                  $sebelum = Permintaan::whereId($idmin)->first();
                  $sisa = $sebelum->v_sisa;
                  $awal = $permintaans->v_permintaan + $sisa;
                  Permintaan::find($permintaans->id)->update(['v_awal' => $awal]);
              }


              $permintaans->v_sisa = $permintaans->v_awal - $permintaans->v_pemakaian;
              Permintaan::find($permintaans->id)->update(['v_sisa' => $permintaans->v_sisa]);

          $permintaanmin = Permintaan::whereId($idmin)->first();

          return view('permintaan.show')->with(compact('kapal_name'))
                                          ->with(compact('kapal_id'))
                                          ->with(compact('permintaans'))
                                          ->with(compact('idmin'))
                                          ->with(compact('permintaanmin'))
                                          ->with(compact('awal'));
     }
  public function destroy($id)
      {
             DB::delete('delete from permintaan where id = ?',[$id]);
             echo "Record deleted successfully.<br/>";
             return redirect()->back();
      }
  public function Permintaan($id)
    {
      $kapal = Kapal::whereId($id)->first();
      $kapal_name = $kapal->name;
      $kapal_id = $kapal->id;
      $permintaans = DB::table('permintaan')->join('kapal', 'permintaan.id_kapal', '=', 'kapal.id')
                                        ->select('permintaan.*')
                                        ->where('permintaan.id_kapal', $id)
                                        ->get();
      foreach ($permintaans as $p) {
          $p->v_awal = $p->v_permintaan;
          $idmin = $p->id - 1;
          if ($idmin > 0) {
            $sebelum = Permintaan::whereId($idmin)->first();
            $p->v_awal = $p->v_permintaan + $sebelum->v_sisa;
          }

          Permintaan::find($p->id)->update(['v_awal' => $p->v_awal]);
      }
      foreach ($permintaans as $p) {
          $p->v_sisa = $p->v_awal - $p->v_pemakaian;
          Permintaan::find($p->id)->update(['v_sisa' => $p->v_sisa]);
          $pemakaians = DB::table('pemakaian')->join('permintaan', 'pemakaian.id_permintaan', '=', 'permintaan.id')
                                            ->select('pemakaian.*')
                                            ->where('pemakaian.id_permintaan', $p->id)
                                            ->get();
      }

      return view('permintaan.index')->with(compact('pemakaians'))
                                      ->with(compact('kapal_name'))
                                      ->with(compact('kapal_id'))
                                      ->with(compact('permintaans'))
                                      ->with(compact('awal'));
    }

    public function downloadPDF($id) {
           $permintaans = Permintaan::whereId($id)->first();
           $idmin = $id - 1;
           $permintaanmin = Permintaan::whereId($idmin)->first();
           $kapal = DB::table('kapal')->join('permintaan', 'permintaan.id_kapal', '=', 'kapal.id')
                                               ->where('permintaan.id', $id)
                                               ->max('kapal.name');
           $pdf = PDF::loadView('permintaan.pdf', compact('idmin','permintaanmin'), compact('permintaans','kapal'));
           return $pdf->download('Bon-Permintaan-BBM.pdf');

    }
    public function downloadPDFpem($id) {
           $permintaans = Permintaan::whereId($id)->first();
           $kapal = DB::table('kapal')->join('permintaan', 'permintaan.id_kapal', '=', 'kapal.id')
                                               ->where('permintaan.id', $id)
                                               ->max('kapal.name');
           $pemakaians = DB::table('pemakaian')->join('permintaan', 'pemakaian.id_permintaan', '=', 'permintaan.id')
                                               ->select('pemakaian.*')
                                               ->where('pemakaian.id_permintaan', $id)
                                               ->get();
           $pdf = PDF::loadView('permintaan.pdf-pemakaian', compact('pemakaians'), compact('permintaans','kapal'));
           return $pdf->download('Pemakaian-BBM.pdf');

    }

    public function show($id)
    {
              $permintaans = Permintaan::whereId($id)->first();
              $idmin = $id - 1;
              $permintaanmin = Permintaan::whereId($idmin)->first();
              $kapal_name = DB::table('kapal')->join('permintaan', 'permintaan.id_kapal', '=', 'kapal.id')
                                                  ->where('permintaan.id', $id)
                                                  ->max('kapal.name');
              $kapal_id = DB::table('kapal')->join('permintaan', 'permintaan.id_kapal', '=', 'kapal.id')
                                                  ->where('permintaan.id', $id)
                                                  ->max('kapal.id');
              $pemakaians = DB::table('pemakaian')->join('permintaan', 'pemakaian.id_permintaan', '=', 'permintaan.id')
                                                  ->select('pemakaian.*')
                                                  ->where('pemakaian.id_permintaan', $id)
                                                  ->get();
              return view('permintaan.show')->with(compact('kapal_name'))
                                            ->with(compact('pemakaians'))
                                            ->with(compact('permintaans'))
                                            ->with(compact('kapal_id'))
                                            ->with(compact('permintaanmin'))
                                            ->with(compact('idmin'));
    }
}
