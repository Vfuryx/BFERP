<template>
    <div class="shopMag">
        <div class="searchBox" v-if="shopPage">
                <span>
                <label>卖家昵称</label>
                <el-input v-model="searchBox.buyNick" clearable class="half" @keyup.enter.native="getData"></el-input>
            </span>
                <span>
                <label>店铺标题</label>
                <el-input v-model="searchBox.shopTitle" clearable class="half" @keyup.enter.native="getData"></el-input>
            </span>
        </div>
        <el-tabs v-model="activeName" @tab-click="handleTabsClick">
            <el-tab-pane label="店铺信息" name="0">
                <el-table :data="getsInfo[0]" fit highlight-current-row
                        type="index"
                        @selection-change="handleSelectionChange"
                        element-loading-text="拼命加载中"
                        v-loading="loading"
                        element-loading-spinner="el-icon-loading"
                        element-loading-background="rgba(0, 0, 0, 0.6)"
                >
                    <el-table-column
                            type="selection"
                            width="95" align="center"
                            :checked="checkboxInit" @change="toggleChecked">
                    </el-table-column>
                    <el-table-column
                            label="卖家昵称"
                            align="center"
                            width="180">
                        <template slot-scope="scope">
                        <span v-if="changeIndex=='index'+scope.$index">
                            <el-input size="small" v-model="scope.row.nick" placeholder="请输入卖家昵称" @change="handleEdit"></el-input>
                        </span>
                            <span v-else>
                            {{scope.row.nick}}
                        </span>
                        </template>
                    </el-table-column>
                    <el-table-column
                            label="店铺标题"
                            align="center"
                            width="200">
                        <template slot-scope="scope">
                        <span v-if="changeIndex=='index'+scope.$index">
                            <el-input size="small" v-model="scope.row.title" placeholder="输入店铺标题" @change="handleEdit"></el-input>
                        </span>
                            <span v-else>
                            {{scope.row.title}}
                        </span>
                        </template>
                    </el-table-column>
                    <el-table-column
                            label="仓库"
                            align="center"
                            width="200">
                        <template slot-scope="scope">
                        <span v-if="changeIndex=='index'+scope.$index">
                             <el-select v-model="scope.row.warehouse.name" placeholder="请选择仓库" @change="handleEdit">
                                 <el-option v-for="item in warehouse" :key="item.id" :label="item.name" :value="item.id"></el-option>
                             </el-select>
                        </span>
                            <span v-else>
                            {{scope.row.warehouse.name}}
                        </span>
                        </template>
                    </el-table-column>
                    <el-table-column
                            label="店铺返点(%)"
                            align="center"
                            width="160">
                        <template slot-scope="scope">
                    <span v-if="changeIndex=='index'+scope.$index">
                        <el-input size="small" type="number" v-model="scope.row.title" placeholder="输入店铺返点" @change="handleEdit"></el-input>
                    </span>
                            <span v-else>
                            {{scope.row.rebate}}
                        </span>
                        </template>
                    </el-table-column>
                    <el-table-column
                            label="店铺电话"
                            align="center"
                            width="200">
                        <template slot-scope="scope">
                    <span v-if="changeIndex=='index'+scope.$index">
                         <el-input size="small" v-model="scope.row.principal_mobile" placeholder="输入电话" @change="handleEdit"></el-input>
                    </span>
                            <span v-else>
                            {{scope.row.principal_mobile}}
                        </span>
                        </template>
                    </el-table-column>
                    <el-table-column
                            label="店铺类型"
                            align="center"
                            width="180">
                        <template slot-scope="scope">
                    <span v-if="changeIndex=='index'+scope.$index">
                        <el-select v-model="scope.row.platform.name" placeholder="选择店铺类型" @change="handleEdit">
                            <el-option v-for="item in platform" :key="item.id" :label="item.name" :value="item.id"></el-option>
                        </el-select>
                    </span>
                            <span v-else>
                            {{scope.row.platform.name}}
                        </span>
                        </template>
                    </el-table-column>
                    <el-table-column
                            label="店铺负责人"
                            align="center"
                            width="200">
                        <template slot-scope="scope">
                    <span v-if="changeIndex=='index'+scope.$index">
                        <el-input size="small" v-model="scope.row.principal" placeholder="输入负责人" @change="handleEdit"></el-input>
                    </span>
                            <span v-else>
                            {{scope.row.principal}}
                        </span>
                        </template>
                    </el-table-column>
                    <el-table-column
                            label="发货地(省)"
                            align="center"
                            width="180">
                        <template slot-scope="scope">
                    <span v-if="changeIndex=='index'+scope.$index">
                         <el-input size="small" v-model="scope.row.province" placeholder="输入省" @change="handleEdit"></el-input>
                    </span>
                            <span v-else>
                            {{scope.row.province}}
                        </span>
                        </template>
                    </el-table-column>
                    <el-table-column
                            label="发货地(市)"
                            align="center"
                            width="180">
                        <template slot-scope="scope">
                    <span v-if="changeIndex=='index'+scope.$index">
                        <el-input size="small" v-model="scope.row.city" placeholder="输入市" @change="handleEdit"></el-input>
                    </span>
                            <span v-else>
                            {{scope.row.city}}
                        </span>
                        </template>
                    </el-table-column>
                    <el-table-column
                            label="发货地(区)"
                            align="center"
                            width="180">
                        <template slot-scope="scope">
                    <span v-if="changeIndex=='index'+scope.$index">
                        <el-input size="small" v-model="scope.row.district" placeholder="输入市" @change="handleEdit"></el-input>
                    </span>
                            <span v-else>
                            {{scope.row.district}}
                        </span>
                        </template>
                    </el-table-column>
                    <el-table-column
                            label="发货地址"
                            align="center"
                            width="180">
                        <template slot-scope="scope">
                    <span v-if="changeIndex=='index'+scope.$index">
                         <el-input size="small" v-model="scope.row.address" placeholder="输入地址" @change="handleEdit"></el-input>
                    </span>
                            <span v-else>
                            {{scope.row.address}}
                        </span>
                        </template>
                    </el-table-column>
                    <el-table-column
                            label="毛利差异(%)"
                            align="center"
                            width="180">
                        <template slot-scope="scope">
                    <span v-if="changeIndex=='index'+scope.$index">
                        <el-input size="small" type="number" v-model="scope.row.gross_profit_rate" placeholder="输入毛利" @change="handleEdit"></el-input>
                    </span>
                            <span v-else>
                            {{scope.row.gross_profit_rate}}
                        </span>
                        </template>
                    </el-table-column>
                    <el-table-column
                            label="电子面单"
                            align="center"
                            width="180">
                        <template slot-scope="scope">
                        <span v-if="changeIndex=='index'+scope.$index">
                            <el-select v-model="scope.row.is_waybill" placeholder="请选择是或否" @change="handleEdit">
                                <el-option label="是" value="1"></el-option>
                                <el-option label="否" value="0"></el-option>
                            </el-select>
                        </span>
                            <span v-else>
                            <i class='showStatus' :class="{'statusActive':scope.row.is_waybill==0?false:true}"></i>
                            {{scope.row.is_waybill==0?'否':'是'}}
                        </span>
                        </template>
                    </el-table-column>
                    <el-table-column label="操作" width="220" align="center">
                        <template slot-scope="scope">
                        <span v-if="changeIndex=='index'+scope.$index">
                            <!--<el-button size="mini" @click="editSave(scope.$index,scope.row)">保存</el-button>-->
                            <el-button size="mini" @click="editSave(scope.$index,scope.row)">保存</el-button>
                            <el-button size="mini" @click="editCancel">取消
                            </el-button>
                        </span>
                            <span v-else>
                           <el-button size="mini" @click="editType(scope.row,scope.$index)">编辑</el-button>
                        </span>
                            <el-button size="mini" type="danger" @click="delClick(scope.row,$event)">删除
                            </el-button>
                        </template>
                    </el-table-column>
                </el-table>
            </el-tab-pane>
            <el-tab-pane label="仓库信息" name="1">
                <el-table :data="getsInfo[1]" fit highlight-current-row
                          type="index"
                          @selection-change="handleSelectionChange"
                          element-loading-text="拼命加载中"
                          v-loading="loading"
                          element-loading-spinner="el-icon-loading"
                          element-loading-background="rgba(0, 0, 0, 0.6)"
                >
                    <el-table-column
                            type="selection"
                            width="95" align="center"
                            :checked="checkboxInit" @change="toggleChecked">
                    </el-table-column>
                    <el-table-column
                            label="仓库名称"
                            align="center"
                            width="200">
                        <template slot-scope="scope">
                        <span v-if="changeIndex=='index'+scope.$index">
                            <el-input size="small" v-model="scope.row.name" placeholder="请输入仓库名称" @change="handleEdit"></el-input>
                        </span>
                            <span v-else>
                            {{scope.row.name}}
                        </span>
                        </template>
                    </el-table-column>
                    <el-table-column
                            label="仓库地(省)"
                            align="center"
                            width="200">
                        <template slot-scope="scope">
                        <span v-if="changeIndex=='index'+scope.$index">
                            <el-input size="small" v-model="scope.row.province" placeholder="请输入省" @change="handleEdit"></el-input>
                        </span>
                            <span v-else>
                            {{scope.row.province}}
                        </span>
                        </template>
                    </el-table-column>
                    <el-table-column
                            label="仓库地(市)"
                            align="center"
                            width="200">
                        <template slot-scope="scope">
                        <span v-if="changeIndex=='index'+scope.$index">
                             <el-input size="small" v-model="scope.row.city" placeholder="请输入市" @change="handleEdit"></el-input>
                        </span>
                            <span v-else>
                            {{scope.row.city}}
                        </span>
                        </template>
                    </el-table-column>
                    <el-table-column
                            label="仓库地(区)"
                            align="center"
                            width="200">
                        <template slot-scope="scope">
                    <span v-if="changeIndex=='index'+scope.$index">
                        <el-input size="small" v-model="scope.row.district" placeholder="请输入区" @change="handleEdit"></el-input>
                    </span>
                            <span v-else>
                            {{scope.row.district}}
                        </span>
                        </template>
                    </el-table-column>
                    <el-table-column
                            label="仓库地址"
                            align="center"
                            width="230">
                        <template slot-scope="scope">
                    <span v-if="changeIndex=='index'+scope.$index">
                         <el-input size="small" v-model="scope.row.address" placeholder="请输入地址" @change="handleEdit"></el-input>
                    </span>
                            <span v-else>
                            {{scope.row.address}}
                        </span>
                        </template>
                    </el-table-column>
                    <el-table-column
                            label="是否默认"
                            align="center"
                            width="200">
                        <template slot-scope="scope">
                    <span v-if="changeIndex=='index'+scope.$index">
                        <el-select v-model="scope.row.is_default" placeholder="请选择是否默认" @change="handleEdit">
                            <el-option label="是" value="1"></el-option>
                            <el-option label="否" value="0"></el-option>
                        </el-select>
                    </span>
                            <span v-else>
                            {{scope.row.is_default==0?'否':'是'}}
                        </span>
                        </template>
                    </el-table-column>
                    <el-table-column
                            label="状态"
                            align="center"
                            width="200">
                        <template slot-scope="scope">
                        <span v-if="changeIndex=='index'+scope.$index">
                            <el-select v-model="scope.row.status" placeholder="请选择状态" @change="handleEdit">
                                <el-option label="启用" value="1"></el-option>
                                <el-option label="停用" value="0"></el-option>
                            </el-select>
                        </span>
                            <span v-else>
                            <i class='showStatus' :class="{'statusActive':scope.row.status==0?false:true}"></i>
                            {{scope.row.status==0?'停用':'启用'}}
                        </span>
                        </template>
                    </el-table-column>
                    <el-table-column label="操作" width="220" align="center">
                        <template slot-scope="scope">
                        <span v-if="changeIndex=='index'+scope.$index">
                            <!--<el-button size="mini" @click="editSave(scope.$index,scope.row)">保存</el-button>-->
                            <el-button size="mini" @click="editSave(scope.$index,scope.row)">保存</el-button>
                            <el-button size="mini" @click="editCancel">取消
                            </el-button>
                        </span>
                            <span v-else>
                           <el-button size="mini" @click="editType(scope.row,scope.$index)">编辑</el-button>
                        </span>
                            <el-button size="mini" type="danger" @click="delClick(scope.row,$event)">删除
                            </el-button>
                        </template>
                    </el-table-column>
                </el-table>
            </el-tab-pane>
            <el-tab-pane label="平台信息" name="2">
                <el-table :data="getsInfo[2]" fit highlight-current-row
                          type="index"
                          @selection-change="handleSelectionChange"
                          element-loading-text="拼命加载中"
                          v-loading="loading"
                          element-loading-spinner="el-icon-loading"
                          element-loading-background="rgba(0, 0, 0, 0.6)"
                >
                    <el-table-column
                            type="selection"
                            width="95" align="center"
                            :checked="checkboxInit" @change="toggleChecked">
                    </el-table-column>
                    <el-table-column
                            label="平台类型名称"
                            align="center">
                        <template slot-scope="scope">
                        <span v-if="changeIndex=='index'+scope.$index">
                            <el-input size="small" v-model="scope.row.name" placeholder="请输入仓库名称" @change="handleEdit"></el-input>
                        </span>
                            <span v-else>
                            {{scope.row.name}}
                        </span>
                        </template>
                    </el-table-column>
                    <el-table-column
                            label="状态"
                            align="center">
                        <template slot-scope="scope">
                        <span v-if="changeIndex=='index'+scope.$index">
                            <el-select v-model="scope.row.status" placeholder="请选择状态" @change="handleEdit">
                                <el-option label="启用" value="1"></el-option>
                                <el-option label="停用" value="0"></el-option>
                            </el-select>
                        </span>
                            <span v-else>
                            <i class='showStatus' :class="{'statusActive':scope.row.status==0?false:true}"></i>
                            {{scope.row.status==0?'停用':'启用'}}
                        </span>
                        </template>
                    </el-table-column>
                    <el-table-column label="操作" width="220" align="center">
                        <template slot-scope="scope">
                        <span v-if="changeIndex=='index'+scope.$index">
                            <el-button size="mini" @click="editSave(scope.$index,scope.row)">保存</el-button>
                            <el-button size="mini" @click="editCancel">取消
                            </el-button>
                        </span>
                            <span v-else>
                           <el-button size="mini" @click="editType(scope.row,scope.$index)">编辑</el-button>
                        </span>
                            <el-button size="mini" type="danger" @click="delClick(scope.row,$event)">删除
                            </el-button>
                        </template>
                    </el-table-column>
                </el-table>
            </el-tab-pane>
        </el-tabs>

        <!--新增商店-->
        <el-dialog title="新增店铺信息" :visible.sync="showMaskArr[0].show">
            <el-form :model="ruleForm" :rules="rules" ref="ruleForm" label-width="100px" class="half-form">
                <el-form-item label="卖家昵称" prop="nick">
                    <el-input v-model="ruleForm.nick" placehold="请输入卖家昵称"></el-input>
                </el-form-item>
                <el-form-item label="店铺标题
" prop="title">
                    <el-input v-model="ruleForm.title" placehold="请输入店铺标题"></el-input>
                </el-form-item>
                <el-form-item label="SessionKey
" prop="session_key">
                    <el-input v-model="ruleForm.session_key" placehold="请输入SessionKey"></el-input>
                </el-form-item>
                <el-form-item label="默认仓库
" prop="warehouse_id">
                    <el-select v-model="ruleForm.warehouse_id" placeholder="请选择仓库">
                        <el-option v-for="item in warehouse" :key="item.id" :label="item.name" :value="item.id"></el-option>
                    </el-select>
                </el-form-item>
                <el-form-item label="店铺账号">
                    <el-input v-model="ruleForm.shop_account" placehold="请输入店铺账号"></el-input>
                </el-form-item>
                <el-form-item label="店铺密码
">
                    <el-input type="password" v-model="ruleForm.shop_passwd" placehold="请输入店铺密码"></el-input>
                </el-form-item>
                <el-form-item label="返点(%)
">
                    <el-input type="number" v-model="ruleForm.rebate" placehold="请输入返点"></el-input>
                </el-form-item>
                <el-form-item label="店铺负责人" prop="principal">
                    <el-input v-model="ruleForm.principal" placehold="请输入负责人"></el-input>
                </el-form-item>
                <el-form-item label="负责人电话" prop="principal_mobile">
                    <el-input type="tel"  v-model="ruleForm.principal_mobile" placehold="请输入负责人电话"></el-input>
                </el-form-item>
                <el-form-item label="发货地(省)" prop="province">
                    <el-input v-model="ruleForm.province" placehold="请输入省"></el-input>
                </el-form-item>
                <el-form-item label="发货地(市)" prop="city">
                    <el-input v-model="ruleForm.city" placehold="请输入市"></el-input>
                </el-form-item>
                <el-form-item label="发货地(区)" prop="district">
                    <el-input v-model="ruleForm.district" placehold="请输入区"></el-input>
                </el-form-item>
                <el-form-item label="发货地址" prop="address">
                    <el-input v-model="ruleForm.address" placehold="请输入地址"></el-input>
                </el-form-item>
                <el-form-item label="毛利差异(%)" prop="gross_profit_rate">
                    <el-input type="number" v-model="ruleForm.gross_profit_rate" placehold="请输入区"></el-input>
                </el-form-item>
                 <el-form-item label="平台" prop="platform_id">
                     <el-select v-model="ruleForm.platform_id">
                         <el-option :label="item.name" v-for="item in platforms" :key="item.id" :value="item.id"></el-option>
                     </el-select>
                 </el-form-item>
                <el-form-item label="电子面单">
                    <el-select v-model="ruleForm.is_waybill" placeholder="请选择是否使用">
                        <el-option label="否" value="0"></el-option>
                        <el-option label="是" value="1"></el-option>
                    </el-select>
                </el-form-item>
            </el-form>
            <div slot="footer" class="dialog-footer">
                <el-button type="primary" @click="submitForm('ruleForm')">添加</el-button>
                <el-button @click="resetForm('ruleForm')">重置</el-button>
            </div>
        </el-dialog>

        <!--新增库存-->
        <add-new :visible-add="showMaskArr[1].show" :title="title[0]" :rule-form="newRuleForm[0]" :rules="newRules[0]" :add-arr="addArr[0]" :url="url[1]" @submitEvent="submitForm0" :new-ref="refArr[0]" @CB-dialog="CB_dialog"></add-new>

        <!--新增平台-->
        <add-new :visible-add="showMaskArr[2].show" :title="title[1]" :rule-form="newRuleForm[1]" :rules="newRules[1]" :add-arr="addArr[1]" :url="url[2]" @submitEvent="submitForm1" :new-ref="refArr[1]" @CB-dialog="CB_dialog"></add-new>

        <!--删除提示-->
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
        <Pagination :page-url="url[activeName]"></Pagination>
    </div>
</template>
<script>
    // import AddNew from '../../components/addNew.vue'
  export default {
    components:{
        // AddNew
      },
    data() {
      return {
        newOpt: [
          {
            cnt: '新增',
            icon: 'bf-add',
            ent: this.addNew
          },
          {
            cnt: '删除',
            icon: 'bf-del',
            ent: this.delMore
          },
          {
            cnt: '上传',
            icon: 'bf-upload',
            ent: this.test
          },
          {
            cnt: '刷新',
            icon: 'bf-refresh',
            ent: this.refresh
          }
        ],
        activeName: '0',
        shopInfo:[],
        checkboxInit: false,
        inputChange: false,
        changeIndex:'',
        multipleSelection: [],
        loading: true,
        url:['/shops','/warehouses','/platforms'],
        ruleForm: {
          nick: '',
          title: '',
          session_key: '',
          warehouse_id:'',
          shop_account:'',
          shop_passwd:'',
          rebate:'',
          principal:'',
          principal_mobile:'',
          province:'',
          city:'',
          district:'',
          address:'',
          gross_profit_rate:'',
          platform_id:'',
          is_waybill:'1'
        },
        rules: {
          nick: [
            {required: true, message: '请输入卖家昵称', trigger: 'blur'},
          ],
          title: [
            {required: true, message: '请输入店铺标题', trigger: 'blur'},
          ],
          session_key: [
            {required: true, message: '请输入SessionKey', trigger: 'blur'}
          ],
          warehouse_id: [
            {required: true, message: '默认仓库必选', trigger: 'blur'}
          ],
          shop_account: [
            {required: true, message: '请输入店铺账号', trigger: 'blur'}
          ],
          shop_passwd: [
            {required: true, message: '请输入店铺密码', trigger: 'blur'}
          ],
          rebate: [
            {required: true, message: '请输入返点', trigger: 'blur'}
          ],
          principal: [
            {required: true, message: '请输入店铺负责人', trigger: 'blur'}
          ],
          principal_mobile: [
            {required: true, message: '请输入负责人电话', trigger: 'blur'}
          ],
          province: [
            {required: true, message: '请输入省', trigger: 'blur'}
          ],
          city: [
            {required: true, message: '请输入市', trigger: 'blur'}
          ],
          district: [
            {required: true, message: '请输入区', trigger: 'blur'}
          ],
          address: [
            {required: true, message: '请输入地址', trigger: 'blur'}
          ],
          gross_profit_rate: [
            {required: true, message: '请输入毛利', trigger: 'blur'}
          ],
          platform_id: [
            {required: true, message: '请输入平台', trigger: 'blur'}
          ]
        },
        showDel: false,
        delId:'',
        delArr:[],
        getsInfo:[[],[],[]],
        /*添加面板*/
        title:['新增库存','新增平台'],
        refArr:['','ruleStore','rulePlatform'],
        newRuleForm:[
          {
            name:'',
            province:'',
            city:'',
            district:'',
            address:'',
            is_default:'0',
            status:'1'
          },
          {
            name:'',
            status:'1'
          }
        ],
        newRules:[
          {
            name: [
              {required: true, message: '请输入仓库名称', trigger: 'blur'},
            ],
            province: [
              {required: true, message: '请输入仓库所在省', trigger: 'blur'},
            ],
            city: [
              {required: true, message: '请输入仓库所在市', trigger: 'blur'},
            ],
            district: [
              {required: true, message: '请输入仓库所在区', trigger: 'blur'},
            ],
            address: [
              {required: true, message: '请输入仓库详细地址', trigger: 'blur'},
            ]
          },
          {
            name: [
              {required: true, message: '请输入仓库名称', trigger: 'blur'},
            ]
          }
        ],
        addArr:[
          [
            {
              label:'仓库名称',
              prop:'name',
              holder:'请输入仓库名称',
              type: 'text'
            },
            {
              label:'仓库地(省)',
              prop:'province',
              holder:'请输入仓库所在省',
              type: 'text'
            },
            {
              label:'仓库地(市)',
              prop:'city',
              holder:'请输入仓库所在市',
              type: 'text'
            },
            {
              label:'仓库地(区)',
              prop:'district',
              holder:'请输入仓库所在区',
              type: 'text'
            },
            {
              label:'仓库地址',
              prop:'address',
              holder:'请输入仓库详细地址',
              type: 'text'
            },
            {
              label:'是否默认',
              prop:'is_default',
              holder:'请选择是否默认',
              type: 'select_def'
            },
            {
              label:'状态',
              prop:'status',
              holder:'请选择状态',
              type: 'select_stu'
            }
          ],
          [
            {
              label:'平台名称',
              prop:'name',
              holder:'请输入平台名称',
              type: 'text'
            },
            {
              label:'状态',
              prop:'status',
              holder:'请选择状态',
              type: 'select_stu'
            }
          ]
        ],
        showMaskArr:[{show:false},{show:false},{show:false}],
        pagination:{
          current_page:1,
          per_page: 0,
          page_total: 0
        },
        searchBox:{
          buyNick:'',
          shopTitle:''
        },
        shopPage: true
      }
    },
    computed:{
      warehouse:{
        get:function(){return this.$store.state.SonData.warehouse;},
        set:function(){}
      },
      platforms:{
        get:function(){return this.$store.state.SonData.platforms;},
        set:function(){}
      },

    },
    methods:{
      test(){
        console.log(1);
      },
      /*获取时设置页码 */
      getShopInfo(url){
        this.$fetch(url)
          .then(res=>{
            this.getsInfo[this.activeName] = res.data;
            this.loading = false;
            let pg = res.meta.pagination;
            this.$store.dispatch('currentPage',pg.current_page);
            this.$store.commit('PER_PAGE',pg.per_page);
            this.$store.commit('PAGE_TOTAL',pg.total);
            if(url=='/warehouses'){
              this.$store.dispatch('setWarehouse',res.data)
            }else if(url=='/platforms'){
              this.$store.dispatch('setPlatform',res.data)
            }
          },err=>{
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
     /* getWarehouse(){
        this.$fetch('/warehouses')
          .then(res=>{
            this.warehouse = res.data;
            this.pagination.total = res.meta.pagination.total;
            this.pagination.per_page = res.meta.pagination.per_page;
            this.pagination.current_page = res.meta.pagination.current_page;
            this.loading = false;
          },err=>{
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
      getPlatform(){
        this.$fetch('/platforms')
          .then(res=>{
            this.platform = res.data;
            this.pagination.total = res.meta.pagination.total;
            this.pagination.per_page = res.meta.pagination.per_page;
            this.pagination.current_page = res.meta.pagination.current_page;
            this.loading = false;
          },err=>{
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
      },*/
      /*增加*/
      addNew(){
        this.showMaskArr[this.activeName].show=true;
      },
      CB_dialog(val){
        this.showMaskArr[this.activeName].show=val;
      },
      submitForm(formName) {
        this.$refs[formName].validate((valid) => {
          if (valid) {
            this.$post(this.url[this.activeName], this.ruleForm)
              .then(() => {
                this.$message({
                  message: '添加成功',
                  type: 'success'
                });
                this.showMaskArr[this.activeName].show=false;
                this.resetForm('ruleForm');
                this.getShopInfo(this.url[this.activeName]);
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
          } else {
            console.log('error submit!!');
            return false;
          }
        });
      },
      submitForm0(){
        let addObj = {
          name: this.newRuleForm[0].name,
          province: this.newRuleForm[0].province,
          city: this.newRuleForm[0].city,
          district: this.newRuleForm[0].district,
          address: this.newRuleForm[0].address,
          is_default: this.newRuleForm[0].is_default,
          status: this.newRuleForm[0].status
        };
        this.$post(this.url[1], addObj)
          .then(() => {
            this.$message({
              message: '添加成功',
              type: 'success'
            });
            this.showMaskArr[this.activeName].show=false;
            this.getShopInfo(this.url[this.activeName]);
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
      submitForm1(){
        let addObj = {
          name: this.newRuleForm[1].name,
          status: this.newRuleForm[1].status
        };
        this.$post(this.url[2], addObj)
          .then(() => {
            this.$message({
              message: '添加成功',
              type: 'success'
            });
            this.showMaskArr[this.activeName].show=false;
            this.getShopInfo(this.url[this.activeName]);
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
      resetForm(formName) {
        this.$refs[formName].resetFields();
      },
      /*删除*/
      delClick(row,e){
        this.showDel = true;
        $('.el-popper').css({left: e.x - 100 + 'px', top: e.y - 125 + 'px'});
        this.delId = row.id;
      },
      cancelD(){
        this.showDel = false;
        this.$message({
          message: '取消删除',
          type: 'info'
        });
      },
      confirmD(id){
        this.$del(this.url[this.activeName]+'/'+id)
          .then(()=>{
            this.$message({
              message: '删除成功',
              type: 'success'
            });
            this.showDel = false;
            // this.getShopInfo(this.url[this.activeName]);
            this.refresh();
            // this.funs[this.activeName]();
          },err=>{
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
      /*修改*/
      handleEdit(){
        this.inputChange = true;
      },
      editType(row,index){
        this.changeIndex = `index${index}`;
      },
      editSave(index,row){
        let newData = {};
        if(this.activeName=='0'){
          newData =  {
            nick: row.nick,
            title: row.title,
            session_key: row.session_key,
            warehouse: row.warehouse.id,
            shop_account: row.shop_account,
            rebate: row.rebate,
            principal: row.principal,
            principal_mobile: row.principal_mobile,
            province: row.province,
            city: row.city,
            district: row.district,
            address: row.address,
            gross_profit_rate: row.gross_profit_rate,
            platform: row.platform.id,
            is_waybill: row.is_waybill
          }
        }else if(this.activeName == '1'){
          newData =  {
            name:row.name,
            province: row.province,
            city: row.city,
            district: row.district,
            address: row.address,
            is_default: row.is_default,
            status: row.status
          }
        }else if(this.activeName == '2'){
          newData = {
            name: row.name,
            status: row.status
          }
        }
        if(this.inputChange){
          this.$patch(this.url[this.activeName]+'/'+row.id,newData)
            .then(()=>{
              this.$message({
                message: '修改成功',
                type: 'success'
              });
              // this.funs[this.activeName]();
              this.getShopInfo(this.url[this.activeName]);
              this.changeIndex ='';
              this.inputChange = false;
            },err=>{
              if(err.response){
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
        }else{
          this.$message({
            message: '数据未改动',
            type: 'info'
          });
        }
      },
      editCancel(){
        this.$message({
          message: '取消修改',
          type: 'info'
        });
        this.changeIndex = '';
      },
      /*多删*/
      toggleChecked(){
        this.checkboxInit = !this.checkboxInit;
      },
      handleSelectionChange(val){
        this.multipleSelection = val;
        let del = [];
        this.multipleSelection.forEach(selectedItem => {
          del.push(selectedItem.id);
        });
        this.delArr = del.join(',');
      },
      delMore(){
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
                // this.funs[this.activeName]();
                // this.getShopInfo(this.url[this.activeName]);
                this.refresh();
              },err=>{
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
      /*刷新*/
      refresh(){
        this.loading = true;
        this.getShopInfo(this.url[this.activeName]);
        setTimeout(()=>{
          this.loading = false;
        },2000);
      },
      handleTabsClick(){
        this.loading = true;
        this.getShopInfo(this.url[this.activeName]);
        this.shopPage = this.activeName == 0?true:false;
      },
      getData(){
        alert(this.searchBox);
        console.log(this.searchBox);
      }
    },
    mounted() {
      this.getShopInfo(this.url[0]);
      this.$store.dispatch('setOpt',this.newOpt);
      let that = this;
      $(window).resize(() => {
        that.$store.dispatch('setOpt',that.newOpt);
      });
    }
  }
</script>