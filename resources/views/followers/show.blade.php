<!DOCTYPE html>
<html>

<head>
    <title>Follower Details</title>
</head>

<body>
    <h2>Follower Details</h2>

    <table border="1">
        <tr>
            <th>Attribute</th>
            <th>Value</th>
        </tr>
        <tr>
            <td>User ID</td>
            <td>{{ $followerDetails['uid'] }}</td>
        </tr>
        <tr>
            <td>Username</td>
            <td>{{ $followerDetails['username'] }}</td>
        </tr>
        <tr>
            <td>Image</td>
            <td><img src="{{ $followerDetails['image'] }}" alt="{{ $followerDetails['username'] }}" width="32"></td>
        </tr>
        <tr>
            <td>Fullname</td>
            <td>{{ $followerDetails['fullname'] }}</td>
        </tr>
        <tr>
            <td>Twubric Score</td>
            <td>{{ $followerDetails['twubric']['total'] }}/10</td>
        </tr>
        <tr>
            <td>Friend Score</td>
            <td>{{ $followerDetails['twubric']['friends'] }}/2</td>
        </tr>
        <tr>
            <td>Influence Score</td>
            <td>{{ $followerDetails['twubric']['influence'] }}/4</td>
        </tr>
        <tr>
            <td>Chirpiness Score</td>
            <td>{{ $followerDetails['twubric']['chirpiness'] }}/4</td>
        </tr>
        <tr>
            <td>Join Date</td>
            <td>{{ date('Y-m-d H:i:s', $followerDetails['join_date']) }}</td>
        </tr>
    </table>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
            // You can include additional JavaScript logic if needed
        });
    </script>
</body>

</html>