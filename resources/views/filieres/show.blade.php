@extends('layouts.app')
<style>
    .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
    }

    .container h1 {
        color: #61dafb; /* Light blue heading color */
    }

    .container .details-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    .container .details-table td {
        padding: 12px;
        border: 1px solid #555; /* Medium grey border color */
    }

    .container a.button {
        display: inline-block;
        padding: 8px 12px;
        margin-top: 20px;
        background-color: #61dafb; /* Light blue button color */
        color: #fff; /* White text color */
        text-decoration: none;
        border-radius: 4px;
        transition: background-color 0.3s, color 0.3s;
    }

    .container a.button:hover {
        background-color: #4a8bc2; /* Darker blue color on hover */
    }
</style>

@section('content')
    <div class="container">
        <h1>Filieres Details</h1>
        <table class="details-table">
            <tr>
                <td>ID:</td>
                <td>{{ $filieres->id }}</td>
            </tr>
            <tr>
                <td>Nom:</td>
                <td>{{ $filieres->nom }}</td>
            </tr>
            <!-- Add other fields as needed -->
        </table>
    </div>
    <a href="{{ route('filieres.index') }}" class="button">Retour à la liste des filières</a>
@endsection
