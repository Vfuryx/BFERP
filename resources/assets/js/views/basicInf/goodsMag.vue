<template>
    <div>
        <!--搜索框-->
        <div class="searchBox">
            <span>
                <label>商品名称</label>
                <el-input v-model="searchBox.goodsName" clearable @keyup.enter.native="getData"></el-input>
            </span>
            <span>
                <label>店铺名称</label>
                <el-select v-model="searchBox.shopNames" clearable placeholder="请选择">
                    <el-option v-for="item in searchBox.shopNames" :key="item.value" :label="item.label"
                               :value="item.value"></el-option>
                </el-select>
            </span>
            <span>
                <label>供货商</label>
                <el-select v-model="searchBox.supplier" clearable placeholder="请选择">
                    <el-option v-for="item in searchBox.supplier" :key="item.value" :label="item.label"
                               :value="item.value"></el-option>
                </el-select>
            </span>
            <span>
                <label>类别</label>
                <el-select v-model="searchBox.kinds" clearable placeholder="请选择">
                    <el-option v-for="item in searchBox.kinds" :key="item.value" :label="item.label"
                               :value="item.value"></el-option>
                </el-select>
            </span>
            <span>
                <el-checkbox v-model="searchBox.isComb">组合产品</el-checkbox>
                <el-checkbox v-model="searchBox.isStop">停产</el-checkbox>
                <el-checkbox v-model="searchBox.isStatus">启用</el-checkbox>
            </span>
        </div>

        <!--商品信息-->
        <light-table :listData="goodsInfo" @handleSelect="handleSelectionChange"
                     :tableHead="goodsHead" @editSave="editSave" @handleEdit="handleEdit" @del="del" :loading="goodsLoading" @edit="edit" :currentIndex="currentIndex" @editCancel="editCancel" :height="407" @rowClick="proRowClick" :nEditInRow="true"></light-table>

        <!--页码-->
        <Pagination :page-url="goodsUrl"></Pagination>

        <!--底部tabs-->
        <el-tabs v-model="activeName" @tab-click="handleTabsClick">
            <el-tab-pane label="淘宝信息" name="0">
                淘宝信息
            </el-tab-pane>
            <el-tab-pane label="规格信息" name="1">
               <!-- <p style="text-align: center">
                    <el-checkbox v-model="adf">组合</el-checkbox>
                    <el-checkbox v-model="adf">成品</el-checkbox>
                    <el-checkbox v-model="adf">停产</el-checkbox>
                </p>-->
                <!-- :row-style="chgStyle"-->
                <el-table :data="goodsSpec" style="width: 100%">
                    <el-table-column v-for="(item,index) in btmTableHead[this.activeName]" :label="item.label" align="center" :width="item.width" :key="index">
                        <template slot-scope="scope">
                            <span v-if="item.prop">
                                 <span v-if="item.type=='select'">
                                <span v-for="(list,index) in resData[item.stateVal]" :key="index">
                                        <span v-if="list.id==scope.row[item.prop]">
                                            {{list.name}}
                                        </span>
                                </span>
                            </span>
                                <span v-else-if="item.type=='checkbox'">
                                <span v-if="scope.$index==0">
                                    <el-checkbox v-model="goodsSpec[0][item.prop]" @change="chgStatue(scope.row[item.prop])"></el-checkbox>
                                </span>
                                <span v-else>
                                    <span v-if="scope.row[item.prop]==1">
                                        <el-checkbox :checked="true" disabled></el-checkbox>
                                    </span>
                                    <span v-else>
                                        <el-checkbox :checked="false" disabled></el-checkbox>
                                    </span>
                                </span>
                             </span>
                                <span v-else>
                                 {{scope.row[item.prop]}}
                                <!--  &lt;!&ndash;读取二级数据&ndash;&gt;
                                  <span v-if="item.inProp">
                                       {{scope.row[item.prop][item.inProp]}}
                                  </span>
                                  <span v-else>
                                       {{scope.row[item.prop]}}
                                  </span>-->
                            </span>
                            </span>
                        </template>
                    </el-table-column>
                    <el-table-column type="expand" fixed="left">
                        <template slot-scope="scope">
                         <span v-if="scope.row.combinations.length>0">
                                 <el-table :data="scope.row.combinations" fit highlight-current-row max-height="300" :header-cell-class-name="setHeadStyle">
                             <el-table-column v-for="(item,index) in btmSpecHead" :label="item.label" align="center" :width="item.width" :key="index" :sortable="item.doSort" :prop="item.prop">
                                 <template slot-scope="scope">
                             <span v-if="item.type=='checkbox'">
                                <el-checkbox v-model="scope.row[item.prop][item.inProp]" disabled></el-checkbox>
                            </span>
                            <span v-else>
                                {{item.inProp?scope.row[item.prop][item.inProp]:scope.row[item.prop]}}
                            </span>
                                 </template>
                             </el-table-column>
                         </el-table>
                         </span>
                        </template>
                    </el-table-column>
                </el-table>
            </el-tab-pane>
            <el-tab-pane label="商品网站" name="2">
                商品网站
            </el-tab-pane>
            <el-tab-pane label="操作记录" name="3">
                操作记录
            </el-tab-pane>
        </el-tabs>

        <!--新增商品-->
         <el-dialog :title="title" :visible.sync="showMask" :class="{'more-forms':moreForms}">
             <add-new :rule-form="ruleForm" :rules="rules" :add-arr="addArr" :son-ref="addInfoRef" :onlyInputs="true" ref="addNew"></add-new>
             <el-button type="text">规格信息</el-button>
            <!-- <el-checkbox v-model="pushData.is_combination">组合</el-checkbox>
             <el-checkbox v-model="pushData.finished_pro">成品</el-checkbox>
             <el-checkbox v-model="pushData.is_stop_pro">停产</el-checkbox>-->
             <el-table :data="ruleForm.productspecs" fit highlight-current-row
                       max-height="300" :row-class-name="tableRowClassName" @row-click="specRowClick">
                 <!--规格-->
                 <el-table-column v-for="(item,index) in specHead" :label="item.label" align="center" :width="item.width" :key="index">
                     <template slot-scope="scope">
                         <span v-if="newC =='index'+scope.$index">
                            <span v-if="item.type=='number'">
                                   <el-input size="small" type="number" v-model="scope.row[item.prop]" :placeholder="item.holder" @change="handleEdit" :disabled="item.beAble"></el-input>
                            </span>
                            <span v-else-if="item.type=='url'">
                          <el-input size="small" type="url" v-model="scope.row[item.prop]" :placeholder="item.holder" @change="handleEdit" :disabled="item.beAble"></el-input>
                        </span>
                            <span v-else-if="item.type == 'textarea'">
                                  <el-input type="textarea" size="small" v-model="scope.row[item.prop]"
                                            :placeholder="item.holder" @change="handleEdit"></el-input>
                            </span>
                            <span v-else-if="item.type == 'select'">
                                 <el-select v-model="scope.row[item.prop]"  :placeholder="item.holder">
                                   <span v-for="list in resData[item.stateVal]" :key="list.id">
                                        <el-option :label="list.name" :value="list.id"></el-option>
                                   </span>
                               </el-select>
                            </span>
                            <span v-else-if="item.type == 'checkbox'">
                                 <el-checkbox v-model="scope.row[item.prop]" :disabled="item.prop=='is_combination'?true:false"></el-checkbox>
                            </span>
                            <span v-else>
                               <el-input size="small" v-model="scope.row[item.prop]" :placeholder="item.holder" @change="handleEdit" :disabled="item.beAble"></el-input>
                            </span>
                     </span>
                         <span v-else>
                             <span v-if="item.type=='select'">
                                <span v-if="scope.row[item.prop]==''"></span>
                                <span v-else>
                                       <span v-for="(list,index) in resData[item.stateVal]" :key="index">
                                              <span v-if="list.id==scope.row[item.prop]">
                                                    {{list.name}}
                                           </span>
                                </span>
                                </span>
                                </span>
                             <span v-else-if="item.type=='checkbox'">
                                  <el-checkbox v-model="scope.row[item.prop]" disabled></el-checkbox>
                             </span>
                             <span v-else>
                                 {{item.inProp?scope.row[item.prop][item.inProp]:scope.row[item.prop]}}
                            </span>
                     </span>
                     </template>
                 </el-table-column>
                 <!-- 子规格 -->
                 <el-table-column type="expand" fixed="left">
                     <template slot-scope="scope">
                         <span v-if="scope.row.combinations.length>0">
                             <el-table :data="scope.row.combSpecData"  highlight-current-row height="300" fit :header-cell-class-name="setHeadStyle">
                                 <el-table-column v-for="(item,index) in combHead" :label="item.label" align="center" :width="item.width" :key="index" :sortable="item.doSort" :prop="item.prop">
                                     <template slot-scope="scope">
                                         <span v-if="item.type=='checkbox'">
                                             <el-checkbox v-model="scope.row[item.prop]" disabled></el-checkbox>
                                         </span>
                                         <span v-else>{{item.inProp?scope.row[item.prop][item.inProp]:scope.row[item.prop]}}</span>
                                     </template>
                                 </el-table-column>
                                 <el-table-column label="操作" align="center" width="90">
                                     <template slot-scope="scope">
                                         <el-button size="mini" type="danger" @click="delComb(scope.$index,scope.row)">删除</el-button>
                                     </template>
                                 </el-table-column>
                             </el-table>
                         </span>
                     </template>
                 </el-table-column>
                 <el-table-column label="操作" width="136" align="center" fixed="right">
                     <template slot-scope="scope">
                         <!--<span v-if="scope.$index==0"></span>-->
                         <!--<span v-else>-->
                             <span v-if="newC=='index'+scope.$index">
                               <el-button size="mini" @click="specSave(scope.$index,scope.row)" type="success">保存</el-button>
                        </span>
                             <span v-else>
                             <el-button size="mini" @click="specEdit(scope.row)" type="primary">编辑</el-button>
                        </span>
                         <!--</span>-->
                     </template>
                 </el-table-column>
             </el-table>
             <div slot="footer" class="dialog-footer clearfix">
                 <div style="float: left">
                     <el-button type="primary" @click="addComb">添加组合</el-button>
                 </div>
                 <div style="float: right">
                     <el-button type="primary" @click="submitForm">添加</el-button>
                     <el-button @click="resetAddInfo">重置</el-button>
                     <el-button @click="cancelAdd">取消</el-button>
                 </div>
             </div>
         </el-dialog>

        <!--修改-->
        <el-dialog title="修改商品" :visible.sync="editMask" :class="{'more-forms':moreForms}">
            <add-new :rule-form="editData" :rules="rules" :add-arr="addArr" :son-ref="addInfoRef" :onlyInputs="true" ref="addNew" :editSign="true"></add-new>
            <el-button type="text">规格信息</el-button>
            <el-table :data="editData.productspecs" fit highlight-current-row type="index" max-height="300" :row-class-name="editRowCName" @row-click="editRowClick">
                <el-table-column v-for="(item,index) in btmTableHead[1]" :label="item.label" align="center" :width="item.width" :key="index">
                    <template slot-scope="scope">
                         <span v-if="editSpecIndex =='index'+scope.$index">
                            <span v-if="item.type=='number'">
                                   <el-input size="small" type="number" v-model="scope.row[item.prop]" :placeholder="item.holder" @change="handleEdit" :disabled="item.beAble"></el-input>
                            </span>
                            <span v-else-if="item.type=='url'">
                          <el-input size="small" type="url" v-model="scope.row[item.prop]" :placeholder="item.holder" @change="handleEdit" :disabled="item.beAble"></el-input>
                        </span>
                            <span v-else-if="item.type == 'textarea'">
                                  <el-input type="textarea" size="small" v-model="scope.row[item.prop]"
                                            :placeholder="item.holder" @change="handleEdit"></el-input>
                            </span>
                            <span v-else-if="item.type == 'select'">
                                 <el-select v-model="scope.row[item.prop]"  :placeholder="item.holder">
                                   <span v-for="list in resData[item.stateVal]" :key="list.id">
                                        <el-option :label="list.name" :value="list.id"></el-option>
                                   </span>
                               </el-select>
                            </span>
                            <span v-else-if="item.type == 'checkbox'">
                                 <el-checkbox v-model="scope.row[item.prop]" :disabled="item.prop=='is_combination'?true:false"></el-checkbox>
                            </span>
                            <span v-else>
                               <el-input size="small" v-model="scope.row[item.prop]" :placeholder="item.holder" @change="handleEdit" :disabled="item.beAble"></el-input>
                            </span>
                     </span>
                        <span v-else>
                             <span v-if="item.type=='select'">
                                <span v-if="scope.row[item.prop]==''"></span>
                                <span v-else>
                                       <span v-for="(list,index) in resData[item.stateVal]" :key="index">
                                              <span v-if="list.id==scope.row[item.prop]">
                                                    {{list.name}}
                                           </span>
                                </span>
                                </span>
                                </span>
                             <span v-else-if="item.type=='checkbox'">
                                  <el-checkbox v-model="scope.row[item.prop]" disabled></el-checkbox>
                             </span>
                             <span v-else>
                                 {{item.inProp?scope.row[item.prop][item.inProp]:scope.row[item.prop]}}
                            </span>
                     </span>
                    </template>
                </el-table-column>
                <!--子规格 -->
                <el-table-column type="expand" fixed="left">
                        <template slot-scope="scope">
                            <span v-if="scope.row.combinations.length>0">
                                <el-table :data="scope.row.combinations"  highlight-current-row max-height="300" fit :header-cell-class-name="setHeadStyle">
                                          <el-table-column v-for="(item,index) in btmSpecHead" :label="item.label" align="center" :key="index">
                                 <template slot-scope="scope">
                                     <span v-if="item.inProp">
                                          <span v-if="item.type=='checkbox'">
                                             <el-checkbox v-model="scope.row[item.prop][item.inProp]" disabled></el-checkbox>
                                         </span>
                                         <span v-else>{{item.inProp?scope.row[item.prop][item.inProp]:scope.row[item.prop]}}</span>
                                     </span>
                                 </template>
                             </el-table-column>
                             <el-table-column label="操作" align="center" width="90">
                               <template slot-scope="scope">
                                   <el-button size="mini" type="danger" @click="delSonSpec(scope.$index,scope.row)">删除</el-button>
                               </template>
                             </el-table-column>
                         </el-table>
                         </span>
                        </template>
                </el-table-column>
                <el-table-column label="操作" width="160" align="center" fixed="right">
                <template slot-scope="scope">
                        <span v-if="editSpecIndex=='index'+scope.$index">
                               <el-button size="mini" @click="saveEdit(scope.$index,scope.row)" type="success">保存</el-button>
                        </span>
                        <span v-else>
                             <el-button size="mini" @click="openEdit(scope.$index)" type="primary">编辑</el-button>
                        </span>
                    </template>
                </el-table-column>
            </el-table>
            <!--底部操作按钮-->
            <div slot="footer" class="dialog-footer clearfix">
                <div style="float: left">
                    <el-button type="primary" @click="addSpec">添加规格</el-button>
                    <el-button type="primary" @click="addComb">添加组合</el-button>
                </div>
                <div style="float: right">
                    <el-button type="primary" @click="confirmEdit">确定</el-button>
                    <el-button @click="cancelEdit">取消</el-button>
                </div>
            </div>
        </el-dialog>

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

        <!--选择商品-->
        <el-dialog title="选择商品" :visible.sync="showComb" class="goodsMag">
            <div>
                <label>规格名称</label>
                <el-input clearable style="width: 60%;margin:0 10px 0 5px;" @keyup.enter.native="getPro" v-model="conditionPro"></el-input>
                <el-button type="primary" @click="getPro">查询</el-button>
            </div>
            <el-table :data="combData" fit highlight-current-row
                      height="400" :row-class-name="combClassName" @row-click="proRClick">
                <light-table :tableHead="selectPro" :onlyTableColumn="true"></light-table>
                <el-table-column width="150" align="center" fixed="right" label="组合件数">
                    <template slot-scope="scope">
                        <span v-if="combIndex=='index'+scope.$index">
                            <el-input size="small" v-model="combCount[scope.$index]" type="number" @blur="handleBlur(scope.row)"></el-input>
                        </span>
                        <span v-else>
                            {{combCount[scope.$index]?combCount[scope.$index]:0}}
                        </span>
                    </template>
                </el-table-column>
            </el-table>
            <div style="text-align: right;">
                <el-button type="primary" @click="confirmAddComb">确认</el-button>
                <el-button @click="cancelAddComb">取消</el-button>
            </div>
        </el-dialog>
    </div>
</template>
<script>
  export default {
    data() {
      return {
        newC:'',
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
        addInfoRef: 'goods',
        activeName: '0',
        goodsInfo: [],
        goodsHead: [
          {
            label: '产品图片',
            width: '200',
            prop: "img",
            type: 'text'
          },
          {
            label: '店铺名称',
            width: '150',
            prop: "shop_nick",
            type: 'text'
          },
          {
            label: '供货商',
            width: '150',
            prop: 'supplier',
            nmProp:'name',
            type: 'select',
          },
          {
            label: '产品类别',
            width: '120',
            prop: "category",
            nmProp:'name',
            type: 'select',
          },
          {
            label: '工厂型号',
            width: '120',
            prop: "factory_model",
            type: 'text'
          },
          {
            label: '商品编码',
            width: '180',
            prop: "commodity_code",
            type: 'text'
          },

          {
            label: '京东商品编码',
            width: '180',
            prop: "jd_sn",
            type: 'text'
          },
          {
            label: '唯品会商品编码',
            width: '180',
            prop: "vips_sn",
            type: 'text'
          },
          {
            label: '商品简称',
            width: '120',
            prop: "short_name",
            type: 'text'
          },
          {
            label: '商品标题',
            width: '150',
            prop: "title",
            type: 'text'
          },
          {
            label: '备注',
            width: '120',
            prop: "remark",
            type: 'textarea'
          },
          {
            label: '停产',
            width: '80',
            prop: "is_stop_pro",
            type: 'checkbox'
          },
          {
            label: '启用',
            width: '80',
            prop: "status",
            type: 'checkbox'
          }],
        goodsUrl: '/goods',
        goodsLoading: true,
        showMask: false,
        getsInfo: [[], [], []],
        btmTableHead: [
          [],
          [
            {
              label: '规格编码',
              width: '160',
              prop: "spec_code",
              type: 'text',
            },
            {
              label: '京东规格编号',
              width: '180',
              prop: "jd_specs_code",
              type: 'text'
            },
            {
              label: '唯品会规格编号',
              width: '180',
              prop: "vips_specs_code",
              type: 'text'
            },
           /* {
              label: '规格图片',
              width: '120',
              prop: "img_url",
              holder: '请输入图片地址',
              type: 'text'
            },*/
            {
              label: '淘宝价格',
              width: '120',
              prop: "tb_price",
              type: 'number'
            },
            {
              label: '成本价格',
              width: '120',
              prop: "cost",
              type: 'number'
            },
            {
              label: '销售价格',
              width: '120',
              prop: "price",
              type: 'number'
            },
            {
              label: '仓库成本',
              width: '120',
              prop: "warehouse_cost",
              type: 'number'
            },
            {
              label: '折扣',
              width: '120',
              prop: "discount",
              type: 'number'
            },
            {
              label: '佣金点',
              width: '100',
              prop: "commission",
              type: 'number'
            },
            {
              label: '木架费',
              width: '120',
              prop: "wooden_frame_costs",
              type: 'number'
            },
            {
              label: '采购运费',
              width: '120',
              prop: "purchase_freight",
              type: 'number'
            },
            {
              label: '组合',
              width: '120',
              prop: "is_combination",
              type: 'checkbox',
              chgAble: false,
              editChgAble: true,
            },
            {
              label: '包件数量',
              width: '120',
              prop: "package_quantity",
              type: 'number'
            },
            {
              label: '库存预警数量',
              width: '150',
              prop: "inventory_warning",
              type: 'number'
            },
            {
              label: '采购预警天数',
              width: '150',
              prop: "purchase_days_warning",
              // holder: '请输入采购预警天数',
              type: 'number'
            },
            {
              label: '产品配送类别',
              width: '150',
              prop:'distribution_method_id',
              stateVal:'distmets',
              type: 'select'
            },
            {
              label: '规格',
              width: '200',
              prop: "spec",
              // holder: '请输入规格',
              type: 'text'
            },
            /*{
              label: '最高价格',
              width: '120',
              prop: "highest_price",
              holder: '请输入最高价格',
              type: 'number'
            },
            {
              label: '成本价格',
              width: '120',
              prop: "cost",
              holder: '请输入所成本价格',
              type: 'number'
            },
            {
              label: '装配价格',
              width: '120',
              prop: "assembly_price",
              holder: '请输入装配价格',
              type: 'number'
            },
            {
              label: '最低价格',
              width: '120',
              prop: "lowest_price",
              holder: '请输入最低价格',
              type: 'number'
            },
            {
              label: '销售价格',
              width: '120',
              prop: "price",
              holder: '请输入销售价格',
              type: 'number'
            },
            {
              label: '打包费用',
              width: '120',
              prop: "package_costs",
              holder: '请输入打包费用',
              type: 'number'
            },

            {
              label: '条形码',
              width: '100',
              prop: "bar_code",
              holder: '请输入佣金点',
              type: 'text'
            },
            {
              label: '可售数预警数量',
              width: '180',
              prop: "available_warning",
              holder: '请输入可售数预警数量',
              type: 'number'
            },
*/
            {
              label: '颜色',
              width: '120',
              prop: "color",
              // holder: '请输入颜色',
              type: 'text'
            },
            {
              label: '材质',
              width: '130',
              prop: "materials",
              // holder: '请输入材质',
              type: 'text'
            },
            {
              label: '功能',
              width: '100',
              prop: "function",
              // holder: '请输入功能',
              type: 'text'
            },
            {
              label: '特殊',
              width: '130',
              prop: "special",
              // holder: '请输入特殊',
              type: 'text'
            },
            {
              label: '其他',
              width: '150',
              prop: "other",
              // holder: '请输入其他',
              type: 'text'
            },
            {
              label: '长度',
              width: '120',
              prop: "longness",
              // holder: '请输入长度',
              type: 'number'
            },
            {
              label: '宽度',
              width: '120',
              prop: "width",
              // holder: '请输入宽度',
              type: 'number'
            },
            {
              label: '高度',
              width: '120',
              prop: "height",
              // holder: '请输入高度',
              type: 'number'
            },
            {
              label: '体积',
              width: '120',
              prop: "volume",
              // holder: '请输入体积',
              type: 'number'
            },
            {
              label: '重量',
              width: '120',
              prop: "weight",
              // holder: '请输入重量',
              type: 'number'
            },
            {
              label: '备注',
              width: '150',
              prop: "remark",
              // holder: '请输入备注',
              type: 'textarea'
            },
            {
              label: '成品',
              width: '120',
              prop: "finished_pro",
              // holder: '请选择是否是成品',
              type: 'checkbox'
            },
            {
              label: '停产',
              width: '120',
              prop: "is_stop_pro",
              // holder: '请选择是否是停产',
              type: 'checkbox'
            }
          ],
          [
            {
              label: '产品规格编码',
              width: '150',
              prop: "product_specs",
              holder: '请选择产品规格编码',
              type: 'select',
              val: this.sonArr
            },
            {
              label: '组合产品规格编码',
              width: '150',
              prop: "com_pro_specs",
              holder: '请选择组合产品规格编码',
              type: 'select',
              val: this.sonArr
            },
            {
              label: ' 组合件数',
              width: '120',
              prop: "count",
              holder: '请输入 组合件数',
              type: 'number'
            },
            {
              label: '状态',
              width: '80',
              prop: "status",
              type: 'select_stu'
            }
          ],
          []
        ],
        chgSpecVal:[],
        loading: true,
        currentIndex: '',
        url: ['', '/productspecs'],
        title: '新增商品',
        ruleForm: {
          commodity_code: '',
          jd_sn: '',
          vips_sn: '',
          factory_model: '',
          short_name: '',
          shops_id: '',
          shop_nick:'',
          supplier_id: '',
          category_id: '',
          remark: '',
          title: '',
          img: '',
          url: '',
          is_stop_pro: false,
          status: true,
          productspecs:[]
        },
        rules: {
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
          ]
        },
        addArr: [
          {
            label: '商品编码',
            prop: 'commodity_code',
            holder: '请输入商品编号',
            type: 'text',
            addChgAble: false,
            editChgAble: true,
          },
          {
            label: '京东编码',
            prop: 'jd_sn',
            holder: '请输入京东编码',
            type: 'text'
          },
          {
            label: '唯品会编码',
            prop: 'vips_sn',
            holder: '请输入唯品会编码',
            type: 'text'
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
            type: 'text'
          },
          {
            label: '卖家昵称',
            prop: 'shops_id',
            holder: '请选择卖家昵称',
            type: 'select',
            stateVal: 'shops'
          },
          {
            label: '供货厂商',
            prop: 'supplier_id',
            holder: '请选择供货厂商',
            type: 'select',
            stateVal:'suppliers'
          },
          {
            label: '商品类别',
            prop: 'category_id',
            holder: '请选择产品类别',
            type: 'select',
            stateVal:'goodscates'
          },
          {
            label: '商品备注',
            prop: 'remark',
            holder: '请输入商品备注',
            type: 'textarea'
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
          }
        ],
        /*规格信息*/
        specHead:[
          /*{
            label: '商品简称',
            width: '120',
            prop: "",
            type: 'text',
          },*/
          {
            label: '规格编码',
            width: '160',
            prop: "spec_code",
            type: 'text',
          },
          {
            label: '京东规格编号',
            width: '180',
            prop: "jd_specs_code",
            type: 'text'
          },
          {
            label: '唯品会规格编号',
            width: '180',
            prop: "vips_specs_code",
            type: 'text'
          },
          /* {
             label: '规格图片',
             width: '120',
             prop: "img_url",
             holder: '请输入图片地址',
             type: 'text'
           },*/
          {
            label: '淘宝价格',
            width: '120',
            prop: "tb_price",
            type: 'number'
          },
          {
            label: '成本价格',
            width: '120',
            prop: "cost",
            type: 'number'
          },
          {
            label: '销售价格',
            width: '120',
            prop: "price",
            type: 'number'
          },
          {
            label: '最低销售价格',
            width: '120',
            prop: "lowest_price",
            type: 'number'
          },
          {
            label: '最高销售价格',
            width: '120',
            prop: "highest_price",
            type: 'number'
          },
          {
            label: '仓库成本',
            width: '120',
            prop: "warehouse_cost",
            type: 'number'
          },
          {
            label: '配装价格',
            width: '120',
            prop: "assembly_price",
            type: 'number'
          },
          {
            label: '折扣',
            width: '120',
            prop: "discount",
            type: 'number'
          },
          {
            label: '佣金点',
            width: '100',
            prop: "commission",
            type: 'number'
          },
          {
            label: '组合',
            width: '120',
            prop: "is_combination",
            type: 'checkbox'
          },
          {
            label: '包件数量',
            width: '120',
            prop: "package_quantity",
            type: 'number'
          },
          {
            label: '打包费',
            width: '120',
            prop: "package_costs",
            type: 'number'
          },
          {
            label: '木架费',
            width: '120',
            prop: "wooden_frame_costs",
            type: 'number'
          },
          {
            label: '采购运费',
            width: '120',
            prop: "purchase_freight",
            type: 'number'
          },
          {
            label: '库存预警数量',
            width: '150',
            prop: "inventory_warning",
            // holder: '请输入库存预警数量',
            type: 'number'
          },
          {
            label: '采购预警天数',
            width: '150',
            prop: "purchase_days_warning",
            // holder: '请输入采购预警天数',
            type: 'number'
          },
          {
            label: '可售数预警',
            width: '150',
            prop: "available_warning",
            // holder: '请输入采购预警天数',
            type: 'number'
          },

          {
            label: '产品配送类别',
            width: '150',
            prop:'distribution_method_id',
            holder: '请选择产品配送类别',
            stateVal:'distmets',
            type: 'select'
          },
          {
            label: '条形码',
            width: '120',
            prop: "bar_code",
            type: 'text'
          },
          {
            label: '图片地址',
            width: '120',
            prop: "img_url",
            type: 'text'
          },
          {
            label: '规格',
            width: '200',
            prop: "spec",
            // holder: '请输入规格',
            type: 'text'
          },
          {
            label: '颜色',
            width: '120',
            prop: "color",
            // holder: '请输入颜色',
            type: 'text'
          },
          {
            label: '材质',
            width: '130',
            prop: "materials",
            // holder: '请输入材质',
            type: 'text'
          },
          {
            label: '功能',
            width: '100',
            prop: "function",
            // holder: '请输入功能',
            type: 'text'
          },
          {
            label: '特殊',
            width: '130',
            prop: "special",
            // holder: '请输入特殊',
            type: 'text'
          },
          {
            label: '其他',
            width: '150',
            prop: "other",
            // holder: '请输入其他',
            type: 'text'
          },
          {
            label: '长度(mm)',
            width: '120',
            prop: "longness",
            // holder: '请输入长度',
            type: 'number'
          },
          {
            label: '宽度(mm)',
            width: '120',
            prop: "width",
            // holder: '请输入宽度',
            type: 'number'
          },
          {
            label: '高度(mm)',
            width: '120',
            prop: "height",
            // holder: '请输入高度',
            type: 'number'
          },
          {
            label: '体积(m3)',
            width: '120',
            prop: "volume",
            // holder: '请输入体积',
            type: 'number'
          },
          {
            label: '重量',
            width: '120',
            prop: "weight",
            // holder: '请输入重量',
            type: 'number'
          },
          {
            label: '备注',
            width: '150',
            prop: "remark",
            // holder: '请输入备注',
            type: 'textarea'
          },
          {
            label: '成品',
            width: '120',
            prop: "finished_pro",
            // holder: '请选择是否是成品',
            type: 'checkbox'
          },
          {
            label: '停产',
            width: '120',
            prop: "is_stop_pro",
            // holder: '请选择是否是停产',
            type: 'checkbox'
          }
        ],
        halfForm: true,
        refArr: 'ruleGoods',
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
        editTitle: '修改商品信息',
        editMask: false,
        editId: '',
        editData: {},
        leftTab: '修改',
        showComb: false,
        CombForm: {},
        combRules: {},
        checkboxInit: false,
        multipleTable: [],
        tData: [],
        countComp: '',
        compRow: {},
        combIndex: '',
        specRow: {},
        searchBox: {
          goodsName: '',
          shopNames: '',
          supplier: '',
          kinds: '',
          isComb: false,
          isStop: false,
          isStatus: false
        },
        moreForms: true,
        newArr:[],
        specIndex: '',
        combCount:[],
        combArr:[],
        idNew:[],
        combinationsArr:[],
        fetchCombData:[],
        specAddIndex:'',
        combRowIndex:'',
        sonData:[],
        specRowInfo:{},
        /*新数据*/
        goodsSpec:[{is_combination: false,finished_pro: true,is_stop_pro: false}],
        selectPro:[
          {
            label: '成品',
            width: '80',
            prop: "finished_pro",
            type: 'checkbox',
            /*false 可点击 不写默认false 即不写是可点击*/
            clickAble: true
          },
          {
            label: '组合',
            width: '86',
            prop: "is_combination",
            type: 'checkbox',
            /*true不可点击*/
            clickAble: true
          },
          {
            label: '商品编码',
            width: '150',
            prop: "goods",
            inProp:"commodity_code",
            type: 'text',
          },
          {
            label: '规格编码',
            width: '150',
            prop: "spec_code",
            type: 'text',
          },
          {
            label: '商品名称',
            width: '150',
            prop: "goods",
            inProp:'short_name',
            type: 'text',
          },
          {
            label: '规格名称',
            width: '200',
            prop: "spec",
            type: 'text',
          }
        ],
        /*选取规格默认值*/
        pushData:{is_combination:false,finished_pro:true,is_stop_pro:false},
        /*点击时push规格数据*/
        specKey:{
          spec_code:'',
          jd_specs_code:'',
          vips_specs_code:'',
          tb_price:'',
          cost:'',
          price:'',
          highest_price:'',
          lowest_price:'',
          warehouse_cost:'',
          assembly_price:'',
          discount:'',
          commission:'',
          is_combination:'0',
          package_quantity:'',
          package_costs:'',
          wooden_frame_costs:'',
          purchase_freight:'',
          inventory_warning:'',
          purchase_days_warning:'',
          available_warning:'',
          distribution_method_id:'',
          bar_code:'',
          img_url:'',
          spec:'',
          color:'',
          materials:'',
          function:'',
          special:'',
          other:'',
          longness:'',
          width:'',
          height:'',
          volume:'',
          weight:'',
          remark:'',
          finished_pro: true,
          is_stop_pro: false,
          combinations:[],
          combSpecData:[]
        },
        combData:[],
        combHead:[
          {
            label: '商品简称',
            // width: '120',
            prop: "goods",
            inProp: "short_name",
            type: 'text',
          },
          {
            label: '商品编码',
            // width: '160',
            prop: "goods",
            inProp: "commodity_code",
            type: 'text',
          },
          {
            label: '规格编码',
            // width: '160',
            prop: "spec_code",
            type: 'text',
          },
          {
            label: '淘宝价格',
            // width: '120',
            prop: "tb_price",
            type: 'number'
          },
          {
            label: '成本价格',
            // width: '120',
            prop: "cost",
            type: 'number'
          },
          {
            label: '销售价格',
            // width: '120',
            prop: "price",
            type: 'number'
          },
          {
            label: '包件数量',
            // width: '120',
            prop: "package_quantity",
            type: 'number'
          },
          {
            label: '规格',
            // width: '150',
            prop: "spec",
            type: 'text'
          },
          {
            label: '颜色',
            // width: '120',
            prop: "color",
            type: 'text'
          },
          {
            label: '材质',
            // width: '130',
            prop: "materials",
            type: 'text'
          },
          {
            label: '特殊',
            // width: '130',
            prop: "special",
            type: 'text'
          },
          {
            label: '其他',
            // width: '150',
            prop: "other",
            type: 'text'
          },
          {
            label: '体积',
            // width: '120',
            prop: "volume",
            type: 'number'
          },
          {
            label: '成品',
            prop: "finished_pro",
            type: 'checkbox'
          },
          {
            label: '最低销售价格',
            // width: '120',
            prop: "lowest_price",
            type: 'number'
          },
          {
            label: '最高销售价格',
            // width: '120',
            prop: "highest_price",
            type: 'number'
          }
        ],
        btmSpecHead:[
          {
            label: '规格编码',
            // width: '160',
            prop:'com_pro_spec',
            inProp: "spec_code",
            type: 'text',
          },
          {
            label: '京东规格编码',
            // width: '180',
            prop:'com_pro_spec',
            inProp: "jd_specs_code",
            type: 'text',
          },
          {
            label: '唯品会规格编码',
            // width: '180',
            prop:'com_pro_spec',
            inProp: "vips_specs_code",
            type: 'text',
          },
          {
            label: '淘宝价格',
            // width: '120',
            prop:'com_pro_spec',
            inProp: "tb_price",
            type: 'number'
          },
          {
            label: '成本价格',
            // width: '120',
            prop:'com_pro_spec',
            inProp: "cost",
            type: 'number'
          },
          {
            label: '销售价格',
            // width: '120',
            prop:'com_pro_spec',
            inProp: "price",
            type: 'number'
          },
          {
            label: '折扣',
            // width: '120',
            prop:'com_pro_spec',
            inProp: "discount",
            type: 'number'
          },
          {
            label: '木架费',
            // width: '120',
            prop:'com_pro_spec',
            inProp: "wooden_frame_costs",
            type: 'number'
          },
          {
            label: '包件数量',
            // width: '120',
            prop:'com_pro_spec',
            inProp: "package_quantity",
            type: 'number'
          },
          {
            label: '规格',
            // width: '150',
            prop:'com_pro_spec',
            inProp: "spec",
            type: 'text'
          },
          {
            label: '颜色',
            // width: '120',
            prop:'com_pro_spec',
            inProp: "color",
            type: 'text'
          },
          {
            label: '材质',
            // width: '130',
            prop:'com_pro_spec',
            inProp: "materials",
            type: 'text'
          },
          {
            label: '特殊',
            // width: '130',
            prop:'com_pro_spec',
            inProp: "special",
            type: 'text'
          },
          {
            label: '其他',
            // width: '150',
            prop:'com_pro_spec',
            inProp: "other",
            type: 'text'
          },
          {
            label: '体积',
            // width: '120',
            prop:'com_pro_spec',
            inProp: "volume",
            type: 'number'
          },
          {
            label: '成品',
            // width: '120',
            prop:'com_pro_spec',
            inProp: "finished_pro",
            type: 'checkbox'
          },
          {
            label: '最低销售价格',
            // width: '120',
            prop:'com_pro_spec',
            inProp: "lowest_price",
            type: 'number'
          },
          {
            label: '最高销售价格',
            // width: '120',
            prop:'com_pro_spec',
            inProp: "highest_price",
            type: 'number'
          }
        ],
        editSpecIndex:'',
        combUrl: '/combinations',
        editIndex: 0,
        inputChg: false,
        chgEId: '',
        conditionPro:''
      }
    },
    computed:{
      resData:{
        get:function(){
          return this.$store.state.responseData
        },
        set:function(){}
      },
      urls:{
        get:function(){
          return this.$store.state.urls
        },
        set:function(){}
      }
    },
    methods: {
      test() {},
      /*点击添加商品*/
      addNew() {
        this.showMask = true;
        this.resetAddInfo();
      },
      CB_dialog(val) {
        this.showMask = val;
        this.editMask = val;
      },
      /*提交添加数据*/
      submitForm() {
        /*提交数据时，如果规格中有空白项目，踢除
        * 修改规格中的组合字段
        * 如果组合字段长度大于0，默认组合自动开启
        * */
        let obj = this.ruleForm;
        obj.productspecs.map((item,index)=>{
          if(!item.spec_code){
            /*如果是空的话，删除规格*/
            obj.productspecs.splice(index,1);
          }else{
            obj.productspecs[index].combSpecData=[];
          }
        });
        this.resData.shops.map(item=>{
          if(item.id==this.ruleForm.shops_id){
            this.ruleForm.shop_nick = item.nick;
          }
        });
        this.$post(this.goodsUrl,obj)
          .then(() => {
            this.$message({
              message: '添加成功',
              type: 'success'
            });
            this.showMask = false;
            this.refresh();
          },err => {
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
      resetAddInfo(){
        Object.assign(this.$data.ruleForm, this.$options.data().ruleForm)
        Object.assign(this.$data.specKey, this.$options.data().specKey)
        this.ruleForm.productspecs.push(this.specKey);
        this.newC = 'index0';
        this.specIndex =0;
      },
      /*取消添加*/
      cancelAdd(){
        this.showMask = false;
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
      /*获取商品信息*/
      getGoodsInfo() {
        this.goodsLoading = true;
        this.$fetch(this.urls.goods)
          .then(res => {
            this.goodsLoading = false;
            this.goodsInfo = res.data;
            if(res.data[0] && res.data[0].productspecs){
              if(res.data[0].productspecs.length==0){
                this.goodsSpec=[];
              }else{
                res.data[0].productspecs.map(item=>{
                  this.goodsSpec.push(item);
                });
              }
            }
            let pg = res.meta.pagination;
            this.$store.dispatch('currentPage', pg.current_page);
            this.$store.commit('PER_PAGE', pg.per_page);
            this.$store.commit('PAGE_TOTAL', pg.total);
            /*请求数据成功之后，请求需要的所有子数据*/
            this.$store.dispatch('shops','/shops');
            this.$store.dispatch('suppliers','/suppliers');
            this.$store.dispatch('goodscates','/goodscates');
            this.$store.dispatch('distmets','/distmets');
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
      /*切换tab时只显示id为第一条商品的规格及其他*/
      handleTabsClick() {
        this.loading = true;
        // let id = this.goodsInfo[0].id;
        if(this.activeName == 1){
         /* this.$fetch(this.url[this.activeName] + '/' + id)
            .then(res => {
              this.loading = false;
              this.getsInfo[this.activeName]=[];
              this.getsInfo[this.activeName].push(res);
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
            })*/
        }
      },
      /*在商品中单击时，tab显示为id为当前商品的规格及其他*/
      proRowClick(row) {
        if(row.productspecs.length==0){
          this.goodsSpec=[];
        }else{
          this.goodsSpec=[{is_combination:'',finished_pro:'',is_stop_pro:''}];
          row.productspecs.map(item=>{
            this.goodsSpec.push(item);
          });
        }
      },
      /*删除单条*/
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
        this.$del(this.goodsUrl + '/' + id)
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
      /*批量删除*/
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
            this.$del(this.goodsUrl, {ids: this.delArr})
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
      /*页面刷新*/
      refresh() {
        this.goodsLoading = true;
        this.getGoodsInfo();
        /*setTimeout(() => {
          this.goodsLoading = false;
        }, 2000);*/
      },
      /*修改商品信息*/
      editInfo() {
        /*如果修改按钮是不可点击状态*/
        if (this.newOpt[1].nClick) {
          return
        } else {
          /*如果没有选择要修改的项*/
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
            this.editMask = true;
            this.editSpecIndex = '';
            this.$fetch(this.goodsUrl + '/' + this.editId).then(res => {
               this.editData = {
                 commodity_code: res.commodity_code,
                 jd_sn: res.jd_sn,
                 vips_sn: res.vips_sn,
                 factory_model: res.factory_model,
                 short_name: res.short_name,
                 shops_id: res.shops_id,
                 supplier_id: res.supplier.id,
                 category_id: res.category.id,
                 remark: res.remark,
                 title: res.title,
                 img: res.img,
                 url: res.url,
                 productspecs: res.productspecs
               };
            }, err => {
              console.log(err);
            })
          }
        }
      },
      editForm() {
        let obj = {
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
        this.$patch(this.goodsUrl + '/' + this.editId, obj)
          .then(() => {
            this.$message({
              message: '修改成功',
              type: 'success'
            });
            this.editMask = false;
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
      editAddSpec(){
        let obj= {
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
          commission:'',
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
          materials:'',
          function: '',
          special: '',
          other: '',
          longness: '',
          width: '',
          height: '',
          volume: '',
          weight: '',
          remark: '',
          finished_pro: '',
          is_stop_pro: ''
        };
        if(this.editData.productspecs.length>0&&!this.editData.productspecs[this.editData.productspecs.length-1].spec_code){
          this.$message({
            message: '规格编码为空时不能添加新规格',
            type: 'info'
          });
        }else{
          this.editData.productspecs.push(obj);
        }
      },
      getData() {
        console.log(this.searchBox);
      },
      /*规格信息单击进行修改*/
      rowEdit(){
        this.currentIndex = 'index' + index;
      },
      tableRowClassName({row, rowIndex}){
        row.index = rowIndex;
      },
      /*规格*/
      specRowClick(row){
        this.specIndex = row.index;
        // this.newC = 'index' + row.index;
      },
      specSave(index,row){
        let specKey={
          spec_code:'',
          jd_specs_code:'',
          vips_specs_code:'',
          tb_price:'',
          cost:'',
          price:'',
          highest_price:'',
          lowest_price:'',
          warehouse_cost:'',
          assembly_price:'',
          discount:'',
          commission:'',
          is_combination:'0',
          package_quantity:'',
          package_costs:'',
          wooden_frame_costs:'',
          purchase_freight:'',
          inventory_warning:'',
          purchase_days_warning:'',
          available_warning:'',
          distribution_method_id:'',
          bar_code:'',
          img_url:'',
          spec:'',
          color:'',
          materials:'',
          function:'',
          special:'',
          other:'',
          longness:'',
          width:'',
          height:'',
          volume:'',
          weight:'',
          remark:'',
          finished_pro:'1',
          is_stop_pro:'0',
          combinations:[],
          combSpecData:[]
        };
        if(!row.spec_code){
          this.$message.error({
            message: '规格编码不能为空',
          });
        }else{
          if(this.ruleForm.productspecs.length==0){
            Object.assign(this.ruleForm.productspecs[index], row);
            this.ruleForm.productspecs.push(specKey);
            this.newC = 'index'+(index+1);
          }else{
            let addNewLine = true;
            this.ruleForm.productspecs.map(item=>{
              if(item.spec_code==''){
                addNewLine = false;
              }
            });
            if(!addNewLine){
              this.newC = '';
            }else{
              Object.assign(this.ruleForm.productspecs[index], row);
              this.ruleForm.productspecs.push(specKey);
              this.newC = 'index'+(index+1);
            }
          }
        }
      },
      specEdit(row){
        this.newC = 'index' + row.index;
        /*更新数据*/
        Object.assign(this.ruleForm.productspecs[row.index], row);
        this.specIndex = row.index;
      },
      /*修改时添加规格*/
      addSpec(){
        let specKey={
          spec_code:'',
          jd_specs_code:'',
          vips_specs_code:'',
          tb_price:'',
          cost:'',
          price:'',
          highest_price:'',
          lowest_price:'',
          warehouse_cost:'',
          assembly_price:'',
          discount:'',
          commission:'',
          is_combination:'0',
          package_quantity:'',
          package_costs:'',
          wooden_frame_costs:'',
          purchase_freight:'',
          inventory_warning:'',
          purchase_days_warning:'',
          available_warning:'',
          distribution_method_id:'',
          bar_code:'',
          img_url:'',
          spec:'',
          color:'',
          materials:'',
          function:'',
          special:'',
          other:'',
          longness:'',
          width:'',
          height:'',
          volume:'',
          weight:'',
          remark:'',
          finished_pro:'1',
          is_stop_pro:'0',
          combinations:[],
          combSpecData:[]
        };
        let obj = this.editData.productspecs;
        let addLine = true;
        obj.map(item=>{
          if(item.spec_code==''){
            addLine = false;
          }else{
            addLine = true;
          }
        });
        if(addLine){
          obj.push(specKey);
          this.editSpecIndex = 'index'+(obj.length-1);
        }else{
          this.editSpecIndex = 'index'+(obj.length-1);
          this.$message.error({
            message: "有规格编码为空时不能添加新规格"
          })
        }
      },
      /*添加组合*/
      addComb() {
        //数据初始化
        this.combArr = [];
        this.combCount = [];
        this.combIndex = '';
        this.idNew = [];
        /*修改*/
       /* if(this.editMask){
          this.showComb = true;
          if(this.chgOrNew=='edit'){
            /!*修改时修改规格*!/
            this.$fetch(this.urls.productspecs,{'is_combination':'false'}).then(res => {
              this.combData = res.data;
            });
          }else if(this.chgOrNew=='new'){
            /!*修改时添加规格*!/
            this.$fetch(this.urls.productspecs,{'is_combination':'false'}).then(res => {
              this.combData = res.data;
            });
          }
        }else if(this.showMask){
          /!*添加*!/
          if(!this.ruleForm.commodity_code){
            this.$message.error({
              message: '商品编码不能为空'
            });
            return
          }else if(!this.ruleForm.productspecs[0].spec_code){
            /!*规格编码不能为空*!/
            this.$message.error({
              message: '规格编码不能为空'
            });
            return
          }else{
            this.showComb = true;
            this.$fetch(this.url[1],{'is_combination':'false'}).then(res => {
              this.combData = res.data;
            }, err => {});
          }
        }*/
        if(this.editMask){
          this.showComb = true;
        }else if(this.showMask){
          if(!this.ruleForm.commodity_code){
            this.$message.error({
              message: '商品编码不能为空'
            });
            return
          }else if(!this.ruleForm.productspecs[0].spec_code){
            /*规格编码不能为空*/
            this.$message.error({
              message: '规格编码不能为空'
            });
            return
          }else{
            this.showComb = true;
          }
        }
      },
      setHeadStyle(){
        return 'header-style';
      },
      combClassName({row,rowIndex}){
        row.index = rowIndex;
      },
      proRClick(row){
        this.combIndex = 'index' + row.index;
      },
      handleBlur(row){
        let obj = {
          com_pro_specs_id: row.id,
          count: this.combCount[row.index],
        };
        let arr=this.combArr;
        if(obj.count) {
          if (arr.length == 0) {
            arr.push(obj);
            this.idNew.push(obj.com_pro_specs_id);
          } else {
            if (this.idNew.indexOf(obj.com_pro_specs_id) == -1) {
              this.idNew.push(obj.com_pro_specs_id)
              arr.push(obj)
            } else {
              arr.map(item => {
                if (item.com_pro_specs_id == obj.com_pro_specs_id) {
                  item.count = obj.count
                }
              })
            }
          }
        }
      },
      getPro(){
        if(this.chgEId){
          /*修改时修改规格*/
          this.$fetch(this.urls.productspecs,{'is_combination':'false',except_id:this.chgEId,spec_code:this.conditionPro}).then(res => {
            this.combData = res.data;
          });
        }else{
          /*修改时添加规格*/
          this.$fetch(this.urls.productspecs,{'is_combination':'false',spec_code:this.conditionPro}).then(res => {
            this.combData = res.data;
          });
        }
      },
      confirmAddComb() {
        /*确认添加时
        * 如果是修改状态
        * 拼接combination
        * */
        this.showComb = false;
        let targetVal;
        if(this.showMask){
          targetVal = this.ruleForm.productspecs[this.specIndex]
        }else if(this.editMask){
          /*如果是修改*/
          targetVal = this.editData.productspecs[this.editIndex];
        }
        targetVal.is_combination= true;
        this.combArr.map(item=>{
          this.$fetch(this.url[1]+'/'+item.com_pro_specs_id).then(res => {
            for(let i=0;i<item.count;i++){
              if(this.showMask){
                targetVal.combSpecData.push(res);
                targetVal.combinations.push({'com_pro_specs_id':item.com_pro_specs_id});
              }else if(this.editMask){
                targetVal.combinations.push({'com_pro_spec':res,'com_pro_specs_id':item.com_pro_specs_id});
              }
              targetVal.tb_price=targetVal.tb_price-0+(res.tb_price-0);
              targetVal.cost=targetVal.cost-0+(res.cost-0);
              targetVal.lowest_price=targetVal.lowest_price-0+(res.lowest_price-0);
              targetVal.price=targetVal.price-0+(res.price-0);
              targetVal.highest_price=targetVal.highest_price-0+(res.highest_price-0);
              targetVal.warehouse_cost=targetVal.warehouse_cost-0+(res.warehouse_cost-0);
              targetVal.assembly_price=targetVal.assembly_price-0+(res.assembly_price-0);
              targetVal.package_quantity=targetVal.package_quantity-0+(res.package_quantity-0);
              targetVal.package_costs=targetVal.package_costs-0+(res.package_costs-0);
              targetVal.wooden_frame_costs=targetVal.wooden_frame_costs-0+(res.wooden_frame_costs-0);
              targetVal.purchase_freight=targetVal.purchase_freight-0+(res.purchase_freight-0);
              targetVal.longness=targetVal.longness-0+(res.longness-0);
              targetVal.width=targetVal.width-0+(res.width-0);
              targetVal.height=targetVal.height-0+(res.height-0);
              targetVal.volume=targetVal.volume-0+(res.volume-0);
              targetVal.weight=targetVal.weight-0+(res.weight-0);
            }
          });
        })
      },
      cancelAddComb(){
        /*取消添加
        * 清空数据*/
        this.specIndex = '';
        this.combCount = [];
        this.showComb = false;
      },
      /*删除组合*/
      delComb(index,row){
        /*前端界面删除*/
        /*点击删除是更新specIndex*/
        let list = this.ruleForm.productspecs[this.specIndex];
        list.tb_price-=(row.tb_price-0);
        list.cost-=(row.cost-0);
        list.lowest_price-=(row.lowest_price-0);
        list.price-=(row.price-0);
        list.highest_price-=(row.highest_price-0);
        list.warehouse_cost-=(row.warehouse_cost-0);
        list.assembly_price-=(row.assembly_price-0);
        list.package_quantity-=(row.package_quantity-0);
        list.package_costs-=(row.package_costs-0);
        list.wooden_frame_costs-=(row.wooden_frame_costs-0);
        list.purchase_freight-=(row.purchase_freight-0);
        list.longness-=(row.longness-0);
        list.width-=(row.width-0);
        list.height-=(row.height-0);
        list.volume-=(row.volume-0);
        list.weight-=(row.weight-0);
       /* this.combArr.map(item=>{
          if(item.com_pro_specs_id==row.id){
            if(item.count>0){
              item.count--;
            }else{
              item.count=0;
            }
          }
        });*/
        this.ruleForm.productspecs[this.specIndex].combSpecData.splice(index,1);
        this.$message({
          message: '删除规格成功',
          type: 'success'
        });
        /*如果长度为0，是否组合为false*/
        if(this.ruleForm.productspecs[this.specIndex].combSpecData.length==0){
          this.ruleForm.productspecs[this.specIndex].is_combination= false;
        }
      },
      /*商品规格筛选数据*/
      chgStatue(prop){},
      /*修改*/
      confirmEdit(){
        let obj = this.editData;
        obj.productspecs.map((item,index)=>{
          if(!item.spec_code){
            /*如果是空的话，删除规格*/
            obj.productspecs.splice(index,1);
          }
          if(item.combinations.length>0){
            item.combinations.map(list=>{
              list.com_pro_spec=[]
            })
          }
        });

        this.resData.shops.map(item=>{
          if(item.id==obj.shops_id){
            obj.shop_nick = item.nick;
          }
        });
        this.$patch(this.goodsUrl + '/' + this.editId, this.editData)
          .then(() => {
            this.$message({
              message: '修改成功',
              type: 'success'
            });
            this.editMask = false;
            this.refresh();
            this.chgEId = '';
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
      cancelEdit(){
        this.editMask =false;
        this.chgEId = '';
      },
      saveEdit(index,row){
        this.editSpecIndex = '';
        let item = this.editData.productspecs[this.editIndex];
        item.spec_code = row.spec_code;
        item.jd_specs_code = row.jd_specs_code;
        item.vips_specs_code = row.vips_specs_code;
        item.tb_price = row.tb_price  ;
        item.cost = row.cost;
        item.price = row.price;
        item.warehouse_cost = row.warehouse_cost;
        item.commission = row.commission;
        item.wooden_frame_costs = row.wooden_frame_costs;
        item.purchase_freight = row.purchase_freight;
        item.package_quantity = row.package_quantity;
        item.inventory_warning = row.inventory_warning;
        item.purchase_days_warning = row.purchase_days_warning;
        item.distribution_method_id = row.distribution_method_id;
        item.spec = row.spec;
        item.color = row.color;
        item.materials = row.materials;
        item.function = row.function;
        item.special = row.special;
        item.other = row.other;
        item.longness = row.longness;
        item.width = row.width;
        item.height = row.height;
        item.volume = row.volume;
        item.weight = row.weight;
        item.remark = row.remark;
        item.finished_pro = row.finished_pro;
        item.is_stop_pro = row.is_stop_pro;
        item.width = row.width;
        item.combinations = row.combinations;
      },
      openEdit(index){
        this.editSpecIndex = 'index'+index;
        this.editIndex = index;
      },
      delSonSpec(index,row){
        let specData=this.editData.productspecs[this.editIndex];
        let curVal = row.com_pro_spec;
        if(row.id){
          /*如果row.id存在，说明是数据库里面的，要发请求删除*/
          this.$del(this.combUrl + '/' + row.id)
            .then(() => {
              specData.combinations.splice(index,1);
              this.$message({
                message: '删除成功',
                type: 'success'
              });
              specData.tb_price-=(curVal.tb_price-0);
              specData.cost-=(curVal.cost-0);
              specData.lowest_price-=(curVal.lowest_price-0);
              specData.price-=(curVal.price-0);
              specData.highest_price-=(curVal.highest_price-0);
              specData.warehouse_cost-=(curVal.warehouse_cost-0);
              specData.assembly_price-=(curVal.assembly_price-0);
              specData.package_quantity-=(curVal.package_quantity-0);
              specData.package_costs-=(curVal.package_costs-0);
              specData.wooden_frame_costs-=(curVal.wooden_frame_costs-0);
              specData.purchase_freight-=(curVal.purchase_freight-0);
              specData.longness-=(curVal.longness-0);
              specData.width-=(curVal.width-0);
              specData.height-=(curVal.height-0);
              specData.volume-=(curVal.volume-0);
              specData.weight-=(curVal.weight-0);
            });
        }else{
          /*否则是新添加的还没有存库，只需前端删除*/
          specData.combinations.splice(index,1);
          this.$message({
            message: '删除成功',
            type: 'success'
          });
          specData.tb_price-=(curVal.tb_price-0);
          specData.cost-=(curVal.cost-0);
          specData.lowest_price-=(curVal.lowest_price-0);
          specData.price-=(curVal.price-0);
          specData.highest_price-=(curVal.highest_price-0);
          specData.warehouse_cost-=(curVal.warehouse_cost-0);
          specData.assembly_price-=(curVal.assembly_price-0);
          specData.package_quantity-=(curVal.package_quantity-0);
          specData.package_costs-=(curVal.package_costs-0);
          specData.wooden_frame_costs-=(curVal.wooden_frame_costs-0);
          specData.purchase_freight-=(curVal.purchase_freight-0);
          specData.longness-=(curVal.longness-0);
          specData.width-=(curVal.width-0);
          specData.height-=(curVal.height-0);
          specData.volume-=(curVal.volume-0);
          specData.weight-=(curVal.weight-0);
        }
        specData.combinations.length>0?specData.is_combination=true:specData.is_combination=false;
      },
      /*要追加到哪条规格 修改时行切换*/
      editRowCName({row,rowIndex}){
        row.index = rowIndex;
      },
      editRowClick(row){
        this.editIndex = row.index;
        this.chgEId = row.id?row.id:'';
      }
    },
    mounted() {
      this.getGoodsInfo();
      this.$store.dispatch('setOpt', this.newOpt);
      const that = this;
      $(window).resize(() => {
        that.$store.dispatch('setOpt', that.newOpt);
      })
    }
  }
</script>
