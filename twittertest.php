<html>

<head>

<meta http-equiv="refresh" content="1800">


<style type="text/css">

body {
	font-family: Helvetica;
	overflow: hidden;
	color: white;
}

.quotes {display: none;
}

.header {
	display: block;
	height: 25%;
	margin: 10px;
}

.twitterholder {
	display: block;
	position: absolute;
	top: 10px;
	width: 100%;
	height: auto;

	font-family: Helvetica;
	color:white;
	text-align:center;
	padding: 0px 70px 0px 70px;
	margin-left: 0px;
	margin-right: 0px;
	background-color: black;
	opacity: 0.8;


}

.followus {
	display: none;

}

#tweet {
	font-size: 70px;
	font-weight: 300;
	font-family: Helvetica;
	color:white;
	text-align:center;
	font-weight: 700;
	margin: 30px 0px 30px 0px;
	padding: 5px 5px 5px 5px;
	width: 80%;
	


}

.tweet-pic {
	

	max-width:700px;
	margin-right:20px;
	float:left;

}

#date {
	font-family: Helvetica;
	color:white;
	text-align:left;
	font-size: 30px;
	padding-right: 100px;
	padding-top: 0px;
	font-weight: 300;

}

#by {

	font-family: Helvetica;
	color:white;
	text-align:left;
	font-size: 50px;
	padding-right: 100px;
	padding-top: 0px;
	font-weight: 700;

}

</style>

	<link href="styles/ticker-style.css" rel="stylesheet" type="text/css" />


	
</head>

<body>


<div class="twitterholder">

<?php

require_once('TwitterAPIExchange.php');


$settings = array(
    'oauth_access_token' => "238254353-yyMY4xq1rY5AiprjS2OPSSJrKcgLl8E3fjVB5xcD",
    'oauth_access_token_secret' => "TDqH6glrHMEt7u6oA1bOirALZ7peDoJMse8SjRFgmyGUG",
    'consumer_key' => "UwT2U8n5tHw42DRupugfzL6Rk",
    'consumer_secret' => "N1IX9tA61BnWsbJg7GgUFWGeUso7Y1gB7x7rBk2Ng2yIFMem5C"
);

$url = "https://api.twitter.com/1.1/search/tweets.json";
$requestMethod = "GET";
// $getfield = '?q=geocode:51.062310,-1.309634,2mi';
$getfield = '?q=rendezwinch';

$twitter = new TwitterAPIExchange($settings);
             
 $string = json_decode($twitter->setGetfield($getfield)
->buildOauth($url, $requestMethod)
->performRequest(),$assoc = TRUE);

foreach($string['statuses'] as $items)
    {	
    	  if (isset($items['entities']['media'])) {
     	
			  foreach ($items['entities']['media'] as $media) {
				  $media_url = $media['media_url'];	
            
				  if(isset($media_url)) {
					  $url ="<img class='tweet-pic' src=";
					  $url .= $media_url;
					  $url .= ">";
           }}}
    
    
    
    	echo "<div class=quotes>";
        echo "<div id=tweet>";
       if(isset($items['entities']['media'])) { echo $url; } else { echo "";}
		echo $items['text']."</div>";

		echo $items['id'];










        $formatted_date = date('H:i, d M Y', strtotime($items['created_at']));
        echo "<div id=date>" . $formatted_date ."</div><br />";
        echo "<div id=by>@". $items['user']['screen_name']."</div><br />";
        echo "</div>";

// db

   
DEFINE ('DB_USER', 'root');
DEFINE ('DB_PASS', 'root');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'sam_api');

$dbc = mysqli_connect (DB_HOST, DB_USER, DB_PASS, DB_NAME) OR die ('could not connect' . mysqli_connect_error());
$user_update = $items['id'];
// Check if file already exists
$query = mysqli_query($con, "SELECT * FROM updates WHERE user_update ='".$items['id']."'");
if(mysqli_num_rows($query) > 0){
    echo "email already exists";
} else {
    // do something
    // now inserting the data form the previous page in to the database 
    $q = "INSERT INTO updates (user_update) VALUES ('$user_update')";
    $r = mysqli_query($dbc,$q);
}




    }
             
?>





</div>





<script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>

<script type="text/javascript">

(function() {

    var quotes = $(".quotes");
    var quoteIndex = -1;
    
    function showNextQuote() {
        ++quoteIndex;
        quotes.eq(quoteIndex % quotes.length)
            .fadeIn(2000)
            .delay(5000)
            .fadeOut(2000, showNextQuote);
    }
    
    showNextQuote();
    
})();

</script>

<script src="includes/jquery.ticker.js" type="text/javascript"></script>
	<script src="includes/site.js" type="text/javascript"></script>


</body>

</html>
