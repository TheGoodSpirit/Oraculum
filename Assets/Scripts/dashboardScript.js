// Get references to buttons and sections
let bq_btn = document.getElementById('bq_btn');
let pq_btn = document.getElementById('pq_btn');
let mq_btn = document.getElementById('mq_btn');
let sq_btn = document.getElementById('sq_btn');


let postQuestions = document.getElementById('postQuestions');
let browseQuestions = document.getElementById('browseQuestions');
let myQuestions = document.getElementById('myQuestions');
let savedQuestions = document.getElementById('savedQuestions');

let allButtons = [bq_btn, pq_btn, mq_btn, sq_btn];


let hideAndSeek = (btn, showElement, hideElements) => {
    btn.addEventListener('click', () => {

        showElement.style.display = "block";

        hideElements.forEach(element => {
            element.style.display = "none";
        });

        allButtons.forEach(button => button.classList.remove('active'));
        btn.classList.add('active');
    });
}

hideAndSeek(bq_btn, browseQuestions, [postQuestions, myQuestions, savedQuestions]);
hideAndSeek(pq_btn, postQuestions, [browseQuestions, myQuestions, savedQuestions]);
hideAndSeek(mq_btn, myQuestions, [postQuestions, browseQuestions, savedQuestions]);
hideAndSeek(sq_btn, savedQuestions, [postQuestions, browseQuestions, myQuestions]);