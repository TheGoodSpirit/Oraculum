function vote(answer_id, vote) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../PHP/voteAnswers.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            location.reload();
        }
    };
    xhr.send("answer_id=" + answer_id + "&vote=" + vote);
}