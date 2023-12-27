const toggleMenu = () => {
  const navigation = document.querySelector(".navigation");

  const burgerMenu = document.querySelector(".menu-icon");
  const src = burgerMenu.getAttribute("src");

  const isBurger = src === "assets/img/icons/burger-menu-yellow.svg";
  const iconName = isBurger ? "assets/img/icons/close-yellow.svg" : "assets/img/icons/burger-menu-yellow.svg";

  burgerMenu.setAttribute("src", iconName);

  if (!isBurger) {
    navigation.classList.add("navigation--fadeout");
    setTimeout(() => {
      navigation.classList.toggle("navigation--open");
    }, 300);
  } else {
    navigation.classList.remove("navigation--fadeout");
    navigation.classList.toggle("navigation--open");
  }
};

