/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./assets/scss/bootstrap.scss":
/*!************************************!*\
  !*** ./assets/scss/bootstrap.scss ***!
  \************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./assets/scss/style.scss":
/*!********************************!*\
  !*** ./assets/scss/style.scss ***!
  \********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be isolated against other modules in the chunk.
(() => {
/*!**************************!*\
  !*** ./assets/js/app.js ***!
  \**************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _scss_bootstrap_scss__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../scss/bootstrap.scss */ "./assets/scss/bootstrap.scss");
/* harmony import */ var _scss_style_scss__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../scss/style.scss */ "./assets/scss/style.scss");



  $(window).on('load',function(){
        $('#loader').fadeOut(500, function(){ $('#loader').remove(); } );
    });
 $(".navbar-toggler").on("click", function() {
    $(".menu").addClass("active");
	 $(".header").addClass("active");
	 $(".header").css("z-index","-1");
	 $(".super_container_inner").addClass("active");
  $(".overlay").fadeIn("slow")

})
$(".super_overlay").on("click", function() {
    $(".menu").removeClass("active");
	 $(".header").removeClass("active");
	 $(".header").css("z-index","100");
	 $(".super_container_inner").removeClass("active");
     $(".overlay").fadeIn("slow")

})
$(".header.active.header_overlay").on("click", function() {
    $(".menu").removeClass("active");
	 $(".header").removeClass("active");
	 $(".super_container_inner").removeClass("active");
     $(".overlay").fadeIn("slow")

})
$(".overlay").on("click", function() {

  $(this).fadeOut();
  $(".navbar-collapse").removeClass("in").addClass("collapse")
})

$(document).ready(function() {
  //carousel options
  $('#quote-carousel').carousel({
    pause: true, interval: 10000,
  });
});
})();

/******/ })()
;
//# sourceMappingURL=app.js.map