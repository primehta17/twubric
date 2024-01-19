<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Abraham\TwitterOAuth\TwitterOAuth; // Assuming you have installed the abraham/twitteroauth package

use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    public function getData()
    {
        $client = new Client();
        $response = $client->get('https://gist.githubusercontent.com/pandemonia/21703a6a303e0487a73b2610c8db41ab/raw/9667fc19a0f89193e894da7aaadf6a4b7758b45e/twubric.json'); // Please fix the typo in the URL
        $data = json_decode($response->getBody(), true);

        return view('home', compact('data'));
    }



    public function showDetails($id)
    {
        // Logic to fetch details for the specific ID from the API
        $client = new Client();
        $response = $client->get("https://gist.githubusercontent.com/pandemonia/21703a6a303e0487a73b2610c8db41ab/raw/9667fc19a0f89193e894da7aaadf6a4b7758b45e/twubric.json"); // Please fix the typo in the URL
        $users = json_decode($response->getBody(), true);

        $details = null;
        foreach ($users as $user) {
            if ($user['uid'] == $id) {
                $details = $user;
                break;
            }
        }

        return view('details', compact('details'));
    }


    protected $followersData;

    public function __construct()
    {
        // Fetch followers data from the provided API only once and store it
        $this->followersData = $this->fetchFollowersData();
    }

    protected function fetchFollowersData()
    {
        $response = Http::get('https://gist.githubusercontent.com/pandemonia/21703a6a303e0487a73b2610c8db41ab/raw/9667fc19a0f89193e894da7aaadf6a4b7758b45e/twubric.json');
        return $response->json();
    }

    public function index()
    {
        return view('followers.index', ['followers' => $this->followersData]);
    }

    public function show($id)
    {
        $follower = collect($this->followersData)->firstWhere('uid', $id);

        if ($follower) {
            $followerDetails = $this->processFollowerDetails($follower);
            return view('followers.show', compact('followerDetails'));
        } else {
            return response()->json(['error' => 'Follower not found'], 404);
        }
    }

    public function getFollowerDetails($id)
    {
        $follower = collect($this->followersData)->firstWhere('uid', $id);

        if ($follower) {
            $followerDetails = $this->processFollowerDetails($follower);
            return response()->json($followerDetails);
        } else {
            return response()->json(['error' => 'Follower not found'], 404);
        }
    }

    protected function processFollowerDetails($follower)
    {
        return [
            'uid' => $follower['uid'],
            'username' => $follower['username'],
            'image' => $follower['image'],
            'fullname' => $follower['fullname'],
            'twubric' => $follower['twubric'],
            'join_date' => $follower['join_date'],
        ];
    }


    public function getTwitterData()
    {


        $consumerKey = config('services.twitter.consumer_key');
        $consumerSecret = config('services.twitter.consumer_secret');
        $accessToken = config('services.twitter.access_token');
        $accessTokenSecret = config('services.twitter.access_token_secret');


        // Create a new TwitterOAuth instance
        $connection = new TwitterOAuth($consumerKey, $consumerSecret, $accessToken, $accessTokenSecret);

        // Empty array that will be used to store followers.
        $profiles = array();

        // Get the ids of all followers. Max. 5000
        $screenName = 'mgocenoglu';
        $ids = $connection->get("followers/ids", ['screen_name' => $screenName]);
        // dd($ids);
        // Chunk the ids into arrays of 100.
        $idsArrays = array_chunk($ids->ids, 100);

        // Loop through each array of 100 ids.
        foreach ($idsArrays as $implode) {
            // Perform a lookup for each chunk of 100 ids.
            $userIds = implode(',', $implode);
            $results = $connection->get("users/lookup", ['user_id' => $userIds]);

            // Loop through each profile result.
            foreach ($results as $profile) {
                $profiles[$profile->name] = $profile;
            }
        }

        // Sorting profiles according to followers count
        $sortArray = array();
        foreach ($profiles as $person) {
            foreach ($person as $key => $value) {
                if (!isset($sortArray[$key])) {
                    $sortArray[$key] = array();
                }
                $sortArray[$key][] = $value;
            }
        }
        $orderBy = "followers_count"; // Change this to whatever key you want from the array
        array_multisort($sortArray[$orderBy], SORT_DESC, $profiles);

        // Return the sorted profiles to a view

        return view('twitter.index', ['profiles' => $profiles]);
        // return view('home', compact('profiles'));
    }
}