@extends('layouts.app')

@section('content')

<div class="container">
    <h1 class="mt-4 mb-4">User Details</h1>
    @if ($details)
    <div class="user-details">
        <img src="{{ $details['image'] }}" alt="{{ $details['fullname'] }}" class="mb-3">
        <h2>{{ $details['fullname'] }}</h2>
        <p>Username: {{ $details['username'] }}</p>
        <h5>{{ $details['fullname'] }}</h5>
        <p>Username: {{ $details['username'] }}</p>
        <p>Total Twubric: {{ $details['twubric']['total'] }}</p>
        <p>Friends: {{ $details['twubric']['friends'] }}</p>
        <p>Influence: {{ $details['twubric']['influence'] }}</p>
        <p>Chirpiness: {{ $details['twubric']['chirpiness'] }}</p>
        <p>Join Date: {{ date('Y-m-d', $details['join_date']) }}</p>
        <!-- Add more details as needed -->
    </div>
    <a href="/home" class="back-link">&lt; Back to User List</a>
    @else
    <p>User details not found.</p>
    @endif
</div>

@endsection