
/** 
 * Function to toggle the additional fields in the sign-in form to allow user to register
 */
function toggleRegistrationOptions() {
	
	// if user wants to register a new account

	// add additional fields (optional and required fields)

	// TEST
	var form = $('#signInForm');
	// change the action of the form
	if (form.attr('action') == 'signin.php') {
		$('#signInForm').attr('action', 'register.php');
		$('#signInForm button[name="main"]').html('Register');
		$('#inputKennelName').show();
	}
	else {
		$('#signInForm').attr('action', 'signin.php');
		$('#signInForm button[name="main"]').html('Sign in');
		$('#inputKennelName').hide();
		console.log($('#inputKennelName'));

	}

	console.log("Action", form.attr('action'));
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

// Initially focus on the username field of the form by default
$('#inputUsername').focus();

// TEST
var form = $('#signInForm');
console.log("Form", form);