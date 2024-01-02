const toggleMenu = () => {
  const navigation = document.querySelector(".navigation");
  const burgerMenu = document.querySelector(".menu-icon");
  const src = burgerMenu.getAttribute("src");

  const isBurger = src === "assets/img/icons/burger-menu-yellow.svg";
  const iconName = isBurger ? "assets/img/icons/close-yellow.svg" : "assets/img/icons/burger-menu-yellow.svg";

  burgerMenu.setAttribute("src", iconName);

  if (!isBurger) {
    navigation.classList.remove("navigation--fadeout");
    setTimeout(() => {
      navigation.classList.toggle("navigation--open");
    }, 300);
  } else {
    navigation.classList.remove("navigation--fadeout");
    navigation.classList.toggle("navigation--open");
  }
};

const closeMenu = () => {
  const navigation = document.querySelector(".navigation");
  navigation.classList.remove("navigation--open");
};

// Adiciona o ouvinte de eventos aos links dentro do menu para fechar o menu ao ser clicado
const links = document.querySelectorAll('.navigation a');
links.forEach(link => {
  link.addEventListener('click', closeMenu);
});