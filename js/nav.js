hideMenu = () => {
    let role = document.getElementById('user_role').value;
    let admin = document.getElementById("admin_menu");
    let user = document.getElementById("user_menu");
    let login = document.getElementById("login_menu");
    if (role == 'User') {
        admin.style.display = "none";
        login.style.display = "none";
    } else if (role == 'Admin') {
        admin.style.display = "flex";
        user.style.display = "block";
        login.style.display = "none";
    } else {
        admin.style.display = "none";
        user.style.display = "none";
        login.style.display = "block";
    }
}
hideMenu();