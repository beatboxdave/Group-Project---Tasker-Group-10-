//Validates the log in form, ensuring that the users name entered
//is a valid name, and contains no numbers, as well as checing if
//it is only one character, returns false if it fails these tests
//to stop the site from going any further.
function validateMembers(){
	var regex = /\d/g;
	var x = document.forms["addMember"]["memberName"].value;
	if(x.length == 1){
		alert("Name must consist of more than one character");
        return false;
	}
    if (x == null || x == "") {
        alert("Name must be filled out");
        return false;
    }
	if (regex.test(x)){
		alert("Name must not contain numbers");
		return false;
	}
}

function validateMembersEdit(){
	var regex = /\d/g;
	var x = document.forms["memberEdit"]["nameEdit"].value;
	if(x.length == 1){
		alert("Name must consist of more than one character");
        return false;
	}
    if (x == null || x == "") {
        alert("Name must be filled out");
        return false;
    }
	if (regex.test(x)){
		alert("Name must not contain numbers");
		return false;
	}
}

function validateTasks(){
	var regex = /\d/g;
	var x = document.forms["details"]["taskName"].value;
	if (x == null || x ==""){
	alert("Something must be entered for the task name.");
	return false;
	}
	if (x.length == 1){
	alert("Task name must be more than one character long.");
	return false;
	}
	var z = document.forms["details"]["description"].value;
	if (z == null || x ==""){
	alert("A description must be entered");
	return false;
	}
	if(z.length == 1){
	alert("The description must be more than one character of length.");
	return false;
	}
	var c = document.forms["details"]["startDate"].value;

}

function validateTasksEdit(){
	var regex = /\d/g;
	var v = document.forms["updateTask"]["endDate"].value;
	if (v != /^\d{4}-\d{1,2}-\d{1,2}$/){
	alert("Please change the date you entered to match the format provided.");
	return false;
	}
}

