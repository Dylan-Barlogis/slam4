@extends("template")
@section("title")
@parent - Création d'un élève
@stop
@section("content")
</br>
  <form class="form-groupe" method="post" action="{{route('eleve.store')}}">
  	@csrf
  	<div>
  		<label for="nom">Nom du nouvelle élève :</label>
    	<input type="text" name="nom" id="nom" placeholder="Nom de l'élève" class="form-control" />
  	</div>
	</br>
	<div>
	    <label for="prenom">Prenom du nouvelle élève :</label>
    	<input type="text" name="prenom" id="prenom" class="form-control" placeholder="Prenom de l'élève" />
	</div>
	</br>
    <button class="btn btn-success">Ajouter</button>
  </form>
@stop 