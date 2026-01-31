function showForm(formId) { //add interactivtiy to the login and register forms
    document.getElementById("login-form").classList.remove("active");
    document.getElementById("register-form").classList.remove("active");

    document.getElementById(formId).classList.add("active"); 
}