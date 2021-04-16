@extends("template")
@section("title")
@parent - Gestion des convocations
@stop
<!-- Menu des convocations -->
@section("content")
Les convocations
<!-- Lien de création des convocations -->

<a class="btn btn-primary" href="{{route('convocation.create')}}" role="button">Créer</a>

<!-- Tableau des convocations -->
<table class="table">
  <!-- En-tête du tableau0 -->
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nom</th>
      <th scope="col">Motif</th>
      <th scope="col">Description</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <!-- Corps du tableau -->
  <tbody>
    @foreach($convocations as $convocation)
    <tr>
      <!-- Les différente variables qui doivent être afficher -->
      <th scope="row">{{$convocation->id}}</th><!-- id -->
      <!--<td>{{$convocation->nom}}</td>--><!-- nom -->
      <td>{{$convocation->eleve->nom}} {{$convocation->eleve->prenom}}</td><!-- nom et prenom avec clé étrangère -->
      <td>
        <!--motif-->
        
          @foreach($convocation->motifs as $motif)
             {{$motif->libelle}} /
          @endforeach
        
      </td>
      <td>
        {{$convocation->motif}}
      </td>
      <td>
          <!-- Lien accédant à la route ressource et la méthode destroy du controleur -->
          {!! Form::open(["route"=>["convocation.destroy",$convocation->id],"method"=>"delete"])!!}
          {!! Form::submit('Delete',["class"=>"btn btn-danger"]) !!}
          {!!Form::close()!!}
          <!-- Lien accédant à la route qui affichent le view qui va modifier la view -->
          <a href="{{ route('convocation.edit', $convocation->id) }}" class="btn btn-success">Edit</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table> 
@stop