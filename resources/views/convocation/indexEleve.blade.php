@extends("template")
@section("title")
@parent - Gestion des convocations
@stop
<!-- Menu des convocations -->
@section("content")
Les convocations
<!-- Lien de création des convocations -->


<!-- Tableau des convocations -->
<table class="table">
  <!-- En-tête du tableau0 -->
  <thead>
    <tr>
      <th scope="col">Motif</th>
      <th scope="col">Description</th>
    </tr>
  </thead>
  <!-- Corps du tableau -->
  <tbody>
    @if ($convocations)
      @foreach($convocations as $convocation)
      <tr>
        <td>
          <!--motif-->
          
            @foreach($convocation->motifs as $motif)
               {{$motif->libelle}} /
            @endforeach
          
        </td>
        <td>
          {{$convocation->motif}}
        </td>
      </tr>
      @endforeach
          
    @else
      pas de convoc
    @endif
  </tbody>
</table> 
@stop