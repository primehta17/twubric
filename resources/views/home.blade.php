@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif

        </div>

    </div>
</div>
<div class="container">
    <h1 class="mt-4 mb-4">User List</h1>
    <div class="row">

        @foreach ($data as $user)
        <div class="col-md-4" onclick="redirectToDetails({{ $user['uid'] }})">
            <div class="user-card" onclick="redirectToDetails({{ $user['uid'] }})">
                <img src="{{ $user['image'] }}" alt="{{ $user['fullname'] }}" class="mb-3">
                <h5>{{ $user['fullname'] }}</h5>
                <p>Username: {{ $user['username'] }}</p>
                <p>Total Twubric: {{ $user['twubric']['total'] }}</p>
                <!--  <p>Friends: {{ $user['twubric']['friends'] }}</p>
                <p>Influence: {{ $user['twubric']['influence'] }}</p>
                <p>Chirpiness: {{ $user['twubric']['chirpiness'] }}</p>-->
                <p>Join Date: {{ date('Y-m-d', $user['join_date']) }}</p>

            </div>
        </div>
        @endforeach


    </div>
    <!-- <form action="{{ route('twitter.index') }}" method="get">
        <button type="submit" class="btn btn-info">Followers</button>
    </form> -->
    <!-- this feature is paid  -->
    <a href="{{ route('followers.index') }}"><button>Go to Followers Page</button></a>
</div>

<script>
    function redirectToDetails(uid) {
        window.location.href = '/details/' + uid;
    }
</script>
@endsection