@extends('layout')
@section('title','Update') 
@section('content')
<form class="form"  action='{{ route('contacts.update' ,['id' => $contact->id ]) }}' method= 'POST'>
    @csrf
    @method('PUT')
        <p>Affichage des Contactes</p>

            <label>Nom</label>
            <input type="text" name="up_nom" value="{{$contact->Lname }}">
            <label>Prenom</label>       
            <input type="text" name="up_prenom" value="{{$contact->Fname }}">
            <label>Numéro de téléphone</label>
            <input type="tel" name="up_numero" value="{{$contact->number }}">
            <br>
            <br>
            <br>
    
        <button class="btn" type="submit">Modifie</button>  
</form>
@endsection

