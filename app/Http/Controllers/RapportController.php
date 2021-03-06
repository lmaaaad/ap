<?php

namespace App\Http\Controllers;

use App\Models\Affectation;
use App\Models\Conducteur;
use App\Models\Entretien;
use App\Models\Piece;
use App\Models\Taxe;
use App\Models\User;
use App\Models\Vehicule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RapportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $user=User::all();
        $users =DB::table('users')->count();
        $conducteurs = DB::table('Conducteurs')->count();
        $vehicules = DB::table('vehicules')->count();
        $affectations = DB::table('affectations')->count();

        $pieces = Piece::select(DB::raw('sum(prix) as "SOMME" '),
                                DB::raw('MONTH(date_acq) month'))
                                ->groupby('month')
                                ->get();

                                foreach ( $pieces as $key => $value) {
                                    $depense[$value['month']]=(int)$value['SOMME'];

                                }
        $entretiens = Entretien::select(DB::raw('sum(cout) as "SOMME" '),
        DB::raw('MONTH(date) month'))
        ->groupby('month')
        ->get();

        foreach ( $entretiens as $key => $value) {
            $depense_en[$value['month']]=(int)$value['SOMME'];

        }

        return view('rapport',compact(['users','conducteurs','vehicules','affectations','user' ,'depense','depense_en']));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
