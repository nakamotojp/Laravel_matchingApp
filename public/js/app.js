/*
 * ATTENTION: An "eval-source-map" devtool has been used.
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file with attached SourceMaps in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/***/ (() => {

eval("// チャット\n$(function () {\n  $(\"#send\").on(\"click\", function () {\n    $.ajaxSetup({\n      headers: {\n        'X-CSRF-TOKEN': $('meta[name=\"csrf-token\"]').attr('content')\n      }\n    });\n    $.ajax({\n      type: 'post',\n      url: '/chat',\n      dataType: 'json',\n      data: {\n        'to_user_id': $(\"#to_user_id\").val(),\n        'message': $(\"#message\").val()\n      },\n      headers: {\n        'X-CSRF-TOKEN': $('meta[name=\"csrf-token\"]').attr('content')\n      }\n    }).done(function (data) {\n      console.log('success');\n      var html = '';\n      $.each(data, function (index, value) {\n        var id = value.from_user_id;\n        var chat = value.chat;\n        html = \"\\n                <div class=\\\"message d-flex flex-row-reverse align-items-start mb-4\\\">\\n\\n                    <!-- .message-icon -->\\n                        <p class=\\\"message-text p-2 me-2 mb-0 bg-info\\\" style=\\\"border-radius:24px;\\\">\\n                            \".concat(chat, \"\\n                        </p><!-- .message-text -->\\n                </div>\\n\\n                                \");\n      });\n      $('.chat').append(html);\n      $('.chat').scrollTop($(\".chat\")[0].scrollHeight);\n      $(\"#message\").val(\"\");\n\n      if (data.length === 0) {\n        $('#message').after('<p>**start chat!!**</p>');\n      }\n    }).fail(function (msg) {\n      console.log('Ajax Err');\n    });\n  });\n}); // モーダル\n\n$(function () {\n  var open = $('#openSetting'),\n      close = $('#closeSetting'),\n      container = $('.modal-container');\n  open.on('click', function () {\n    container.addClass('active');\n    return false;\n  });\n  close.on('click', function () {\n    container.removeClass('active');\n  });\n  $(document).on('click', function (e) {\n    if (!$(e.target).closest('.modal-body').length) {\n      container.removeClass('active');\n    }\n  });\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvYXBwLmpzP2NlZDYiXSwibmFtZXMiOlsiJCIsIm9uIiwiYWpheFNldHVwIiwiaGVhZGVycyIsImF0dHIiLCJhamF4IiwidHlwZSIsInVybCIsImRhdGFUeXBlIiwiZGF0YSIsInZhbCIsImRvbmUiLCJjb25zb2xlIiwibG9nIiwiaHRtbCIsImVhY2giLCJpbmRleCIsInZhbHVlIiwiaWQiLCJmcm9tX3VzZXJfaWQiLCJjaGF0IiwiYXBwZW5kIiwic2Nyb2xsVG9wIiwic2Nyb2xsSGVpZ2h0IiwibGVuZ3RoIiwiYWZ0ZXIiLCJmYWlsIiwibXNnIiwib3BlbiIsImNsb3NlIiwiY29udGFpbmVyIiwiYWRkQ2xhc3MiLCJyZW1vdmVDbGFzcyIsImRvY3VtZW50IiwiZSIsInRhcmdldCIsImNsb3Nlc3QiXSwibWFwcGluZ3MiOiJBQUNBO0FBQ0FBLENBQUMsQ0FBQyxZQUFXO0FBRVRBLEVBQUFBLENBQUMsQ0FBQyxPQUFELENBQUQsQ0FBV0MsRUFBWCxDQUFjLE9BQWQsRUFBdUIsWUFBWTtBQUUvQkQsSUFBQUEsQ0FBQyxDQUFDRSxTQUFGLENBQVk7QUFDUkMsTUFBQUEsT0FBTyxFQUFFO0FBQ0wsd0JBQWdCSCxDQUFDLENBQUMseUJBQUQsQ0FBRCxDQUE2QkksSUFBN0IsQ0FBa0MsU0FBbEM7QUFEWDtBQURELEtBQVo7QUFNQUosSUFBQUEsQ0FBQyxDQUFDSyxJQUFGLENBQU87QUFDSEMsTUFBQUEsSUFBSSxFQUFFLE1BREg7QUFFSEMsTUFBQUEsR0FBRyxFQUFFLE9BRkY7QUFHSEMsTUFBQUEsUUFBUSxFQUFFLE1BSFA7QUFJSEMsTUFBQUEsSUFBSSxFQUFFO0FBQ0Ysc0JBQWVULENBQUMsQ0FBQyxhQUFELENBQUQsQ0FBaUJVLEdBQWpCLEVBRGI7QUFFRixtQkFBWVYsQ0FBQyxDQUFDLFVBQUQsQ0FBRCxDQUFjVSxHQUFkO0FBRlYsT0FKSDtBQVFIUCxNQUFBQSxPQUFPLEVBQUU7QUFDTCx3QkFBZ0JILENBQUMsQ0FBQyx5QkFBRCxDQUFELENBQTZCSSxJQUE3QixDQUFrQyxTQUFsQztBQURYO0FBUk4sS0FBUCxFQVlHTyxJQVpILENBWVEsVUFBVUYsSUFBVixFQUFnQjtBQUNwQkcsTUFBQUEsT0FBTyxDQUFDQyxHQUFSLENBQVksU0FBWjtBQUNBLFVBQUlDLElBQUksR0FBRyxFQUFYO0FBRUFkLE1BQUFBLENBQUMsQ0FBQ2UsSUFBRixDQUFPTixJQUFQLEVBQWEsVUFBVU8sS0FBVixFQUFpQkMsS0FBakIsRUFBd0I7QUFFakMsWUFBSUMsRUFBRSxHQUFHRCxLQUFLLENBQUNFLFlBQWY7QUFDQSxZQUFJQyxJQUFJLEdBQUdILEtBQUssQ0FBQ0csSUFBakI7QUFFQU4sUUFBQUEsSUFBSSx5UkFLVU0sSUFMVixxSEFBSjtBQVVhLE9BZmpCO0FBZ0JBcEIsTUFBQUEsQ0FBQyxDQUFDLE9BQUQsQ0FBRCxDQUFXcUIsTUFBWCxDQUFrQlAsSUFBbEI7QUFDQWQsTUFBQUEsQ0FBQyxDQUFDLE9BQUQsQ0FBRCxDQUFXc0IsU0FBWCxDQUFzQnRCLENBQUMsQ0FBQyxPQUFELENBQUQsQ0FBVyxDQUFYLEVBQWN1QixZQUFwQztBQUNBdkIsTUFBQUEsQ0FBQyxDQUFDLFVBQUQsQ0FBRCxDQUFjVSxHQUFkLENBQWtCLEVBQWxCOztBQUVBLFVBQUlELElBQUksQ0FBQ2UsTUFBTCxLQUFnQixDQUFwQixFQUF1QjtBQUNuQnhCLFFBQUFBLENBQUMsQ0FBQyxVQUFELENBQUQsQ0FBY3lCLEtBQWQsQ0FBb0IseUJBQXBCO0FBQ0g7QUFFSixLQXhDRCxFQXdDR0MsSUF4Q0gsQ0F3Q1EsVUFBU0MsR0FBVCxFQUFjO0FBQ2xCZixNQUFBQSxPQUFPLENBQUNDLEdBQVIsQ0FBWSxVQUFaO0FBQ0gsS0ExQ0Q7QUEyQ0wsR0FuREM7QUFvREgsQ0F0REEsQ0FBRCxDLENBd0RBOztBQUNBYixDQUFDLENBQUMsWUFBVTtBQUVYLE1BQUk0QixJQUFJLEdBQUc1QixDQUFDLENBQUMsY0FBRCxDQUFaO0FBQUEsTUFDQzZCLEtBQUssR0FBRzdCLENBQUMsQ0FBQyxlQUFELENBRFY7QUFBQSxNQUVDOEIsU0FBUyxHQUFHOUIsQ0FBQyxDQUFDLGtCQUFELENBRmQ7QUFJQTRCLEVBQUFBLElBQUksQ0FBQzNCLEVBQUwsQ0FBUSxPQUFSLEVBQWdCLFlBQVU7QUFDekI2QixJQUFBQSxTQUFTLENBQUNDLFFBQVYsQ0FBbUIsUUFBbkI7QUFDQSxXQUFPLEtBQVA7QUFDQSxHQUhEO0FBS0FGLEVBQUFBLEtBQUssQ0FBQzVCLEVBQU4sQ0FBUyxPQUFULEVBQWlCLFlBQVU7QUFDMUI2QixJQUFBQSxTQUFTLENBQUNFLFdBQVYsQ0FBc0IsUUFBdEI7QUFDQSxHQUZEO0FBSUFoQyxFQUFBQSxDQUFDLENBQUNpQyxRQUFELENBQUQsQ0FBWWhDLEVBQVosQ0FBZSxPQUFmLEVBQXVCLFVBQVNpQyxDQUFULEVBQVk7QUFDbEMsUUFBRyxDQUFDbEMsQ0FBQyxDQUFDa0MsQ0FBQyxDQUFDQyxNQUFILENBQUQsQ0FBWUMsT0FBWixDQUFvQixhQUFwQixFQUFtQ1osTUFBdkMsRUFBK0M7QUFDOUNNLE1BQUFBLFNBQVMsQ0FBQ0UsV0FBVixDQUFzQixRQUF0QjtBQUNBO0FBQ0QsR0FKRDtBQUtBLENBcEJBLENBQUQiLCJzb3VyY2VzQ29udGVudCI6WyJcbi8vIOODgeODo+ODg+ODiFxuJChmdW5jdGlvbigpIHtcblxuICAgICQoXCIjc2VuZFwiKS5vbihcImNsaWNrXCIsIGZ1bmN0aW9uICgpIHtcblxuICAgICAgICAkLmFqYXhTZXR1cCh7XG4gICAgICAgICAgICBoZWFkZXJzOiB7XG4gICAgICAgICAgICAgICAgJ1gtQ1NSRi1UT0tFTic6ICQoJ21ldGFbbmFtZT1cImNzcmYtdG9rZW5cIl0nKS5hdHRyKCdjb250ZW50JylcbiAgICAgICAgICAgIH1cbiAgICAgICAgfSk7XG5cbiAgICAgICAgJC5hamF4KHtcbiAgICAgICAgICAgIHR5cGU6ICdwb3N0JyxcbiAgICAgICAgICAgIHVybDogJy9jaGF0JyxcbiAgICAgICAgICAgIGRhdGFUeXBlOiAnanNvbicsXG4gICAgICAgICAgICBkYXRhOiB7XG4gICAgICAgICAgICAgICAgJ3RvX3VzZXJfaWQnIDogJChcIiN0b191c2VyX2lkXCIpLnZhbCgpLFxuICAgICAgICAgICAgICAgICdtZXNzYWdlJyA6ICQoXCIjbWVzc2FnZVwiKS52YWwoKVxuICAgICAgICAgICAgfSxcbiAgICAgICAgICAgIGhlYWRlcnM6IHtcbiAgICAgICAgICAgICAgICAnWC1DU1JGLVRPS0VOJzogJCgnbWV0YVtuYW1lPVwiY3NyZi10b2tlblwiXScpLmF0dHIoJ2NvbnRlbnQnKVxuICAgICAgICAgICAgfSxcblxuICAgICAgICB9KS5kb25lKGZ1bmN0aW9uIChkYXRhKSB7XG4gICAgICAgICAgICBjb25zb2xlLmxvZygnc3VjY2VzcycpO1xuICAgICAgICAgICAgbGV0IGh0bWwgPSAnJztcblxuICAgICAgICAgICAgJC5lYWNoKGRhdGEsIGZ1bmN0aW9uIChpbmRleCwgdmFsdWUpIHtcblxuICAgICAgICAgICAgICAgIGxldCBpZCA9IHZhbHVlLmZyb21fdXNlcl9pZDtcbiAgICAgICAgICAgICAgICBsZXQgY2hhdCA9IHZhbHVlLmNoYXQ7XG5cbiAgICAgICAgICAgICAgICBodG1sID0gYFxuICAgICAgICAgICAgICAgIDxkaXYgY2xhc3M9XCJtZXNzYWdlIGQtZmxleCBmbGV4LXJvdy1yZXZlcnNlIGFsaWduLWl0ZW1zLXN0YXJ0IG1iLTRcIj5cblxuICAgICAgICAgICAgICAgICAgICA8IS0tIC5tZXNzYWdlLWljb24gLS0+XG4gICAgICAgICAgICAgICAgICAgICAgICA8cCBjbGFzcz1cIm1lc3NhZ2UtdGV4dCBwLTIgbWUtMiBtYi0wIGJnLWluZm9cIiBzdHlsZT1cImJvcmRlci1yYWRpdXM6MjRweDtcIj5cbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAke2NoYXR9XG4gICAgICAgICAgICAgICAgICAgICAgICA8L3A+PCEtLSAubWVzc2FnZS10ZXh0IC0tPlxuICAgICAgICAgICAgICAgIDwvZGl2PlxuXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIGBcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICB9KTtcbiAgICAgICAgICAgICQoJy5jaGF0JykuYXBwZW5kKGh0bWwpO1xuICAgICAgICAgICAgJCgnLmNoYXQnKS5zY3JvbGxUb3AoICQoXCIuY2hhdFwiKVswXS5zY3JvbGxIZWlnaHQgKTtcbiAgICAgICAgICAgICQoXCIjbWVzc2FnZVwiKS52YWwoXCJcIik7XG5cbiAgICAgICAgICAgIGlmIChkYXRhLmxlbmd0aCA9PT0gMCkge1xuICAgICAgICAgICAgICAgICQoJyNtZXNzYWdlJykuYWZ0ZXIoJzxwPioqc3RhcnQgY2hhdCEhKio8L3A+Jyk7XG4gICAgICAgICAgICB9XG5cbiAgICAgICAgfSkuZmFpbChmdW5jdGlvbihtc2cpIHtcbiAgICAgICAgICAgIGNvbnNvbGUubG9nKCdBamF4IEVycicpO1xuICAgICAgICB9KTtcbiAgfSk7XG59KTtcblxuLy8g44Oi44O844OA44OrXG4kKGZ1bmN0aW9uKCl7XG5cblx0dmFyIG9wZW4gPSAkKCcjb3BlblNldHRpbmcnKSxcblx0XHRjbG9zZSA9ICQoJyNjbG9zZVNldHRpbmcnKSxcblx0XHRjb250YWluZXIgPSAkKCcubW9kYWwtY29udGFpbmVyJyk7XG5cblx0b3Blbi5vbignY2xpY2snLGZ1bmN0aW9uKCl7XG5cdFx0Y29udGFpbmVyLmFkZENsYXNzKCdhY3RpdmUnKTtcblx0XHRyZXR1cm4gZmFsc2U7XG5cdH0pO1xuXG5cdGNsb3NlLm9uKCdjbGljaycsZnVuY3Rpb24oKXtcblx0XHRjb250YWluZXIucmVtb3ZlQ2xhc3MoJ2FjdGl2ZScpO1xuXHR9KTtcblxuXHQkKGRvY3VtZW50KS5vbignY2xpY2snLGZ1bmN0aW9uKGUpIHtcblx0XHRpZighJChlLnRhcmdldCkuY2xvc2VzdCgnLm1vZGFsLWJvZHknKS5sZW5ndGgpIHtcblx0XHRcdGNvbnRhaW5lci5yZW1vdmVDbGFzcygnYWN0aXZlJyk7XG5cdFx0fVxuXHR9KTtcbn0pO1xuIl0sImZpbGUiOiIuL3Jlc291cmNlcy9qcy9hcHAuanMuanMiLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./resources/js/app.js\n");

/***/ }),

/***/ "./resources/sass/app.scss":
/*!*********************************!*\
  !*** ./resources/sass/app.scss ***!
  \*********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n// extracted by mini-css-extract-plugin\n//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvc2Fzcy9hcHAuc2Nzcy5qcyIsIm1hcHBpbmdzIjoiO0FBQUEiLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvc2Fzcy9hcHAuc2Nzcz9hODBiIl0sInNvdXJjZXNDb250ZW50IjpbIi8vIGV4dHJhY3RlZCBieSBtaW5pLWNzcy1leHRyYWN0LXBsdWdpblxuZXhwb3J0IHt9OyJdLCJuYW1lcyI6W10sInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///./resources/sass/app.scss\n");

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
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/chunk loaded */
/******/ 	(() => {
/******/ 		var deferred = [];
/******/ 		__webpack_require__.O = (result, chunkIds, fn, priority) => {
/******/ 			if(chunkIds) {
/******/ 				priority = priority || 0;
/******/ 				for(var i = deferred.length; i > 0 && deferred[i - 1][2] > priority; i--) deferred[i] = deferred[i - 1];
/******/ 				deferred[i] = [chunkIds, fn, priority];
/******/ 				return;
/******/ 			}
/******/ 			var notFulfilled = Infinity;
/******/ 			for (var i = 0; i < deferred.length; i++) {
/******/ 				var [chunkIds, fn, priority] = deferred[i];
/******/ 				var fulfilled = true;
/******/ 				for (var j = 0; j < chunkIds.length; j++) {
/******/ 					if ((priority & 1 === 0 || notFulfilled >= priority) && Object.keys(__webpack_require__.O).every((key) => (__webpack_require__.O[key](chunkIds[j])))) {
/******/ 						chunkIds.splice(j--, 1);
/******/ 					} else {
/******/ 						fulfilled = false;
/******/ 						if(priority < notFulfilled) notFulfilled = priority;
/******/ 					}
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferred.splice(i--, 1)
/******/ 					var r = fn();
/******/ 					if (r !== undefined) result = r;
/******/ 				}
/******/ 			}
/******/ 			return result;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
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
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	(() => {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"/js/app": 0,
/******/ 			"css/app": 0
/******/ 		};
/******/ 		
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		__webpack_require__.O.j = (chunkId) => (installedChunks[chunkId] === 0);
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = (parentChunkLoadingFunction, data) => {
/******/ 			var [chunkIds, moreModules, runtime] = data;
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0;
/******/ 			if(chunkIds.some((id) => (installedChunks[id] !== 0))) {
/******/ 				for(moduleId in moreModules) {
/******/ 					if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 						__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 					}
/******/ 				}
/******/ 				if(runtime) var result = runtime(__webpack_require__);
/******/ 			}
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					installedChunks[chunkId][0]();
/******/ 				}
/******/ 				installedChunks[chunkId] = 0;
/******/ 			}
/******/ 			return __webpack_require__.O(result);
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = self["webpackChunk"] = self["webpackChunk"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	__webpack_require__.O(undefined, ["css/app"], () => (__webpack_require__("./resources/js/app.js")))
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["css/app"], () => (__webpack_require__("./resources/sass/app.scss")))
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;