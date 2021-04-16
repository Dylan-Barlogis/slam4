@extends("template")
@section("title")
@parent - Convocations
@stop
@section("content")

<p> Cette partie sera soumise en partie à authentification.</br>
		<!-- Lien qui permet d'acceder à la view index dans le dossier convocation -->
        Pour le moment c'est open bar : <a href="{{route('convocation.index')}}" class="links">Gestion des convocations</a>.</br>
        <!-- Lien pour acceder au sites de documentation officiels de laravelle -->
        Nouveau concept des controllers resources, pour automatiser les CRUD</br>
        documentation : <a href="https://laravel.com/docs/5.8/controllers#resource-controllers" target="_blank" class="links">Doc officielle</a>.
@stop