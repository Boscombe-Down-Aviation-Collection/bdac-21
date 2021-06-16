/*
 * ATTENTION: The "eval" devtool has been used (maybe by default in mode: "development").
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./inc/js/scripts.js":
/*!***************************!*\
  !*** ./inc/js/scripts.js ***!
  \***************************/
/***/ (() => {

eval("// BDAC scripts.js\n\n// Header on scroll\nwindow.addEventListener(\"scroll\", () => {\n  const navBar = document.querySelector(\"#nav\")\n  const scrollHeight = window.pageYOffset\n  const navHeight = navBar.getBoundingClientRect().height\n  scrollDown = () => {\n    navBar.classList.add(\"navbar-scrolled\", \"bdac-shadow-small\")\n  }\n  scrollUp = () => {\n    navBar.classList.remove(\"navbar-scrolled\", \"bdac-shadow-small\")\n  }\n\n  scrollHeight > navHeight ? scrollDown() : scrollUp()\n})\n\n\n//# sourceURL=webpack://bdac-21/./inc/js/scripts.js?");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./inc/js/scripts.js"]();
/******/ 	
/******/ })()
;