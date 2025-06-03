function validate(form)
 {


test = validatetitle(form.title.value)  
test += validatefirstname(form.firstname.value)
test += validatelastname(form.lastname.value)
test += validateemail(form.email.value)
test += validatecellphone(form.cell.value)
test += validatemessage(form.message.value)

 



 if (test == "")

 {

 }
 else { 
    
    alert(test);


    return false
}
 }


 
function validatemessage(area)
 {
if(area == "")
 return  "No Message was was entered.\n"  

}


function validatetitle(area)
 {
if(area == "")
 return  "No title was entered.\n"  

}
function validatefirstname(area)
 {
if(area == "")
 return  "No Firstname was entered.\n"  

}

 
 function validatelastname(area)// so this wont run because of the required
 {
    if(area == "")
    return  "No Lastname was entered.\n"  
   

 }


 function validatecellphone(area)
 {
    if (area == "") return "No cellphone was entered.\n"
  
 }



 function validateemail(area)
 {
    if (area == "") return "No Email was entered.\n"
    else if (!((area.indexOf(".") > 0) &&
    (area.indexOf("@") > 0)) ||
    /[^a-zA-Z0-9.@_-]/.test(area))
    return "The Email address is invalid.\n"
 }
