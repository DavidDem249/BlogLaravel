@extends('layouts.master')


@section('content')

<a href="{{ route('adminPost') }}">Modifier les posts</a> &nbsp;&nbsp;
<a href="{{ route('Commentaires') }}">Supprimer des commentaires</a> &nbsp;&nbsp;
<a href="{{ route('gestUser') }}">Gestion des utilisateurs</a>

@stop