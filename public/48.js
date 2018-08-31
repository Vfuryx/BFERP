webpackJsonp([48],{

/***/ 495:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(2)
/* script */
var __vue_script__ = __webpack_require__(616)
/* template */
var __vue_template__ = __webpack_require__(617)
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
Component.options.__file = "resources\\assets\\js\\components\\index.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-loader/node_modules/vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-7e6399ea", Component.options)
  } else {
    hotAPI.reload("data-v-7e6399ea", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 616:
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
      tableData: [{
        date: '2016-05-02',
        name: '王小虎',
        address: '上海市普陀区金沙江路 1518 弄'
      }, {
        date: '2016-05-04',
        name: '王小虎',
        address: '上海市普陀区金沙江路 1517 弄'
      }, {
        date: '2016-05-01',
        name: '王小虎',
        address: '上海市普陀区金沙江路 1519 弄'
      }, {
        date: '2016-05-03',
        name: '王小虎',
        address: '上海市普陀区金沙江路 1516 弄'
      }],
      data: [{}, { color: '1', length: '100', is_comb: 1 }, { color: '2', length: '200', is_comb: 1 }, { color: '3', length: '40', is_comb: 0 }, { color: '4', length: '40', is_comb: 0 }],
      tableHead: [{
        label: '组合',
        prop: 'is_comb',
        type: 'checkbox'
      }, {
        label: '颜色',
        prop: 'color'
      }, {
        label: '长度',
        prop: 'length'
      }],
      chg: false,
      doSelect: false,
      tt: '0'

    };
  },

  methods: {
    rowName: function rowName(_ref) {
      var row = _ref.row,
          rowIndex = _ref.rowIndex;
      row.index = rowIndex;
    },
    rowClick: function rowClick(row) {
      // console.log(row);
      if (row.is_comb == 1) {
        row.index;
      }
      /*点击新一行时重置*/
      // this.chg = false;
      if (this.chg) {
        // alert(1);
        Object.assign(this.$data.data[row.index], row);
      }
    },
    valChg: function valChg(val) {
      // console.log(index);
      // console.log(val);
      // this.chg = true;
      console.log(val);
    },
    selectComb: function selectComb() {
      var _this = this;

      /*如果是确定*/
      if (this.doSelect) {
        this.data.map(function (item, index) {
          if (item.is_comb == 0) {
            _this.data.splice(index, 1);
          }
        });
      } else {
        Object.assign(this.$data.data, this.$options.data().data);
      }
    },
    curChg: function curChg(currentRow, oldCurrentRow) {
      console.log(currentRow);
      console.log(oldCurrentRow);
    },
    updateCount: function updateCount() {}
  },
  mounted: function mounted() {}
});

/***/ }),

/***/ 617:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    [
      _c("el-checkbox", {
        attrs: { checked: _vm.tt == 1 ? true : false, disabled: "" }
      }),
      _vm._v(" "),
      _c(
        "el-table",
        {
          attrs: { data: _vm.data, "row-class-name": _vm.rowName },
          on: { "row-click": _vm.rowClick, "current-change": _vm.curChg }
        },
        _vm._l(_vm.tableHead, function(item, index) {
          return _c("el-table-column", {
            key: index,
            attrs: { label: item.label, align: "center", width: item.width },
            scopedSlots: _vm._u([
              {
                key: "default",
                fn: function(scope) {
                  return [
                    item.type == "checkbox"
                      ? _c("span", [
                          scope.$index == 0
                            ? _c(
                                "span",
                                [
                                  _c("el-checkbox", {
                                    on: { change: _vm.selectComb },
                                    model: {
                                      value: _vm.doSelect,
                                      callback: function($$v) {
                                        _vm.doSelect = $$v
                                      },
                                      expression: "doSelect"
                                    }
                                  })
                                ],
                                1
                              )
                            : _c("span", [
                                scope.row.is_comb == 1
                                  ? _c(
                                      "span",
                                      [
                                        _c(
                                          "el-checkbox",
                                          {
                                            attrs: {
                                              checked: true,
                                              disabled: ""
                                            }
                                          },
                                          [_vm._v(_vm._s(scope.row.is_comb))]
                                        )
                                      ],
                                      1
                                    )
                                  : _c(
                                      "span",
                                      [
                                        _c(
                                          "el-checkbox",
                                          {
                                            attrs: {
                                              checked: false,
                                              disabled: ""
                                            }
                                          },
                                          [_vm._v(_vm._s(scope.row.is_comb))]
                                        )
                                      ],
                                      1
                                    )
                              ])
                        ])
                      : _c(
                          "span",
                          [
                            _c("el-input", {
                              attrs: {
                                size: "small",
                                placeholder: item.holder
                              },
                              on: { change: _vm.valChg },
                              model: {
                                value: scope.row[item.prop],
                                callback: function($$v) {
                                  _vm.$set(scope.row, item.prop, $$v)
                                },
                                expression: "scope.row[item.prop]"
                              }
                            })
                          ],
                          1
                        )
                  ]
                }
              }
            ])
          })
        })
      )
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-loader/node_modules/vue-hot-reload-api")      .rerender("data-v-7e6399ea", module.exports)
  }
}

/***/ })

});