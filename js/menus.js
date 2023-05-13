const menus = {
    
    init : function() {
        const menuIcon = document.querySelector(".menu");
        menuIcon.addEventListener("click", this.handleMainMenu);

        const loginIcon = document.querySelector(".header-register__icon");
        loginIcon.addEventListener("click", this.handleLoginMenu);
    },

    handleMainMenu : function() {
        const scrollingMenu = document.querySelector("#menu-nav");
        
        scrollingMenu.classList.toggle("menu-nav");
        scrollingMenu.classList.toggle("menu-nav--on");
    },

    handleLoginMenu : function() {
        const scrollingMenu = document.querySelector("#header-register");
        
        scrollingMenu.classList.toggle("header-register");
        scrollingMenu.classList.toggle("header-register--on");
    }
}