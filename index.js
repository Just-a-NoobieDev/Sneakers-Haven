/* COLLECTION */
const optionMenu = document.querySelector(".Menu"),
  Menubtn = optionMenu.querySelector(".Menubtn"),
  List = optionMenu.querySelectorAll(".Content"),
  Collection = optionMenu.querySelector(".Collection");

Menubtn.addEventListener("click", () => optionMenu.classList.toggle("active"));

List.forEach((Content) => {
  Content.addEventListener("click", () => {
    let selectedOption = Content.querySelector(".option").innerText;
    Collection.innerText = selectedOption;

    optionMenu.classList.remove("active");
  });
});


/* ALL SHOES */
const optionMenu2 = document.querySelector(".Menu2"),
  Menubtn2 = optionMenu2.querySelector(".Menubtn2"),
  List2 = optionMenu2.querySelectorAll(".Content2"),
  Collection2 = optionMenu2.querySelector(".Collection2");

Menubtn2.addEventListener("click", () =>
  optionMenu2.classList.toggle("active")
);

List2.forEach((Content2) => {
  Content2.addEventListener("click", () => {
    let selectedOption = Content2.querySelector(".option2").innerText;
    Collection2.innerText = selectedOption;

    optionMenu2.classList.remove("active");
  });
});


/* SIZES */
const optionMenu3 = document.querySelector(".Menu3"),
  Menubtn3 = optionMenu3.querySelector(".Menubtn3"),
  List3 = optionMenu3.querySelectorAll(".Content3"),
  Collection3 = optionMenu3.querySelector(".Collection3");

Menubtn3.addEventListener("click", () =>
  optionMenu3.classList.toggle("active")
);

List3.forEach((Content3) => {
  Content3.addEventListener("click", () => {
    let selectedOption = Content3.querySelector(".option3").innerText;
    Collection3.innerText = selectedOption;

    optionMenu3.classList.remove("active");
  });
});


/* HEART */
var image = document.getElementById("Heart");

function changeImage(){
  if(image.getAttribute('src') == "heart.png"){
    image.src = "RHeart.png";
  } else {
    image.src = "heart.png";
  }
}

var image2 = document.getElementById("Heart2");

function changeImage2(){
  if(image2.getAttribute('src') == "heart.png"){
    image2.src = "RHeart.png";
  } else {
    image2.src = "heart.png";
  }
}

var image3 = document.getElementById("Heart3");

function changeImage3(){
  if(image3.getAttribute('src') == "heart.png"){
    image3.src = "RHeart.png";
  } else {
    image3.src = "heart.png";
  }
}

var image4 = document.getElementById("Heart4");

function changeImage4(){
  if(image4.getAttribute('src') == "heart.png"){
    image4.src = "RHeart.png";
  } else {
    image4.src = "heart.png";
  }
}

var image5 = document.getElementById("Heart5");

function changeImage5(){
  if(image5.getAttribute('src') == "heart.png"){
    image5.src = "RHeart.png";
  } else {
    image5.src = "heart.png";
  }
}

var image6 = document.getElementById("Heart6");

function changeImage6(){
  if(image6.getAttribute('src') == "heart.png"){
    image6.src = "RHeart.png";
  } else {
    image6.src = "heart.png";
  }
}

var image7 = document.getElementById("Heart7");

function changeImage7(){
  if(image7.getAttribute('src') == "heart.png"){
    image7.src = "RHeart.png";
  } else {
    image7.src = "heart.png";
  }
}

var image8 = document.getElementById("Heart8");

function changeImage8(){
  if(image8.getAttribute('src') == "heart.png"){
    image8.src = "RHeart.png";
  } else {
    image8.src = "heart.png";
  }
}

var image9 = document.getElementById("Heart9");

function changeImage9(){
  if(image9.getAttribute('src') == "heart.png"){
    image9.src = "RHeart.png";
  } else {
    image9.src = "heart.png";
  }
}

