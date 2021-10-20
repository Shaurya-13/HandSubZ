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
      $myObjF='';
      $myJSONF='';
      $stackF=array();
      $resultF=mysqli_query($con,"SELECT Subscription_name, total_download, img_dir FROM subscription_suggestions WHERE category='Food'");
      while($row=mysqli_fetch_assoc($resultF)){
        $myObjF=array(
          'name'=>$row['Subscription_name'],
          'img'=>$row['img_dir'],
          'downloads'=>$row['total_download'],
        );
        array_push($stackF, $myObjF);
      }
      $myJSONF=json_encode($stackF);
    ?>
    <script type="text/javascript">
      var subDataF=JSON.parse('<?= $myJSONF; ?>');
      sortArrF()
      function sortArrF(){
        subDataF.sort(function (a, b){return b.downloads - a.downloads});
      }
      var subscriptionF={
        name:"",
        img:"",
        downloads:0
      }
      cardCounterF=0;
      window.onload=skipSubF;

      function addSubF(){
        if(subDataF.length==0){
          alert("You have reached the end of the list");
        }
        else if(subDataF.length==1){
          skipSubF();
          cardCounterF--;
          subDataF.shift();
          document.catSix.src="SuggestionPage/assets/img/end.gif";
        }
        else{
          var TempF=subDataF[0];
          cardCounterF--;
          subDataF[0]=subDataF[cardCounterF];
          subDataF[cardCounterF]=TempF;
          subDataF.shift();
          sortArrF();
          skipSubF();
          
        }
        goToFormF();
      }
      function skipSubF(){
        if(subDataF==0){
          alert("You have reached the end of the list");
          document.catSix.src = "SuggestionPage/assets/img/end.gif";
        }
        else{
          try{
            loadSubF(cardCounterF);
            document.catSix.src=subscriptionF.img;
            cardCounterF++;
          }
          catch{
            cardCounterF=0;
            skipSubF();
          }
        }
      }
      function loadSubF(cardCounterF){
        subscriptionF.name=subDataF[cardCounterF].name;
        subscriptionF.img=subDataF[cardCounterF].img;
        subscriptionF.downloads=subDataF[cardCounterF].downloads;
      }
      function goToFormF(){
        window.open("../SuggestionPage/add.html");
      }
    </script>
    <center>
      <div class="container">
        <img class="card" id="catSix" name="catSix" width="600" height="400">
        <img class="minus" src="assets/icons/minus.png" onclick="skipSubF()">
        <img class="plus" src="assets/icons/plus.png" onclick="addSubF()">
      </div>
    </center>
  </body>
</html>