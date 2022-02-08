loginReg = () => {
    let login = document.getElementById("login_form");
    let register = document.getElementById("register_form");
    if (login.style.display === "none" ) {
      login.style.display = "block";
      register.style.display = "none";
    } else {
      login.style.display = "none";
      register.style.display = "block";
    }
  }

showPass = (field, show, hide) => {
    let pass = document.getElementById(field);
    let eye = document.getElementById(show);
    let eye_slash = document.getElementById(hide);
    if (pass.type === "password") {
      eye.style.display = "none";
      eye_slash.style.display = "block";
      pass.type = "text";
    } else {
      eye.style.display = "block";
      eye_slash.style.display = "none";
      pass.type = "password";
    }
  }

  loginCheck = (email, password) => {
  
    if(document.getElementById(email).value==="" || 
    document.getElementById(password).value==="") {
      document.getElementById('login_btn').disabled = true; 
    } else { 
        document.getElementById('login_btn').disabled = false;
    }
      
  }

regCheck = (email, username, password, cpassword) => {
  
    if(document.getElementById(email).value==="" || 
    document.getElementById(username).value==="" ||
    document.getElementById(password).value != document.getElementById(cpassword).value) {
      document.getElementById('reg_btn').disabled = true; 
    } else { 
        document.getElementById('reg_btn').disabled = false;
    }
      
  }

  function convert(email) {
    console.log(document.getElementById(email).value.toLowerCase());
    document.getElementById(email).value.toLowerCase();
    document.getElementById(email).innerText.toLowerCase();
}