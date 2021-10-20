<?php
    include 'connection.php';
?>

<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <title></title>
  <meta name="description" content="The HTML5 Herald">
  <meta name="author" content="SitePoint">
</head>
<body>
<?php
$myObj = '';
$myJSON = '';
$stack = array();
$result = mysqli_query($con, "SELECT Subscription_name, total_download, img_dir FROM subscription_suggestions WHERE category='Entertainment'");
while ($row = mysqli_fetch_assoc($result)) { 
      $myObj = array(
       'name' => $row['Subscription_name'],
       'img' => $row['img_dir'],
       'downloads' => $row['total_download']
     );
     array_push($stack, $myObj);
}
$myJSON = json_encode($stack);
?>
<script type="text/javascript">
    var subData = JSON.parse('<?= $myJSON; ?>');  
    sortArr()
    function sortArr(){
        subData.sort(function(a, b){return b.downloads - a.downloads}); //sorts subscriptions by popularity
    }
    var subscription = {               
        name: "",
        img : "",
        downloads: 0
    }
    cardCounter = 0;
    window.onload =  skipSub;


    function addSub(){
        if (subData.length == 0){
            alert("You have reached the end of the list");     
        }
        else if(subData.length==1){
            skipSub(); 
            cardCounter--;
            subData.shift(); //array should be emty now
            document.catOne.src = "SuggestionPage/assets/img/end.gif";
        }
        else{
        var Temp = subData[0]; //swap first element in array with added suggestion
        cardCounter--;
        subData[0] = subData[cardCounter] //prepare to remove element
        subData[cardCounter] = Temp; //return orginal first element to array
        subData.shift(); //remove added suggestion
        sortArr(); //sort array to orginal format
        skipSub();     
        goToForm();
    }
    }
    function skipSub(){
        if(subData==0)
        {
            alert("You have reached the end of the list");
            document.catOne.src = "SuggestionPage/assets/img/end.gif";
           }
        else{
            try{
            loadSub(cardCounter);
            document.catOne.src = subscription.img;     
            cardCounter++;
             }
            catch{
                cardCounter = 0;
                skipSub();
            }
        }       
    }
    function loadSub(cardCounter){
        subscription.name = subData[cardCounter].name;
        subscription.img =subData[cardCounter].img;
        subscription.downloads =subData[cardCounter].downloads;  
    }
    function goToForm(){
        window.open("../SuggestionPage/add.html");
    }
</script>
<center>
  <div class="container">
    <img  class="card" id='catOne' name="catOne" width="600" height="400" >
    <img   class="minus" src="assets/icons/minus.png" onclick="skipSub()">
    <img   class="plus" src="assets/icons/plus.png" onclick="addSub()">
  </div> 
</center>
</body>
</html> 