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

fieldCheck = (field1, field2, field3, btn) => {
  if(document.getElementById(field1).value==="" ||
    document.getElementById(field2).value==="" ||
    document.getElementById(field3).value==="") {
      document.getElementById(btn).disabled = true; 
    } else { 
      document.getElementById(btn).disabled = false;
  } 
}

fieldCheck("editEmail", "editName", "editBio", "save_profile");


//Password edit sections

passCheck = (oldpass, newpass, cnewpass, btn) => {
    if (document.getElementById(oldpass).value != document.getElementById("hiddenOldPass").value) {
      document.getElementById(btn).disabled = true;
      document.getElementById("error_message").innerHTML = "Wrong old password";
    } else if (!document.getElementById(newpass).value) {
      document.getElementById(btn).disabled = true;
        document.getElementById("error_message").innerHTML = "New password field empty";
    } else if( document.getElementById(newpass).value != document.getElementById(cnewpass).value) {
        document.getElementById(btn).disabled = true;
        document.getElementById("error_message").innerHTML = "Password not match";
    }
    else { 
      document.getElementById("error_message").innerHTML = "";
      document.getElementById(btn).disabled = false;
  } 
}

showForm = (show, hide1, hide2) => {
  let visible = document.getElementById(show);
  let hidden1 = document.getElementById(hide1);
  let hidden2 = document.getElementById(hide2);
  visible.style.display = "block";
  hidden1.style.display = "none";
  hidden2.style.display = "none";
}

showImageLink = () => {
  document.getElementById("image_preview").src = document.getElementById("image").value;
  if(!document.getElementById("image").value) {
      document.getElementById("image_preview").src = "../assets/temp.png";
  }
}

roleColor = () => {
  console.log
  let role = document.getElementById('role').value;
  if (role == 'User')
    document.getElementById("user_badge").classList.add('bg-primary');
  else if (role == 'Admin'){
    document.getElementById("user_badge").classList.add('bg-danger');
    document.getElementById("user_badge_text").classList.add('glow');
  }
  else
    document.getElementById("user_badge").classList.add('bg-secondary');

}
roleColor();

// Random Color
// for(i = 0; i < 3; i++) {
//   let randomColor = Math.floor(Math.random()*16777215).toString(16);
//   document.getElementById('test'+i).style.backgroundColor = "#" + randomColor;
// }