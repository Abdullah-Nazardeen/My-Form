let welcomeBtn = document.querySelector(".welcomeEl");
let submitBtn = document.querySelector(".submitEl");
let backBlur = document.querySelector(".Main");
let popUp = document.querySelector(".Message");


// submitBtn.addEventListener("click", function() {
//     backBlur.classList.add("active");
//     popUp.classList.remove("active");
// })

welcomeBtn.addEventListener("click", function() {
    backBlur.classList.add("active");
    popUp.classList.remove("active");
})

