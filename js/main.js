const dark = document.querySelector(".btn-theme");
const moon = document.querySelector(".fa-moon");
var theme = "";
dark.onclick = function(){
    this.classList.toggle("dark-theme");
    moon.classList.remove("fa-moon");
    moon.classList.toggle("fa-sun");
    theme = "dark";
    if(!this.classList.contains("dark-theme")){
        moon.classList.remove("fa-sun");
    moon.classList.toggle("fa-moon");
    theme = "light";
    }
    
    Save(theme);//TT в доработке
}