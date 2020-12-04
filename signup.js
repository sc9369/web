const form = document.getElementById('form');
const username = document.getElementById('username');
const email = document.getElementById('email');
const password = document.getElementById('password');
const password2 = document.getElementById('password2');
const mobile = document.getElementById('mobile');
const birthday = document.getElementById('birthday');
var option = document.getElementsByName('gender');

form.addEventListener('submit', e => {
	e.preventDefault();
	
	checkInputs();
});

function checkInputs() {
	// trim to remove the whitespaces
	const usernameValue = username.value.trim();
	const emailValue = email.value.trim();
	const passwordValue = password.value.trim();
    const password2Value = password2.value.trim();
    const mobileValue = mobile.value.trim();
    const birthdayValue = birthday.value.trim();
	
	if(usernameValue === '') {
		setErrorFor(username, 'Username cannot be blank');
	} else {
		setSuccessFor(username);
	}
	
	if(emailValue === '') {
		setErrorFor(email, 'Email cannot be blank');
	} else if (!isEmail(emailValue)) {
		setErrorFor(email, 'Not a valid email');
	} else {
		setSuccessFor(email);
    }
    
    if(mobileValue === '') {
		setErrorFor(mobile, 'Mobile cannot be blank');
	} else if (!isMobile(mobileValue)) {
		setErrorFor(mobile, 'Not a valid Mobile');
	} else {
		setSuccessFor(mobile);
    }
	
	if(passwordValue === '') {
		setErrorFor(password, 'Password cannot be blank');
    } else if(!ispass(passwordValue)){
        setErrorFor(password, 'Not a valid password')
    } 
    else {
		setSuccessFor(password);
	}
	
	if(password2Value === '') {
		setErrorFor(password2, 'Password cannot be blank');
	} else if(passwordValue !== password2Value) {
		setErrorFor(password2, 'Passwords does not match');
	} else{
		setSuccessFor(password2);
    }
    
    if(birthdayValue === ''){
        setErrorFor(birthday, 'Birthday cannot be blank');
    }else{
        setSuccessFor(birthday);
    }

    if (!(option[0].checked || option[1].checked || option[2].checked)) {
        //alert("Please Select Your Gender");
        setErrorFor(option, 'Please select one');
    }else{
        setSuccessFor(option);
    }

}

function setErrorFor(input, message) {
	const formControl = input.parentElement;
	const small = formControl.querySelector('small');
	formControl.className = 'form-group error';
	small.innerText = message;
}

function setSuccessFor(input) {
	const formControl = input.parentElement;
	formControl.className = 'form-group success';
}
	
function isEmail(email) {
	return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
}

function isMobile(phone) {
    return /^\d{10}$/.test(phone);
}

function ispass(password) {
    return /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/.test(password)
}
