<template>
    <div>
        <el-tabs v-model="activeName" @tab-click="handleTabsClick">
            <el-tab-pane label="物流公司" name="0">
                <light-table @handleSelect="handleSelectionChange" :listData="getsInfo[this.activeName]"
                             :tableHead="tableHead[this.activeName]" @editSave="editSave" @handleEdit="handleEdit"
                             @del="del" @dbClick="dbClick" :loading="loading" @edit="edit" :currentIndex="currentIndex"
                             @editCancel="editCancel" :selects="sonArr"
                             :doChange="doChange[this.activeName]" id="outTable" ref="table"></light-table>
            </el-tab-pane>
            <el-tab-pane label="物流城市" name="1">
                <light-table @handleSelect="handleSelectionChange" :listData="getsInfo[this.activeName]"
                             :tableHead="tableHead[this.activeName]" @editSave="editSave" @handleEdit="handleEdit"
                             @del="del" :loading="loading" :currentIndex="currentIndex" @edit="edit"
                             @editCancel="editCancel" :doChange="doChange[this.activeName]"></light-table>
            </el-tab-pane>
            <el-tab-pane label="损坏商品" name="2">
                <light-table @handleSelect="handleSelectionChange" :listData="getsInfo[this.activeName]"
                             :tableHead="tableHead[this.activeName]" @editSave="editSave" @handleEdit="handleEdit"
                             @del="del" :loading="loading" :currentIndex="currentIndex" @edit="edit"
                             @editCancel="editCancel" :doChange="doChange[this.activeName]"></light-table>
            </el-tab-pane>
         <!--   <el-tab-pane label="报表格式" name="3">
                <light-table @handleSelect="handleSelectionChange" :listData="getsInfo[this.activeName]"
                             :tableHead="tableHead[this.activeName]" @editSave="editSave" @handleEdit="handleEdit"
                             @del="del" :loading="loading" :currentIndex="currentIndex" @edit="edit"
                             @editCancel="editCancel" :doChange="doChange[this.activeName]"></light-table>
            </el-tab-pane>-->
        </el-tabs>
        <!--新增-->
        <add-new :visible-add="showMaskArr[this.activeName].show" :title="title[this.activeName]"
                 :rule-form="ruleForm[this.activeName]" :rules="rules[this.activeName]" :add-arr="addArr[activeName]"
                 :url="url[activeName]" @submitEvent="submitForm" :new-ref="refArr[activeName]" @CB-dialog="CB_dialog"
                 :halfForm="halfForm[activeName].show" :selects="sonArr"></add-new>
        <!--修改-->
        <add-new :visible-add="editMask[this.activeName].show" :title="editTitle[activeName]" :rules="rules[activeName]"
                 :new-ref="refArr[activeName]"
                 :rule-form="editData" :add-arr="addArr[activeName]"
                 :url="url[activeName]" @submitEvent="editForm" @CB-dialog="CB_dialog"
                 :halfForm="halfForm[activeName].show" :selects="sonArr" :leftTab="leftTab"></add-new>
        <!--删除-->
        <el-popover
                placement="top"
                width="160"
                v-model="showDel" slot="tip">
            <p>确定删除该条数据？</p>
            <div style="text-align: right; margin: 0">
                <el-button size="mini" type="text" @click="cancelD">取消</el-button>
                <el-button type="primary" size="mini" @click="confirmD(delId)">确定</el-button>
            </div>
        </el-popover>
        <!--页码-->
        <div v-if="showPage">
            <Pagination :page-url="url[activeName]"></Pagination>
        </div>
        <div v-else></div>
        <!--上传-->
        <div id="upload" @click="postBut">
            <i class="el-icon-upload"></i>
            <div class="upload-text">请选择要上传的文件</div>
        </div>
        <div ref='tip'></div>
        <input type="file" style="visibility: hidden;" multiple="multiple" ref="upload" @change="handleOk()"
               accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"/>
       <!-- &lt;!&ndash; 上传文件对话框 &ndash;&gt;
        <el-dialog title="上传文件" :visible.sync="uploadShow">
            <el-upload :action="uploadUrl" :on-success="uploadSuccess">
                <el-button type="primary" icon="el-icon-upload">上传</el-button>
            </el-upload>
            <span slot="footer">
                <el-button type="danger" icon="el-icon-close" @click="uploadShow=false">关闭</el-button>
            </span>
        </el-dialog>-->
    </div>
</template>
<script>
  import FileSaver from 'file-saver'
  import XLSX from 'xlsx'
  import axios from 'axios'

  export default {
    data() {
      return {
        parmas: [],
        newOpt: [
          {
            cnt: '新增',
            icon: 'bf-add',
            ent: this.addNew,
          },
          {
            cnt: '修改',
            icon: 'bf-change',
            ent: this.editInfo,
            nClick: false
          },
          {
            cnt: '删除',
            icon: 'bf-del',
            ent: this.delMore,
          },
          {
            cnt: '导入',
            icon: 'bf-in',
            ent: this.creatP,
          },
          {
            cnt: '导出',
            icon: 'bf-out',
            ent: this.exportExcel,
          },
          {
            cnt: '同步',
            icon: 'bf-sync',
            ent: this.test,
          },
          {
            cnt: '刷新',
            icon: 'bf-refresh',
            ent: this.refresh,
          }
        ],
        activeName: '0',
        /* []*/
        getsInfo: [[], [], []],
        tableHead: [
          [
            {
              label: '物流代码',
              width: '250',
              prop: "code",
              holder: '请输入物流代码',
              type: 'text'
            },
            {
              label: '物流名称',
              width: '250',
              prop: "name",
              holder: '请输入物流名称',
              type: 'text'
            },
            {
              label: '报表格式',
              width: '240',
              prop: 'report',
              holder: '请选择报表格式',
              type: 'select',
              val: this.sonArr
            },
            {
              label: '运费类型',
              width: '250',
              prop: "freight_type",
              holder: '请选择运费类型',
              type: 'select',
              val: this.sonArr
            },
            /* {
               label: '物流区域',
               width: '300',
               prop: "logistics_area",
               holder: '请输入物流区域',
               type: 'textarea'
             },*/
            {
              label: '预计天数',
              width: '220',
              prop: "expected_days",
              holder: '请输入天数',
              type: 'number'
            },
            /*{
              label: '发货数',
              width: '220',
              prop: "expected_days",
              holder: '请输入发货订单数',
              type: 'number'
            },
            {
              label: '损坏次数',
              width: '230',
              prop: "expected_days",
              holder: '请输入物流循坏货物此时',
              type: 'number'
            },*/
            {
              label: '物流电话',
              width: '250',
              prop: "phone",
              holder: '请输入物流电话',
              type: 'tel'
            },
            {
              label: '物流地址',
              width: '260',
              prop: "address",
              holder: '请输入物流地址',
              type: 'textarea'
            },
            {
              label: '备注',
              width: '200',
              prop: "remark",
              holder: '请输入备注',
              type: 'textarea'
            },
            {
              label: '创建时间',
              width: '320',
              prop: "created_at",
              holder: '请输入创建时间',
              type: 'text',
              beAble: true
            },
            {
              label: '是否启用',
              width: '200',
              prop: "status",
              holder: '请选择是否启用',
              type: 'select_def'
            }
          ],
          [
            {
              label: '物流名称',
              width: '240',
              prop: "logistics",
              holder: '请输入物流名称',
              type: 'select',
              val: this.sonArr
            },
            {
              label: '省',
              width: '230',
              prop: "province",
              holder: '请输入所在省',
              type: 'text'
            },
            {
              label: '市',
              width: '230',
              prop: "city",
              holder: '请输入所在市',
              type: 'text'
            },
            {
              label: '区',
              width: '230',
              prop: "district",
              holder: '请输入所在区',
              type: 'text'
            },
            {
              label: '提货地址',
              width: '260',
              prop: "address",
              holder: '请输入详细地址',
              type: 'textarea'
            },
            {
              label: '提货电话',
              width: '230',
              prop: "phone",
              holder: '请输入提货电话',
              type: 'tel'
            },
            {
              label: '物流费用',
              width: '220',
              prop: "price",
              holder: '请输入物流费用',
              type: 'number'
            },
            {
              label: '重量单价',
              width: '220',
              prop: "weight_univalent",
              holder: '请输入重量单价',
              type: 'number'
            },
            {
              label: '到达天数',
              width: '200',
              prop: "expected_days",
              holder: '请输入到达天数',
              type: 'number'
            },
            {
              label: '直达(中转)',
              width: '250',
              prop: "route",
              holder: '请选择中转或直达',
              type: 'select_def'
            },
            {
              label: '包邮',
              width: '200',
              prop: "is_free_shipping",
              holder: '请选择是否包邮',
              type: 'select_def'
            },
            {
              label: '备注',
              width: '200',
              prop: "remark",
              holder: '请输入备注',
              type: 'textarea'
            }
          ],
          [
            {
              label: '系统单号',
              width: '250',
              prop: "order_no",
              holder: '请输入订单号',
              type: 'text'
            },
            {
              label: '商品编码',
              width: '240',
              prop: "good_sn",
              holder: '请输入商品编码',
              type: 'text'
            },
            {
              label: '规格编码',
              width: '220',
              prop: "standard_code",
              holder: '请输入规格编码',
              type: 'text'
            },
            /*{
              label: '商品名称',
              width: '180',
              prop: "code",
              holder: '请输入物流代码',
              type: 'text'
            },*/
            /* {
               label: '规格名称',
               width: '180',
               prop: "code",
               holder: '请输入物流代码',
               type: 'text'
             },*/
            {
              label: '损坏数量',
              width: '220',
              prop: "quantity",
              holder: '请输入损坏数量',
              type: 'number'
            },
            {
              label: '损坏金额',
              width: '220',
              prop: "money",
              holder: '请输入损坏金额',
              type: 'number'
            },
            /*{
              label: '损坏来源',
              width: '180',
              prop: "code",
              holder: '请输入物流代码',
              type: 'text'
            },*/
            {
              label: '备注',
              width: '240',
              prop: "remark",
              holder: '请输入备注',
              type: 'textarea'
            },
            /* {
               label: '创建人',
               width: '180',
               prop: "code",
               holder: '请输入物流代码',
               type: 'text'
             },*/
            {
              label: '创建时间',
              width: '280',
              prop: "created_at",
              // holder: '请输入物流代码',
              type: 'text',
              beAble: true
            }
          ],
          /*[
            {
              label: '报表文件',
              width: '220',
              prop: "file",
              holder: '请输入报表文件',
              type: 'text'
            },
            {
              label: '报表名称',
              width: '220',
              prop: "name",
              holder: '请输入报表名称',
              type: 'text'
            },
            {
              label: '报表格式',
              width: '200',
              prop: "paper_format",
              holder: '请输入报表格式',
              type: 'text'
            },
            {
              label: '状态',
              width: '220',
              prop: "status",
              holder: '请选择是否启用',
              type: 'select_stu'
            }
          ]*/
        ],
        loading: true,
        currentIndex: '',
        url: ['/logistics', '/cityinfos', '/damagedgoods'],
        /*'/printreports'  '添加报表格式' , {show: false} 'ruleReports'  true {show: false}*/
        showMaskArr: [{show: false}, {show: false}, {show: false}],
        title: ['新增物流公司', '新增城市信息', '添加损坏商品'],
        ruleForm: [
          {
            code: '',
            name: '',
            report_id: '',
            // logistics_area_id: '',
            expected_days: '',
            phone: '',
            address: '',
            freight_type_id: '',
            remark: '',
            status: '1'
          },
          {
            logistics_id: '',
            province: '',
            city: '',
            district: '',
            address: '',
            phone: '',
            price: '',
            weight_univalent: '',
            expected_days: '',
            route: '1',
            is_free_shipping: '0',
            remark: ''
          },
          {
            order_no: '',
            good_sn: '',
            standard_code: '',
            quantity: '',
            money: '',
            remark: '',
            status: '1',
          },
        /*  {
            file: '',
            name: '',
            paper_format: '',
            status: '1'
          }*/
        ],
        rules: [
          {
            code: [
              {required: true, message: '请输入物流代码', trigger: 'blur'},
            ],
            name: [
              {required: true, message: '请输入物流名称', trigger: 'blur'},
            ],
            report_id: [
              {required: true, message: '请选择报表格式', trigger: 'blur'}
            ],
            expected_days: [
              {required: true, message: '请输入预计天数', trigger: 'blur'}
            ],
            phone: [
              {required: true, message: '请输入物流电话', trigger: 'blur'}
            ],
            address: [
              {required: true, message: '请输入物流地址', trigger: 'blur'}
            ],
            freight_type_id: [
              {required: true, message: '请选择运费类型', trigger: 'blur'}
            ],
          },
          {
            logistics_id: [
              {required: true, message: '请输入物流id', trigger: 'blur'},
            ],
            province: [
              {required: true, message: '请输入所在省', trigger: 'blur'},
            ],
            city: [
              {required: true, message: '请输入所在市', trigger: 'blur'},
            ],
            district: [
              {required: true, message: '请输入所在区', trigger: 'blur'},
            ],
            address: [
              {required: true, message: '请输入详细地址', trigger: 'blur'},
            ],
            phone: [
              {required: true, message: '请输入提货电话', trigger: 'blur'},
            ],
            price: [
              {required: true, message: '请输入物流费用', trigger: 'blur'},
            ],
            weight_univalent: [
              {required: true, message: '请输入重量单价', trigger: 'blur'},
            ],
            expected_days: [
              {required: true, message: '请输入城市到达天数', trigger: 'blur'},
            ]
          },
          {
            order_no: [
              {required: true, message: '请输入系统单号', trigger: 'blur'},
            ],
            good_sn: [
              {required: true, message: '请输入商品编码', trigger: 'blur'},
            ],
            standard_code: [
              {required: true, message: '请输入规格编码', trigger: 'blur'},
            ],
            quantity: [
              {required: true, message: '请输入损坏数量', trigger: 'blur'},
            ],
            money: [
              {required: true, message: '请输入损坏金额', trigger: 'blur'},
            ],
          },
         /* {
            file: [
              {required: true, message: '请输入文件', trigger: 'blur'},
            ],
            name: [
              {required: true, message: '请输入报表名', trigger: 'blur'},
            ],
            paper_format: [
              {required: true, message: '请输入报表格式', trigger: 'blur'},
            ],
          }*/
        ],
        addArr: [
          [
            {
              label: '物流代码',
              prop: 'code',
              holder: '请输入物流代码',
              type: 'text'
            },
            {
              label: '物流名称',
              prop: 'name',
              holder: '请输入物流名称',
              type: 'text'
            },
            {
              label: '报表格式',
              prop: 'report_id',
              holder: '请选择报表格式',
              type: 'select',
              val: this.sonArr
            },
            /* {
               label:'物流区域',
               prop:'logistics_area_id',
               holder:'请选择状态',
               type: 'text'
             },*/
            {
              label: '运费类型',
              prop: 'freight_type_id',
              holder: '请输入运费类型',
              type: 'select',
              val: this.sonArr
            },
            {
              label: '预计天数',
              prop: 'expected_days',
              holder: '请输入预计天数',
              type: 'number'
            },
            {
              label: '物流电话',
              prop: 'phone',
              holder: '请输入物流电话',
              type: 'tel'
            },
            {
              label: '物流地址',
              prop: 'address',
              holder: '请输入物流地址',
              type: 'textarea'
            },
            {
              label: '备注',
              prop: 'remark',
              holder: '请输入备注',
              type: 'textarea'
            },
            {
              label: '状态',
              prop: 'status',
              holder: '请选择是否启用',
              type: 'select_stu'
            }
          ],
          [
            {
              label: '物流名称',
              prop: 'logistics_id',
              holder: '请输入物流名称',
              type: 'select',
              val: this.sonArr
            },
            {
              label: '省',
              prop: 'province',
              holder: '请输入所在省',
              type: 'text'
            },
            {
              label: '市',
              prop: 'city',
              holder: '请输入所在市',
              type: 'text'
            },
            {
              label: '区',
              prop: 'district',
              holder: '请输入所在区',
              type: 'text'
            },
            {
              label: '提货电话',
              prop: 'phone',
              holder: '请输入提货电话',
              type: 'tel'
            },
            {
              label: '提货地址',
              prop: 'address',
              holder: '请输入提货地址',
              type: 'textarea'
            },
            {
              label: '物流费用',
              prop: 'price',
              holder: '请输入物流费用',
              type: 'number'
            },
            {
              label: '重量单价',
              prop: 'weight_univalent',
              holder: '请输入重量单价',
              type: 'number'
            },
            {
              label: '预计天数',
              prop: 'expected_days',
              holder: '请输入预计天数',
              type: 'number'
            },
            {
              label: '是否直达',
              prop: 'route',
              holder: '请选择是否直达',
              type: 'select_def'
            },
            {
              label: '是否包邮',
              prop: 'is_free_shipping',
              holder: '请选择是否直达',
              type: 'select_def'
            },
            {
              label: '备注',
              prop: 'remark',
              holder: '请输入备注',
              type: 'textarea'
            }
          ],
          [
            {
              label: '系统单号',
              prop: 'order_no',
              holder: '请输入系统单号',
              type: 'text'
            },
            {
              label: '商品编码',
              prop: 'good_sn',
              holder: '请输入商品编码',
              type: 'text'
            },
            {
              label: '规格编码',
              prop: 'standard_code',
              holder: '请输入规格编码',
              type: 'text'
            },
            {
              label: '损坏数量',
              prop: 'quantity',
              holder: '请输入损坏数量',
              type: 'number'
            },
            {
              label: '损坏金额',
              prop: 'money',
              holder: '请输入损坏金额',
              type: 'number'
            },
            {
              label: '备注',
              prop: 'remark',
              holder: '请输入备注',
              type: 'textarea'
            },
            {
              label: '状态',
              prop: 'status',
              holder: '请选择状态',
              type: 'select_stu'
            }
          ],
         /* [
            {
              label: '报表文件',
              prop: 'file',
              holder: '请输入报表文件',
              type: 'text'
            },
            {
              label: '报表名称',
              prop: 'name',
              holder: '请输入报表名称',
              type: 'text'
            },
            {
              label: '报表格式',
              prop: 'paper_format',
              holder: '请输入报表格式',
              type: 'text'
            },
            {
              label: '状态',
              prop: 'status',
              holder: '请选择状态',
              type: 'select_stu'
            }
          ],*/
        ],
        halfForm: [{show: true}, {show: true}, {show: false}],
        refArr: ['ruleLogistics', 'ruleCity', 'ruleDamage'],
        showDel: false,
        delId: '',
        inputChange: false,
        multipleSelection: [],
        delArr: [],
        sonArr: [],
        pagination: {
          current_page: 1,
          per_page: 0,
          page_total: 0
        },
        showPage: true,
        doChange: [false, false, true],
        editTitle: ['修改物流公司信息', '修改物流城市信息'],
        editMask: [{show: false}, {show: false}, {show: false}],
        editId: '',
        editData: {},
        // editList: {},
        leftTab: '修改',
        uploadShow: false,
        uploadUrl: 'https://jsonplaceholder.typicode.com/posts/',

      }
    },
    computed: {
      /* selects: {
         get: function () {
           return this.$store.state.SonData.reports;
         },
         set: function () {
         }
       },
       reportType: {
         get: function () {
           return this.$store.state.SonData.reports;
         },
         set: function () {
         }
       },
       freightsType: {
         get: function () {
           return this.$store.state.SonData.freights
         },
         set: function () {
         }
       },*/
      /* uploadUrl() {
         // return `${axios.defaults.baseURL}todos/upload`
       }*/
    },
    methods: {
      test() {
        console.log(1);
      },
      handleTabsClick() {
        this.loading = true;
        this.getInfo(this.url[this.activeName]);
        if (this.activeName == 2 || this.activeName == 3) {
          this.newOpt[1].nClick = true;
        } else {
          this.newOpt[1].nClick = false;
        }
      },
      addNew() {
        this.showMaskArr[this.activeName].show = true;
      },
      CB_dialog(val) {
        this.showMaskArr[this.activeName].show = val;
        this.editMask[this.activeName].show = val;
      },
      submitForm() {
        /* let addObj = {};
         if (this.activeName == '0') {
           addObj = {
             code: this.ruleForm[0].code,
             name: this.ruleForm[0].name,
             report_id: this.ruleForm[0].report.id,
             expected_days: this.ruleForm[0].expected_days,
             phone: this.ruleForm[0].phone,
             address: this.ruleForm[0].address,
             freight_type_id: this.ruleForm[0].freight_type.id,
             remark: this.ruleForm[0].remark,
             status: this.ruleForm[0].status
           };
         } else if (this.activeName == '1') {
           addObj = {
             logistics_id: this.ruleForm[1].logistics_id,
             province: this.ruleForm[1].province,
             city: this.ruleForm[1].city,
             district: this.ruleForm[1].district,
             address: this.ruleForm[1].address,
             phone: this.ruleForm[1].phone,
             price: this.ruleForm[1].price,
             weight_univalent: this.ruleForm[1].weight_univalent,
             route: this.ruleForm[1].route,
             expected_days: this.ruleForm[1].expected_days,
             expected_days: this.ruleForm[1].expected_days,
           };
         }*/
        this.$post(this.url[this.activeName], this.ruleForm[this.activeName])
          .then(() => {
            this.$message({
              message: '添加成功',
              type: 'success'
            });
            this.showMaskArr[this.activeName].show = false;
            this.refresh();
          }, (err) => {
            if (err.response) {
              let arr = err.response.data.errors;
              let arr1 = [];
              for (let i in arr) {
                arr1.push(arr[i]);
              }
              let str = arr1.join(',');
              this.$message.error({
                message: str
              });
            }
          })
      },
      /*处理批量删除*/
      handleSelectionChange(val) {
        if (val.length != 0) {
          this.editId = val[0].id;
        } else {
          this.editId = '';
        }
        this.multipleSelection = val;
        let del = [];
        this.multipleSelection.forEach(selectedItem => {
          del.push(selectedItem.id);
        });
        this.delArr = del.join(',');
      },
      delMore() {
        if (this.delArr.length === 0) {
          this.$message({
            message: '没有选中数据',
            type: 'warning'
          });
        } else {
          this.$confirm('此操作将永久删除该数据, 是否继续?', '提示', {
            confirmButtonText: '确定',
            cancelButtonText: '取消',
            type: 'warning'
          }).then(() => {
            this.$del(this.url[this.activeName], {ids: this.delArr})
              .then(() => {
                this.$message({
                  message: '删除成功',
                  type: 'success'
                });
                this.refresh();
              }, err => {
                if (err.response) {
                  let arr = err.response.data.errors;
                  let arr1 = [];
                  for (let i in arr) {
                    arr1.push(arr[i]);
                  }
                  let str = arr1.join(',');
                  this.$message.error({
                    message: str
                  });
                }
              })
          }).catch(() => {
            this.$message({
              type: 'info',
              message: '已取消删除'
            });
          });
        }
      },
      /*修改保存*/
      edit(index) {
        this.currentIndex = 'index' + index;
      },
      editCancel() {
        this.$message({
          message: '取消修改',
          type: 'info'
        });
        this.currentIndex = '';
      },
      editSave(row) {
        console.log(row);
        let newData = {};
        if (this.activeName == '0') {
          newData = {
            code: row.code,
            name: row.name,
            report: row.report,
            expected_days: row.expected_days,
            phone: row.phone,
            address: row.address,
            freight_type: row.freight_type,
            remark: row.remark,
            status: row.status
          }
        } else if (this.activeName == '1') {
          newData = {
            logistics: row.logistics.id,
            province: row.province,
            city: row.city,
            district: row.district,
            address: row.address,
            phone: row.phone,
            price: row.price,
            weight_univalent: row.weight_univalent,
            expected_days: row.expected_days,
            route: row.route,
            is_free_shipping: row.is_free_shipping,
            remark: row.remark
          }
        } else if (this.activeName == '2') {
          newData = {
            order_no: row.order_no,
            good_sn: row.good_sn,
            standard_code: row.standard_code,
            quantity: row.quantity,
            money: row.money,
            remark: row.remark
            // status: row.status
          }
        } /*else if (this.activeName == '3') {
          newData = {
            file: row.file,
            name: row.name,
            paper_format: row.paper_format,
            status: row.status
          }
        }*/
        if (this.inputChange) {
          this.$patch(this.url[this.activeName] + '/' + row.id, newData)
            .then(() => {
              this.$message({
                message: '修改成功',
                type: 'success'
              });
              this.getInfo(this.url[this.activeName]);
              this.currentIndex = '';
              this.inputChange = false;
              this.refresh();
            }, err => {
              if (err.response) {
                let arr = err.response.data.errors;
                let arr1 = [];
                for (let i in arr) {
                  arr1.push(arr[i]);
                }
                let str = arr1.join(',');
                this.$message.error({
                  message: str
                })
              }
            })
        } else {
          this.$message({
            message: '数据未改动',
            type: 'info'
          });
        }
      },
      handleEdit() {
        this.inputChange = true;
      },
      getSonData(url, propVal) {
        this.$fetch(url).then(res => {
          let obj = {};
          obj[propVal] = res.data;
          this.sonArr.push(obj);
        })
      },
      getInfo(url) {
        this.showPage = true;
        this.$fetch(url)
          .then(res => {
            this.getsInfo[this.activeName] = res.data;
            this.loading = false;
            let pg = res.meta.pagination;
            this.$store.dispatch('currentPage', pg.current_page);
            this.$store.commit('PER_PAGE', pg.per_page);
            this.$store.commit('PAGE_TOTAL', pg.total);
            /* if (url == this.url[3]) {
               this.$store.dispatch('setReports', res.data)
             }*/
            if (url == this.url[0]) {
              let obj = {};
              obj["0"] = res.data;
              this.sonArr.push(obj)
            }
          }, err => {
            if (err.response) {
              let arr = err.response.data.errors;
              let arr1 = [];
              for (let i in arr) {
                arr1.push(arr[i]);
              }
              let str = arr1.join(',');
              this.$message.error({
                message: str
              });
            }
          })
      },
      del(row, e) {
        this.showDel = true;
        $('.el-popper').css({left: e.x - 100 + 'px', top: e.y - 125 + 'px'});
        this.delId = row.id;
      },
      cancelD() {
        this.showDel = false;
        this.$message({
          message: '取消删除',
          type: 'info'
        });
      },
      confirmD(id) {
        this.$del(this.url[this.activeName] + '/' + id)
          .then(() => {
            this.$message({
              message: '删除成功',
              type: 'success'
            });
            this.showDel = false;
            this.refresh();
          }, err => {
            if (err.response) {
              this.showDel = false;
              let arr = err.response.data.errors;
              let arr1 = [];
              for (let i in arr) {
                arr1.push(arr[i]);
              }
              let str = arr1.join(',');
              this.$message.error({
                message: str
              });
            }
          })
      },
      refresh() {
        this.loading = true;
        this.getInfo(this.url[this.activeName]);
        setTimeout(() => {
          this.loading = false;
        }, 2000);
      },
      dbClick(row) {
        let id = row.id;
        this.activeName = '1';
        this.loading = true;
        this.showPage = false;
        this.$fetch(this.url[1] + '/' + id)
          .then(res => {
            if (res) {
              let arr = [];
              arr.push(res);
              this.getsInfo[this.activeName] = arr;
              this.loading = false;
            } else {
              this.$message({
                message: '没有查询到相关数据',
                type: 'info'
              });
              this.getsInfo[this.activeName] = [];
            }
          }, err => {
            console.log(err);
            this.$message.error({
              message: '查询失败'
            });
            this.loading = false;
            this.getsInfo[this.activeName] = [];
          })
      },
      editForm() {
        let obj = {};
        if (this.activeName == 0) {
          obj = {
            code: this.editData.code,
            name: this.editData.name,
            report_id: this.editData.report_id,
            expected_days: this.editData.expected_days,
            phone: this.editData.phone,
            address: this.editData.address,
            freight_type_id: this.editData.freight_type_id,
            remark: this.editData.remark,
            status: this.editData.status
          }
        } else if (this.activeName == 1) {
          obj = {
            logistics_id: this.editData.logistics_id,
            province: this.editData.province,
            city: this.editData.city,
            district: this.editData.district,
            address: this.editData.address,
            phone: this.editData.phone,
            price: this.editData.price,
            weight_univalent: this.editData.weight_univalent,
            expected_days: this.editData.expected_days,
            route: this.editData.route,
            is_free_shipping: this.editData.is_free_shipping,
            remark: this.editData.remark
          }
        }
        this.$patch(this.url[this.activeName] + '/' + this.editId, obj)
          .then(() => {
            this.$message({
              message: '修改成功',
              type: 'success'
            });
            this.editMask[this.activeName].show = false;
            this.refresh();
          }, (err) => {
            if (err.response) {
              let arr = err.response.data.errors;
              let arr1 = [];
              for (let i in arr) {
                arr1.push(arr[i]);
              }
              let str = arr1.join(',');
              this.$message.error({
                message: str
              });
            }
          })
      },
      editInfo() {
        if (this.newOpt[1].nClick) {
          return
        } else {
          if (this.multipleSelection.length == 0) {
            this.$message({
              message: '没有选择要修改的数据',
              type: 'warning'
            });
            return
          } else if (this.multipleSelection.length >= 2) {
            this.$message({
              message: '只能修改单条数据',
              type: 'warning'
            });
            return
          }
          else {
            this.editMask[this.activeName].show = true;
            this.$fetch(this.url[this.activeName] + '/' + this.editId).then(res => {
              if (this.activeName == 0) {
                this.editData =
                  {
                    code: res.code,
                    name: res.name,
                    report_id: res.report.id,
                    expected_days: res.expected_days,
                    phone: res.phone,
                    address: res.address,
                    freight_type_id: res.freight_type.id,
                    remark: res.remark,
                    status: res.status
                  }
              } else if (this.activeName == 1) {
                this.editData = {
                  logistics_id: res.logistics.id,
                  province: res.province,
                  city: res.city,
                  district: res.district,
                  address: res.address,
                  phone: res.phone,
                  price: res.price,
                  weight_univalent: res.weight_univalent,
                  expected_days: res.expected_days,
                  route: res.route,
                  is_free_shipping: res.is_free_shipping,
                  remark: res.remark
                }
              }
            }, err => {
              console.log(err);
            })
          }
        }
      },
      exportExcel() {
        let wb = XLSX.utils.table_to_book(document.querySelector('#outTable'));
        let wbout = XLSX.write(wb, {bookType: 'xlsx', bookSST: true, type: 'array'});
        try {
          FileSaver.saveAs(new Blob([wbout], {type: 'application/octet-stream'}), '物流管理.xlsx');
        } catch (e) {
          if (typeof console !== 'undefined')
            console.log(e, wbout)
        }
        return wbout
      },
      /*上传*/
      creatP() {
        this.uploadShow = true;
        // 添加显示文件名，以及删除功能
        let _this = this;
        let oP = document.createElement('p');
        oP.style.marginBottom = 10 + 'px';
        oP.style.height = 60 + 'px';
        oP.style.lineHeight = 60 + 'px';
        oP.innerHTML = ` ${sessionStorage.getItem('name')}<span style='display:none;float:right;margin-right:15px;cursor:pointer'>x</span>`;
        oP.addEventListener('mouseenter', function () {
          this.childNodes[1].style.display = 'block';
          this.style.background = '#9e9e9e';
          this.style.color = '#fff'
        });
        oP.addEventListener('click', function (e) {
          if (e.target.tagName === 'SPAN') {
            _this.$refs.tip.removeChild(this)
          }
        });
        oP.addEventListener('mouseleave', function () {
          this.childNodes[1].style.display = 'none';
          this.style.background = '';
          this.style.color = '#000'
        });
        _this.$refs.tip.appendChild(oP)
      },
      postBut() {
        // 模拟上传功能
        let post = this.$refs.upload;
        post.click()
      },
      handleOk() {
        // 上传文件并解析数据
        let _this = this;
        let X = XLSX;
        let rABS = false;// 是否转为二进制字符串
        let files = this.$refs.upload.files;
        for (let i = 0; i < files.length; i++) {
          let f = files[i];
          let reader = new FileReader();
          let name = f.name;
          sessionStorage.setItem('name', name);
          reader.onload = function (e) {
            let data = e.target.result;
            let wb;// 读取完成的数据
            if (rABS) {
              wb = X.read(data, {type: 'binary'})
            } else {
              let arr = fixdata(data);// 手动转化
              wb = X.read(btoa(arr), {type: 'base64'})
            }
            processWb(wb, 'json')
          };
          if (rABS) reader.readAsBinaryString(f);
          else reader.readAsArrayBuffer(f);
          ;
          // _this.$refs.tip.innerHTML = ''
          _this.creatP()
        }

        // 将读取到的数据转为字符串
        function processWb(wb, type) {
          let output = '';
          if (type === 'json') {
            output = JSON.stringify(toJson(wb), 2, 2);
            return output
          }
        }

        function fixdata(data) { // 文件流转BinaryString
          let o = '';
          let l = 0;
          let w = 10240;
          for (; l < data.byteLength / w; ++l) o += String.fromCharCode.apply(null, new Uint8Array(data.slice(l * w, l * w + w)))
          o += String.fromCharCode.apply(null, new Uint8Array(data.slice(l * w)));
          return o
        }

        function toJson(workbook) {
          let result = {};
          // SheetNames是获取Sheets中Sheet的名字
          // Sheets[Sheet名]获取第一个Sheet的数据
          workbook.SheetNames.forEach(function (sheetName) {
            let roa = XLSX.utils.sheet_to_row_object_array(workbook.Sheets[sheetName]);
            if (roa.length > 0) {
              result[sheetName] = roa
            }
          });
          let str = result.Sheet1;
          _this.parmas.push(str);
          console.log(_this.parmas);
          _this.$emit('postdata', _this.parmas);
          return result
        }
      },
    },
    mounted() {
      this.getInfo(this.url[0]);
      this.getSonData('/printreports', '2');
      this.getSonData('/freighttypes', '3');
      this.$store.dispatch('setOpt', this.newOpt);
      let that = this;
      $(window).resize(() => {
        that.$store.dispatch('setOpt', that.newOpt);
      });
    }
  }
</script>
