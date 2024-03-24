
function allLetter(ControlID,LabelID)
{ 
  var Patteren = /^[A-Za-z]+[A-Za-z ]+$/;
  var Letters = document.getElementById(ControlID).value;
  if(document.getElementById(ControlID).value == "")
  {
    document.getElementById(LabelID).style.display = "inline";
    document.getElementById(LabelID).innerHTML = "* Please Enter Name";
    document.getElementById(ControlID).focus();
    return false;
  }
  else if(Patteren.test(Letters) == false) 
  {
   document.getElementById(LabelID).innerHTML = "* Please input alphabet only";
   document.getElementById(ControlID).focus();
  return false;
  }
  else
  {
    document.getElementById(LabelID).innerHTML = "";
    return true;
  }
}

function allLetterDigit(ControlID,LabelID)
{ 
  var Patteren = /^[0-9A-Za-z]+[0-9A-Za-z ]+$/;
  var Letters = document.getElementById(ControlID).value;
  if(document.getElementById(ControlID).value == "")
  {
    document.getElementById(LabelID).style.display = "inline";
    document.getElementById(LabelID).innerHTML = "* Please Enter data";
    document.getElementById(ControlID).focus();
    return false;
  }
  else if(Patteren.test(Letters) == false) 
  {
   document.getElementById(LabelID).innerHTML = "* Please input valid data";
   document.getElementById(ControlID).focus();
  return false;
  }
  else
  {
     document.getElementById(LabelID).innerHTML = "";
     return true;
  }
}

function allLetterDigitDot(ControlID,LabelID)
{ 
  var Patteren = /^[0-9A-Za-z]+[0-9A-Za-z., ]+$/;
  var Letters = document.getElementById(ControlID).value;
  if(document.getElementById(ControlID).value == "")
  {
    document.getElementById(LabelID).style.display = "inline";
    document.getElementById(LabelID).innerHTML = "* Please Enter data";
    document.getElementById(ControlID).focus();
    return false;
  }
  else if(Patteren.test(Letters) == false) 
  {
    document.getElementById(LabelID).innerHTML = "* Please input valid data";
    document.getElementById(ControlID).focus();
    return false;
  }
  else
  {
     document.getElementById(LabelID).innerHTML = "";
     return true;
  }
}

function ValidatePrice(ControlID,LabelID)
{
  var Patteren = /^\d{3,8}$/;
  var Price = document.getElementById(ControlID).value;
  if(document.getElementById(ControlID).value == "")
  {
    
     document.getElementById(LabelID).style.display = "inline";
     document.getElementById(LabelID).innerHTML = "* Please Enter Budget";
     document.getElementById(ControlID).focus();
    return false;
  }
  else if(Price<1 || Price > 99999999)
  {
    document.getElementById(LabelID).style.display = "inline";
    document.getElementById(LabelID).innerHTML = "* Please Enter valid Budget";      
    document.getElementById(ControlID).focus();
     return false;
  } 
  else if(Patteren.test(Price) == false) 
  {
     document.getElementById(LabelID).innerHTML = "* Please Enter valid Budget.";
     document.getElementById(ControlID).focus();
    return false;
  }
  else
   {
     document.getElementById(LabelID).innerHTML = "";
     return true;  
  }
}
// function allLetterDigitDotDes(ControlID,LabelID)
// { 
//   var Patteren = /^[0-9A-Za-z]+[0-9A-Za-z., ]+$/;
//   var Letters = document.getElementById(ControlID).value;
//   if(document.getElementById(ControlID).value == "")
//   {
//     document.getElementById(LabelID).style.display = "inline";
//     document.getElementById(LabelID).innerHTML = "* Please Enter data";
//     document.getElementById(ControlID).focus();
//     return false;
//   }
//   else if(Patteren.test(Letters) == false) 
//   {
//    document.getElementById(LabelID).innerHTML = "* Please input valid";
//    document.getElementById(ControlID).focus();
//   return false;
//   }
//   else
//   {
//      document.getElementById(LabelID).innerHTML = "";
//      return true;
//   }
// }

function ValidateEmailID(ControlID,LabelID) 
{
  var Patteren = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
  var Address = document.getElementById(ControlID).value;
  if(document.getElementById(ControlID).value == "")
  {
      document.getElementById(LabelID).style.display = "inline";
      document.getElementById(LabelID).innerHTML = "* Please Enter Email Address ";
      document.getElementById(ControlID).focus();
      return false;
  }
  else if(Patteren.test(Address) == false) 
  {
     document.getElementById(LabelID).innerHTML = "* Please Enter Valid Email Address.";
     document.getElementById(ControlID).focus();
    return false;
  }
  else
  {
    document.getElementById(LabelID).innerHTML = "";
    return true;
  }
}	

function ValidateURL(ControlID,LabelID) 
{
  var Patteren = /^(http[s]?:\/\/){0,1}(www\.){0,1}[a-zA-Z0-9\.\-]+\.[a-zA-Z]{2,5}[\.]{0,1}/;;
  var Url = document.getElementById(ControlID).value;
  if(document.getElementById(ControlID).value == "")
  {
      document.getElementById(LabelID).style.display = "inline";
      document.getElementById(LabelID).innerHTML = "* Please Enter URL";
      document.getElementById(ControlID).focus();
      return false;
  }
  else if(Patteren.test(Url) == false) 
  {
     document.getElementById(LabelID).innerHTML = "* Please Enter Valid URL.";
     document.getElementById(ControlID).focus();
    return false;
  }
  else
  {
       document.getElementById(LabelID).innerHTML = "";
       return true;
  }
} 

function LenghtValid(ControlID,LabelID)
{
  var Patteren = /^\d{10}$/;
  var Con = document.getElementById(ControlID).value;
  var len = Con.length;
  if(document.getElementById(ControlID).value == "")
  {
    
     document.getElementById(LabelID).style.display = "inline";
     document.getElementById(LabelID).innerHTML = "* Please Enter Contact No";
     document.getElementById(ControlID).focus();
    return false;
  }
  else if(Patteren.test(Con) == false) 
  {
     document.getElementById(LabelID).innerHTML = "* Please Enter 10 digit Contact Number.";
     document.getElementById(ControlID).focus();
    return false;
  }
  else
  {
    document.getElementById(LabelID).innerHTML = "";
  }
}

function LenghtValidPincode(ControlID,LabelID)
{
  var Patteren = /^\d{6}$/;
  var Con = document.getElementById(ControlID).value;
  var len = Con.length;
  if(document.getElementById(ControlID).value == "")
  {
    
     document.getElementById(LabelID).style.display = "inline";
     document.getElementById(LabelID).innerHTML = "* Please Enter Pincode";
     document.getElementById(ControlID).focus();
    return false;
  }
  else if(Patteren.test(Con) == false) 
  {
     document.getElementById(LabelID).innerHTML = "* Please Enter 6 digit Pincode.";
     document.getElementById(ControlID).focus();
    return false;
  }
  else
  {
    document.getElementById(LabelID).innerHTML = "";
  }
}
function ValidatePwd(ControlID,LabelID,Message)
{
  var Patteren = /^[0-9A-Za-z]{5,}$/;
  var Pwd = document.getElementById(ControlID).value;
  var len = Pwd.length;
  if(document.getElementById(ControlID).value == "")
   {
      document.getElementById(LabelID).style.display = "inline";
      document.getElementById(LabelID).innerHTML = "* Please Enter " + Message;
      document.getElementById(ControlID).focus();
      return false;
   }
  else if(Patteren.test(Pwd) == false) 
  {
     document.getElementById(LabelID).innerHTML = "* Please enter minimum 5 digit and character only";
     document.getElementById(ControlID).focus();
    return false;
  }
   else
   {
      document.getElementById(LabelID).innerHTML = "";
   }
}

function ValidateCPassword(PwdID, ConPwdID, LabelID)
{
		if(document.getElementById(PwdID).value != document.getElementById(ConPwdID).value)
		{
			document.getElementById(LabelID).style.display = "inline";
      document.getElementById(LabelID).innerHTML = "* Password & Confirm Password does not match ";
			document.getElementById(PwdID).focus();
		  return false;
		}
    else
    {
      document.getElementById(LabelID).innerHTML = "";
      return true;
    }
} 

function NumbersOnly(e)
{
	var Unicode=e.charCode? e.charCode : e.keyCode;
	if (Unicode!=8)
	{ //if the key isn't the backspace key (which we should allow)
	 if (Unicode<48||Unicode>57) //if not a number
   {
      return false; //disable key press  
   }
	}
}

function lettersOnly(evt) 
{
   evt = (evt) ? evt : event;
   var charCode = (evt.charCode) ? evt.charCode : ((evt.keyCode) ? evt.keyCode : ((evt.which) ? evt.which : 0));
   if (charCode > 32 && (charCode < 65 || charCode > 90) &&
      (charCode < 97 || charCode > 122)) {
      // alert("Enter letters only.");
      return false;
   }
   return true;
}

function StartEndDate(StartDate,EndDate,LabelID)
{
    //alert("ddd");
    var SDate=document.getElementById(StartDate).value;
    var EDate=document.getElementById(EndDate).value;
    //alert (date1+ "  " + date2);
    if(EDate<SDate)
    {
      //alert("Please Select Valid Date Crieteria");
      document.getElementById(LabelID).style.display = "inline";
      document.getElementById(LabelID).innerHTML = "* Enter Valid Date Crieteria";      
      document.getElementById(StartDate).focus();
      return false;
    }
    else
    {
      //alert("Proper");
      document.getElementById(LabelID).innerHTML = "";
      return true;  
    }

}

function CurrentDate(CurDate)
{
  var Today = new Date();
  var DD    = Today.getDate();
  var MM    = Today.getMonth()+1; //January is 0!
  var YYYY  = Today.getFullYear();

  if(DD<10) {
      DD='0'+DD
  } 

  if(MM<10) {
      MM='0'+MM
  } 

  Today = MM+'-'+DD+'-'+YYYY;
  //return Today;
  document.getElementById(CurDate).value = Today;
}