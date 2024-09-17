let toLogin = document.getElementById("toLogin");
let toSignup = document.getElementById("toSignup");
let coverCard = document.getElementsByClassName("cover-card"); // Target only one cover card

toLogin.addEventListener("click", () => {
  coverCard[0].style.transform = "rotateY(180deg)"; 
  coverCard[1].style.transform = "rotateY(180deg)";
});

toSignup.addEventListener("click", () => {
  coverCard[0].style.transform = "rotateY(0deg)";
  coverCard[1].style.transform = "rotateY(0deg)";
});
