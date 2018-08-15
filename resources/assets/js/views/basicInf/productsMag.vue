<template>
    <div>
        <!--查询模块-->
        <div class="searchBox">
            <span>
                <label>商品名称</label>
                <el-input v-model.trim="searchBox.productsName" clearable @keyup.enter.native="handleQuery"></el-input>
            </span>
            <span>
                <label>店铺名称</label>
                <el-select v-model.trim="searchBox.shopNames" clearable placeholder="请选择" @keyup.enter.native="handleQuery">
                    <el-option v-for="item in resData.shops" :key="item.value" :label="item.nick" :value="item.id"></el-option>
                </el-select>
            </span>
            <span>
                <label>供货商</label>
                <el-select v-model="searchBox.supplier" clearable placeholder="请选择" @keyup.enter.native="handleQuery">
                    <el-option v-for="item in resData.suppliers" :key="item.value" :label="item.name" :value="item.id"></el-option>
                </el-select>
            </span>
            <span>
                <label>类别</label>
                <el-select v-model="searchBox.kinds" clearable placeholder="请选择" @keyup.enter.native="handleQuery">
                    <el-option v-for="item in resData.goodscates" :key="item.value" :label="item.name" :value="item.id"></el-option>
                </el-select>
            </span>
            <span>
                <el-checkbox v-model="searchBox.isComb" @keyup.enter.native="handleQuery">组合产品</el-checkbox>
                <el-checkbox v-model="searchBox.isStop" @keyup.enter.native="handleQuery">停产</el-checkbox>
                <el-checkbox v-model="searchBox.isStatus" @keyup.enter.native="handleQuery">启用</el-checkbox>
            </span>
        </div>

        <!--商品信息-->
        <el-table :data="productsVal"  fit ref="multipleTable"
                  @selection-change="handleSelectionChange"
                  v-loading="productsLoading"
                  height="400"
                  @row-click="proRowClick" :row-class-name="proRowCName">
            <el-table-column
                    type="selection"
                    width="95" align="center"
                    :checked="checkboxInit">
            </el-table-column>
            <el-table-column v-for="item in productsHead" :label="item.label" align="center" :width="item.width" :key="item.prop">
                <template slot-scope="scope">
                    <span v-if="item.type=='select'">
                        <span v-if="scope.row[item.prop]==''"></span>
                        <span v-else-if="typeof scope.row[item.prop] == 'object' && item.nmProp">
                            {{scope.row[item.prop][item.nmProp]}}
                        </span>
                    </span>
                    <span v-else-if="item.type=='checkbox'">
                         <el-checkbox v-model="scope.row[item.prop]" disabled></el-checkbox>
                    </span>
                    <span v-else-if="item.type=='img'">
                        <el-popover
                                placement="right"
                                trigger="hover"
                                popper-class="picture_detail">
                       <img :src="scope.row[item.prop]">
    <img slot="reference" :src="scope.row[item.prop]" :alt="scope.row[item.alt]">
   </el-popover>
                    </span>
                    <span v-else>
                        {{scope.row[item.prop]}}
                    </span>
                </template>
            </el-table-column>
            <el-table-column label="操作" width="180" align="center" fixed="right">
                <template slot-scope="scope">
                    <el-button size="mini" type="primary" @click="addSkuMth(scope.row)">添加sku</el-button>
                    <el-button size="mini" type="danger" @click="delPro(scope.row,$event)">删除</el-button>
                </template>
            </el-table-column>
        </el-table>

        <!--页码-->
        <Pagination :page-url="this.urls.products"></Pagination>

        <!--底部tabs-->
        <el-tabs v-model="activeName" @tab-click="handleTabsClick">
            <el-tab-pane label="淘宝信息" name="0">
                淘宝信息
            </el-tab-pane>
            <el-tab-pane label="子件列表" name="1">
                <el-table :data="productsCompVal">
                    <el-table-column v-for="item in btmTableHead[this.activeName]" :label="item.label" align="center" :width="item.width" :key="item.label">
                        <template slot-scope="scope">
                            <span v-if="item.prop">
                                <span v-if="item.type=='select'">
                                <span v-for="(list,index) in resData[item.stateVal]" :key="index">
                                        <span v-if="list.id==scope.row[item.prop]">
                                            {{list.name}}
                                        </span>
                                </span>
                            </span>
                                <span v-else-if="item.type=='img'">
                                     <el-popover
                                             placement="right"
                                             trigger="hover"
                                             popper-class="picture_detail">
                       <img :src="scope.row[item.prop]">
    <img slot="reference" :src="scope.row[item.prop]" :alt="scope.row[item.alt]">
   </el-popover>
                                    <!--<img :src="scope.row[item.prop]" alt="">-->
                                </span>
                                <span v-else-if="item.type=='checkbox'">
                                     <el-checkbox v-model="scope.row[item.prop]" disabled></el-checkbox>
                             </span>
                                <span v-else>
                                 {{scope.row[item.prop]}}
                            </span>
                            </span>
                        </template>
                    </el-table-column>
                    <!--子件需要删除功能-->
                    <el-table-column label="操作" width="100" align="center" fixed="right">
                        <template slot-scope="scope">
                            <el-button size="mini" type="danger" @click="delPro(scope.row,$event)">删除子件</el-button>
                        </template>
                    </el-table-column>
                </el-table>
            </el-tab-pane>
            <el-tab-pane label="sku信息" name="2">
                <el-table :data="productsSkuVal">
                    <el-table-column v-for="item in btmTableHead[this.activeName]" :label="item.label" align="center" :width="item.width" :key="item.label">
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
                                     <el-checkbox v-model="scope.row[item.prop]" disabled></el-checkbox>
                             </span>
                                <span v-else>
                                    <span v-if="item.inProp">
                                        <span v-for="skuList in scope.row[item.prop]" :key="skuList.id">
                                         <el-tag style="margin-right: 5px">{{`${skuList[item.inProp]}`}}</el-tag>
                                        </span>
                                    </span>
                                    <span v-else>
                                        {{scope.row[item.prop]}}
                                    </span>
                            </span>
                            </span>
                        </template>
                    </el-table-column>
                    <el-table-column label="操作" width="180" align="center" fixed="right">
                        <template slot-scope="scope">
                            <el-button size="mini" type="primary" @click="editSku(scope.row)">修改sku</el-button>
                            <el-button size="mini" type="danger" @click="delPro(scope.row,$event)">删除sku</el-button>
                        </template>
                    </el-table-column>
                </el-table>
            </el-tab-pane>
            <el-tab-pane label="商品网站" name="3">
                商品网站
            </el-tab-pane>
            <el-tab-pane label="操作记录" name="4">
                操作记录
            </el-tab-pane>
        </el-tabs>

        <!--新增商品-->
        <el-dialog title="新增商品" :visible.sync="addProMask" :class="{'more-forms':moreForms}">
            <el-form :model="proForm" :rules="proRules" ref="addNew" label-width="100px">
                <el-form-item v-for="(item,index) in addProHead" :key="index" :label="item.label" :prop="item.prop">
                    <span v-if="item.type=='text'">
                          <el-input v-model.trim="proForm[item.prop]" :placeholder="item.holder"></el-input>
                    </span>
                    <span v-else-if="item.type=='url'">
                       <el-input type="url" v-model.trim="ruleForm[item.prop]" :placeholder="item.holder"></el-input>
                    </span>
                    <span v-else-if="item.type=='select'">
                        <el-select v-model="proForm[item.prop]" :placeholder="item.holder">
                               <span v-for="list in resData[item.stateVal]" :key="list.id">
                                    <el-option :label="list.name?list.name:list.nick" :value="list.id"></el-option>
                               </span>
                           </el-select>
                    </span>
                    <span v-else-if="item.type=='textarea'">
                         <el-input type="textarea" v-model.trim="proForm[item.prop]" :placehoder="item.holder"></el-input>
                    </span>
                    <span v-else-if="item.type=='img'">
                         <span v-if="noUpload">
                              <el-upload class="upload-demo"
                                      action=""
                                      :before-upload="beforeUpload">
  <el-button size="small" type="primary">点击上传</el-button></el-upload>
                         </span>
                         <span v-else>
                             <img :src="proForm[item.prop]">
                             <el-upload class="chgDiv" action="" :before-upload="beforeUpload">
                                     <el-button type="primary" icon="el-icon-edit" size="mini" class="chg" v-show="showChgBtn"></el-button>
                                 </el-upload>
                         </span>
                    </span>
                </el-form-item>
            </el-form>
            <el-button type="text">子件信息</el-button>
            <el-table :data="proForm.product_components" fit height="300" :row-class-name="compRowCName" @row-click="compRowClick">
                <el-table-column v-for="(item,index) in compHead" :label="item.label" align="center" :width="item.width" :key="index">
                    <template slot-scope="scope">
                        <span v-if="compCurIndex =='index'+scope.$index">
                            <span v-if="item.type=='number'">
                                   <el-input size="small" type="number" v-model.trim="scope.row[item.prop]" :placeholder="item.holder"></el-input>
                            </span>
                            <span v-else-if="item.type=='url'">
                          <el-input size="small" type="url" v-model.trim="scope.row[item.prop]" :placeholder="item.holder"></el-input>
                        </span>
                            <span v-else-if="item.type == 'textarea'">
                                  <el-input type="textarea" size="small" v-model.trim="scope.row[item.prop]" :placeholder="item.holder"></el-input>
                            </span>
                            <span v-else-if="item.type == 'select'">
                                 <el-select v-model="scope.row[item.prop]"  :placeholder="item.holder">
                                   <span v-for="list in resData[item.stateVal]" :key="list.id">
                                        <el-option :label="list.name" :value="list.id"></el-option>
                                   </span>
                               </el-select>
                            </span>
                            <span v-else-if="item.type == 'checkbox'">
                                 <el-checkbox v-model="scope.row[item.prop]"></el-checkbox>
                            </span>
                             <span v-else-if="item.type=='img'">
                                 <span v-if="compUpload=='upload'+scope.$index">
                                     <el-upload action=""
                                                :before-upload="beforeUploadComp">
                                         <el-button size="small" type="primary">点击上传</el-button></el-upload>
                                 </span>
                                 <span v-else>
                                     <img :src="scope.row[item.prop]">
                                <el-upload class="chgDiv" action="" :before-upload="beforeUpload">
                                     <el-button type="primary" icon="el-icon-edit" size="mini" class="chg" v-show="tableChgBtn=='show'+scope.$index"></el-button>
                                 </el-upload>
                                 </span>
                             </span>
                            <span v-else>
                                <el-input size="small" v-model.trim="scope.row[item.prop]" :placeholder="item.holder"></el-input>
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
                             <span v-else-if="item.type == 'img'">
                                 <img :src="scope.row[item.prop]" alt="">
                            </span>
                            <span v-else>
                                 {{scope.row[item.prop]}}
                            </span>
                     </span>
                    </template>
                </el-table-column>
            </el-table>
            <div slot="footer" class="dialog-footer clearfix">
                <div style="float: left">
                    <el-button type="primary" @click="addComb">添加子件</el-button>
                </div>
                <div style="float: right">
                    <el-button type="primary" @click="confirmAddPro">确定添加</el-button>
                    <el-button @click="resetAddPro" type="info">重置</el-button>
                    <el-button @click="cancelAddPro" type="warning">取消</el-button>
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
                <el-button type="primary" size="mini" @click="confirmD(delId,delUrl)">确定</el-button>
            </div>
        </el-popover>

        <!--修改-->
        <el-dialog title="修改商品" :visible.sync="updateProMask" :class="{'more-forms':moreForms}">
            <el-form :model="updateForm" :rules="proRules" label-width="100px">
                <el-form-item v-for="(item,index) in addProHead" :key="index" :label="item.label" :prop="item.prop">
                    <span v-if="item.type=='text'">
                          <el-input v-model.trim="updateForm[item.prop]" :disabled="item.prop=='commodity_code'?true:false"></el-input>
                    </span>
                    <span v-else-if="item.type=='url'">
                       <el-input type="url" v-model.trim="updateForm[item.prop]"></el-input>
                    </span>
                    <span v-else-if="item.type=='select'">
                        <el-select v-model="updateForm[item.prop]">
                               <span v-for="list in resData[item.stateVal]" :key="list.id">
                                    <el-option :label="list.name?list.name:list.nick" :value="list.id"></el-option>
                               </span>
                           </el-select>
                    </span>
                    <span v-else-if="item.type=='textarea'">
                         <el-input type="textarea" v-model.trim="updateForm[item.prop]"></el-input>
                    </span>
                    <span v-else-if="item.type=='img'">
                         <span v-if="noUpdate">
                              <el-upload class="upload-demo"
                                         action=""
                                         :before-upload="beforeUploadComp">
  <el-button size="small" type="primary">点击上传</el-button></el-upload>
                         </span>
                         <span v-else>
                             <img :src="updateForm[item.prop]">
                             <el-upload class="chgDiv" action="" :before-upload="updateFormUpload">
                                     <el-button type="primary" icon="el-icon-edit" size="mini" class="chg" v-show="componentShowChg"></el-button>
                                 </el-upload>
                         </span>
                    </span>
                </el-form-item>
            </el-form>
            <el-button type="text">子件信息</el-button>
            <el-table :data="updateForm.product_components" fit height="300" :row-class-name="updateCName" @row-click="updateProRowClick">
                <el-table-column v-for="(item,index) in compHead" :label="item.label" align="center" :width="item.width" :key="index">
                    <template slot-scope="scope">
                        <span v-if="updateProIndex =='index'+scope.$index">
                            <span v-if="item.type=='number'">
                                   <el-input size="small" type="number" v-model.trim="scope.row[item.prop]"></el-input>
                            </span>
                            <span v-else-if="item.type=='url'">
                          <el-input size="small" type="url" v-model.trim="scope.row[item.prop]"></el-input>
                        </span>
                            <span v-else-if="item.type == 'textarea'">
                                  <el-input type="textarea" size="small" v-model.trim="scope.row[item.prop]"></el-input>
                            </span>
                            <span v-else-if="item.type == 'select'">
                                 <el-select v-model="scope.row[item.prop]">
                                   <span v-for="list in resData[item.stateVal]" :key="list.id">
                                        <el-option :label="list.name?list.name:list.nick" :value="list.id"></el-option>
                                   </span>
                               </el-select>
                            </span>
                            <span v-else-if="item.type == 'checkbox'">
                                 <el-checkbox v-model="scope.row[item.prop]"></el-checkbox>
                            </span>
                            <span v-else-if="item.type == 'img'">
                                <span v-if="updateCompUpload=='upload'+scope.$index">
                                     <el-upload action=""
                                                :before-upload="updateTableUpload">
                                         <el-button size="small" type="primary">点击上传</el-button></el-upload>
                                 </span>
                                 <span v-else>
                                     <img :src="scope.row[item.prop]">
                                <el-upload class="chgDiv" action="" :before-upload="beforeUploadComp">
                                     <el-button type="primary" icon="el-icon-edit" size="mini" class="chg" v-show="updateChgBtn=='show'+scope.$index"></el-button>
                                 </el-upload>
                                 </span>
                             </span>
                            <span v-else>
                               <el-input size="small" v-model.trim="scope.row[item.prop]"></el-input>
                            </span>
                     </span>
                        <span v-else>
                             <span v-if="item.type=='select'">
                                <span v-if="scope.row[item.prop]==''"></span>
                                <span v-else>
                                       <span v-for="(list,index) in resData[item.stateVal]" :key="index">
                                              <span v-if="list.id==scope.row[item.prop]">
                                                    {{list.name?list.name:list.nick}}
                                           </span>
                                </span>
                                </span>
                                </span>
                             <span v-else-if="item.type=='checkbox'">
                                  <el-checkbox v-model="scope.row[item.prop]" disabled></el-checkbox>
                             </span>
                            <span v-else-if="item.type == 'img'">
                                 <img :src="scope.row[item.prop]">
                            </span>
                             <span v-else>
                                 {{scope.row[item.prop]}}
                            </span>
                     </span>
                    </template>
                </el-table-column>
            </el-table>
            <div slot="footer" class="dialog-footer clearfix">
                <div style="float: left">
                    <el-button type="primary" @click="updateAddComb">添加子件</el-button>
                </div>
                <div style="float: right">
                    <el-button type="primary" @click="confirmUpdate">确定</el-button>
                    <el-button @click="cancelUpdate">取消</el-button>
                </div>
            </div>
        </el-dialog>

        <!--添加sku-->
        <el-dialog title="添加Sku" :visible.sync="addSku">
            <el-form :model="skuForm" :rules="skuRules" label-width="100px">
                <el-form-item label="所属商品">
                    <el-select v-model="skuForm.pid">
                                   <span v-for="list in resData.products" :key="list.id">
                                        <el-option :label="list.short_name" :value="list.id"></el-option>
                                   </span>
                    </el-select>
                </el-form-item>
                <el-form-item label="sku名称">
                    <el-input v-model="skuForm.name"></el-input>
                </el-form-item>
                <el-form-item label="选择子件">
                    <el-transfer
                            filterable
                            :filter-method="filterMethod"
                            filter-placeholder="请输入子件编码"
                            :titles="['子件列表', '添加列表']"
                            v-model="skuForm.product_components"
                            :data="compList">
                    </el-transfer>

                </el-form-item>

            </el-form>
            <div slot="footer" class="dialog-footer">
                    <el-button type="primary" @click="confirmAddSku">确定</el-button>
                    <el-button @click="cancelAddSku">取消</el-button>
                </div>
        </el-dialog>

        <!--修改sku-->
        <el-dialog title="修改Sku" :visible.sync="updateSkuMask">
            <el-form :model="updateSkuForm" :rules="skuRules" label-width="100px">
                <el-form-item label="所属商品">
                    <el-select v-model="updateSkuForm.pid">
                                   <span v-for="list in resData.products" :key="list.created_at">
                                        <el-option :label="list.short_name" :value="list.id"></el-option>
                                   </span>
                    </el-select>
                </el-form-item>
                <el-form-item label="sku名称">
                    <el-input v-model="updateSkuForm.name"></el-input>
                </el-form-item>
                <el-form-item label="选择子件">
                    <el-transfer
                            filterable
                            :filter-method="filterMethod"
                            filter-placeholder="请输入子件编码"
                            :titles="['子件列表', '添加列表']"
                            v-model="updateSkuForm.product_components"
                            :data="updateCompList">
                    </el-transfer>
                </el-form-item>
            </el-form>
            <div slot="footer" class="dialog-footer">
                <el-button type="primary" @click="confirmUpdateSku">确定</el-button>
                <el-button @click="cancelUpdateSku">取消</el-button>
            </div>
        </el-dialog>
    </div>
</template>
<script>
    import axios from 'axios'
  export default{
    data(){
      return {
        newOpt: [
          {
            cnt: '新增',
            icon: 'bf-add',
            ent: this.addPro
          },
          {
            cnt: '修改',
            icon: 'bf-change',
            ent: this.editPro,
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
        searchBox: {
          productsName: '',
          shopNames: '',
          supplier: '',
          kinds: '',
          isComb: false,
          isStop: false,
          isStatus: false
        },
        /*获取数据*/
        productsHead:[
          {
            label: '产品图片',
            width: '200',
            prop: "img",
            type: 'img',
            alt: '商品图片'
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
          }
        ],
        productsVal: [],
        productsLoading: true,
        checkboxInit: false,
        /*底部tabs*/
        activeName: '0',
        productsCompVal: [],
        btmTableHead:[
          [],
          [
             {
               label: '子件图片',
               width: '120',
               prop: "img_url",
               type: 'img'
             },
            {
              label: '子件编码',
              width: '160',
              prop: "component_code",
              type: 'text',
            },
            {
              label: '京东子件编号',
              width: '180',
              prop: "jd_component_code",
              type: 'text'
            },
            {
              label: '唯品会子件编号',
              width: '180',
              prop: "vips_component_code",
              type: 'text'
            },
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
              label: '通用',
              width: '120',
              prop: "is_common",
              type: 'checkbox',
              // chgAble: false,
              // editChgAble: true,
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
              type: 'text'
            },
            {
              label: '颜色',
              width: '120',
              prop: "color",
              type: 'text'
            },
            {
              label: '材质',
              width: '130',
              prop: "materials",
              type: 'text'
            },
            {
              label: '功能',
              width: '100',
              prop: "function",
              type: 'text'
            },
            {
              label: '特殊',
              width: '130',
              prop: "special",
              type: 'text'
            },
            {
              label: '其他',
              width: '150',
              prop: "other",
              type: 'text'
            },
            {
              label: '长度',
              width: '120',
              prop: "longness",
              type: 'number'
            },
            {
              label: '宽度',
              width: '120',
              prop: "width",
              type: 'number'
            },
            {
              label: '高度',
              width: '120',
              prop: "height",
              type: 'number'
            },
            {
              label: '体积',
              width: '120',
              prop: "volume",
              type: 'number'
            },
            {
              label: '重量',
              width: '120',
              prop: "weight",
              type: 'number'
            },
            {
              label: '备注',
              width: '150',
              prop: "remark",
              type: 'textarea'
            },
            {
              label: '成品',
              width: '120',
              prop: "finished_pro",
              type: 'checkbox'
            },
            {
              label: '停产',
              width: '120',
              prop: "is_stop_pro",
              type: 'checkbox'
            }
          ],
          [
            {
              label: 'sku名称',
              prop: "name",
              type: 'text'
            },
            {
              label: '包含子件',
              prop: "product_components",
              inProp: 'spec',
              type: 'text'
            },
            {
              label: '最近修改时间',
              prop: "updated_at",
              type: 'text'
            }
          ],
          []
        ],
        productsSkuVal: [],
        proId: '',
        /*新增*/
        moreForms: true,
        addProMask: false,
        proForm: {
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
          product_components:[
            {
              component_code:'',
              jd_component_code:'',
              vips_component_code:'',
              tb_price:'',
              cost:'',
              price:'',
              highest_price:'',
              lowest_price:'',
              warehouse_cost:'',
              assembly_price:'',
              discount:'',
              commission:'',
              is_common: false,
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
              is_stop_pro: false
            }
          ]
        },
        proRules: {
          commodity_code: [
            {required: true, message: '请输入商品编码', trigger: 'blur'},
          ],
          short_name: [
            {required: true, message: '请输入商品简称', trigger: 'blur'}
          ],
          shop_nick: [
            {required: true, message: '请选择店铺名称', trigger: 'blur'}
          ],
          supplier_id: [
            {required: true, message: '请选择供应商', trigger: 'blur'}
          ],
          category_id: [
            {required: true, message: '请选择产品类别', trigger: 'blur'}
          ],
          title: [
            {required: true, message: '请输入商品标题', trigger: 'blur'}
          ]
        },
        addProHead: [
          {
            label: '商品编码',
            prop: 'commodity_code',
            holder: '请输入商品编号',
            type: 'text',
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
            stateVal: 'shops',
            type: 'select',
          },
          {
            label: '供货厂商',
            prop: 'supplier_id',
            holder: '请选择供货厂商',
            stateVal:'suppliers',
            type: 'select',
          },
          {
            label: '商品标题',
            prop: 'title',
            holder: '请输入商品标题',
            type: 'text'
          },
          {
            label: '商品网址',
            prop: 'url',
            holder: '请输入商品网址',
            type: 'text'
          },
          {
            label: '商品类别',
            prop: 'category_id',
            holder: '请选择产品类别',
            stateVal:'goodscates',
            type: 'select',
          },
          {
            label: '商品备注',
            prop: 'remark',
            holder: '请输入商品备注',
            type: 'textarea'
          },
          {
            label: '商品图片',
            prop: 'img',
            imgPath: '',
            holder: '请输入商品图片',
            type: 'img'
          }
        ],
        noUpload: true,
        compCurIndex: 'index0',
        compIndexNum: '0',
        compHead:[
          {
            label: '子件图片',
            width: '120',
            prop: "img_url",
            type: 'img',
            imgPath:'',
          },
          {
            label: '子件编码',
            width: '160',
            prop: "component_code",
            type: 'text',
          },
          {
            label: '京东子件编号',
            width: '180',
            prop: "jd_component_code",
            type: 'text'
          },
          {
            label: '唯品会子件编号',
            width: '180',
            prop: "vips_component_code",
            type: 'text'
          },
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
            label: '通用',
            width: '120',
            prop: "is_common",
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
            type: 'number'
          },
          {
            label: '采购预警天数',
            width: '150',
            prop: "purchase_days_warning",
            type: 'number'
          },
          {
            label: '可售数预警',
            width: '150',
            prop: "available_warning",
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
            label: '条形码',
            width: '120',
            prop: "bar_code",
            type: 'text'
          },
          {
            label: '规格',
            width: '200',
            prop: "spec",
            type: 'text'
          },
          {
            label: '颜色',
            width: '120',
            prop: "color",
            type: 'text'
          },
          {
            label: '材质',
            width: '130',
            prop: "materials",
            type: 'text'
          },
          {
            label: '功能',
            width: '100',
            prop: "function",
            type: 'text'
          },
          {
            label: '特殊',
            width: '130',
            prop: "special",
            type: 'text'
          },
          {
            label: '其他',
            width: '150',
            prop: "other",
            type: 'text'
          },
          {
            label: '长度(mm)',
            width: '120',
            prop: "longness",
            type: 'number'
          },
          {
            label: '宽度(mm)',
            width: '120',
            prop: "width",
            type: 'number'
          },
          {
            label: '高度(mm)',
            width: '120',
            prop: "height",
            type: 'number'
          },
          {
            label: '体积(m3)',
            width: '120',
            prop: "volume",
            type: 'number'
          },
          {
            label: '重量',
            width: '120',
            prop: "weight",
            type: 'number'
          },
          {
            label: '备注',
            width: '150',
            prop: "remark",
            type: 'textarea'
          },
          {
            label: '成品',
            width: '120',
            prop: "finished_pro",
            type: 'checkbox'
          },
          {
            label: '停产',
            width: '120',
            prop: "is_stop_pro",
            type: 'checkbox'
          }
        ],
        compUpload: 'upload0',
        showChgBtn: false,
        tableChgBtn: '',
        /*删除*/
        showDel: false,
        delId: '',
        delArr: [],
        proSelection: '',
        /*修改*/
        updateProMask: false,
        updateId:'',
        updateProIndex:'',
        updateForm: {},
        componentShowChg: true,
        updateCompUpload: 'upload0',
        updateRwIndex: '0',
        updateChgBtn: false,
        addSku: false,
        /*transfer*/
        skuForm: {
          pid: '',
          name: '',
          product_components:[]
        },
        skuRules: {
          name: [
            {required: true, message: 'sku名称不能为空!', trigger: 'blur'},
          ],
        },
        compList:[],
        allComp:[],
        filterMethod(query, item) {
          return item.component_code.indexOf(query) > -1;
        },
        noUpdate: '',
        delUrl: '',
        updateSkuMask: false,
        updateSkuForm: {},
        updateSkuId: '',
        alreadyCompId:[],
        updateCompList: [],
        updateList: [],
        updateCompId: [],
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
      },
    },
    methods:{
      handleQuery(){},
      /*获取商品数据*/
      getProducts(){
        this.$fetch(this.urls.products)
          .then(res=>{
            this.productsLoading =false;
            this.productsVal = res.data;
            if(res.data[0]){
              this.proId = res.data[0].id;
              this.productsCompVal = res.data[0].product_components;
              this.productsSkuVal = res.data[0].combinations;
            }
            let pg = res.meta.pagination;
            this.$store.dispatch('currentPage', pg.current_page);
            this.$store.commit('PER_PAGE', pg.per_page);
            this.$store.commit('PAGE_TOTAL', pg.total);
            /*请求子数据*/
            this.$store.dispatch('shops','/shops');
            this.$store.dispatch('suppliers','/suppliers');
            this.$store.dispatch('goodscates','/goodscates');
            this.$store.dispatch('distmets','/distmets');
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
      proRowCName({row,rowIndex}){
        row.index = rowIndex;
      },
      proRowClick(row){
        this.proId = row.id;
        this.productsCompVal = row.product_components;
        this.productsSkuVal = row.combinations;
        this.$refs.multipleTable.toggleRowSelection(row);
      },
      /*底部tabs*/
      handleTabsClick(){},
      /*新增*/
      addPro(){
        this.addProMask = true;
        this.compCurIndex = 'index0';
        this.compUpload = 'upload0';
        this.resetAddPro();
      },
      addSkuMth(row){
        this.addSku = true;
        this.allComp = [];
        this.compList = [];
        this.allComp = [];
        this.skuForm.pid=row.id;
        this.skuForm.name= '';
        this.skuForm.product_components=[];
        this.proId = row.id;
        let compId = [];
        row.product_components.map(item=>{
          this.allComp.push(item);
        });
        this.allComp.map(item=>{
          compId.push(item.id);
        });
        this.$store.dispatch('products','/products');
        this.$fetch(this.urls.productcomponents,{'is_common': true})
          .then(res=>{
            res.data.map(item=>{
              if(compId.indexOf(item.id)==-1){
                this.allComp.push(item);
              }
            });
            this.allComp.map(list=>{
              if(list.is_common){
                this.compList.push({
                  label: `${ list.spec }(通用)`,
                  key: list.id,
                  component_code: list.component_code
                });
              }else {
                this.compList.push({
                  label: list.spec,
                  key: list.id,
                  component_code: list.component_code
                });
              }
            });
          },err=>{});
      },
      confirmAddSku(){
        this.$post(this.urls.combinations,this.skuForm)
          .then(()=>{
            this.addSku = false;
            this.$message({
              message: '添加sku成功',
              type: 'success'
            });
            this.refresh();
           /* this.productsSkuVal.map(item=>{
              if(item.id==this.proId){
                this.productsSkuVal = item.combinations;
              }
            })*/
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
      cancelAddSku(){
        this.addSku = false;
      },
      addComb(){
        let combKey= {
          component_code: '',
          jd_component_code: '',
          vips_component_code: '',
          tb_price: '',
          cost: '',
          price: '',
          highest_price: '',
          lowest_price: '',
          warehouse_cost: '',
          assembly_price: '',
          discount: '',
          commission:'',
          is_common: false,
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
          finished_pro: true,
          is_stop_pro: false
        }
        if(this.proForm.product_components.length>0&&!this.proForm.product_components[this.proForm.product_components.length-1].component_code){
          this.$message({
            message: '商品编码或者子件编码为空时不能添加新规格',
            type: 'info'
          });
        }else{
          this.proForm.product_components.push(combKey);
          this.compIndexNum = this.proForm.product_components.length-1;
          this.compUpload = 'upload'+ this.compIndexNum;
          this.compCurIndex = 'index'+this.compIndexNum;
        }
      },
      confirmAddPro(){
        let formData = this.proForm;
        formData.product_components.map((item,index)=>{
          if(!item.component_code){
            formData.product_components.splice(index,1);
          }
        })
        this.resData.shops.map(item=>{
          if(item.id == formData.shops_id){
            formData.shop_nick = item.nick;
          }
        });
        this.$post(this.urls.products,formData)
          .then(() => {
            this.$message({
              message: '添加成功',
              type: 'success'
            });
            this.addProMask = false;
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
      resetAddPro(){
        Object.assign(this.proForm, this.$options.data().proForm);
        this.noUpload = true;
        this.compUpload = 'upload0';
      },
      cancelAddPro(){
        this.addProMask = false;
      },
      //子件
      compRowCName({row,rowIndex}){
        row.index = rowIndex;
      },
      compRowClick(row){
        this.compCurIndex ='index'+row.index;
        this.compIndexNum = row.index;
        if(row.img_url){
          this.tableChgBtn = 'show'+ row.index;
        }else{
          this.compUpload = 'upload'+row.index
        }
      },
      judgeFm(file){
        const isJPG = file.type === 'image/jpeg';
        const isGIF = file.type === 'image/gif';
        const isPNG = file.type === 'image/png';

        if (!isJPG && !isGIF && !isPNG) {
          this.$message.error("上传图片必须是JPG/GIF/PNG 格式!")
        }
      },
      beforeUpload(file){
        this.showChgBtn = false;
        this.judgeFm(file);
        let formData  = new FormData();
        formData.append('image', file);
        axios.post(this.urls.uploadimages,formData).then(res=>{
          let imageInfo = res.data.meta;
          if(imageInfo.status_code == 201){
            this.noUpload = false;
            this.showChgBtn = true;
            this.proForm.img = res.data.path;
          }
        }).catch(err=>{})
      },
      updateFormUpload(file){
        this.componentShowChg = false;
        this.judgeFm(file);
        let formData  = new FormData();
        formData.append('image', file);
        axios.post(this.urls.uploadimages,formData).then(res=>{
          let imageInfo = res.data.meta;
          if(imageInfo.status_code == 201){
            this.noUpdate = false;
            this.componentShowChg = true;
            this.updateForm.img = res.data.path;
          }
        }).catch(err=>{})
      },
      beforeUploadComp(file){
        this.tableChgBtn = '';
        this.judgeFm(file);
        let formData  = new FormData();
        formData.append('image', file);
        axios.post(this.urls.uploadimages,formData).then(res=>{
          let imageInfo = res.data.meta;
          if(imageInfo.status_code == 201){
            this.compUpload = '';
            this.tableChgBtn = 'show'+this.compIndexNum;
            this.proForm.product_components[this.compIndexNum].img_url = res.data.path;
          }
        }).catch(err=>{})
      },
      updateTableUpload(file){
        this.updateChgBtn = '';
        this.judgeFm(file);
        let formData  = new FormData();
        formData.append('image', file);
        axios.post(this.urls.uploadimages,formData).then(res=>{
          let imageInfo = res.data.meta;
          if(imageInfo.status_code == 201){
            this.updateCompUpload = '';
            this.updateChgBtn = 'show'+this.updateRwIndex;
            this.updateForm.product_components[this.updateRwIndex].img_url = res.data.path;
          }
        }).catch(err=>{})
      },
      /*修改*/
      updateCName({row,rowIndex}){
        row.index = rowIndex;
      },
      updateProRowClick(row){
        this.updateRwIndex = row.index;
        this.updateProIndex = 'index'+row.index;
        if(row.img_url){
          this.updateChgBtn = 'show'+ row.index;
        }else{
          this.updateChgBtn = 'upload'+row.index
        }
      },
      editPro(){
        if (this.proSelection.length == 0) {
          this.$message({
            message: '没有选择要修改的数据',
            type: 'warning'
          });
          return
        } else if (this.proSelection.length >= 2) {
          this.$message({
            message: '只能修改单条数据',
            type: 'warning'
          });
          return
        }
        else {
          this.updateProMask = true;
          this.updateProIndex = '';
          this.$fetch(this.urls.products + '/' + this.updateId).then(res => {
            this.updateForm = {
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
              product_components: res.product_components
            };
           if(this.updateForm.url){
             this.noUpdate = false
           }else{
             this.noUpdate = true
           }
          }, err => {
            console.log(err);
          })
        }
      },
      componentBfUpload(file){
        this.componentShowChg = false;
        this.judgeFm(file);
        let formData  = new FormData();
        formData.append('image', file);
        axios.post(this.urls.uploadimages,formData).then(res=>{
          let imageInfo = res.data.meta;
          if(imageInfo.status_code == 201){
            this.componentShowChg = true;
            this.updateForm.img = res.data.path;
          }
        }).catch(err=>{})
      },
      updateAddComb(){
        let updateCombKey= {
          component_code: '',
          jd_component_code: '',
          vips_component_code: '',
          tb_price: '',
          cost: '',
          price: '',
          highest_price: '',
          lowest_price: '',
          warehouse_cost: '',
          assembly_price: '',
          discount: '',
          commission:'',
          is_common: false,
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
          finished_pro: true,
          is_stop_pro: false
        }
        if(this.updateForm.product_components.length>0&&!this.updateForm.product_components[this.updateForm.product_components.length-1].component_code){
          this.$message({
            message: '商品编码或者子件编码为空时不能添加新规格',
            type: 'info'
          });
        }else{
          this.updateForm.product_components.push(updateCombKey);
          this.updateRwIndex = this.updateForm.product_components.length-1;
          this.updateCompUpload = 'upload'+ this.updateRwIndex;
          this.updateProIndex = 'index'+this.updateRwIndex;
        }
      },
      confirmUpdate(){
        this.$patch(this.urls.products+'/'+ this.updateId,this.updateForm)
          .then(()=>{
            this.updateProMask = false;
            this.$message({
              message: '商品修改成功',
              type: 'success'
            });
            this.refresh();
          },err=>{
            if (err.response) {
              let arr = err.response.data.errors;
              let arr1 = [];
              for (let i in arr) {
                arr1.push(arr[i]);
              }
              let str = arr1.join(',');
              this.$message.error(str);
            }
          })
      },
      cancelUpdate(){
        this.updateProMask = false;
      },
      editSku(row){
        this.updateSkuMask = true;
        this.updateSkuId = row.id;
        this.alreadyCompId = [];
        this.updateCompList = [];
        this.updateCompId = [];
        this.updateList = [];
        this.$store.dispatch('products','/products');
        this.$fetch(this.urls.combinations+'/'+row.id)
          .then(res=>{
            res.product_components.map(item=>{
              this.alreadyCompId.push(item.id)
            });
            this.updateSkuForm = {
              pid: res.product.id,
              name: res.name,
              product_components: this.alreadyCompId
            };
            this.productsCompVal.map(item=>{
              this.updateList.push(item)
            });
            if(this.updateList.length>0){
              this.updateList.map(item=>{
                this.updateCompId.push(item.id);
              });
            }else{
              this.updateCompId= [];
            }
            this.$fetch(this.urls.productcomponents,{'is_common': true})
              .then(res=>{
                res.data.map(item=>{
                  if(this.updateCompId.indexOf(item.id)==-1){
                    this.updateList.push(item);
                  }
                });
                this.updateList.map(list=>{
                  if(list.is_common){
                    this.updateCompList.push({
                      label: `${ list.spec }(通用)`,
                      key: list.id,
                      component_code: list.component_code
                    });
                  }else {
                    this.updateCompList.push({
                      label: list.spec,
                      key: list.id,
                      component_code: list.component_code
                    });
                  }
                })},err=>{})
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
            });
        },
      confirmUpdateSku(){
        this.$patch(this.urls.combinations+'/'+this.updateSkuId,this.updateSkuForm)
          .then(()=>{
            this.updateSkuMask = false;
            this.$message({
              message: '修改sku成功',
              type: 'success'
            });
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
      },
      cancelUpdateSku(){
        this.updateSkuMask = false;
      },
      compSave(){},
      compEdit(){},
      /*单条删除*/
      delPro(row, e){
        this.showDel = true;
        $('.el-popper').css({left: e.x - 100 + 'px', top: e.y - 125 + 'px'});
        this.delId = row.id;
        if(row.pid && row.component_code){
          this.delUrl = 'productcomponents';
        }else if(row.combinations && row.product_components){
          this.delUrl = 'products';
        }else {
          this.delUrl = 'combinations';
        }
      },
      cancelD() {
        this.showDel = false;
        this.$message({
          message: '取消删除',
          type: 'info'
        });
      },
      confirmD(id) {
        this.$del(this.urls[this.delUrl] + '/' + id)
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
      handleSelectionChange(val) {
        if (val.length != 0) {
          this.updateId = val[0].id;
        } else {
          this.updateId = '';
        }
        this.proSelection = val;
        let del = [];
        val.forEach(selectedItem => {
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
            this.$del(this.urls.products, {ids: this.delArr})
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
                  this.$message.error(str);
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
        this.productsLoading = true;
        this.getProducts();
      },
      /*其他*/
      test(){},
    },
    mounted(){
      this.getProducts();
      this.$store.dispatch('setOpt', this.newOpt);
      const that = this;
      $(window).resize(() => {
        that.$store.dispatch('setOpt', that.newOpt);
      })
    }
  }
</script>