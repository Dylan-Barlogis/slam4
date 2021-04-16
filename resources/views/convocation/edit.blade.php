@extends("template") 
@section("title")
@parent - Gestion des convocations
@stop
@section("content")
@php 

(strpos(Session::get("_previous")["url"],"edit"));

@endphp

<!-- Message d'erreur -->
@if ($errors->any())
  <div class="alert alert-danger">
      <ul>
        @foreach($errors->all() as $error)
          <li>
            {{$error}}
          </li>
        @endforeach
      </ul>
  </div>
@endif
<!--Formulaire -->
{!! Form::open(['route' => ['convocation.update',$convocation->id], 'method' => 'put']) !!}
  <div class="form-group">
    <label for="nom">Nom :</label>
    {!! Form::select("nom",$eleves,$convocation->eleve_id) !!}
    <!--             affichage,liste des objets, l'élément que l'on sélèctionne par défaut-->
  </div>
    <label for="motif">Motif :</label> 
    
      @foreach($motifs as $motif)
      <div>
      @if($convocation->motifs->contains($motif->id))
        <input  type="checkbox" value="{{$motif->id}}" name="motifs[]" checked="true">
        <label  for="defaultCheck1">{{$motif->libelle}}</label>
      @else
        <input  type="checkbox" value="{{$motif->id}}" name="motifs[]" >
        <label  for="defaultCheck1">{{$motif->libelle}}</label>
      @endif
      </div> 
      @endforeach

 
  <div class="form-group">
    <label for="description">Description :</label>
    <!-- Champs motif -->
    {!!Form::textarea('description', $convocation->motif,["class"=>"form-control","placeholder"=>"Description"])!!}
  </div>
  <div class="form-group">
    <label for="date_convocation">Date :</label>
    <!-- Champs date -->
    {!!Form::date('date_convocation', $convocation->date_convocation,["class"=>"form-control"])!!}
  </div>
  <!-- Bouton de validation -->
  <div class="form-group">
    {!!Form::submit('Valider', ['class' => 'btn btn-success'])!!}
  </div>

  {!! Form::close() !!}
@stop