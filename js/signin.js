// TODO use the document on ready function??
$(document).ready(function() {
	// Initially focus on the username field of the form by default
	$('#inputUsername').focus();
});

/** 
 * Function to submit the form when the user hits the enter key
 */
function submitForm(e) {
	// only allow submitting if valid??

	if (e && e.keyCode == 13) {
		$('#signInForm').submit();
	}
}

/** 
 * Function to toggle the additional fields in the sign-in form to allow user to register
 */
function toggleRegistrationOptions() {

	var form = $('#signInForm');

	// if user wants to register a new account
	if (form.attr('action') == 'signin.php') {
		expandForm();
	}
	else {
		resetForm();
	}

	console.log("Action", form.attr('action'));
}

/**
 * Function to display all the additional fields for registration
 */
function expandForm() {
	// change the form destination (register account)
	$('#signInForm').attr('action', 'register.php');
	$('#signInForm button[name="mainBtn"]').html('Register');

	// add header for the different sections
//	$('#signInForm').prepend('<div id="requiredHeader" name="requiredHeader"><h4>Account Information (required)</h4></div>');
//	$('#inputKennelNameField').prepend('<div id="optionalHeader" name="optionalHeader"><hr /><h4>Kennel Information (optional)</h4></div>');

	// display additional fields (optional and required fields)
	showAdditionalFields();

	// hide the registration button
	$('#registerNowSection').hide()

	// change the validation requirements?!
	// TODO
}

/**
 * Function to reset all the fields of the form to blank (empty)
 */
function resetForm() {
	// change the form destination (sign-in account)
	$('#signInForm').attr('action', 'signin.php');
	$('#signInForm button[name="mainBtn"]').html('Sign in');

	// remove headers for the different sections
//	$('#requiredHeader').remove();
//	$('#optionalHeader').remove();

	// hide additional fields (optional and required fields)
	hideAdditionalFields();

	// show the registration button
	$('#registerNowSection').show()

	// change the validation requirements?!
	// TODO

	// empty all the filled in form fields
	$('#signInForm')[0].reset();

	// focus the form on the username field
	$('#inputUsername').focus();

	console.log("Form reset");
}

/**
 * Function to show the additional registration fields
 */
function showAdditionalFields() {
	$('#inputConfirmPasswordField').slideDown();
	$('#inputEmailField').slideDown();
	$('#inputCreditCardField').slideDown();
	$('#inputKennelNameField').slideDown();
	$('#inputAddressField').slideDown();
	$('#inputBreedsField').slideDown();
}

/**
 * Function to hide the additional registration fields
 */
function hideAdditionalFields() {
	$('#inputConfirmPasswordField').slideUp();
	$('#inputEmailField').slideUp();
	$('#inputCreditCardField').slideUp();
	$('#inputKennelNameField').slideUp();
	$('#inputAddressField').slideUp();
	$('#inputBreedsField').slideUp();
}
