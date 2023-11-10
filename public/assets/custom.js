let captcha;
function generate() {

	// Clear old input
	document.getElementById("Captcha").value = "";

	// Access the element to store
	// the generated captcha
	captcha = document.getElementById("image");
	let uniquechar = "";

	const randomchar =
		"ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

	// Generate captcha for length of
	// 5 with random character
	for (let i = 1; i < 7; i++) {
		uniquechar += randomchar.charAt(
			Math.random() * randomchar.length)
	}

	// Store generated input
	captcha.innerHTML = uniquechar;
}

function printmsg() {
	const usr_input = document
		.getElementById("Captcha").value;

	// Check whether the input is equal
	// to generated captcha or not
	if (usr_input == captcha.innerHTML) {
		//let s = document.getElementById("key").innerHTML = "Matched";
       $.toastr.success('Matched', {position: 'bottom-center'});
		generate();
	}
	else {
		//let s = document.getElementById("key").innerHTML = "not Matched";
            $.toastr.error('Captcha Not Matched', {position: 'bottom-center'});
		generate();
	}
}

(() => {
    'use strict'
  
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    const forms = document.querySelectorAll('.needs-validation')
  
    // Loop over them and prevent submission
    Array.from(forms).forEach(form => {
      form.addEventListener('submit', event => {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        } 
        form.classList.add('was-validated')
      }, false)
    }) 
  })()

  setTimeout(() => {
    $(".loginform").removeClass("was-validated"); 
},2500);

if($('#example').length){
    new DataTable('#example', {
        responsive: true
    });
}
