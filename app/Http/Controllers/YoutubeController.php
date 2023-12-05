<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google_Client;
use Google_Service_YouTube;

class YoutubeController extends Controller
{
    
    function searchVideos() 
{
    function getClient() 
{
    $client = new Google_Client();
    $client->setApplicationName("youtube-api-test");
    $client->setDeveloperKey(env('YOUTUBE_API_KEY'));
    return $client;
}
    $youtube = new Google_Service_YouTube(getClient());
    //ここに好きなYouTubeのチャンネルIDを入れる
    $params['channelId'] = 'UCY5fcqgSrQItPAX_Z5Frmwg';
    $params['type'] = 'video';
    $params['maxResults'] = 50;
    $params['order'] = 'date';
    try {
        $searchResponse = $youtube->search->listSearch('snippet', $params);
    } catch (Google_Service_Exception $e) {
        echo htmlspecialchars($e->getMessage());
        exit;
    } catch (Google_Exception $e) {
        echo htmlspecialchars($e->getMessage());
        exit;
    }
    
    //dd($searchResponse['0']['id']);
    foreach ($searchResponse['items'] as $search_result) {
            $videos[] = $search_result;
    }
    
    
    for($i=0;$i<$params['maxResults']; $i++){
    if(strpos($videos[$i]['snippet']['title'], 'PV')){
        //dd($videos[$i]['snippet']['title']);
        $kadokawa_PV[$i] = $videos[$i];
    }
    }
    
    $params['channelId'] = 'UC14QT5j2nQI8lKBCGtrrBQA';
    
    try {
        $Response = $youtube->search->listSearch('snippet', $params);
    } catch (Google_Service_Exception $e) {
        echo htmlspecialchars($e->getMessage());
        exit;
    } catch (Google_Exception $e) {
        echo htmlspecialchars($e->getMessage());
        exit;
    }
    
    foreach ($Response['items'] as $result) {
            $video[] = $result;
    }
    
    for($i=0;$i<$params['maxResults']; $i++){
    if(strpos($video[$i]['snippet']['title'], 'PV')){
        //dd($videos[$i]['snippet']['title']);
        $aniplex_PV[$i] = $video[$i];
    }
    }
    
    
    $params['channelId'] = 'UC47AYUs8AVU1QsT5LhpXjaw';
    $params['maxResults'] = 20;
    
    try {
        $Response3 = $youtube->search->listSearch('snippet', $params);
    } catch (Google_Service_Exception $e) {
        echo htmlspecialchars($e->getMessage());
        exit;
    } catch (Google_Exception $e) {
        echo htmlspecialchars($e->getMessage());
        exit;
    }
    
    foreach ($Response3['items'] as $result) {
            $video3[] = $result;
    }
    
    for($i=0;$i<$params['maxResults']; $i++){
    if(strpos($video3[$i]['snippet']['title'], 'PV')){
        //dd($videos[$i]['snippet']['title']);
        $jump_PV[$i] = $video3[$i];
    }
    }
    
    return view('youtube.anime')->with(['kadokawa' => $kadokawa_PV, 'aniplex' => $aniplex_PV, 'jump' => $jump_PV,]);
}
}
