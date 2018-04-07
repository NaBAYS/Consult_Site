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
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
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
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 41);
/******/ })
/************************************************************************/
/******/ ({

/***/ 41:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(42);


/***/ }),

/***/ 42:
/***/ (function(module, exports, __webpack_require__) {

Vue.component('file-comments', __webpack_require__(43));

/***/ }),

/***/ 43:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(44)
/* script */
var __vue_script__ = __webpack_require__(45)
/* template */
var __vue_template__ = __webpack_require__(46)
/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = null
/* scopeId */
var __vue_scopeId__ = null
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  __vue_script__,
  __vue_template__,
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)
Component.options.__file = "resources/assets/js/components/file-comments.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-loader/node_modules/vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-cab297c4", Component.options)
  } else {
    hotAPI.reload("data-v-cab297c4", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 44:
/***/ (function(module, exports) {

/* globals __VUE_SSR_CONTEXT__ */

// IMPORTANT: Do NOT use ES2015 features in this file.
// This module is a runtime utility for cleaner component module output and will
// be included in the final webpack user bundle.

module.exports = function normalizeComponent (
  rawScriptExports,
  compiledTemplate,
  functionalTemplate,
  injectStyles,
  scopeId,
  moduleIdentifier /* server only */
) {
  var esModule
  var scriptExports = rawScriptExports = rawScriptExports || {}

  // ES6 modules interop
  var type = typeof rawScriptExports.default
  if (type === 'object' || type === 'function') {
    esModule = rawScriptExports
    scriptExports = rawScriptExports.default
  }

  // Vue.extend constructor export interop
  var options = typeof scriptExports === 'function'
    ? scriptExports.options
    : scriptExports

  // render functions
  if (compiledTemplate) {
    options.render = compiledTemplate.render
    options.staticRenderFns = compiledTemplate.staticRenderFns
    options._compiled = true
  }

  // functional template
  if (functionalTemplate) {
    options.functional = true
  }

  // scopedId
  if (scopeId) {
    options._scopeId = scopeId
  }

  var hook
  if (moduleIdentifier) { // server build
    hook = function (context) {
      // 2.3 injection
      context =
        context || // cached call
        (this.$vnode && this.$vnode.ssrContext) || // stateful
        (this.parent && this.parent.$vnode && this.parent.$vnode.ssrContext) // functional
      // 2.2 with runInNewContext: true
      if (!context && typeof __VUE_SSR_CONTEXT__ !== 'undefined') {
        context = __VUE_SSR_CONTEXT__
      }
      // inject component styles
      if (injectStyles) {
        injectStyles.call(this, context)
      }
      // register component module identifier for async chunk inferrence
      if (context && context._registeredComponents) {
        context._registeredComponents.add(moduleIdentifier)
      }
    }
    // used by ssr in case component is cached and beforeCreate
    // never gets called
    options._ssrRegister = hook
  } else if (injectStyles) {
    hook = injectStyles
  }

  if (hook) {
    var functional = options.functional
    var existing = functional
      ? options.render
      : options.beforeCreate

    if (!functional) {
      // inject component registration as beforeCreate hook
      options.beforeCreate = existing
        ? [].concat(existing, hook)
        : [hook]
    } else {
      // for template-only hot-reload because in that case the render fn doesn't
      // go through the normalizer
      options._injectStyles = hook
      // register for functioal component in vue file
      options.render = function renderWithStyleInjection (h, context) {
        hook.call(context)
        return existing(h, context)
      }
    }
  }

  return {
    esModule: esModule,
    exports: scriptExports,
    options: options
  }
}


/***/ }),

/***/ 45:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ __webpack_exports__["default"] = ({
    data: function data() {
        return {
            comment_id: null
        };
    },
    computed: {
        comments: {
            get: function get() {
                return this.$store.state.comments;
            }
        },
        file: {
            get: function get() {
                return this.$store.state.file;
            }
        }
    },
    methods: {
        leaveComment: function leaveComment(e) {
            var wrapper = $(_.first($(e)).srcElement).closest('.comment-contents'),
                comment = $('#comment-form');

            wrapper.append(comment);
            comment.slideDown();
        },
        cancelComment: function cancelComment(e) {
            var comment = $('#comment-form'),
                commentBtn = $('#leave-comment-btn');
            comment.slideUp();

            if (!commentBtn.is(':visible')) {
                commentBtn.fadeIn();
            }
        },
        newComment: function newComment() {
            openComment($('#new-comment'));
            $('#leave-comment-btn').hide();
        },
        submitComment: function submitComment(e) {
            var commentForm = $('#comment-form'),
                url = commentForm.attr('action'),
                formData = commentForm.serializeArray();

            axios.post(url, {
                'request': formData
            }).then(function (response) {
                console.log(response);
            }).catch(function (error) {
                console.log(error.response.data);
            });
        }
    }

    // Append and open comment form
});function openComment(wrapper) {
    var comment = $('#comment-form');

    wrapper.append(comment);
    comment.hide();
    comment.slideDown();
}

/***/ }),

/***/ 46:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    [
      _vm._l(_vm.comments, function(comment) {
        return _c("div", { staticClass: "comment-wrapper" }, [
          _c("div", { staticClass: "comment-block" }, [
            _c("div", { staticClass: "comment-contents" }, [
              _c("p", [
                _vm._v(
                  "\n                    " +
                    _vm._s(comment.comment) +
                    "\n                "
                )
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "comment-controls" }, [
                _c("div", [
                  _c("strong", [_vm._v(_vm._s(comment.user.user_name))]),
                  _vm._v(
                    " | " +
                      _vm._s(comment.created_at) +
                      "\n                    "
                  )
                ]),
                _vm._v(" "),
                _c(
                  "button",
                  {
                    staticClass: "btn btn-link",
                    attrs: { type: "button" },
                    on: {
                      click: function($event) {
                        _vm.leaveComment($event)
                      }
                    }
                  },
                  [_vm._v("Reply")]
                )
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "vote-block" }, [
                _c(
                  "button",
                  { staticClass: "material-icons", attrs: { type: "button" } },
                  [_vm._v("keyboard_arrow_up")]
                ),
                _vm._v(" "),
                _c("span", { staticClass: "vote-number" }, [
                  _vm._v(_vm._s(comment.votes))
                ]),
                _vm._v(" "),
                _c(
                  "button",
                  { staticClass: "material-icons", attrs: { type: "button" } },
                  [_vm._v("keyboard_arrow_down")]
                )
              ])
            ])
          ])
        ])
      }),
      _vm._v(" "),
      _c("div", { attrs: { id: "new-comment" } }),
      _vm._v(" "),
      _c(
        "button",
        {
          staticClass: "btn btn-primary",
          attrs: { type: "button", id: "leave-comment-btn" },
          on: {
            click: function($event) {
              _vm.newComment()
            }
          }
        },
        [_vm._v("Leave a Comment\n    ")]
      ),
      _vm._v(" "),
      _c(
        "form",
        {
          attrs: {
            action: "/file/" + _vm.file.id,
            method: "POST",
            id: "comment-form"
          },
          on: {
            submit: function($event) {
              $event.preventDefault()
              _vm.submitComment($event)
            }
          }
        },
        [
          _c("fieldset", [
            _c("legend", { staticClass: "sr-only" }, [_vm._v("Comment Form")]),
            _vm._v(" "),
            _vm._m(0),
            _vm._v(" "),
            _c(
              "button",
              { staticClass: "btn btn-primary", attrs: { type: "submit" } },
              [_vm._v("Submit Comment")]
            ),
            _vm._v(" "),
            _c(
              "button",
              {
                staticClass: "btn btn-link",
                attrs: { type: "button" },
                on: {
                  click: function($event) {
                    _vm.cancelComment($event)
                  }
                }
              },
              [_vm._v("Cancel")]
            )
          ])
        ]
      )
    ],
    2
  )
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "form-group" }, [
      _c("label", { staticClass: "sr-only", attrs: { for: "comment" } }, [
        _vm._v("Comment")
      ]),
      _vm._v(" "),
      _c("textarea", {
        staticClass: "form-control",
        attrs: {
          name: "comment",
          id: "comment",
          rows: "10",
          placeholder: "Leave a Comment"
        }
      })
    ])
  }
]
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-loader/node_modules/vue-hot-reload-api")      .rerender("data-v-cab297c4", module.exports)
  }
}

/***/ })

/******/ });