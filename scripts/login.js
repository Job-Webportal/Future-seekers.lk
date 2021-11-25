
let countPass, countEmail = 0;
document.getElementById("loginBtn").disabled = true; 

// Login Validation

let email = document.getElementById('Email');
let mail_error = document.getElementById('mail_error');
email.addEventListener("keyup", validateEmail);

function validateEmail() {

  let emailValue = email.value.trim();

  if(emailValue === "") {
    document.getElementById("loginBtn").disabled = true; 
    mail_error.innerHTML = "Email cannot be Blank";

  } else if (!isEmail(emailValue)) {
    document.getElementById("loginBtn").disabled = true; 
    mail_error.innerHTML = "Enter a valid email";

  } else {
    mail_error.innerHTML = "";
    countEmail = 1;
    enableBtn();
  }
}


let password = document.getElementById('password');
password.addEventListener("keyup", validatePassword);
let pwd_error = document.getElementById('pwd_error');

function validatePassword() {
  
  let passwordValue = password.value.trim();

  if (passwordValue === "") {
    document.getElementById("loginBtn").disabled = true; 
    pwd_error.innerHTML = "Password cannot be Blank";
  } else {
    document.getElementById("loginBtn").disabled = true; 
    pwd_error.innerHTML = "";
    countPass = 1;
    enableBtn();
  }

}

function enableBtn() {
  if ((countPass + countEmail) === 2) {
    document.getElementById("loginBtn").disabled = false;   
}
}



function isEmail(email) {
    return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
}
