<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Eleve;
use App\Convocation;
use Validator;

class EleveController extends Controller
{
    //
    public function show($id)
    {
    	//
    }
    public function index()
    {
    	$eleves = Eleve::all(); // -> récuperer les donnée de la table eleve
    	return view('eleve.indexEleve')->with('eleves', $eleves);
    }
    public function create()
    {
    	return view('eleve.createEleve');
    }
    public function store(Request $request)
    {
    	$validator = Validator::make($request->all(), [
        'nom' => 'required',
        'prenom' => 'required',          
        ]);
    	if ($validator->fails())
    	{
    		return redirect()->route('eleve.create')->withErrors($validator)->withInput();
    	}
    	//requete pour la création d'un élève
    	$eleve = new Eleve;
    	$eleve->nom = $request->get("nom");
    	$eleve->prenom = $request->get("prenom");
    	$eleve->save();
    	return redirect()->route('eleve.index');
    }
    public function destroy($id)
    {
        //
        Eleve::destroy($id);
        return redirect()->route('eleve.index');
    }
    public function edit($id)
    {
    	$eleve = Eleve::find($id);
    	return view("eleve.updateEleve", compact("eleve"));
    }
    public function update(Request $request, $id)
    {
    	$validator = Validator::make($request->all(),[
    		'nom' => 'required|min:2',
    		'prenom' => 'required|min:2',
    	]);

    	if ($validator->fails())
    	{
    		return redirect()->route('eleve.edit', $id)->withErrors($validator)->withInput();
    	}
    	$eleve = Eleve::find($id);
    	$eleve->nom = $request->input("nom");
    	$eleve->prenom = $request->input("prenom");
    	$eleve->save();
    	return redirect()->route('eleve.index');
    }
}
