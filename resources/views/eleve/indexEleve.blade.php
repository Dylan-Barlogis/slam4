@extends("template")
@section("title")
@parent - Gestion des Eleves
@stop
@section("content")
	<table class="table">
		<thead>
			<!--En-tête du tableau eleve-->
			<tr>
				<th scope="col">Numéro</th>
				<th scope="col">Nom</th>
				<th scope="col">Prénom</th>
				<th scope="col">Modifier</th>
				<th scope="col">Supprimer</th>
			</tr>
		</thead>
		<tbody>
		<!-- Corps du tableau eleve-->
			@foreach($eleves as $eleve)
				<tr>
					<th scope="row">{{$eleve->id}}</th>
					<td>{{$eleve->nom}}</td>
					<td>{{$eleve->prenom}}</td>
					<td>
						<!-- Modifier -->
						<form method="get" action="{{route('eleve.edit',['$id'=>$eleve->id])}}">
                    	@csrf
                    	<button type="submit">Modifier</button>
                    	</form>
					</td>
					<td>
						<!-- Supprimer -->
                		<form method="post" action="{{route('eleve.destroy',['$id'=>$eleve->id])}}">
                    	@method("delete")
                    	@csrf
                    	<button type="submit">Supprimer</button>
                		</form>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	<a href="{{route('eleve.create')}}">Ajouter un nouveaux élève</a>
@stop