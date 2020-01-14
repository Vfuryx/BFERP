webpackJsonp([139],{

/***/ 449:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(592)
}
var normalizeComponent = __webpack_require__(2)
/* script */
var __vue_script__ = __webpack_require__(594)
/* template */
var __vue_template__ = __webpack_require__(597)
/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = injectStyle
/* scopeId */
var __vue_scopeId__ = "data-v-bd33ef4a"
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
Component.options.__file = "resources\\assets\\js\\views\\404.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-loader/node_modules/vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-bd33ef4a", Component.options)
  } else {
    hotAPI.reload("data-v-bd33ef4a", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 592:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(593);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(6)("7fe720e5", content, false, {});
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../../../node_modules/_css-loader@0.28.11@css-loader/index.js!../../../../node_modules/_vue-loader@13.7.2@vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-bd33ef4a\",\"scoped\":true,\"hasInlineConfig\":true}!../../../../node_modules/_sass-loader@6.0.7@sass-loader/lib/loader.js!../../../../node_modules/_vue-loader@13.7.2@vue-loader/lib/selector.js?type=styles&index=0!./404.vue", function() {
     var newContent = require("!!../../../../node_modules/_css-loader@0.28.11@css-loader/index.js!../../../../node_modules/_vue-loader@13.7.2@vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-bd33ef4a\",\"scoped\":true,\"hasInlineConfig\":true}!../../../../node_modules/_sass-loader@6.0.7@sass-loader/lib/loader.js!../../../../node_modules/_vue-loader@13.7.2@vue-loader/lib/selector.js?type=styles&index=0!./404.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 593:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(4)(false);
// imports


// module
exports.push([module.i, "\n.wscn-http404[data-v-bd33ef4a] {\n  position: relative;\n  width: 1200px;\n  margin: 20px auto 60px;\n  padding: 0 100px;\n  overflow: hidden;\n}\n.wscn-http404 .pic-404[data-v-bd33ef4a] {\n    position: relative;\n    float: left;\n    width: 600px;\n    padding: 150px 0;\n    overflow: hidden;\n}\n.wscn-http404 .pic-404__parent[data-v-bd33ef4a] {\n      width: 100%;\n}\n.wscn-http404 .pic-404__child[data-v-bd33ef4a] {\n      position: absolute;\n}\n.wscn-http404 .pic-404__child.left[data-v-bd33ef4a] {\n        width: 80px;\n        top: 17px;\n        left: 220px;\n        opacity: 0;\n        -webkit-animation-name: cloudLeft-data-v-bd33ef4a;\n                animation-name: cloudLeft-data-v-bd33ef4a;\n        -webkit-animation-duration: 2s;\n                animation-duration: 2s;\n        -webkit-animation-timing-function: linear;\n                animation-timing-function: linear;\n        -webkit-animation-fill-mode: forwards;\n                animation-fill-mode: forwards;\n        -webkit-animation-delay: 1s;\n                animation-delay: 1s;\n}\n.wscn-http404 .pic-404__child.mid[data-v-bd33ef4a] {\n        width: 46px;\n        top: 10px;\n        left: 420px;\n        opacity: 0;\n        -webkit-animation-name: cloudMid-data-v-bd33ef4a;\n                animation-name: cloudMid-data-v-bd33ef4a;\n        -webkit-animation-duration: 2s;\n                animation-duration: 2s;\n        -webkit-animation-timing-function: linear;\n                animation-timing-function: linear;\n        -webkit-animation-fill-mode: forwards;\n                animation-fill-mode: forwards;\n        -webkit-animation-delay: 1.2s;\n                animation-delay: 1.2s;\n}\n.wscn-http404 .pic-404__child.right[data-v-bd33ef4a] {\n        width: 62px;\n        top: 100px;\n        left: 500px;\n        opacity: 0;\n        -webkit-animation-name: cloudRight-data-v-bd33ef4a;\n                animation-name: cloudRight-data-v-bd33ef4a;\n        -webkit-animation-duration: 2s;\n                animation-duration: 2s;\n        -webkit-animation-timing-function: linear;\n                animation-timing-function: linear;\n        -webkit-animation-fill-mode: forwards;\n                animation-fill-mode: forwards;\n        -webkit-animation-delay: 1s;\n                animation-delay: 1s;\n}\n@-webkit-keyframes cloudLeft-data-v-bd33ef4a {\n0% {\n    top: 17px;\n    left: 220px;\n    opacity: 0;\n}\n20% {\n    top: 33px;\n    left: 188px;\n    opacity: 1;\n}\n80% {\n    top: 81px;\n    left: 92px;\n    opacity: 1;\n}\n100% {\n    top: 97px;\n    left: 60px;\n    opacity: 0;\n}\n}\n@keyframes cloudLeft-data-v-bd33ef4a {\n0% {\n    top: 17px;\n    left: 220px;\n    opacity: 0;\n}\n20% {\n    top: 33px;\n    left: 188px;\n    opacity: 1;\n}\n80% {\n    top: 81px;\n    left: 92px;\n    opacity: 1;\n}\n100% {\n    top: 97px;\n    left: 60px;\n    opacity: 0;\n}\n}\n@-webkit-keyframes cloudMid-data-v-bd33ef4a {\n0% {\n    top: 10px;\n    left: 420px;\n    opacity: 0;\n}\n20% {\n    top: 40px;\n    left: 360px;\n    opacity: 1;\n}\n70% {\n    top: 130px;\n    left: 180px;\n    opacity: 1;\n}\n100% {\n    top: 160px;\n    left: 120px;\n    opacity: 0;\n}\n}\n@keyframes cloudMid-data-v-bd33ef4a {\n0% {\n    top: 10px;\n    left: 420px;\n    opacity: 0;\n}\n20% {\n    top: 40px;\n    left: 360px;\n    opacity: 1;\n}\n70% {\n    top: 130px;\n    left: 180px;\n    opacity: 1;\n}\n100% {\n    top: 160px;\n    left: 120px;\n    opacity: 0;\n}\n}\n@-webkit-keyframes cloudRight-data-v-bd33ef4a {\n0% {\n    top: 100px;\n    left: 500px;\n    opacity: 0;\n}\n20% {\n    top: 120px;\n    left: 460px;\n    opacity: 1;\n}\n80% {\n    top: 180px;\n    left: 340px;\n    opacity: 1;\n}\n100% {\n    top: 200px;\n    left: 300px;\n    opacity: 0;\n}\n}\n@keyframes cloudRight-data-v-bd33ef4a {\n0% {\n    top: 100px;\n    left: 500px;\n    opacity: 0;\n}\n20% {\n    top: 120px;\n    left: 460px;\n    opacity: 1;\n}\n80% {\n    top: 180px;\n    left: 340px;\n    opacity: 1;\n}\n100% {\n    top: 200px;\n    left: 300px;\n    opacity: 0;\n}\n}\n.wscn-http404 .bullshit[data-v-bd33ef4a] {\n    position: relative;\n    float: left;\n    width: 300px;\n    padding: 150px 0;\n    overflow: hidden;\n}\n.wscn-http404 .bullshit__oops[data-v-bd33ef4a] {\n      font-size: 32px;\n      font-weight: bold;\n      line-height: 40px;\n      color: #1482f0;\n      opacity: 0;\n      margin-bottom: 20px;\n      -webkit-animation-name: slideUp-data-v-bd33ef4a;\n              animation-name: slideUp-data-v-bd33ef4a;\n      -webkit-animation-duration: 0.5s;\n              animation-duration: 0.5s;\n      -webkit-animation-fill-mode: forwards;\n              animation-fill-mode: forwards;\n}\n.wscn-http404 .bullshit__headline[data-v-bd33ef4a] {\n      font-size: 20px;\n      line-height: 24px;\n      color: #1482f0;\n      opacity: 0;\n      margin-bottom: 10px;\n      -webkit-animation-name: slideUp-data-v-bd33ef4a;\n              animation-name: slideUp-data-v-bd33ef4a;\n      -webkit-animation-duration: 0.5s;\n              animation-duration: 0.5s;\n      -webkit-animation-delay: 0.1s;\n              animation-delay: 0.1s;\n      -webkit-animation-fill-mode: forwards;\n              animation-fill-mode: forwards;\n}\n.wscn-http404 .bullshit__info[data-v-bd33ef4a] {\n      font-size: 13px;\n      line-height: 21px;\n      color: grey;\n      opacity: 0;\n      margin-bottom: 30px;\n      -webkit-animation-name: slideUp-data-v-bd33ef4a;\n              animation-name: slideUp-data-v-bd33ef4a;\n      -webkit-animation-duration: 0.5s;\n              animation-duration: 0.5s;\n      -webkit-animation-delay: 0.2s;\n              animation-delay: 0.2s;\n      -webkit-animation-fill-mode: forwards;\n              animation-fill-mode: forwards;\n}\n.wscn-http404 .bullshit__return-home[data-v-bd33ef4a] {\n      display: block;\n      float: left;\n      width: 110px;\n      height: 36px;\n      background: #1482f0;\n      border-radius: 100px;\n      text-align: center;\n      color: #ffffff;\n      opacity: 0;\n      font-size: 14px;\n      line-height: 36px;\n      cursor: pointer;\n      -webkit-animation-name: slideUp-data-v-bd33ef4a;\n              animation-name: slideUp-data-v-bd33ef4a;\n      -webkit-animation-duration: 0.5s;\n              animation-duration: 0.5s;\n      -webkit-animation-delay: 0.3s;\n              animation-delay: 0.3s;\n      -webkit-animation-fill-mode: forwards;\n              animation-fill-mode: forwards;\n}\n@-webkit-keyframes slideUp-data-v-bd33ef4a {\n0% {\n    -webkit-transform: translateY(60px);\n            transform: translateY(60px);\n    opacity: 0;\n}\n100% {\n    -webkit-transform: translateY(0);\n            transform: translateY(0);\n    opacity: 1;\n}\n}\n@keyframes slideUp-data-v-bd33ef4a {\n0% {\n    -webkit-transform: translateY(60px);\n            transform: translateY(60px);\n    opacity: 0;\n}\n100% {\n    -webkit-transform: translateY(0);\n            transform: translateY(0);\n    opacity: 1;\n}\n}\n", ""]);

// exports


/***/ }),

/***/ 594:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__img_404_images_404_png__ = __webpack_require__(595);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__img_404_images_404_png___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0__img_404_images_404_png__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__img_404_images_404_cloud_png__ = __webpack_require__(596);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__img_404_images_404_cloud_png___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_1__img_404_images_404_cloud_png__);
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
      img_404: __WEBPACK_IMPORTED_MODULE_0__img_404_images_404_png___default.a,
      img_404_cloud: __WEBPACK_IMPORTED_MODULE_1__img_404_images_404_cloud_png___default.a
    };
  },

  computed: {
    message: function message() {
      return '特朗普说这个页面你不能进......';
    }
  }
});

/***/ }),

/***/ 595:
/***/ (function(module, exports) {

module.exports = "/images/404.png?6faed4267b68e7543e34907416c39b7c";

/***/ }),

/***/ 596:
/***/ (function(module, exports) {

module.exports = "/images/404_cloud.png?d76f30a0b60225f9b8819619ca6ccfab";

/***/ }),

/***/ 597:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    { staticStyle: { background: "#f0f2f5", "margin-top": "-20px" } },
    [
      _c("div", { staticClass: "wscn-http404" }, [
        _c("div", { staticClass: "pic-404" }, [
          _c("img", {
            staticClass: "pic-404__parent",
            attrs: { src: _vm.img_404, alt: "404" }
          }),
          _vm._v(" "),
          _c("img", {
            staticClass: "pic-404__child left",
            attrs: { src: _vm.img_404_cloud, alt: "404" }
          }),
          _vm._v(" "),
          _c("img", {
            staticClass: "pic-404__child mid",
            attrs: { src: _vm.img_404_cloud, alt: "404" }
          }),
          _vm._v(" "),
          _c("img", {
            staticClass: "pic-404__child right",
            attrs: { src: _vm.img_404_cloud, alt: "404" }
          })
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "bullshit" }, [
          _c("div", { staticClass: "bullshit__oops" }, [_vm._v("OOPS!")]),
          _vm._v(" "),
          _vm._m(0),
          _vm._v(" "),
          _c("div", { staticClass: "bullshit__headline" }, [
            _vm._v(_vm._s(_vm.message))
          ]),
          _vm._v(" "),
          _c("div", { staticClass: "bullshit__info" }, [
            _vm._v(
              "请检查您输入的网址是否正确，请点击以下按钮返回主页或者发送错误报告"
            )
          ]),
          _vm._v(" "),
          _c(
            "a",
            { staticClass: "bullshit__return-home", attrs: { href: "/" } },
            [_vm._v("返回首页")]
          )
        ])
      ])
    ]
  )
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "bullshit__info" }, [
      _vm._v("版权所有"),
      _c(
        "a",
        {
          staticClass: "link-type",
          attrs: { href: "https://wallstreetcn.com", target: "_blank" }
        },
        [_vm._v("华尔街见闻")]
      )
    ])
  }
]
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-loader/node_modules/vue-hot-reload-api")      .rerender("data-v-bd33ef4a", module.exports)
  }
}

/***/ })

});