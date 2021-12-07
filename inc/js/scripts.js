// BDAC scripts.js

// Header on scroll
window.addEventListener("scroll", () => {
  const navBar = document.querySelector("#nav")
  const scrollHeight = window.pageYOffset
  const navHeight = navBar.getBoundingClientRect().height
  scrollDown = () => {
    navBar.classList.add("navbar-scrolled", "bdac-shadow-small")
  }
  scrollUp = () => {
    navBar.classList.remove("navbar-scrolled", "bdac-shadow-small")
  }

  scrollHeight > navHeight ? scrollDown() : scrollUp()
})

const appHeight = () => {
  const doc = document.documentElement
  doc.style.setProperty("--app-height", `${window.innerHeight}px`)
}
window.addEventListener("resize", appHeight)
appHeight()

/* Import Modules */
import Search from "./modules/Search"

/* Instantiate Classes */
const liveSearch = new Search()
