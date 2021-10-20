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
      $myObjB='';
      $myJSONB='';
      $stackB=array();
      $resultB=mysqli_query($con,"SELECT Subscription_name, total_download, img_dir FROM subscription_suggestions WHERE category='Business'");
      while($row=mysqli_fetch_assoc($resultB)){
        $myObjB=array(
          'name'=>$row['Subscription_name'],
          'img'=>$row['img_dir'],
          'downloads'=>$row['total_download'],
        );
        array_push($stackB, $myObjB);
      }
      $myJSONB=json_encode($stackB);
    ?>
    <script type="text/javascript">
      var subDataB=JSON.parse('<?= $myJSONB; ?>');
      sortArrB()
      function sortArrB(){
        subDataB.sort(function (a, b){return b.downloads - a.downloads});
      }
      var subscriptionB={
        name:"",
        img:"",
        downloads:0
      }
      cardCounterB=0;
      window.onload=skipSubB;

      function addSubB(){
        if(subDataB.length==0){
          alert("You have reached the end of the list");
        }
        else if(subDataB.length==1){
          skipSubB();
          cardCounterB--;
          subDataB.shift();
          document.catThree.src="SuggestionPage/assets/img/end.gif";
        }
        else{
          var TempB=subDataB[0];
          cardCounterB--;
          subDataB[0]=subDataB[cardCounterB];
          subDataB[cardCounterB]=TempB;
          subDataB.shift();
          sortArrB();
          skipSubB();
          
        }
        goToFormB();
      }
      function skipSubB(){
        if(subDataB==0){
          alert("You have reached the end of the list");
          document.catThree.src = "SuggestionPage/assets/img/end.gif";
        }
        else{
          try{
            loadSubB(cardCounterB);
            document.catThree.src=subscriptionB.img;
            cardCounterB++;
          }
          catch{
            cardCounterB=0;
            skipSubB();
          }
        }
      }
      function loadSubB(cardCounterB){
        subscriptionB.name=subDataB[cardCounterB].name;
        subscriptionB.img=subDataB[cardCounterB].img;
        subscriptionB.downloads=subDataB[cardCounterB].downloads;
      }
      function goToFormB(){
        window.open("../SuggestionPage/add.html");
      }
    </script>
    <center>
      <div class="container">
        <img class="card" id="catThree" name="catThree" width="600" height="400">
        <img class="minus" src="assets/icons/minus.png" onclick="skipSubB()">
        <img class="plus" src="assets/icons/plus.png" onclick="addSubB()">
      </div>
    </center>
  </body>
</html>