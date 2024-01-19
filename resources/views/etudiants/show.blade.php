@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>etudiants Details</h1>
        <h1><a href="{{ route('etudiants.index') }}">Retour à la liste des étudiants</a></h1>
        <table class="details-table">
            <tbody>
                <tr>
                    <td>ID:</td>
                    <td>{{ $etudiants->id }}</td>
                </tr>
                <tr>
                    <td>Name:</td>
                    <td>{{ $etudiants->prenom }}</td>
                </tr>
                <tr>
                    <td>LastName:</td>
                    <td>{{ $etudiants->nom }}</td>
                </tr>
                <tr>
                    <td>Sexe:</td>
                    <td>{{ $etudiants->sexe }}</td>
                </tr>
                <tr>
                    <td>Sector:</td>
                    <td>{{ $etudiants->filiere_id}}</td>
                </tr>
                <tr>
                    <td>User:</td>
                    <td>{{ $etudiants->user_id}}</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
