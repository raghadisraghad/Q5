@extends('layouts.app')
<style>

    button{
        color:black;
    }
    .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
    }

    .container h1 {
        color: #61dafb; /* Light blue heading color */
    }

    .container table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    .container thead {
        background-color: #333; /* Dark grey header background color */
        color: #ffffff; /* Light text color */
    }

    .container th,
    .container td {
        padding: 12px;
        border: 1px solid #555; /* Medium grey border color */
    }

    .container td {
        color: black;
    }

    .container tr:nth-child(even) {
        background-color: #555; /* Medium grey background color for even rows */
    }

    .container a {
        color: #61dafb; /* Light blue link color */
        text-decoration: none;
        margin-right: 10px;
    }

    .container a:hover {
        text-decoration: underline;
    }

    .container button {
        background-color: #e44d26; /* Red button color */
        color: black; /* Light text color */
        padding: 8px 12px;
        border: none;
        cursor: pointer;
    }

    .container button:hover {
        background-color: #d5371d; /* Darker red color on hover */
    }

    .styled-input {
        background-color: transparent; /* Make the input background transparent */
        color: black; /* Set the input text color to black */
        border: 1px solid #555; /* Medium grey border color */
        padding: 8px 12px;
        margin: 5px 0;
    }

    .styled-input:focus {
        outline: none; /* Remove the default focus outline */
        border-color: #61dafb; /* Light blue border color on focus */
    }
</style>
@section('content')
    <!-- Buttons to switch between forms -->
    <div>
        <button onclick="showUpdateProfileForm()" style="color: black;">Update Profile Information</button><br>
        <button onclick="showUpdatePasswordForm()" style="color: black;" >Update Password</button>
    </div>

    <!-- Livewire components for updating profile information and password -->
    <div id="updateProfileForm" style="display: none;">
        @livewire('profile.update-profile-information-form')
    </div>

    <div id="updatePasswordForm" style="display: none;">
        @livewire('profile.update-password-form')
    </div>

    <script>
        function showUpdateProfileForm() {
            document.getElementById('updatePasswordForm').style.display = 'none';
            document.getElementById('updateProfileForm').style.display = 'block';
        }

        function showUpdatePasswordForm() {
            document.getElementById('updateProfileForm').style.display = 'none';
            document.getElementById('updatePasswordForm').style.display = 'block';
        }
    </script>
@endsection

