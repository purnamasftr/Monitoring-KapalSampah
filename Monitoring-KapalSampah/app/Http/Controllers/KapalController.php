<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Kapal;
use PDF;

class KapalController extends Controller
{
  public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function create()
       {

         $kapal = DB::table('kapal')->get();
         return view('kapal.create', compact('kapal'));
       }
     public function store(Request $request)
        {
          request()->validate([
            'name' => 'required',
            'hrm_me' => 'required',
            'hrm_ae' => 'required',
            'status' => 'required',
            'kapal' => 'optional',
          ]);

          Kapal::create($request->all());
          return redirect('/home')->with('message', 'Berhasil Menambahkan Kapal!');
        }


        public function edit($id)
          {
            $kapal = Kapal::whereId($id)->first();
            return view('kapal.edit', compact('kapal'));
          }
        public function update(Request $request, $id)
           {
             $kapals = Kapal::findOrFail($id);
             $this->validate($request, [
               'name' => 'required',
               'hrm_me' => 'required',
               'hrm_ae' => 'required',
               'status' => 'required',
               'keterangan',
             ]);
             $input = $request->all();
             $kapals->fill($input)->save();
             $kapal = Kapal::whereId($id)->first();
             return view('kapal.show')->with(compact('kapal'));
        }
    public function destroy($id) {
          DB::delete('delete from kapal where id = ?',[$id]);
          echo "Record deleted successfully.<br/>";
          // echo '<a href = "/Monitoring-KapalSampah/public/home">Click Here</a> to go back.';
          return redirect()->back();
       }
    public function Kapal($id) {
           $kapal = Kapal::whereId($id)->first();

           return view('kapal.show')->with(compact('kapal'));
     }

}
