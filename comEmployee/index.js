document.getElementById('btn').addEventListener('click', smeEvent)
//
//function someEvent() {
//	  var empCode = document.getElementById("empcode").value;
//	  let letters = /^[A-Za-z]+$/;
//	  var numbers = /^[-+]?[0-9]+$/;
//	  
//
//	  if (empCode.match(numbers)) {
//	    alert("pass");
//	  } else {
//	    alert("fail");
//	  }
//}


function validateForm() {
	 var empCode = document.getElementById("empcode").value;
	 var name = document.getElementById("name").value;
	 var contact = document.getElementById("contact").value;
	 
	 var numbers = /^[-+]?[0-9]+$/;
	 var letters = /^[A-Za-z]+$/;
	 
	 if(!empCode.match(numbers)){
		 swal('Input numeric only')
		 return false
	 }else
		 if(!name.match(letters)){
			 swal('Input Alpebatic characters only')
			 return false
		 }else
			 if(!contact.match(numbers)){
				 swal('Input numeric only')
				 return false
			 }else
				 return true
			 return true
		 return true
		 
	 
			 
	 
	
}