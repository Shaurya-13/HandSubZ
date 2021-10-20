function validate(){

    var subName = document.getElementById("subscriptionName").value;
    var bCycle = document.getElementById("cycle").value;
    var price = document.getElementById("price").value;
    var sDate = document.getElementById("startDate").value;
    var eDate = document.getElementById("expiredDate").value;
    var status = document.getElementById("status").value;
    var discountPercentage = document.getElementById("discountPercentage").value; 

    if(subName !== "" &&  bCycle !== "" && price !== "" && sDate !== "" && eDate !== "" && status !== "" && discountPercentage !==""){
                if(discountPercentage<=100){
                    alert("added");
                    return true;
                }
                else
                {
                    alert("% can not be over 100");
                    return false;
                }
        }
        else
        {
            alert("All fields are required.....!");
        }


        

       /* if (name != '' && email != '' && contact != ''){
            if (email.match(emailReg)){
                    if (document.getElementById("male").checked || document.getElementById("female").checked){ 
                            if (contact.length == 10){
                                alert("All type of validation has done on OnSubmit event.");
                                return true;
                            } 
                            else{
                                alert("The Contact No. must be at least 10 digit long!");
                                return false;
                            }
                    } 
                    else{
                            alert("You must select gender.....!");
                            return false;
                    }

            } 
            else{
                    alert("Invalid Email Address...!!!");
                    return false;
            }
    } 
    else{
            alert("All fields are required.....!");
            return false;
        }
    }






        /*if(subName == "" || bCycle == "" || price == "" || sDate == "" || eDate == "" || status == "" || discountPercentage == ""){
            alert(" All fields must be filled out");
            return false; 
        }
       else{
           true;
       }
       
       
       
        else if(discountPercentage >100) {
            alert("Maximum discount percentage is 100 %");
            return false; 
        }*/

       

        /*else if(bCycle == "") {
            alert("billing cycle must be filled out");
            return false; 
        }

        else if(price == "") {
            alert("price must be filled out");
            return false; 
        }

        else if(sDate == "") {
            alert("start date must be filled out");
            return false; 
        }

        else if(eDate == "") {
            alert("expired date must be filled out");
            return false; 
        }
        else if(status == "") {
            alert("status must be filled out");
            return false; 
        }
        else{
            return true;
        }
        
        /*else{
            setSuccessFor(subName);
        }*/   

        /*if (x == "") {
            alert("Name must be filled out");
            return false;
          }*/

}

function checkDelete(){
   
    var 
    return confirm('Are you sure you want to Delete this sub?');
}