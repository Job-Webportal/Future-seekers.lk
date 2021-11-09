const Reg_form = document.getElementById('Reg_form');



function validateEmail(field) {
    if (field == "") return "No Email was entered.\n"
    else if (!((field.indexOf(".") > 0) &&
    (field.indexOf("@") > 0)) ||
    /[^a-zA-Z0-9.@_-]/.test(field))
    return "The Email address is invalid.\n"
    return ""
}
