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


document.addEventListener('DOMContentLoaded', function () {
    // Save question AJAX
    document.querySelectorAll('.save-question').forEach(button => {
        button.addEventListener('click', function () {
            const questionId = this.getAttribute('data-question-id');

            fetch('../PHP/savedQuestions.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: new URLSearchParams({ question_id: questionId })
            })
            .then(response => response.json())
            .then(data => {
                showPopup(data.message);
            })
            .catch(error => {
                console.error('Error:', error);
                showPopup('An error occurred while saving the question.');
            });
        });
    });

    // Modal handling
    const modal = document.getElementById('popup-modal');
    const closeModal = document.getElementById('close-modal');
    const modalMessage = document.getElementById('modal-message');

    function showPopup(message) {
        modalMessage.textContent = message;
        modal.style.display = 'flex';
    }

    closeModal.addEventListener('click', () => {
        modal.style.display = 'none';
    });

    window.addEventListener('click', (event) => {
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    });
});
