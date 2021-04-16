<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Convocation;
use App\Eleve;
use App\Motif;
use App\User;
use Auth;
use Validator;

class ConvocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $convocations = Convocation::with('eleve')->with('motifs')->get();;
        return view('convocation.index')->with("convocations",$convocations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //Afficher view de création
    public function create()
    {
        //get 
        $eleves = Eleve::all();//->requète pour afficher touts les nom de la liste déroulant
        $motifs = Motif::all();//Requète pour afficher touts les motifs
        return view('convocation.create')->with("eleves", $eleves)->with("motifs", $motifs);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
        //'nom' => 'required|unique:convocations',
        //'motif' => 'required|max:255|min:6',
        'date_convocation' => 'required',          
        ]);
        if ($validator->fails()) {
        return redirect()->route('convocation.create')->withErrors($validator)->withInput();
        }
        //dd($convocation);             //-> test pour vérifier tous les élément qui se trouvent dans l'objet
        //dd($request->get("motifs"));  //-> tester si les motif sont bien pris en compte
        $convocation=new Convocation;
        $convocation->nom="pas ut";
        $convocation->motif=$request->get("description");
        $convocation->date_convocation=$request->get("date_convocation");
        $convocation->eleve_id=$request->get("nom");
        $convocation->save();
        foreach ($request->get("motifs") as $motif) 
        {
            $convocation->motifs()->attach($motif);
        }
      
        return redirect()->route('convocation.index');
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
    {   //
        $convocation= Convocation::find($id);
        $eleves = Eleve::pluck('nom','id');
        $motifs = Motif::all();
        return view("convocation.edit",compact("convocation"))->with("eleves", $eleves)->with("motifs",$motifs);
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
        //vérification
        $validator = Validator::make($request->all(), [
        //'nom' => 'required|unique:convocations',
        //'motif' => 'required|max:255|min:6',
        'date_convocation' => 'required',         
        ]);
        if ($validator->fails()) {
        return redirect()->route('convocation.create')->withErrors($validator)->withInput();
        }
            //Réussite
        $convocation= Convocation::find($id);
        $convocation->eleve_id=$request->input("nom");
        $convocation->motif=$request->input("description");
        $convocation->date_convocation=$request->input("date_convocation");
        $convocation->save();
        $convocation->motifs()->sync($request->input("motifs"));
   /*     foreach ($request->input("motifs") as $motif) 
        {
            $convocation->motifs()->attach($motif);
        }
        */

        return redirect()->route('convocation.index');
        
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
        Convocation::destroy($id);
        return redirect()->route('convocation.index');
    }

    public function indexEleve()
    {
        $convocations = Auth::user()->eleve->convocation;
        return view('convocation.indexEleve')->with('convocations', $convocations);
    }
}
