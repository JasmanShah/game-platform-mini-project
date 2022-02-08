let user_session = document.getElementById('session_user').value;
let id = document.getElementById('current_game_id').value;

if(user_session != 'Guest') {
    let game_list = JSON.parse(document.getElementById("game_list_data").textContent);
    for(i = 0; i < game_list.length; i ++) {
        if(game_list[i].game_id == id) {
            document.getElementById("buy_game").innerText = "Already Purchased";
            document.getElementById("buy_game").disabled = true;
        }
    }
} else {
    document.getElementById("buy_game").disabled = true;
    document.getElementById("buy_message").innerText = "Login Now to Purchase!";
}