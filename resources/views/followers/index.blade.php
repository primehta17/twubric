@extends('layouts.app')

@section('content')
<table border="1">
    <thead>
        <tr>
            <th>Username</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($followers as $follower)
        <tr>
            <td>
                <a href="{{ route('followers.show', ['id' => $follower['uid']]) }}">
                    {{ $follower['username'] }}
                </a>
            </td>
            <td>
                <button class="follower-link" data-follower-id="{{ $follower['uid'] }}">View Details</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<!-- <form action="{{ route('twitter.index') }}" method="get">
    <button type="submit" class="btn btn-info">Followers</button>
</form> -->
<!-- this feature is paid  -->

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
$(document).ready(function() {
    $('.follower-link').on('click', function(e) {
        e.preventDefault();
        var followerId = $(this).data('follower-id');
        window.location.href = '/app/follower/' + followerId + '/twubric.json';
    });
});
</script>
@endsection