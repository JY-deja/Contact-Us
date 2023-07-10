@extends('layout')
@section('title','Create')
@section('content')
    <form class="form" action='{{route("contacts.store")}}' method="POST">
        @csrf
        <p>Ajouter un Contact</p>
        <input type="text" name="nom" placeholder="Nom" >
        @error('nom')
        <h5>{{$message}}</h5>
        @enderror
        <br><input type="text" name="prenom" placeholder="Prenom">
        @error('prenom')
        <h5>{{$message}}</h5>
        
        @enderror
        <br><input type="tel" name="numero" placeholder="Numéro de téléphone">
        @error('numero')
        <h5>{{$message}}</h5>
        @enderror
        <br><button class="btn" type="submit">Ajouter</button><br> 
    </form>
@endsection