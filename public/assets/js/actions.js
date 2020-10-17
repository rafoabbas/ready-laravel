/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/actions.js":
/*!*********************************!*\
  !*** ./resources/js/actions.js ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function ($) {
  'use strict';

  $(function () {
    $('[data-toggle="click-number"]').on('click', function () {
      var number = $(this).attr('data-number');
      var phone_number = $("#phone_number_input");
      console.log(number);
      phone_number.val(phone_number.val() + number);
    });
    $('[data-toggle="select2"]').select2();
    $('[data-ajax-sweet="item"]').on('click', function () {
      var _token = $('#csrf-token').attr('content');

      var url = $(this).attr('data-url');
      var method = $(this).attr('data-method'); //
      // Swal.fire({
      //     title: "Are you sure?",
      //     text: "You won't be able to revert this!",
      //     type: "warning",
      //     showCancelButton: !0,
      //     confirmButtonColor: "#3085d6",
      //     cancelButtonColor: "#d33",
      //     confirmButtonText: "Yes, delete it!" }
      //     ).then(
      //     function (t) {
      //         t.value && Swal.fire("Deleted!", "Your file has been deleted.", "success");
      //     }
      // );

      swal.fire({
        title: $(this).attr('data-title'),
        text: $(this).attr('data-message'),
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: $(this).attr('data-yes'),
        cancelButtonText: $(this).attr('data-no'),
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33" // confirmButtonClass: 'btn btn-success',
        // cancelButtonClass: 'btn btn-danger',
        // buttonsStyling: false

      }).then(function (result) {
        if (result.value) {
          $.ajax({
            url: url,
            type: method,
            data: {
              "_token": _token
            },
            success: function success(data) {
              //console.log(data);
              swal.fire({
                text: data.message,
                type: data.icon
              });

              if (data.reload) {
                setTimeout(function () {
                  location.reload();
                }, data.delay);
              }

              if (data.redirect) {
                setTimeout(function () {
                  location.reload();
                  $(location).attr('href', data.redirect);
                }, data.delay);
              }
            }
          });
        }
      });
    });
    $('[data-toggle="pagination"]').change('click', function () {
      var selected = $(this).children("option:selected").val();
      var pathname = $(location).attr('pathname');
      var params = new URLSearchParams(document.location.search.substring(1));
      params.set('limit', selected);
      $(location).attr('href', pathname + '?' + params.toString());
    });
  });
})(jQuery);

/***/ }),

/***/ 0:
/*!***************************************!*\
  !*** multi ./resources/js/actions.js ***!
  \***************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /var/www/call.pro/resources/js/actions.js */"./resources/js/actions.js");


/***/ })

/******/ });