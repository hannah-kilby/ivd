<!DOCTYPE html>
<html>
<head>
    <title>Interactive Visual Display Test</title>
   
<!-- Hook me up with them script tings  -->
    <!-- Here's some twitter ones -->


<!--    <script src="js/jquery-1.11.1.min.js"></script> -->

    <!-- All that mic check volume input stuff-->
    <!-- <link rel="stylesheet" type="text/css" href="css/style.css"> -->
    <script src="js/volumeMove.js" type="text/javascript"></script>
    <!-- And a little bit of low poly in the bg. AAAHHHHHHHHHHHHHHHHHHHH NOPE THIS SCRIPT IS FUCKING UP THE VOLUME INPUT TINGS -->
     <!-- <script src="js/lowPoly.js" type="text/javascript"></script> -->
    
<!-- And a little bit of stylinz yeah    -->  

        <link rel="stylesheet" type="text/css" href="css/snow.css"></link>
        <link rel="stylesheet" type="text/css" href="css/style1.css"></link>


   <!-- <link rel="stylesheet" href="css/lowPoly.css"></link> -->
    
</head>

<!-- Body HTML-------------------------------------------------------------------------------------------------------->

<body >

<div id="snow">

<!-- Tweet Display -------------------------------------------------------------------------------------------------->
    <div class=""id="tweet-container">
        <?php include 'twittertest.php';?>
    
    </div>
    
<!-- Canvas ---------------------------------------------------------------------------------------------------------->
    <canvas id="meter" width="2000" height="1000" style="margin-top:280px;"> 
    </canvas>



<!-- Logo Image ------------------------------------------------------------------------------------------------------>
    <img src="Logo.png" id="logo" style="display: none;"></img>

<div class="grad"></div>


</body>
</html>