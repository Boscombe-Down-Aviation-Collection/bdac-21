// BDAC scripts.js

/* Import Modules */
import Search from "./modules/Search"

/* Instantiate Classes */
const liveSearch = new Search()

// Header Background Scroll
window.addEventListener("scroll", () => {
  const navBar = document.querySelector(".navbar")
  const scrollHeight = window.pageYOffset
  const navHeight = navBar.getBoundingClientRect().height

  function scrollDown() {
    navBar.classList.add("navbar-scrolled", "bdac-shadow-small")
  }
  function scrollUp() {
    navBar.classList.remove("navbar-scrolled", "bdac-shadow-small")
  }

  scrollHeight > navHeight * 3 ? scrollDown() : scrollUp()
})
