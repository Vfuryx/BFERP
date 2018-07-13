<template>
    <div>
        <el-tabs v-model="activeName" @tab-click="handleTabsClick">
            <el-tab-pane label="商品信息" name="0">
                <light-table @handleSelect="handleSelectionChange" :listData="getsInfo[this.activeName]"
                             :tableHead="tableHead[this.activeName]" @editSave="editSave" @handleEdit="handleEdit"
                             @del="del" @dbClick="dbClick" :loading="loading" @edit="edit" :currentIndex="currentIndex"
                             @editCancel="editCancel" :selects="sonArr"
                             :doChange="doChange[this.activeName]"></light-table>
            </el-tab-pane>
            <el-tab-pane label="规格信息" name="1">
                <light-table @handleSelect="handleSelectionChange" :listData="getsInfo[this.activeName]"
                             :tableHead="tableHead[this.activeName]" @editSave="editSave" @handleEdit="handleEdit"
                             @del="del" :loading="loading" :currentIndex="currentIndex" @edit="edit"
                             @editCancel="editCancel" :doChange="doChange[this.activeName]" @dbClick="addComb"></light-table>
            </el-tab-pane>
          <!--  <el-tab-pane label="组合商品" name="2">
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
        <div :show="showPage">
            <Pagination :page-url="url[activeName]"></Pagination>
        </div>

        <el-dialog title="选择商品" :visible.sync="showComb">
          <!--  <el-form :model="CombForm" :rules="combRules" ref="ruleForm" label-width="100px">
                <el-form-item label="标记代码" prop="code">
                    <el-input v-model="ruleForm.code" placehold=""></el-input>
                </el-form-item>
                <el-form-item label="标记名称" prop="name">
                    <el-input v-model="ruleForm.name" placehold="请输入标记名称"></el-input>
                </el-form-item>
                <el-form-item label="颜色" prop="color">
                    <el-color-picker v-model="ruleForm.color"></el-color-picker>
                </el-form-item>
                <el-form-item label="状态">
                    <el-select v-model="ruleForm.status" placeholder="请选择状态">
                        <el-option label="停用" value="0"></el-option>
                        <el-option label="启用" value="1"></el-option>
                    </el-select>
                </el-form-item>
                <el-form-item label="描述" prop="desc">
                    <el-input type="textarea" v-model="ruleForm.desc" placehode="请输入描述"></el-input>
                </el-form-item>
            </el-form>
            <div slot="footer" class="dialog-footer">
                <el-button type="primary" @click="submitForm('ruleForm')">添加</el-button>
                <el-button @click="resetForm('ruleForm')">重置</el-button>
            </div>-->
            <div>
                <label>名称或编号</label><el-input clearable></el-input>
                <!-- v-model="searchBox.vip_name"-->
                <el-button type="primary">查询</el-button>
            </div>
            <el-table :data="this.getsInfo[1]" fit highlight-current-row
                      type="index"
                      @selection-change="handleSelectionChange"
                      element-loading-text="拼命加载中"
                      v-loading="loading"
                      element-loading-spinner="el-icon-loading"
                      element-loading-background="rgba(0, 0, 0, 0.6)">
                <el-table-column
                        type="selection"
                        width="95" align="center"
                        :checked="checkboxInit" @change="toggleChecked" label="组合">
                </el-table-column>
                <el-table-colum  prop="" label="商品编码" width=""></el-table-colum>
                <el-table-colum  prop="" label="规格编码" width=""></el-table-colum>
                <el-table-colum  prop="" label="商品名称" width=""></el-table-colum>
                <el-table-colum  prop="" label="规格名称" width=""></el-table-colum>
                <el-table-colum  prop="" label="是否成品" width=""></el-table-colum>
                <el-table-colum  prop="" label="组合件数" width=""></el-table-colum>
            </el-table>
            <div>
                <el-button type="primary">确认</el-button>
                <el-button>取消</el-button>
            </div>
        </el-dialog>
    </div>
</template>
<script>
  export default {
    data() {
      return {
        newOpt: [
          {
            cnt: '新增',
            icon: 'bf-add',
            ent: this.addNew
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
            ent: this.delMore
          },
          {
            cnt: '审核',
            icon: 'bf-audit',
            ent: this.test
          },
          {
            cnt: '导入',
            icon: 'bf-in',
            ent: this.test
          },
          {
            cnt: '导出',
            icon: 'bf-out',
            ent: this.test
          },
          {
            cnt: '停止生产',
            icon: 'bf-stop',
            ent: this.test
          },
          {
            cnt: '刷新',
            icon: 'bf-refresh',
            ent: this.refresh
          }
        ],
        activeName: '0',
        getsInfo: [[], [], []],
        tableHead: [
          [
            {
              label: '产品图片',
              width: '250',
              prop: "img",
              holder: '请输入产品图片',
              type: 'text'
            },
            /* {
               label: '产品系列',
               width: '250',
               prop: "category_id",
               holder: '请选择产品系列',
               type: 'select',
               val: this.sonArr
             },*/
            {
              label: '工厂型号',
              width: '250',
              prop: "factory_model",
              holder: '请输入工厂型号',
              type: 'text'
            },
            {
              label: '商品编码',
              width: '250',
              prop: "commodity_code",
              holder: '请输入商品编码',
              type: 'text'
            },
            {
              label: '店铺名称',
              width: '250',
              prop: "nick",
              holder: '请选择店铺名称',
              type: 'text'
             /* type: 'select',
              val: this.sonArr*/
            },
            {
              label: '产品类别',
              width: '250',
              prop: "category",
              holder: '请选择产品类别',
              type: 'select',
              val: this.sonArr
            },
            {
              label: '供货商',
              width: '250',
              prop: 'supplier',
              holder: '请选择供货商',
              type: 'select',
              val: this.sonArr
            },
            {
              label: '京东编码',
              width: '300',
              prop: "jd_sn",
              holder: '请输入京东编码',
              type: 'text'
            },
            {
              label: '唯品会码',
              width: '300',
              prop: "vips_sn",
              holder: '请输入唯品会编码',
              type: 'text'
            },
            {
              label: '商品简称',
              width: '250',
              prop: "short_name",
              holder: '请输入商品简称',
              type: 'text'
            },
            {
              label: '商品标题',
              width: '260',
              prop: "title",
              holder: '请输入商品标题',
              type: 'text'
            },
            {
              label: '备注',
              width: '250',
              prop: "remark",
              holder: '请输入备注',
              type: 'textarea'
            },
            {
              label: '是否停产',
              width: '220',
              prop: "is_stop_pro",
              holder: '请选择是否停产',
              type: 'select_def'
            },
            {
              label: '是否启用',
              width: '220',
              prop: "status",
              holder: '请选择是否启用',
              type: 'select_def'
            }
          ],
          [
            {
              label: '规格编号',
              width: '300',
              prop: "spec_code",
              holder: '请输入规格编号',
              type: 'text',
              beAble:true
            },
            {
              label: '京东规格编号',
              width: '300',
              prop: "jd_specs_code",
              holder: '请输入京东规格编号',
              type: 'text'
            },
           /* {
              label: '商品简称',
              width: '250',
              prop: "goods",
              holder: '请选择商品简称',
              type: 'select',
              val: this.sonArr,
              beAble:true
            },*/
            {
              label: '唯品会规格编号',
              width: '300',
              prop: "vips_specs_code",
              holder: '请输入唯品会规格编号',
              type: 'text'
              // val: this.sonArr
            },
            {
              label: '规格图片',
              width: '260',
              prop: "logistics",
              holder: '请输入图片地址',
              type: 'text'
            },
            {
              label: '淘宝价格',
              width: '230',
              prop: "tb_price",
              holder: '请输入淘宝价格',
              type: 'number'
            },
            {
              label: '成本价格',
              width: '230',
              prop: "cost",
              holder: '请输入所成本价格',
              type: 'number'
            },
            {
              label: '销售价格',
              width: '230',
              prop: "price",
              holder: '请输入销售价格',
              type: 'number'
            },
            {
              label: '仓库成本',
              width: '230',
              prop: "warehouse_cost",
              holder: '请输入仓库成本',
              type: 'number'
            },
            {
              label: '折扣',
              width: '220',
              prop: "discount",
              holder: '请输入折扣',
              type: 'number'
            },
            {
              label: '佣金点',
              width: '220',
              prop: "commission",
              holder: '请输入佣金点',
              type: 'number'
            },
            {
              label: '木架费',
              width: '220',
              prop: "wooden_frame_costs",
              holder: '请输入木架费',
              type: 'number'
            },
            {
              label: '采购运费',
              width: '220',
              prop: "purchase_freight",
              holder: '请输入采购运费',
              type: 'number'
            },
            {
              label: '是否组合',
              width: '200',
              prop: "is_combination",
              holder: '请选择是否组合',
              type: 'select_def'
            },
            {
              label: '包件数量',
              width: '220',
              prop: "package_quantity",
              holder: '请输入包件数量',
              type: 'number'
            },
            {
              label: '库存预警数量',
              width: '220',
              prop: "inventory_warning",
              holder: '请输入库存预警数量',
              type: 'number'
            },
            {
              label: '采购预警天数',
              width: '220',
              prop: "purchase_days_warning",
              holder: '请输入采购预警天数',
              type: 'number'
            },
            {
              label: '产品配送类别',
              width: '250',
              prop: "distribution_method",
              holder: '请输入产品配送类别',
              type: 'select',
              val: this.sonArr
            },
            {
              label: '可售数预警数量',
              width: '220',
              prop: "available_warning",
              holder: '请输入可售数预警数量',
              type: 'number'
            },
            {
              label: '规格',
              width: '250',
              prop: "spec",
              holder: '请输入规格',
              type: 'text'
            },
            {
              label: '颜色',
              width: '250',
              prop: "color",
              holder: '请输入颜色',
              type: 'text'
            },
            {
              label: '材质',
              width: '250',
              prop: "materials",
              holder: '请输入材质',
              type: 'text'
            },
            {
              label: '功能',
              width: '250',
              prop: "function",
              holder: '请输入功能',
              type: 'text'
            },
            {
              label: '特殊',
              width: '250',
              prop: "special",
              holder: '请输入特殊',
              type: 'text'
            },
            {
              label: '其他',
              width: '250',
              prop: "other",
              holder: '请输入其他',
              type: 'text'
            },
            {
              label: '长度',
              width: '250',
              prop: "length",
              holder: '请输入长度',
              type: 'number'
            },
            {
              label: '宽度',
              width: '250',
              prop: "width",
              holder: '请输入宽度',
              type: 'number'
            },
            {
              label: '高度',
              width: '250',
              prop: "height",
              holder: '请输入高度',
              type: 'number'
            },
            {
              label: '体积',
              width: '250',
              prop: "volume",
              holder: '请输入体积',
              type: 'number'
            },
            {
              label: '重量',
              width: '250',
              prop: "weight",
              holder: '请输入重量',
              type: 'number'
            },
            {
              label: '备注',
              width: '230',
              prop: "remark",
              holder: '请输入备注',
              type: 'textarea'
            },
            {
              label: '是否成品',
              width: '220',
              prop: "finished_pro",
              holder: '请选择是否是成品',
              type: 'select_def'
            },
            {
              label: '是否停产',
              width: '220',
              prop: "is_stop_pro",
              holder: '请选择是否是停产',
              type: 'select_def'
            },
            {
              label: '状态',
              width: '220',
              prop: "status",
              holder: '请选择状态',
              type: 'select_stu'
            }
          ],
          [
            {
              label: '产品规格编码',
              width: '',
              prop: "product_specs",
              holder: '请选择产品规格编码',
              type: 'select',
              val: this.sonArr
            },
            {
              label: '组合产品规格编码',
              width: '',
              prop: "com_pro_specs",
              holder: '请选择组合产品规格编码',
              type: 'select',
              val: this.sonArr
            },
            {
              label: ' 组合件数',
              width: '',
              prop: "count",
              holder: '请输入 组合件数',
              type: 'number'
            },
            {
              label: '状态',
              width: '',
              prop: "status",
              type: 'select_stu'
            }
          ]
        ],
        loading: true,
        currentIndex: '',
        url: ['/goods','/productspecs'],
        /*  '/combinations'*/
        showMaskArr: [{show: false}, {show: false}, {show: false}],
        title: ['新增商品', '新增产品规格', '新增组合'],
        ruleForm: [
          {
            commodity_code: '',
            jd_sn: '',
            vips_sn: '',
            factory_model: '',
            short_name: '',
            nick: '',
            supplier_id: '',
            category_id: '',
            remark: '',
            title: '',
            img: '',
            url: '',
            is_stop_pro: '0',
            status: '1',
            productspecs: ''
          },
          {
            goods_id: '',
            spec_code: '',
            jd_specs_code: '',
            vips_specs_code: '',
            tb_price: '',
            cost: '',
            price: '',
            highest_price: '',
            lowest_price: '',
            warehouse_cost: '',
            assembly_price: '',
            discount: '',
            commission: '',
            is_combination: '0',
            package_quantity: '',
            package_costs: '',
            wooden_frame_costs: '',
            purchase_freight: '',
            inventory_warning: '',
            purchase_days_warning: '',
            available_warning: '',
            distribution_method_id: '',
            bar_code: '',
            img_url: '',
            spec: '',
            color: '',
            function: '',
            special: '',
            other: '',
            length: '',
            width: '',
            height: '',
            volume: '',
            weight: '',
            remark: '',
            finished_pro: '0',
            is_stop_pro: '0',
            status: '1'
          },
          {
            product_specs: '',
            com_pro_specs: '',
            count: '1',
            status: '1'
          }
        ],
        rules: [
          {
            commodity_code: [
              {required: true, message: '请输入商品编码', trigger: 'blur'},
            ],
            jd_sn: [
              {required: true, message: '请输入京东编号', trigger: 'blur'},
            ],
            vips_sn: [
              {required: true, message: '请输入唯品会编号', trigger: 'blur'}
            ],
            factory_model: [
              {required: true, message: '请输入工厂型号', trigger: 'blur'}
            ],
            short_name: [
              {required: true, message: '请输入商品简称', trigger: 'blur'}
            ],
            nick: [
              {required: true, message: '请输入店铺名称', trigger: 'blur'}
            ],
            supplier_id: [
              {required: true, message: '请选择供应商', trigger: 'blur'}
            ],
            category_id: [
              {required: true, message: '请选择产品类别', trigger: 'blur'}
            ],
            title: [
              {required: true, message: '请输入商品标题', trigger: 'blur'}
            ],
            img: [
              {required: true, message: '请输入商品图片', trigger: 'blur'}
            ],
            url: [
              {required: true, message: '请输入商品网址', trigger: 'blur'}
            ],
            productspecs: [
              {required: true, message: '请选择产品规格', trigger: 'blur'}
            ],

          },
          {
            goods_id: [
              {required: true, message: '请输入商品id', trigger: 'blur'},
            ],
            spec_code: [
              {required: true, message: '请输入规格编码', trigger: 'blur'},
            ],
            jd_specs_code: [
              {required: true, message: '请输入京东规格编码', trigger: 'blur'},
            ],
            vips_specs_code: [
              {required: true, message: '请输入唯品会规格编码', trigger: 'blur'},
            ],
            tb_price: [
              {required: true, message: '请输入淘宝价格', trigger: 'blur'},
            ],
            cost: [
              {required: true, message: '请输入成本价格', trigger: 'blur'},
            ],
            price: [
              {required: true, message: '请输入售价', trigger: 'blur'},
            ],
            highest_price: [
              {required: true, message: '请输入最高售价', trigger: 'blur'},
            ],
            lowest_price: [
              {required: true, message: '请输入最低售价', trigger: 'blur'},
            ],
            warehouse_cost: [
              {required: true, message: '请输入仓库成本', trigger: 'blur'},
            ],
            assembly_price: [
              {required: true, message: '请输入装配价格', trigger: 'blur'},
            ],
            discount: [
              {required: true, message: '请输入最高售价', trigger: 'blur'},
            ],
            commission: [
              {required: true, message: '请选择金佣点', trigger: 'blur'},
            ],
            is_combination: [
              {required: true, message: '请选择是否组合', trigger: 'blur'},
            ],
            package_quantity: [
              {required: true, message: '请输入包件数量', trigger: 'blur'},
            ],
            package_costs: [
              {required: true, message: '请输入打包费用', trigger: 'blur'},
            ],
            wooden_frame_costs: [
              {required: true, message: '请输入木架费', trigger: 'blur'},
            ],
            purchase_freight: [
              {required: true, message: '请输入采购运费', trigger: 'blur'},
            ],
            inventory_warning: [
              {required: true, message: '请输入库存预警(数量)', trigger: 'blur'},
            ],
            purchase_days_warning: [
              {required: true, message: '请输入采购预警天数  ', trigger: 'blur'},
            ],
            available_warning: [
              {required: true, message: '请输入可售数预警', trigger: 'blur'},
            ],
            distribution_method_id: [
              {required: true, message: '请选择配送类别', trigger: 'blur'},
            ],
            bar_code: [
              {required: true, message: '请输入条形码', trigger: 'blur'},
            ],
            img_url: [
              {required: true, message: '请输入图片地址', trigger: 'blur'},
            ],
            spec: [
              {required: true, message: '请输入产品图片', trigger: 'blur'},
            ],
            color: [
              {required: true, message: '请输入产品颜色', trigger: 'blur'},
            ],
            materials: [
              {required: true, message: '请输入产品材质', trigger: 'blur'},
            ],
            function: [
              {required: true, message: '请输入功能', trigger: 'blur'},
            ],
            special: [
              {required: true, message: '请输入特殊', trigger: 'blur'},
            ],
            other: [
              {required: true, message: '请输入其他', trigger: 'blur'},
            ],
            length: [
              {required: true, message: '请输入长度', trigger: 'blur'},
            ],
            width: [
              {required: true, message: '请输入宽度', trigger: 'blur'},
            ],
            height: [
              {required: true, message: '请输入高度', trigger: 'blur'},
            ],
            volume: [
              {required: true, message: '请输入产品材质', trigger: 'blur'},
            ],
            weight: [
              {required: true, message: '请输入重量', trigger: 'blur'},
            ]
          },
          {
            product_specs_id: [
              {required: true, message: '请输入产品规格编码id', trigger: 'blur'},
            ],
            com_pro_specs_id: [
              {required: true, message: '请输入组合产品规格编码id', trigger: 'blur'},
            ],
            count: [
              {required: true, message: '请输入组件数', trigger: 'blur'}
            ]
          }
        ],
        addArr: [
          [
           /* {
              label: '产品规格',
              prop: 'productspecs',
              holder: '请选择产品规格',
              type: 'select',
              val: this.sonArr
            },*/
            {
              label: '商品编号',
              prop: 'commodity_code',
              holder: '请输入商品编号',
              type: 'text',
              nChange: true,
              // beAble:true
            },
            {
              label: '京东编码',
              prop: 'jd_sn',
              holder: '请输入京东编码',
              type: 'text'
            },
            {
              label: '唯品会码',
              prop: 'vips_sn',
              holder: '请输入唯品会码',
              type: 'text'
            },
            {
              label: '店铺昵称',
              prop: 'nick',
              holder: '请选择店铺昵称',
              type:'text'
             /* type: 'select',
              val: this.sonArr*/
            },
            {
              label: '产品类别',
              prop: 'category_id',
              holder: '请选择产品类别',
              type: 'select',
              val: this.sonArr
            },
            {
              label: '供应商',
              prop: 'supplier_id',
              holder: '请选择供应商',
              type: 'select',
              val: this.sonArr
            },
            {
              label: '工厂型号',
              prop: 'factory_model',
              holder: '请输入工厂型号',
              type: 'text',
            },
            {
              label: '商品简称',
              prop: 'short_name',
              holder: '请输入商品简称',
              type: 'text',
              nChange: true,
              // beAble: true
            },
            {
              label: '商品标题',
              prop: 'title',
              holder: '请输入商品标题',
              type: 'text'
            },
            {
              label: '商品图片',
              prop: 'img',
              holder: '请输入商品图片',
              type: 'text'
            },
            {
              label: '商品网址',
              prop: 'url',
              holder: '请选择商品网址',
              type: 'url'
            },
            {
              label: '备注',
              prop: 'remark',
              holder: '请输入备注',
              type: 'textarea'
            },
            {
              label: '是否停产',
              prop: 'is_stop_pro',
              holder: '请选择是否停产',
              type: 'select_stu'
            },
            {
              label: '状态',
              prop: 'status',
              holder: '请选择是否启用',
              type: 'select_stu'
            }
          ],
          [
           /* {
              label: '商品简称',
              prop: 'goods',
              holder: '请输入规格图片',
              type: 'text'
            },*/
            {
              label: '规格编码',
              prop: 'spec_code',
              holder: '请输入规格编码',
              type: 'text'
            },
            {
              label: '京东编码',
              prop: 'jd_specs_code',
              holder: '请输入京东规格编码',
              type: 'text'
            },
            {
              label: '产品id',
              prop: 'goods_id',
              holder: '请选择产品id',
              type: 'select',
              val: this.sonArr
            },
            {
              label: '唯品会码',
              prop: 'vips_specs_code',
              holder: '请输入唯品会规格编码',
              type: 'text'
            },
            {
              label: '淘宝价格',
              prop: 'tb_price',
              holder: '请输入淘宝价格',
              type: 'number'
            },
            {
              label: '成本价格',
              prop: 'cost',
              holder: '请输入成本价格',
              type: 'number'
            },
            {
              label: '销售价格',
              prop: 'price',
              holder: '请输入销售价格',
              type: 'number'
            },
            {
              label: '最高售价',
              prop: 'highest_price',
              holder: '请输入最高售价',
              type: 'number'
            },
            {
              label: '最低售价',
              prop: 'lowest_price',
              holder: '请输入最低售价',
              type: 'number'
            },
            {
              label: '仓库成本',
              prop: 'warehouse_cost',
              holder: '请输入仓库成本',
              type: 'number'
            },
            {
              label: '装配价格',
              prop: 'assembly_price',
              holder: '请输入装配价格',
              type: 'number'
            },
            {
              label: '折扣',
              prop: 'discount',
              holder: '请输入折扣',
              type: 'number'
            },
            {
              label: '佣金点',
              prop: 'commission',
              holder: '请输入佣金点',
              type: 'number'
            },
            {
              label: '是否组合',
              prop: 'is_combination',
              holder: '请选择是否组合',
              type: 'select_def'
            },
            {
              label: '包件数量',
              prop: 'package_quantity',
              holder: '请输入包件数量',
              type: 'number'
            },
            {
              label: ' 打包费用',
              prop: 'package_costs',
              holder: '请输入打包费用',
              type: 'number'
            },
            {
              label: '木架费',
              prop: 'wooden_frame_costs',
              holder: '请输入木架费',
              type: 'number'
            },
            {
              label: '配送类别',
              prop: 'distribution_method_id',
              holder: '请选择配送类别',
              type: 'select',
              val: this.sonArr
            },
            {
              label: '采购运费',
              prop: 'purchase_freight',
              holder: '请输入采购运费',
              type: 'number'
            },
            {
              label: '库存预警',
              prop: 'inventory_warning',
              holder: '请输入库存预警',
              type: 'number'
            },
            {
              label: '采购预警',
              prop: 'purchase_days_warning',
              holder: '请输入采购预警',
              type: 'number'
            },

            {
              label: '可售预警',
              prop: 'available_warning',
              holder: '请输入可售预警',
              type: 'number'
            },
            {
              label: '条形码',
              prop: 'bar_code',
              holder: '请输入条形码',
              type: 'text',
            }, {
              label: '图片地址',
              prop: 'img_url',
              holder: '请输入图片地址',
              type: 'url',
            },
            {
              label: '规格',
              prop: 'spec',
              holder: '请输入规格',
              type: 'text',
            },
            {
              label: '颜色',
              prop: 'color',
              holder: '请输入颜色',
              type: 'text',
            },
            {
              label: '特殊',
              prop: 'special',
              holder: '请输入特殊',
              type: 'text',
            },
            {
              label: '材质',
              prop: 'materials',
              holder: '请输入材质',
              type: 'text',
            },
            {
              label: '功能',
              prop: 'function',
              holder: '请输入功能',
              type: 'text',
            },
            {
              label: '其他',
              prop: 'other',
              holder: '请输入其他',
              type: 'text',
            },
            {
              label: '长度',
              prop: 'length',
              holder: '请输入长度',
              type: 'number',
            },
            {
              label: '宽度',
              prop: 'width',
              holder: '请输入宽度',
              type: 'number',
            },
            {
              label: '高度',
              prop: 'height',
              holder: '请输入高度',
              type: 'number',
            },
            {
              label: '体积',
              prop: 'volume',
              holder: '请输入体积',
              type: 'number',
            },
            {
              label: '重量',
              prop: 'weight',
              holder: '请输入重量',
              type: 'number',
            },
            {
              label: '是否停产',
              prop: 'is_stop_pro',
              holder: '请选择是否停产',
              type: 'select_def',
            },
            {
              label: '是否成品',
              prop: 'finished_pro',
              holder: '请选择是否成品',
              type: 'select_def',
            },
            {
              label: '是否启用',
              prop: 'status',
              holder: '请选择是否启用',
              type: 'select_stu',
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
              label: '产品规格',
              prop: 'product_specs_id',
              holder: '请选择产品规格id',
              type: 'select',
              val: this.sonArr
            },
            {
              label: '组合规格',
              prop: 'com_pro_specs_id',
              holder: '请选择组合产品规格id',
              type: 'select',
              val: this.sonArr
            },
            {
              label: '组合件数',
              prop: 'count',
              holder: '请输入组合件数',
              type: 'number'
            },
            {
              label: '状态',
              prop: 'status',
              holder: '请选择状态',
              type: 'select_stu'
            }
          ]
        ],
        halfForm: [{show: true}, {show: true}, {show: false}],
        refArr: ['ruleGoods', 'ruleSpecs', 'ruleCombination'],
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
        doChange: [false, false, false],
        editTitle: ['修改商品信息', '修改物流城市信息'],
        editMask: [{show: false}, {show: false}, {show: false}],
        editId: '',
        editData: {},
        // editList: {},
        leftTab: '修改',
        getsErrors:false,
        showComb:false,
        CombForm: {},
        combRules:{},

      }
    },
    methods: {
      test() {
        console.log(1);
      },
      handleTabsClick() {
        this.loading = true;
        this.getInfo(this.url[this.activeName]);
        /* if (this.activeName == 2 || this.activeName == 3) {
          this.newOpt[1].nClick = true;
        } else {
          this.newOpt[1].nClick = false;
        }*/
      },
      addNew() {
        this.showMaskArr[this.activeName].show = true;
      },
      CB_dialog(val) {
        this.showMaskArr[this.activeName].show = val;
        this.editMask[this.activeName].show = val;
      },
      submitForm() {
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
        } else if (this.activeName == '3') {
          newData = {
            file: row.file,
            name: row.name,
            paper_format: row.paper_format,
            status: row.status
          }
        }
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
        this.getsErrors = false;
        this.$fetch(url).then(res => {
          let obj = {};
          obj[propVal] = res.data;
          this.sonArr.push(obj);
        },()=>{
          this.getsErrors = true
        })
      },
      getInfo(url) {
        this.showPage = true;
        this.getsErrors = false;
        this.$fetch(url)
          .then(res => {
            this.getsInfo[this.activeName] = res.data;
            this.loading = false;
            let pg = res.meta.pagination;
            this.$store.dispatch('currentPage', pg.current_page);
            this.$store.commit('PER_PAGE', pg.per_page);
            this.$store.commit('PAGE_TOTAL', pg.total);
            if (url == this.url[0]) {
              let obj = {};
              obj["2"] = res.data;
              this.sonArr.push(obj)
            }else if (url == this.url[1]){
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
              this.getsErrors = true;
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
        console.log(1);
        console.log(id);
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
                this.editData = {
                  commodity_code: res.commodity_code,
                  jd_sn: res.jd_sn,
                  vips_sn: res.vips_sn,
                  factory_model: res.factory_model,
                  short_name: res.short_name,
                  nick: res.nick,
                  supplier_id: res.supplier.id,
                  category_id: res.category.id,
                  remark: res.remark,
                  title: res.title,
                  img: res.img,
                  url: res.url,
                  is_stop_pro: res.is_stop_pro,
                  status: res.status,
                  productspecs: res.productspecs
                }
              } else if (this.activeName == 1) {
                this.editData = {
                  goods_id: res.goods.id,
                  spec_code: res.spec_code,
                  jd_specs_code: res.jd_specs_code,
                  vips_specs_code: res.vips_specs_code,
                  tb_price: res.tb_price,
                  cost: res.cost,
                  price: res.price,
                  highest_price: res.highest_price,
                  lowest_price: res.lowest_price,
                  warehouse_cost: res.warehouse_cost,
                  assembly_price: res.assembly_price,
                  discount: res.discount,
                  commission: res.commission,
                  is_combination: res.is_combination,
                  package_quantity: res.package_quantity,
                  package_costs: res.package_costs,
                  wooden_frame_costs: res.wooden_frame_costs,
                  purchase_freight: res.purchase_freight,
                  inventory_warning: res.inventory_warning,
                  purchase_days_warning: res.purchase_days_warning,
                  available_warning: res.available_warning,
                  distribution_method_id: res.distribution_method.id,
                  bar_code: res.bar_code,
                  img_url: res.img_url,
                  spec: res.spec,
                  color: res.color,
                  function: res.function,
                  special: res.special,
                  other: res.other,
                  length: res.length,
                  width: res.width,
                  height: res.height,
                  volume: res.volume,
                  weight: res.weight,
                  remark: res.remark,
                  finished_pro: res.finished_pro,
                  is_stop_pro: res.is_stop_pro,
                  status: res.status
                }
              }else{
                this.editData = {
                  product_specs: res.product_specs.id,
                  com_pro_specs: res.com_pro_specs.id,
                  count: res.count,
                  status: res.status
                }
              }
            }, err => {
              console.log(err);
            })
          }
        }
      },
      editForm() {
        let obj = {};
        if (this.activeName == 0) {
          obj = {
            commodity_code: this.editData.commodity_code,
            jd_sn: this.editData.jd_sn,
            vips_sn: this.editData.vips_sn,
            factory_model: this.editData.factory_model,
            short_name: this.editData.short_name,
            nick: this.editData.nick,
            supplier_id: this.editData.supplier_id,
            category_id: this.editData.category_id,
            remark: this.editData.remark,
            title: this.editData.title,
            img: this.editData.img,
            url: this.editData.url,
            is_stop_pro: this.editData.is_stop_pro,
            status: this.editData.status,
            productspecs: this.editData.productspecs
          }
        } else if (this.activeName == 1) {
          obj = {
            goods_id: this.editData.goods_id,
            spec_code: this.editData.spec_code,
            jd_specs_code: this.editData.jd_specs_code,
            vips_specs_code: this.editData.vips_specs_code,
            tb_price: this.editData.tb_price,
            cost: this.editData.cost,
            price: this.editData.price,
            highest_price: this.editData.highest_price,
            lowest_price: this.editData.lowest_price,
            warehouse_cost: this.editData.warehouse_cost,
            assembly_price: this.editData.assembly_price,
            discount: this.editData.discount,
            commission: this.editData.commission,
            is_combination: this.editData.is_combination,
            package_quantity: this.editData.package_quantity,
            package_costs: this.editData.package_costs,
            wooden_frame_costs: this.editData.wooden_frame_costs,
            purchase_freight: this.editData.purchase_freight,
            inventory_warning: this.editData.inventory_warning,
            purchase_days_warning: this.editData.purchase_days_warning,
            available_warning: this.editData.available_warning,
            distribution_method_id: this.editData.distribution_method_id,
            bar_code: this.editData.bar_code,
            img_url: this.editData.img_url,
            spec: this.editData.spec,
            color: this.editData.color,
            function: this.editData.function,
            special: this.editData.special,
            other: this.editData.other,
            length: this.editData.length,
            width: this.editData.width,
            height: this.editData.height,
            volume: this.editData.volume,
            weight: this.editData.weight,
            remark: this.editData.remark,
            finished_pro: this.editData.finished_pro,
            is_stop_pro: this.editData.is_stop_pro,
            status: this.editData.status
          }
        }else{
          obj={
            product_specs: this.editData.product_specs,
            com_pro_specs: this.editData.com_pro_specs,
            count: this.editData.count,
            status: this.editData.status
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
      addComb(){
        this.showComb = true;
      }
    },
    mounted() {
      this.getInfo(this.url[0]);
      if(!this.getsErrors) {
        this.getSonData('/suppliers', '5');
        this.getSonData('/goodscates', '4');
        // this.getSonData('/shops', '3');
        this.getSonData('/distmets', '17');
      }
      this.$store.dispatch('setOpt', this.newOpt);
      const that = this;
      $(window).resize(() => {
        that.$store.dispatch('setOpt', that.newOpt);
      })

      console.log(this.sonArr);
    }
  }
</script>