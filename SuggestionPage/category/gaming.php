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
      $myObjG='';
      $myJSONG='';
      $stackG=array();
      $resultG=mysqli_query($con,"SELECT Subscription_name, total_download, img_dir FROM subscription_suggestions WHERE category='Gaming'");
      while($row=mysqli_fetch_assoc($resultG)){
        $myObjG=array(
          'name'=>$row['Subscription_name'],
          'img'=>$row['img_dir'],
          'downloads'=>$row['total_download'],
        );
        array_push($stackG, $myObjG);
      }
      $myJSONG=json_encode($stackG);
    ?>
    <script type="text/javascript">
      var subDataG=JSON.parse('<?= $myJSONG; ?>');
      sortArrG()
      function sortArrG(){
        subDataG.sort(function (a, b){return b.downloads - a.downloads});
      }
      var subscriptionG={
        name:"",
        img:"",
        downloads:0
      }
      cardCounterG=0;
      window.onload=skipSubG;

      function addSubG(){
        if(subDataG.length==0){
          alert("You have reached the end of the list");
        }
        else if(subDataG.length==1){
          skipSubG();
          cardCounterG--;
          subDataG.shift();
          document.catFive.src="SuggestionPage/assets/img/end.gif";
        }
        else{
          var TempG=subDataG[0];
          cardCounterG--;
          subDataG[0]=subDataG[cardCounterG];
          subDataG[cardCounterG]=TempG;
          subDataG.shift();
          sortArrG();
          skipSubG();
          
        }
        goToFormG();
      }
      function skipSubG(){
        if(subDataG==0){
          alert("You have reached the end of the list");
          document.catFive.src = "SuggestionPage/assets/img/end.gif";
        }
        else{
          try{
            loadSubG(cardCounterG);
            document.catFive.src=subscriptionG.img;
            cardCounterG++;
          }
          catch{
            cardCounterG=0;
            skipSubG();
          }
        }
      }
      function loadSubG(cardCounterG){
        subscriptionG.name=subDataG[cardCounterG].name;
        subscriptionG.img=subDataG[cardCounterG].img;
        subscriptionG.downloads=subDataG[cardCounterG].downloads;
      }
      function goToFormG(){
        window.open("../SuggestionPage/add.html");
      }
    </script>
    <center>
      <div class="container">
        <img class="card" id="catFive" name="catFive" width="600" height="400">
        <img class="minus" src="assets/icons/minus.png" onclick="skipSubG()">
        <img class="plus" src="assets/icons/plus.png" onclick="addSubG()">
      </div>
    </center>
  </body>
</html>