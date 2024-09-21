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

let eyeIcon = document.getElementsByTagName("ion-icon");
let passwordVisibility = (hide, show, ele) => {
  let pwd = document.getElementById(`${ele}`);
  eyeIcon[hide].style.display = "none";
  eyeIcon[show].style.display = "block";

  eyeIcon[hide].addEventListener("click", () => {
    pwd.type = "password";
    eyeIcon[hide].style.display = "none";
    eyeIcon[show].style.display = "block";
  });

  eyeIcon[show].addEventListener("click", () => {
    pwd.type = "text";
    eyeIcon[hide].style.display = "block";
    eyeIcon[show].style.display = "none";
  });
};
passwordVisibility(2, 3, "pwdSignup");
passwordVisibility(5, 6, "pwdLogin");

