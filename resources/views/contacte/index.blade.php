@extends('layout')
@section('title','INdex') 

@section('content')

    
    <p>Affichage des Contactes</p>
    @if(count($contacts) > 0)
        @foreach ($contacts as $contact)
            <br>
            <label>Nom</label>
            <h4>{{ $contact->Lname }}</h4>
            <label>Prenom</label>       
            <h4>{{ $contact->Fname }}</h4>
            <label>Numéro de téléphone</label>
            <h4>{{ $contact->number }}</h4>
    
            <a href={{route('contacts.edit',['id' => $contact->id ])}}><i style='font-size:24px' class='far'>&#xf044;</i></a>
            &nbsp;
            
            <form action="{{ url('/contacts', ['id' => $contact->id]) }}" class="icon" method="post">
                <button type="submit" class="icon"><i class="far fa-trash-alt"></i></button>
                @method('delete')
                @csrf
            </form>
            <!--
            <a href={{route('contacts.destroy', ['id' => $contact->id ] )}}><i class='far fa-trash-alt'></i></a>
            <br>
            <br>
    -->
        @endforeach
        <br>
        <br>
        <a href={{ route('contacts.create') }}><input type="button" value="Crée un contact"></a>
        
        
        
    @else
        <p>vous n'avez pas ajouter aucun contact.Cliquer <a href = "contacts/create" >ici</a> pour ajouter un contact.</p>
    @endif   

@endsection