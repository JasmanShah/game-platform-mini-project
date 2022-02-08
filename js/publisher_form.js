showImageLink = (type) => {
    if( type = 'publish') {
        document.getElementById("image_preview").src = document.getElementById("image").value;
        if(!document.getElementById("image").value) {
            document.getElementById("image_preview").src = "../assets/temp.png";
        }
    }

    if( type = 'edit') {
        document.getElementById("edit_image_preview").src = document.getElementById("edit_image").value;
        if(!document.getElementById("edit_image").value) {
            document.getElementById("edit_image_preview").src = "../assets/temp.png";
        }
    }
}

showForm = (show, hide) => {
    let visible = document.getElementById(show);
    let hidden = document.getElementById(hide);
    visible.style.display = "block";
    hidden.style.display = "none";
  }

getAllData = () => {
    return JSON.parse(document.getElementById("list_data").textContent);
}


selectData = () => {
    let data = getAllData();
    let index = document.getElementById("data_select").selectedIndex - 1;
    document.getElementById("edit_id").value = data[index].publisher_id;
    document.getElementById("edit_image_preview").src = data[index].image; toString()
    document.getElementById("edit_image").value = data[index].image;
    document.getElementById("edit_name").value = data[index].pname;
    document.getElementById("edit_bio").value = data[index].bio;
}