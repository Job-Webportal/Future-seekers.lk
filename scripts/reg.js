// initializing common variables 

let fname, lname, pass, conp, mail, num = 0;
let cname, cmail, pass2, conp2, bsn1, num2 = 0;
let number = document.getElementById('number');


document.getElementById("appBtn").disabled = true;
document.getElementById("empBtn").disabled = true;


// Validation for Registrartion & Login fields (Job Seeker)

let firstName = document.getElementById('fname');
firstName.addEventListener("keyup", validateFirstName);

function validateFirstName() {

  let nameValue = firstName.value.trim();
  let error = document.getElementById('fname_error');

  if (nameValue === "") {
    error.innerText = "Firstname cannot be blank"
    document.getElementById("appBtn").disabled = true;
  } else if(nameValue.match(/^[A-Za-z]+$/)) {
    setSuccessFor(firstName)
    error.innerText = null;
    fname = 1;
    enableAppBtn();
  } else {
    error.innerText = "Firstname only contains letters"
    document.getElementById("appBtn").disabled = true;
  }

}

let lastName = document.getElementById('lname');
lastName.addEventListener("keyup", validateLastName);

function validateLastName() {

  let nameValue = lastName.value.trim();
  let error = document.getElementById('lname_error');

  if (nameValue === "") {
    error.innerHTML = "Lastname cannot be blank";
    document.getElementById("appBtn").disabled = true;
  } else if(nameValue.match(/^[A-Za-z]+$/)) {
    setSuccessFor(lastName)
    error.innerHTML = null;
    lname = 1;
    enableAppBtn();
  } else {
    error.innerHTML = "Lastname only contains letters"
    document.getElementById("appBtn").disabled = true;
  }

}

// Job Seeker

let password = document.getElementById('password-app');
password.addEventListener("keyup", validatePassword);

function validatePassword() {
  
  let error = document.getElementById('pwd_error2');
  let passwordValue = password.value.trim();

  if (passwordValue === "") {
    error.innerHTML = "Password cannot be Blank";
    document.getElementById("appBtn").disabled = true;
  } else {
    setSuccessFor(password)
    error.innerHTML = null;
    pass = 1;
    enableAppBtn();
  }

}

let confirmPass = document.getElementById('password-confirm2');
confirmPass.addEventListener("keyup", confirmPassword);

function confirmPassword() {
  
  let error = document.getElementById('con_error2');

  let confirmValue = confirmPass.value.trim();

  let passwordValue = password.value.trim();

  if (confirmValue != passwordValue) {
    error.innerHTML = "Please make sure your passwords match";
    document.getElementById("appBtn").disabled = true;
  } else {
    setSuccessFor(confirmPass)
    error.innerHTML = null;
    conp = 1;
    enableAppBtn();
  }
}

let email = document.getElementById('Email2');
email.addEventListener("keyup", validateEmail);

function validateEmail() {

  let emailValue = email.value.trim();
  let error = document.getElementById('mail_error2');

  if(emailValue === "") {
    error.innerHTML = "Email cannot be Blank";
    document.getElementById("appBtn").disabled = true;

  } else if (!isEmail(emailValue)) {
    error.innerHTML = "Enter a valid email";
    document.getElementById("appBtn").disabled = true;

  } else {
    setSuccessFor(email)
    error.innerHTML = null;
    mail = 1;
    enableAppBtn();
  }

}

number.addEventListener("keyup", validateNum);

function validateNum() {
  
  let numValue = number.value.trim();
  let error = document.getElementById('num_error1');

  if (numValue === "") {
    error.innerHTML = "Number cannot be blank";
    document.getElementById("appBtn").disabled = true;

  } else if (numValue.match(/^\d{10}$/)) {
    setSuccessFor(number)
    error.innerHTML = null;
    num = 1;
    enableAppBtn();
  } else {
    error.innerHTML = "Enter a valid number";
    document.getElementById("appBtn").disabled = true;

  }

}

function enableAppBtn() {
  if ((fname + lname + pass + conp + mail + num) === 6) {
    document.getElementById("appBtn").disabled = false;
  }
}

// Validation for Registrartion & Login fields (Employer)

let comName = document.getElementById('com_name');
comName.addEventListener("keyup", validateComName);

function validateComName() {

  let nameValue = comName.value.trim();
  let error = document.getElementById('name_error');

  if (nameValue === "") {
    error.innerHTML = "Name cannot be blank"
    document.getElementById("empBtn").disabled = true;

  } else if(nameValue.match(/^[A-Za-z]+$/)) {
    setSuccessFor(comName)
    error.innerHTML = null;    
    cname = 1;
    enableEmpBtn();
  } else {
    error.innerHTML = "Name only contains letters"
    document.getElementById("empBtn").disabled = true;

  }
}

let comEmail = document.getElementById('com_email');
comEmail.addEventListener("keyup", validateComEmail);

function validateComEmail() {

  let emailValue = comEmail.value.trim();
  let error = document.getElementById('mail_error');

  if(emailValue === "") {
    error.innerHTML = "Email cannot be Blank";
    document.getElementById("empBtn").disabled = true;

  } else if (!isEmail(emailValue)) {
    error.innerHTML = "Enter a valid email";
    document.getElementById("empBtn").disabled = true;

  } else {
    setSuccessFor(comEmail)
    error.innerHTML = null;    
    cmail = 1;
    enableEmpBtn();
  }

}

let password2 = document.getElementById('password-emp');
password2.addEventListener("keyup", validatePasswordCom);

function validatePasswordCom() {
  
  let error = document.getElementById('pwd_error1');
  let passwordValue = password2.value.trim();

  if (passwordValue === "") {
    error.innerHTML = "Password cannot be Blank";
    document.getElementById("empBtn").disabled = true;
  } else {
    setSuccessFor(password2)
    error.innerHTML = null;    
    pass2 = 1;
    enableEmpBtn();
  }

}

let confirmPass2 = document.getElementById('password-confirm1');
confirmPass2.addEventListener("keyup", confirmPasswordCom);

function confirmPasswordCom() {
  
  let error = document.getElementById('con_error1');

  let confirmValue = confirmPass2.value.trim();

  let passwordValue = password2.value.trim();

  if (confirmValue != passwordValue) {
    error.innerHTML = "Please make sure your passwords match";
    document.getElementById("empBtn").disabled = true;
  } else {
    setSuccessFor(confirmPass2)
    error.innerHTML = null;    
    conp2 = 1;
    enableEmpBtn();
  }
}

let telNumber = document.getElementById('tel-number');
telNumber.addEventListener("keyup", validateTelNum);

function validateTelNum() {
  
  let numValue = telNumber.value.trim();
  let error = document.getElementById('num_error');

  if (numValue === "") {
    error.innerHTML = "Number cannot be blank";
    document.getElementById("empBtn").disabled = true;
  } else if (numValue.match(/^\d{10}$/)) {
    setSuccessFor(telNumber)
    error.innerHTML = null;    
    num2 = 1;
    enableEmpBtn();
  } else {
    error.innerHTML = "Enter a valid number";
    document.getElementById("empBtn").disabled = true;
  }

}

function setSuccessFor(input) {
	const control = input.parentElement;
	control.className = 'form-group success';
}

function enableEmpBtn() {
  if ((cname + pass2 + conp2 + cmail + num2) === 5) {
    document.getElementById("empBtn").disabled = false;
  }
}

function isEmail(email) {
    return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
}

function onlyNumberKey(evt) {
          
  // Only ASCII character in that range allowed
  var ASCIICode = (evt.which) ? evt.which : evt.keyCode
  if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
    return false;
  return true;
}
