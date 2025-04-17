/*
 * NAVIGATION IN - OUT
 */
let navbarLinks = document.getElementsByClassName("navbar-links")[0];
document.getElementsByClassName("toggle-button")[0].onclick = function () {
  if (navbarLinks.style.display == "none" || navbarLinks.style.display == "") {
    navbarLinks.style.display = "flex";
  } else {
    navbarLinks.style.display = "none";
  }
};

/**
 * SideBar toggleDropDown
 * @param e = event
 */

const toggleDropDown = (e) => {
  console.log(e.currentTarget.toggle);
  if (
    e.currentTarget.toggle === false ||
    e.currentTarget.toggle === undefined
  ) {
    e.currentTarget.toggle = true;
    e.currentTarget.nextElementSibling.classList.add("show");
    e.currentTarget.children[1].classList.add("arrow-change");
  } else {
    e.currentTarget.toggle = false;
    e.currentTarget.nextElementSibling.classList.remove("show");
    e.currentTarget.children[1].classList.remove("arrow-change");
  }
};
