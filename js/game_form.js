
showImageLink = (type) => {
    if( type = 'publish') {
        document.getElementById("image_preview").src = document.getElementById("image").value;
        if(!document.getElementById("image").value) {
            document.getElementById("image_preview").src = "../assets/temp.png";
            document.getElementById("image").value = "../assets/temp.png";
        }
    }

    if( type = 'edit') {
        document.getElementById("edit_image_preview").src = document.getElementById("edit_image").value;
        if(!document.getElementById("edit_image").value) {
            document.getElementById("edit_image_preview").src = "../assets/temp.png";
            document.getElementById("edit_image").value = "../assets/temp.png";
        }
    }

}

showForm = (show, hide) => {
    let visible = document.getElementById(show);
    let hidden = document.getElementById(hide);
    visible.style.display = "block";
    hidden.style.display = "none";
  }

getAllGameData = () => {
    return JSON.parse(document.getElementById("game_list_data").textContent);
}


selectGame = () => {
    let data = getAllGameData();
    let index = document.getElementById("game_select").selectedIndex - 1;
    document.getElementById("edit_game_id").value = data[index].game_id;
    document.getElementById("edit_image_preview").src = data[index].image; toString()
    document.getElementById("edit_image").value = data[index].image;
    document.getElementById("edit_name").value = data[index].gname;
    document.getElementById("edit_price").value = data[index].price;
    document.getElementById("edit_desc").value = data[index].desc_game;
    document.getElementById("edit_date").value = data[index].release_date;
    document.getElementById("edit_publisher").value = data[index].publisher_id;
}