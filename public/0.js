(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[0],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/layouts/DefaultLayout.vue?vue&type=script&lang=js&":
/*!*********************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/layouts/DefaultLayout.vue?vue&type=script&lang=js& ***!
  \*********************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _SideBar_vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./SideBar.vue */ "./resources/js/layouts/SideBar.vue");

/* harmony default export */ __webpack_exports__["default"] = ({
  components: {
    SideBar: _SideBar_vue__WEBPACK_IMPORTED_MODULE_0__["default"]
  },
  name: "default",
  data: function data() {
    return {
      openSideBar: true
    };
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/layouts/SideBar.vue?vue&type=script&lang=js&":
/*!***************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/layouts/SideBar.vue?vue&type=script&lang=js& ***!
  \***************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = ({
  name: "SideBar",
  data: function data() {
    return {
      openSideBar: true
    };
  },
  created: function created() {
    console.log(432423);
  },
  methods: {
    handleSideBar: function handleSideBar() {
      this.openSideBar = !this.openSideBar;
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/layouts/DefaultLayout.vue?vue&type=template&id=3ae3ccd2&":
/*!*******************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib/loaders/templateLoader.js??ref--6!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/layouts/DefaultLayout.vue?vue&type=template&id=3ae3ccd2& ***!
  \*******************************************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function render() {
  var _vm = this,
    _c = _vm._self._c;
  return _c("div", [_c("div", {
    staticClass: "container"
  }, [_c("SideBar"), _vm._v(" "), _c("div", {
    staticClass: "wrapper"
  }, [_c("transition", {
    attrs: {
      name: "fade"
    }
  }, [_c("router-view")], 1)], 1)], 1)]);
};
var staticRenderFns = [];
render._withStripped = true;


/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/layouts/SideBar.vue?vue&type=template&id=6222caf0&":
/*!*************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib/loaders/templateLoader.js??ref--6!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/layouts/SideBar.vue?vue&type=template&id=6222caf0& ***!
  \*************************************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function render() {
  var _vm = this,
    _c = _vm._self._c;
  return _c("div", {
    "class": {
      sidebar: true,
      open: _vm.openSideBar
    }
  }, [_c("div", {
    staticClass: "logo-details"
  }, [_c("i", {
    staticClass: "bx bxl-c-plus-plus icon"
  }), _vm._v(" "), _c("div", {
    staticClass: "logo_name"
  }, [_vm._v("CodingLab")]), _vm._v(" "), _c("i", {
    staticClass: "bx bx-menu",
    attrs: {
      id: "btn"
    },
    on: {
      click: function click($event) {
        return _vm.handleSideBar();
      }
    }
  })]), _vm._v(" "), _c("ul", {
    staticClass: "nav-list"
  }, [_c("li", [_c("i", {
    staticClass: "bx bx-search",
    on: {
      click: function click($event) {
        return _vm.handleSideBar();
      }
    }
  }), _vm._v(" "), _c("input", {
    attrs: {
      type: "text",
      placeholder: "Search..."
    }
  }), _vm._v(" "), _c("span", {
    staticClass: "tooltip"
  }, [_vm._v("Search")])]), _vm._v(" "), _vm._m(0), _vm._v(" "), _vm._m(1), _vm._v(" "), _vm._m(2), _vm._v(" "), _vm._m(3), _vm._v(" "), _vm._m(4), _vm._v(" "), _vm._m(5), _vm._v(" "), _vm._m(6), _vm._v(" "), _vm._m(7), _vm._v(" "), _vm._m(8)])]);
};
var staticRenderFns = [function () {
  var _vm = this,
    _c = _vm._self._c;
  return _c("li", [_c("a", {
    attrs: {
      href: "#"
    }
  }, [_c("i", {
    staticClass: "bx bx-grid-alt"
  }), _vm._v(" "), _c("span", {
    staticClass: "links_name"
  }, [_vm._v("Dashboard")])]), _vm._v(" "), _c("span", {
    staticClass: "tooltip"
  }, [_vm._v("Dashboard")])]);
}, function () {
  var _vm = this,
    _c = _vm._self._c;
  return _c("li", [_c("a", {
    attrs: {
      href: "#"
    }
  }, [_c("i", {
    staticClass: "bx bx-user"
  }), _vm._v(" "), _c("span", {
    staticClass: "links_name"
  }, [_vm._v("User")])]), _vm._v(" "), _c("span", {
    staticClass: "tooltip"
  }, [_vm._v("User")])]);
}, function () {
  var _vm = this,
    _c = _vm._self._c;
  return _c("li", [_c("a", {
    attrs: {
      href: "#"
    }
  }, [_c("i", {
    staticClass: "bx bx-chat"
  }), _vm._v(" "), _c("span", {
    staticClass: "links_name"
  }, [_vm._v("Messages")])]), _vm._v(" "), _c("span", {
    staticClass: "tooltip"
  }, [_vm._v("Messages")])]);
}, function () {
  var _vm = this,
    _c = _vm._self._c;
  return _c("li", [_c("a", {
    attrs: {
      href: "#"
    }
  }, [_c("i", {
    staticClass: "bx bx-pie-chart-alt-2"
  }), _vm._v(" "), _c("span", {
    staticClass: "links_name"
  }, [_vm._v("Analytics")])]), _vm._v(" "), _c("span", {
    staticClass: "tooltip"
  }, [_vm._v("Analytics")])]);
}, function () {
  var _vm = this,
    _c = _vm._self._c;
  return _c("li", [_c("a", {
    attrs: {
      href: "#"
    }
  }, [_c("i", {
    staticClass: "bx bx-folder"
  }), _vm._v(" "), _c("span", {
    staticClass: "links_name"
  }, [_vm._v("File Manager")])]), _vm._v(" "), _c("span", {
    staticClass: "tooltip"
  }, [_vm._v("Files")])]);
}, function () {
  var _vm = this,
    _c = _vm._self._c;
  return _c("li", [_c("a", {
    attrs: {
      href: "#"
    }
  }, [_c("i", {
    staticClass: "bx bx-cart-alt"
  }), _vm._v(" "), _c("span", {
    staticClass: "links_name"
  }, [_vm._v("Order")])]), _vm._v(" "), _c("span", {
    staticClass: "tooltip"
  }, [_vm._v("Order")])]);
}, function () {
  var _vm = this,
    _c = _vm._self._c;
  return _c("li", [_c("a", {
    attrs: {
      href: "#"
    }
  }, [_c("i", {
    staticClass: "bx bx-heart"
  }), _vm._v(" "), _c("span", {
    staticClass: "links_name"
  }, [_vm._v("Saved")])]), _vm._v(" "), _c("span", {
    staticClass: "tooltip"
  }, [_vm._v("Saved")])]);
}, function () {
  var _vm = this,
    _c = _vm._self._c;
  return _c("li", [_c("a", {
    attrs: {
      href: "#"
    }
  }, [_c("i", {
    staticClass: "bx bx-cog"
  }), _vm._v(" "), _c("span", {
    staticClass: "links_name"
  }, [_vm._v("Setting")])]), _vm._v(" "), _c("span", {
    staticClass: "tooltip"
  }, [_vm._v("Setting")])]);
}, function () {
  var _vm = this,
    _c = _vm._self._c;
  return _c("li", {
    staticClass: "profile"
  }, [_c("div", {
    staticClass: "profile-details"
  }, [_c("div", {
    staticClass: "name_job"
  }, [_c("div", {
    staticClass: "name"
  }, [_vm._v("Prem Shahi")]), _vm._v(" "), _c("div", {
    staticClass: "job"
  }, [_vm._v("Web designer")])])]), _vm._v(" "), _c("i", {
    staticClass: "bx bx-log-out",
    attrs: {
      id: "log_out"
    }
  })]);
}];
render._withStripped = true;


/***/ }),

/***/ "./resources/js/layouts/DefaultLayout.vue":
/*!************************************************!*\
  !*** ./resources/js/layouts/DefaultLayout.vue ***!
  \************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _DefaultLayout_vue_vue_type_template_id_3ae3ccd2___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./DefaultLayout.vue?vue&type=template&id=3ae3ccd2& */ "./resources/js/layouts/DefaultLayout.vue?vue&type=template&id=3ae3ccd2&");
/* harmony import */ var _DefaultLayout_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./DefaultLayout.vue?vue&type=script&lang=js& */ "./resources/js/layouts/DefaultLayout.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _DefaultLayout_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _DefaultLayout_vue_vue_type_template_id_3ae3ccd2___WEBPACK_IMPORTED_MODULE_0__["render"],
  _DefaultLayout_vue_vue_type_template_id_3ae3ccd2___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/layouts/DefaultLayout.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/layouts/DefaultLayout.vue?vue&type=script&lang=js&":
/*!*************************************************************************!*\
  !*** ./resources/js/layouts/DefaultLayout.vue?vue&type=script&lang=js& ***!
  \*************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_DefaultLayout_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib??vue-loader-options!./DefaultLayout.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/layouts/DefaultLayout.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_DefaultLayout_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/layouts/DefaultLayout.vue?vue&type=template&id=3ae3ccd2&":
/*!*******************************************************************************!*\
  !*** ./resources/js/layouts/DefaultLayout.vue?vue&type=template&id=3ae3ccd2& ***!
  \*******************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_loaders_templateLoader_js_ref_6_node_modules_vue_loader_lib_index_js_vue_loader_options_DefaultLayout_vue_vue_type_template_id_3ae3ccd2___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??ref--6!../../../node_modules/vue-loader/lib??vue-loader-options!./DefaultLayout.vue?vue&type=template&id=3ae3ccd2& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/layouts/DefaultLayout.vue?vue&type=template&id=3ae3ccd2&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_loaders_templateLoader_js_ref_6_node_modules_vue_loader_lib_index_js_vue_loader_options_DefaultLayout_vue_vue_type_template_id_3ae3ccd2___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_loaders_templateLoader_js_ref_6_node_modules_vue_loader_lib_index_js_vue_loader_options_DefaultLayout_vue_vue_type_template_id_3ae3ccd2___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/layouts/SideBar.vue":
/*!******************************************!*\
  !*** ./resources/js/layouts/SideBar.vue ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _SideBar_vue_vue_type_template_id_6222caf0___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./SideBar.vue?vue&type=template&id=6222caf0& */ "./resources/js/layouts/SideBar.vue?vue&type=template&id=6222caf0&");
/* harmony import */ var _SideBar_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./SideBar.vue?vue&type=script&lang=js& */ "./resources/js/layouts/SideBar.vue?vue&type=script&lang=js&");
/* harmony reexport (unknown) */ for(var __WEBPACK_IMPORT_KEY__ in _SideBar_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__) if(["default"].indexOf(__WEBPACK_IMPORT_KEY__) < 0) (function(key) { __webpack_require__.d(__webpack_exports__, key, function() { return _SideBar_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__[key]; }) }(__WEBPACK_IMPORT_KEY__));
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _SideBar_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _SideBar_vue_vue_type_template_id_6222caf0___WEBPACK_IMPORTED_MODULE_0__["render"],
  _SideBar_vue_vue_type_template_id_6222caf0___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/layouts/SideBar.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/layouts/SideBar.vue?vue&type=script&lang=js&":
/*!*******************************************************************!*\
  !*** ./resources/js/layouts/SideBar.vue?vue&type=script&lang=js& ***!
  \*******************************************************************/
/*! no static exports found */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_SideBar_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib??vue-loader-options!./SideBar.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/layouts/SideBar.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_SideBar_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/layouts/SideBar.vue?vue&type=template&id=6222caf0&":
/*!*************************************************************************!*\
  !*** ./resources/js/layouts/SideBar.vue?vue&type=template&id=6222caf0& ***!
  \*************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_loaders_templateLoader_js_ref_6_node_modules_vue_loader_lib_index_js_vue_loader_options_SideBar_vue_vue_type_template_id_6222caf0___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??ref--6!../../../node_modules/vue-loader/lib??vue-loader-options!./SideBar.vue?vue&type=template&id=6222caf0& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/layouts/SideBar.vue?vue&type=template&id=6222caf0&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_loaders_templateLoader_js_ref_6_node_modules_vue_loader_lib_index_js_vue_loader_options_SideBar_vue_vue_type_template_id_6222caf0___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_loaders_templateLoader_js_ref_6_node_modules_vue_loader_lib_index_js_vue_loader_options_SideBar_vue_vue_type_template_id_6222caf0___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);