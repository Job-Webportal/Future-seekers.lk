// let onMessage;
// let reg_form = document.getElementById('Reg_form');
// let firstName = document.getElementById('fname');
// let lastName = document.getElementById('lname');
// let email = document.getElementById('Email');
// let password = document.getElementById('password_s');
// let education = document.getElementById('education');
// let number = document.getElementById('c_number');

let form = document.getElementById('login');
let email = document.getElementById('email');
let password = document.getElementById('password');

let msg_email = document.getElementById('msg-email');
let msg_password = document.getElementById('msg-password'); 
let msg_agree = document.getElementById('msg-agree');



function checkInputs(){
  let emailValue = email.value.trim();
  let passwordValue = password.value.trim();

  if(emailValue === "") {
    msg_email.innerHTML = "Email cannot be Blank";
    msg_email.style.color = "red";
  } else if (!isEmail(emailValue)) {
    msg_email.innerHTML = "Enter a valid email";
    msg_email.style.color = "red";
  } else {
    msg_email.innerHTML = "Looks Great!!";
    msg_email.style.color = "green";

  }

  if (passwordValue === "") {
    msg_password.innerHTML = "Password cannot be Blank";
  } else {

  }
}



function isEmail(email) {
    return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
}
