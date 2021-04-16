@extends("template")
@section("title")
@parent - Gestion des convocations
@stop
@section("content")
{!! Form::open(['route' => 'convocation.store', 'method' => 'post']) !!}
  <!-- Nom -->
  <div class="form-group">
    <label for="nom">Nom :</label>
    <!-- Champs nom -->
    <!--<input type="text" class="form-control" id="nom" name="nom" placeholder="Nom de l'élève">-->
    <select id="nom" name="nom">
      @foreach($eleves as $eleve)
      <option value="{{$eleve->id}}">{{$eleve->nom}} {{$eleve->prenom}}</option>
      @endforeach
    </select>
  </div>
  <!-- Motif -->
  <div class="form-group">
    <label for="motif">Motif :</label>
    <p>
      @foreach($motifs as $motif)
      <input type="checkbox" name="motifs[]" value="{{$motif->id}}" /> {{$motif->libelle}}</br>
      @endforeach
    </p>
  </div>
  <!-- Description -->
  <div class="form-group">
    <label for="description">Description :</label>
    <!-- Champs Description -->
    <textarea class="form-control" id="description" name="description" rows="3"  placeholder="Description supplémentaire"></textarea>
  </div>
  <!-- Date -->
  <div class="form-group">
    <label for="date_convocation">Date :</label>
    <!-- Champs date -->
    <input type="date" id="date_convocation" name="date_convocation" class="form-control" >
  </div>
  <!-- Bouton de validation -->
  <div class="form-group">
    {!!Form::submit('Valider', ['class' => 'btn btn-success'])!!}
  </div>

  {!! Form::close() !!}
@stop