<html>
    
    <link href="twitterstyle.css" rel="stylesheet">
        
<div class="header">From the Fans #uncbasketball</div>

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
$getfield = '?q=%23UNCbasketball&count=30&since=2013-05-05';

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
         
        echo "<div class='userdata'>";
        
        echo "<span class='picture'> "; 
        echo "<img src='" .$items['user'][profile_image_url]. "'>\n";
        echo "</span> ";
    
        echo "<span class='name'> " . "@"  .$items['user'][screen_name] .  "</span>" . "";
        $time= strtotime($items[created_at]);
        echo "<span class='date'> " . "" . date("j M", $time) .  "</span>" ."";
       // echo " " . $items['created_at'] . "";
        //echo "</span>";
        echo "<br>";
        echo "<span class='thetweet'> ";
        
        
                
 
                $tweetText = $items['text'];
                
                
                 # Make links active
        $tweetText = preg_replace("/(http:\/\/|(www\.))(([^\s<]{4,68})[^\s<]*)/", '<a href="http://$2$3" target="_blank">$1$2$4</a>', $tweetText);

        # Linkify user mentions
        $tweetText = preg_replace("/@(\w+)/", '<a href="https://twitter.com/$1" target="_blank">@$1</a>', $tweetText);

        # Linkify tags
        $tweetText = preg_replace("/#(\w+)/", '<a href="https://twitter.com/search?q=$1" target="_blank">#$1</a>', $tweetText);

                
                

              
        
        echo "". $tweetText . "";
        
        
         echo "<div style='clear:both;'>";
        echo "</span>";
        echo "</div>";
         echo " <hr color=#C1D7E5 width=100%>" ;
        echo "</div>";
           
       
    }
                         

?>

</html>