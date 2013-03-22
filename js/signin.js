// Initially focus on the username field of the form by default
$('#inputUsername').focus();
	
/** 
 * Function to toggle the additional fields in the sign-in form to allow user to register
 */
function toggleRegistrationOptions() {
	
	// if user wants to register a new account

	// add additional fields (optional and required fields)
	// change the action of the form

	// otherwise default to show just the sign-in fields
}

/** 
 * Function to submit the form when the user hits the enter key
 */
function submitForm(e) {
	if (e && e.keyCode == 13) {
		$('#signInForm').submit();
	  // document.signin.submit();
	}
}