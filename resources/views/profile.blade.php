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
    <div class="container">
        <h1>Update Profile Information</h1>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('user-profile-information.update') }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Name -->
            <div class="mt-4">
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="styled-input" type="text" name="name" :value="old('name', auth()->user()->name)" required autofocus />
            </div>

            <!-- Email -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="styled-input" type="email" name="email" :value="old('email', auth()->user()->email)" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="styled-input" type="password" name="password" autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="styled-input" type="password" name="password_confirmation" autocomplete="new-password" />
            </div>

            <!-- Update Profile Photo
            <div class="mt-4">
                <x-label for="photo" :value="__('Profile Photo')" />

                <x-input id="photo" class="styled-input" type="file" name="photo" />
            </div> -->

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Update Profile') }}
                </x-button>
            </div>
        </form>
    </div>
@endsection
