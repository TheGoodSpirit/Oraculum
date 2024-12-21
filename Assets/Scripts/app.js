let toLogin = document.getElementById("toLogin");
let toSignup = document.getElementById("toSignup");
let coverCard = document.getElementsByClassName("cover-card");

toLogin.addEventListener("click", () => {
  coverCard[0].style.transform = "rotateY(180deg)";
  coverCard[1].style.transform = "rotateY(-180deg)";
});

toSignup.addEventListener("click", () => {
  coverCard[0].style.transform = "rotateY(0deg)";
  coverCard[1].style.transform = "rotateY(0deg)";
});

let passwordVisibility = (showIconId, hideIconId, inputId) => {
  let pwd = document.getElementById(inputId);
  let showIcon = document.getElementById(showIconId);
  let hideIcon = document.getElementById(hideIconId);
  showIcon.style.display = "none";
  showIcon.addEventListener("click", () => {
    pwd.type = "password";
    showIcon.style.display = "none";
    hideIcon.style.display = "block"; 
  });
  hideIcon.addEventListener("click", () => {
    pwd.type = "text"; 
    hideIcon.style.display = "none"; 
    showIcon.style.display = "block";
  });
};
passwordVisibility("eyeSignup", "eyeOffSignup", "pwdSignup");
passwordVisibility("eyeLogin", "eyeOffLogin", "pwdLogin");