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
      $myObjM='';
      $myJSONM='';
      $stackM=array();
      $resultM=mysqli_query($con,"SELECT Subscription_name, total_download, img_dir FROM subscription_suggestions WHERE category='Music'");
      while($row=mysqli_fetch_assoc($resultM)){
        $myObjM=array(
          'name'=>$row['Subscription_name'],
          'img'=>$row['img_dir'],
          'downloads'=>$row['total_download'],
        );
        array_push($stackM, $myObjM);
      }
      $myJSONM=json_encode($stackM);
    ?>
    <script type="text/javascript">
      var subDataM=JSON.parse('<?= $myJSONM; ?>');
      sortArrM()
      function sortArrM(){
        subDataM.sort(function (a, b){return b.downloads - a.downloads});
      }
      var subscriptionM={
        name:"",
        img:"",
        downloads:0
      }
      cardCounterM=0;
      window.onload=skipSubM;

      function addSubM(){
        if(subDataM.length==0){
          alert("You have reached the end of the list");
        }
        else if(subDataM.length==1){
          skipSubM();
          cardCounterM--;
          subDataM.shift();
          document.catTwo.src="SuggestionPage/assets/img/end.gif";
        }
        else{
          var TempM=subDataM[0];
          cardCounterM--;
          subDataM[0]=subDataM[cardCounterM];
          subDataM[cardCounterM]=TempM;
          subDataM.shift();
          sortArrM();
          skipSubM();
          
        }
        goToFormM();
      }
      function skipSubM(){
        if(subDataM==0){
          alert("You have reached the end of the list");
          document.catTwo.src = "SuggestionPage/assets/img/end.gif";
        }
        else{
          try{
            loadSubM(cardCounterM);
            document.catTwo.src=subscriptionM.img;
            cardCounterM++;
          }
          catch{
            cardCounterM=0;
            skipSubM();
          }
        }
      }
      function loadSubM(cardCounterM){
        subscriptionM.name=subDataM[cardCounterM].name;
        subscriptionM.img=subDataM[cardCounterM].img;
        subscriptionM.downloads=subDataM[cardCounterM].downloads;
      }
      function goToFormM(){
        window.open("../SuggestionPage/add.html");
      }
    </script>
    <center>
      <div class="container">
        <img class="card" id="catTwo" name="catTwo" width="600" height="400">
        <img class="minus" src="assets/icons/minus.png" onclick="skipSubM()">
        <img class="plus" src="assets/icons/plus.png" onclick="addSubM()">
      </div>
    </center>
  </body>
</html>