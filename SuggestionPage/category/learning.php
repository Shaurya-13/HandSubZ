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
      $myObjL='';
      $myJSONL='';
      $stackL=array();
      $resultL=mysqli_query($con,"SELECT Subscription_name, total_download, img_dir FROM subscription_suggestions WHERE category='Educational'");
      while($row=mysqli_fetch_assoc($resultL)){
        $myObjL=array(
          'name'=>$row['Subscription_name'],
          'img'=>$row['img_dir'],
          'downloads'=>$row['total_download'],
        );
        array_push($stackL, $myObjL);
      }
      $myJSONL=json_encode($stackL);
    ?>
    <script type="text/javascript">
      var subDataL=JSON.parse('<?= $myJSONL; ?>');
      sortArrL()
      function sortArrL(){
        subDataL.sort(function (a, b){return b.downloads - a.downloads});
      }
      var subscriptionL={
        name:"",
        img:"",
        downloads:0
      }
      cardCounterL=0;
      window.onload=skipSubL;

      function addSubL(){
        if(subDataL.length==0){
          alert("You have reached the end of the list");
        }
        else if(subDataL.length==1){
          skipSubL();
          cardCounterL--;
          subDataL.shift();
          document.catFour.src="SuggestionPage/assets/img/end.gif";
        }
        else{
          var TempL=subDataL[0];
          cardCounterL--;
          subDataL[0]=subDataL[cardCounterL];
          subDataL[cardCounterL]=TempL;
          subDataL.shift();
          sortArrL();
          skipSubL();
          
        }
        goToFormL();
      }
      function skipSubL(){
        if(subDataL==0){
          alert("You have reached the end of the list");
          document.catFour.src = "SuggestionPage/assets/img/end.gif";
        }
        else{
          try{
            loadSubL(cardCounterL);
            document.catFour.src=subscriptionL.img;
            cardCounterL++;
          }
          catch{
            cardCounterL=0;
            skipSubL();
          }
        }
      }
      function loadSubL(cardCounterL){
        subscriptionL.name=subDataL[cardCounterL].name;
        subscriptionL.img=subDataL[cardCounterL].img;
        subscriptionL.downloads=subDataL[cardCounterL].downloads;
      }
      function goToFormL(){
        window.open("../SuggestionPage/add.html");
      }
    </script>
    <center>
      <div class="container">
        <img class="card" id="catFour" name="catFour" width="600" height="400">
        <img class="minus" src="assets/icons/minus.png" onclick="skipSubL()">
        <img class="plus" src="assets/icons/plus.png" onclick="addSubL()">
      </div>
    </center>
  </body>
</html>