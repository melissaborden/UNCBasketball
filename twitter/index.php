<html>
<h1>This is outside the php tag</h1>

<?php
require_once('twitter-api-php/TwitterAPIExchange.php');

$settings = array(
    'oauth_access_token' => "363891799-Uig2ZM5HgnTv1ZLTI3ZJIH3dbwI2hfqZwgQLDwO0",
    'oauth_access_token_secret' => "ySBFWZoKSwvYt2MT5Mp9PrhnGir4mGG8oFCVlrcqJwOam",
    'consumer_key' => "HpOOwM6F38tgZif1nzzOOw",
    'consumer_secret' => "WPznHpWxMVAPq9D4gCJ4mnsFZiPRUcYDoqBAnktWIg"
);

$url = 'https://api.twitter.com/1.1/search/tweets.json';
$requestMethod = 'GET';
$getfield = '?q=%23UNCbasketball&count=100&since=2013-05-05';

$twitter = new TwitterAPIExchange($settings);
/**echo $twitter->setGetfield($getfield)
             ->buildOauth($url, $requestMethod)
             ->performRequest();
   **/          
$string = json_decode($twitter->setGetField($getfield)
                      ->buildOauth($url, $requestMethod)
                        ->performRequest(), $assoc = TRUE);


foreach($string['statuses'] as $items)
    {
        //$items[profile_image_url];
       // *profileImageUrl = [user objectForKey:@"profile_image_url"];
        echo "Tweet: ". $items['text'] . "<br />";
        echo "When: " . $items['created_at'] . "<br />";
        echo "Who: <img src='" .$items['user'][profile_image_url]. "'><br />";
        echo "<hr>";
    }
    
echo "<pre>";
print_r($string);
echo "</pre>";

                      

?>

</html>