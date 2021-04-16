@extends("template")
@section("title")
@parent - Création d'un élève
@stop
@section("content")
</br>
  <form class="form-groupe" method="post" action="{{route('eleve.update', ['$id'=>$eleve->id])}}">
    {{method_field('put')}}
  	@csrf
  	<div>
  		<label for="nom">Modifier le nom de l'élève :</label>
    	<input type="text" name="nom" id="nom" value="{{$eleve['nom']}}" class="form-control" />
  	</div>
	</br>
	<div>
	    <label for="prenom">Modifier le prénom de l'élève :</label>
    	<input type="text" name="prenom" id="prenom" class="form-control" value="{{$eleve['prenom']}}" />
	</div>
	</br>
    <button class="btn btn-success">Modifier</button>
  </form>
@stop 

