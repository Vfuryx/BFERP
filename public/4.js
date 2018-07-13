webpackJsonp([4],{

/***/ 578:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(875)
}
var normalizeComponent = __webpack_require__(2)
/* script */
var __vue_script__ = __webpack_require__(877)
/* template */
var __vue_template__ = __webpack_require__(878)
/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = injectStyle
/* scopeId */
var __vue_scopeId__ = "data-v-dc63952e"
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
Component.options.__file = "resources\\assets\\js\\components\\test.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-loader/node_modules/vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-dc63952e", Component.options)
  } else {
    hotAPI.reload("data-v-dc63952e", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 580:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return downloadTemplate; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_axios__ = __webpack_require__(13);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_axios___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0_axios__);

// 下载模板
var downloadTemplate = function downloadTemplate(scheduleType) {
  __WEBPACK_IMPORTED_MODULE_0_axios___default.a.get('/rest/schedule/template', {
    params: {
      "scheduleType": scheduleType
    },
    responseType: 'arraybuffer'
  }).then(function (response) {
    //创建一个blob对象,file的一种
    var blob = new Blob([response.data], { type: 'application/x-xls' });
    var link = document.createElement('a');
    link.href = window.URL.createObjectURL(blob);
    link.download = fileNames[scheduleType] + '_' + response.headers.datestr + '.xls';
    link.click();
  });
};

/***/ }),

/***/ 875:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(876);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(6)("385b3067", content, false, {});
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../../../node_modules/_css-loader@0.28.11@css-loader/index.js!../../../../node_modules/_vue-loader@13.7.2@vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-dc63952e\",\"scoped\":true,\"hasInlineConfig\":true}!../../../../node_modules/_vue-loader@13.7.2@vue-loader/lib/selector.js?type=styles&index=0!./test.vue", function() {
     var newContent = require("!!../../../../node_modules/_css-loader@0.28.11@css-loader/index.js!../../../../node_modules/_vue-loader@13.7.2@vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-dc63952e\",\"scoped\":true,\"hasInlineConfig\":true}!../../../../node_modules/_vue-loader@13.7.2@vue-loader/lib/selector.js?type=styles&index=0!./test.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 876:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(4)(false);
// imports


// module
exports.push([module.i, "\n.hide-dialog[data-v-dc63952e]{\n    display:none;\n}\n", ""]);

// exports


/***/ }),

/***/ 877:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__api_schedule_js__ = __webpack_require__(580);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
      tableData3: [{
        date: "2016-05-03",
        name: "王小虎",
        address: "上海市普陀区金沙江路 1518 弄"
      }, {
        date: "2016-05-02",
        name: "王小虎",
        address: "上海市普陀区金沙江路 1518 弄"
      }, {
        date: "2016-05-04",
        name: "王小虎",
        address: "上海市普陀区金沙江路 1518 弄"
      }, {
        date: "2016-05-01",
        name: "王小虎",
        address: "上海市普陀区金沙江路 1518 弄"
      }, {
        date: "2016-05-08",
        name: "王小虎",
        address: "上海市普陀区金沙江路 1518 弄"
      }, {
        date: "2016-05-06",
        name: "王小虎",
        address: "上海市普陀区金沙江路 1518 弄"
      }, {
        date: "2016-05-07",
        name: "王小虎",
        address: "上海市普陀区金沙江路 1518 弄"
      }],
      multipleSelection: [],
      importUrl: 'www.baidu.com', //后台接口config.admin_url+'rest/schedule/import/'
      importHeaders: {
        enctype: 'multipart/form-data',
        cityCode: ''
      },
      name: 'import',
      fileList: [],
      withCredentials: true,
      processing: false,
      uploadTip: '点击上传',
      importFlag: 1,
      dialogImportVisible: false,
      errorResults: []
    };
  },

  methods: {
    toggleSelection: function toggleSelection(rows) {
      var _this = this;

      if (rows) {
        rows.forEach(function (row) {
          _this.$refs.multipleTable.toggleRowSelection(row);
        });
      } else {
        this.$refs.multipleTable.clearSelection();
      }
    },
    handleSelectionChange: function handleSelectionChange(val) {
      //复选框选择回填函数,val返回一整行的数据
      this.multipleSelection = val;
    },
    importData: function importData() {
      this.importFlag = 1;
      this.fileList = [];
      this.uploadTip = '点击上传';
      this.processing = false;
      this.dialogImportVisible = true;
    },
    outportData: function outportData() {
      __WEBPACK_IMPORTED_MODULE_0__api_schedule_js__["a" /* downloadTemplate */]();
    },
    handlePreview: function handlePreview(file) {
      //可以通过 file.response 拿到服务端返回数据
    },
    handleRemove: function handleRemove(file, fileList) {
      //文件移除
    },
    beforeUpload: function beforeUpload(file) {
      //上传前配置
      this.importHeaders.cityCode = '上海'; //可以配置请求头
      var excelfileExtend = ".xls,.xlsx"; //设置文件格式
      var fileExtend = file.name.substring(file.name.lastIndexOf('.')).toLowerCase();
      if (excelfileExtend.indexOf(fileExtend) <= -1) {
        this.$message.error('文件格式错误');
        return false;
      }
      this.uploadTip = '正在处理中...';
      this.processing = true;
    },

    //上传错误
    uploadFail: function uploadFail(err, file, fileList) {
      this.uploadTip = '点击上传';
      this.processing = false;
      this.$message.error(err);
    },

    //上传成功
    uploadSuccess: function uploadSuccess(response, file, fileList) {
      this.uploadTip = '点击上传';
      this.processing = false;
      if (response.status === -1) {
        this.errorResults = response.data;
        if (this.errorResults) {
          this.importFlag = 2;
        } else {
          this.dialogImportVisible = false;
          this.$message.error(response.errorMsg);
        }
      } else {
        this.importFlag = 3;
        this.dialogImportVisible = false;
        this.$message.info('导入成功');
        this.doSearch();
      }
    },

    //下载模板
    download: function download() {
      //调用后台模板方法,和导出类似
      __WEBPACK_IMPORTED_MODULE_0__api_schedule_js__["a" /* downloadTemplate */]();
    }
  }
});

/***/ }),

/***/ 878:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    [
      _c(
        "p",
        [
          _c(
            "el-table",
            {
              ref: "multipleTable",
              staticStyle: { width: "80%" },
              attrs: {
                data: _vm.tableData3,
                "tooltip-effect": "dark",
                border: ""
              },
              on: { "selection-change": _vm.handleSelectionChange }
            },
            [
              _c("el-table-column", {
                attrs: { type: "selection", width: "55" }
              }),
              _vm._v(" "),
              _c("el-table-column", {
                attrs: { label: "日期", width: "120" },
                scopedSlots: _vm._u([
                  {
                    key: "default",
                    fn: function(scope) {
                      return [_vm._v(_vm._s(scope.row.date))]
                    }
                  }
                ])
              }),
              _vm._v(" "),
              _c("el-table-column", {
                attrs: { prop: "name", label: "姓名", width: "120" }
              }),
              _vm._v(" "),
              _c("el-table-column", {
                attrs: {
                  prop: "address",
                  label: "地址",
                  "show-overflow-tooltip": ""
                }
              })
            ],
            1
          )
        ],
        1
      ),
      _c(
        "p",
        { staticStyle: { "margin-top": "20px" } },
        [
          _c(
            "el-button",
            {
              on: {
                click: function($event) {
                  _vm.toggleSelection([_vm.tableData3[1], _vm.tableData3[2]])
                }
              }
            },
            [_vm._v("切换第二、第三行的选中状态")]
          ),
          _vm._v(" "),
          _c(
            "el-button",
            {
              on: {
                click: function($event) {
                  _vm.toggleSelection()
                }
              }
            },
            [_vm._v("取消选择")]
          ),
          _vm._v(" "),
          _c(
            "el-button",
            { attrs: { type: "primary" }, on: { click: _vm.importData } },
            [_vm._v("导入")]
          ),
          _vm._v(" "),
          _c(
            "el-button",
            { attrs: { type: "primary" }, on: { click: _vm.outportData } },
            [_vm._v("导出")]
          )
        ],
        1
      ),
      _vm._v(" "),
      _c(
        "el-dialog",
        {
          staticClass: "dialog-import",
          attrs: {
            title: "导入",
            visible: _vm.dialogImportVisible,
            "modal-append-to-body": false,
            "close-on-click-modal": false
          },
          on: {
            "update:visible": function($event) {
              _vm.dialogImportVisible = $event
            }
          }
        },
        [
          _c(
            "p",
            {
              class: {
                "import-content": _vm.importFlag === 1,
                "hide-dialog": _vm.importFlag !== 1
              }
            },
            [
              _c("el-upload", {
                staticClass: "upload-demo",
                attrs: {
                  action: _vm.importUrl,
                  name: _vm.name,
                  headers: _vm.importHeaders,
                  "on-preview": _vm.handlePreview,
                  "on-remove": _vm.handleRemove,
                  "before-upload": _vm.beforeUpload,
                  "on-error": _vm.uploadFail,
                  "on-success": _vm.uploadSuccess,
                  "file-list": _vm.fileList,
                  "with-credentials": _vm.withCredentials
                }
              })
            ],
            1
          ),
          _vm._v(" "),
          _c(
            "el-button",
            {
              attrs: {
                size: "small",
                type: "primary",
                disabled: _vm.processing
              }
            },
            [_vm._v(_vm._s(_vm.uploadTip))]
          ),
          _vm._v(" "),
          _c(
            "p",
            {
              staticClass: "el-uploadtip",
              attrs: { slot: "tip" },
              slot: "tip"
            },
            [_vm._v("只能上传excel文件")]
          ),
          _vm._v(" "),
          _c("p", { staticClass: "download-template" }, [
            _c(
              "a",
              { staticClass: "btn-download", on: { click: _vm.download } },
              [_c("i", { staticClass: "icon-download" }), _vm._v("下载模板")]
            )
          ]),
          _vm._v(" "),
          _c("p", {
            class: {
              "import-failure": _vm.importFlag === 2,
              "hide-dialog": _vm.importFlag !== 2
            }
          }),
          _vm._v(" "),
          _c("p", { staticClass: "failure-tips" }, [
            _c("i", { staticClass: "el-icon-warning" }),
            _vm._v("导入失败")
          ]),
          _vm._v(" "),
          _c("p", { staticClass: "failure-reason" }),
          _c("h4", [_vm._v("失败原因")]),
          _vm._v(" "),
          _c(
            "ul",
            _vm._l(_vm.errorResults, function(error, index) {
              return _c("li", { key: index }, [
                _vm._v(
                  "第" +
                    _vm._s(error.rowIdx + 1) +
                    "行，错误：" +
                    _vm._s(error.column) +
                    "," +
                    _vm._s(error.value) +
                    "," +
                    _vm._s(error.errorInfo)
                )
              ])
            })
          )
        ],
        1
      ),
      _vm._v(" "),
      _c("h2", [_vm._v(_vm._s(this.$store.state.SonData.reports))]),
      _vm._v(" "),
      _c("h2", [_vm._v(_vm._s(this.$store.state.SonData.freights))])
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
    require("vue-loader/node_modules/vue-hot-reload-api")      .rerender("data-v-dc63952e", module.exports)
  }
}

/***/ })

});