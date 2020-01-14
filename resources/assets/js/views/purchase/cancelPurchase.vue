<template>
    <div>
        <!--查询-->
        <div class="searchBox">
            <span>
                <label>取消单号</label>
                <el-input v-model="searchBox.goodsName" clearable @keyup.enter.native="getData"></el-input>
            </span>
            <span>
                <label>创建人</label>
                <el-input v-model="searchBox.goodsName" clearable @keyup.enter.native="getData"></el-input>
            </span>
            <span>
                <label>提交人</label>
                <el-input v-model="searchBox.goodsName" clearable @keyup.enter.native="getData"></el-input>
            </span>
        </div>

        <!--取消采购-->
        <el-tabs v-model="topActiveName" @tab-click="topTabsClick">
            <el-tab-pane label="新建" name="0">
                <el-table :data="newData" fit
                          @selection-change="handleSelectionChange"
                          v-loading="loading"
                          height="350"
                          @row-click="cancelPRClick"
                >
                    <el-table-column
                            type="selection"
                            width="95" align="center"
                            :checked="checkboxInit">
                    </el-table-column>
                    <el-table-column v-for="item in tabsHead" :label="item.label" align="center" :width="item.width" :key="item.prop">
                        <template slot-scope="scope">
                                <span v-if="scope.row[item.prop]">
                                    {{item.inProp?scope.row[item.prop][item.inProp]:scope.row[item.prop]}}
                                </span>
                        </template>
                    </el-table-column>
                    <el-table-column label="操作" width="90" align="center" fixed="right">
                        <template slot-scope="scope">
                            <el-button size="mini" type="danger" @click="delSingle(scope.row,$event)">删除</el-button>
                        </template>
                    </el-table-column>
                </el-table>
            </el-tab-pane>
            <el-tab-pane label="已完成" name="1">
                <el-table :data="partData" fit
                          @selection-change="handleSelectionChange"
                          v-loading="loading"
                          height="400"
                          @row-click="cancelPRClick"
                >
                    <el-table-column
                            type="selection"
                            width="95" align="center"
                            :checked="checkboxInit">
                    </el-table-column>
                    <el-table-column v-for="item in tabsHead" :label="item.label" align="center" :width="item.width" :key="item.prop">
                        <template slot-scope="scope">
                                <span v-if="scope.row[item.prop]">
                                    {{item.inProp?scope.row[item.prop][item.inProp]:scope.row[item.prop]}}
                                </span>
                        </template>
                    </el-table-column>
                    <el-table-column label="操作" width="90" align="center" fixed="right">
                        <template slot-scope="scope">
                            <el-button size="mini" type="danger" @click="delPur(scope.row,$event)">删除</el-button>
                        </template>
                    </el-table-column>
                </el-table>
            </el-tab-pane>
        </el-tabs>

        <!--页码-->
        <Pagination :page-url="urls['cancelpurchases']" @handlePagChg="handlePagChg"></Pagination>

        <!--取消采购明细-->
        <el-tabs v-model="btmActiveName">
            <el-tab-pane label="取消采购明细" name="0">
                <el-table :data="detailData" fit>
                    <el-table-column v-for="item in detailHead" :label="item.label" align="center" :width="item.width" :key="item.prop">
                        <template slot-scope="scope">
                            <span v-if="item.type == 'img'">
                                <el-popover
                                     placement="right"
                                     trigger="hover"
                                     popper-class="picture_detail">
                                 <img :src="scope.row[item.prop]">
                                 <img slot="reference" :src="scope.row[item.prop]">
                             </el-popover>
                        </span>
                            <span v-else-if="item.type=='select'">
                             <span v-for="(list,index) in resData[item.stateVal]" :key="index">
                                           <span v-if="list.id==scope.row[item.prop]">
                                           {{list.name}}
                                           </span>
                             </span>
                         </span>
                            <span v-else>
                                {{scope.row[item.prop]}}
                            </span>
                        </template>
                    </el-table-column>
                    <el-table-column label="操作" width="90" align="center" fixed="right">
                        <template slot-scope="scope">
                            <el-button size="mini" type="danger" @click="delSingle(scope.row,$event)">删除</el-button>
                        </template>
                    </el-table-column>
                </el-table>
            </el-tab-pane>
        </el-tabs>

        <!--新增-->
        <el-dialog title="取消采购单" :visible.sync="cancelPurMask" :class="{'more-forms':moreForms}">
            <el-button type="text">基本信息</el-button>
            <div class="searchBox cancelPur">
                <span>
                    <label>取消采购单号</label>
                    <el-input placeholder="系统自动生成" disabled></el-input>
                </span>
                <span>
                    <label>采购单号</label>
                    <el-input disabled v-model="addPurOrder"></el-input>
                    <i class="el-icon-more cancelIcon" @click="selectPurOrder"></i>
                     <el-button type="primary" @click="autoFill">自动填充</el-button>
                    <el-button  @click="cancelFill">取消填充</el-button>
                </span>
            </div>
            <el-button type="text">取消采购明细</el-button>
            <el-table :data="addStockVal" fit height="350" :row-class-name="cancelRowCName" @cell-click="addCellClick">
                <el-table-column v-for="(item,index) in cancelHead" :label="item.label" align="center" :width="item.width" :key="index">
                    <template slot-scope="scope">
                        <span v-if="item.prop == 'cancel_purchase_quantity'">
                            <span v-if="addCurRow == 'index'+scope.$index">
                                <el-input v-model.trim="scope.row[item.prop]" @input="purQChg(scope.row)"></el-input>
                            </span>
                            <span v-else>
                                {{scope.row[item.prop]}}
                            </span>
                        </span>
                        <span v-else>
                            <span v-if="item.type == 'img'">
                             <el-popover
                                     placement="right"
                                     trigger="hover"
                                     popper-class="picture_detail">
                                 <img :src="scope.row[item.prop]">
                                 <img slot="reference" :src="scope.row[item.prop]">
                             </el-popover>
                        </span>
                            <span v-else-if="item.type=='select'">
                             <span v-for="(list,index) in resData[item.stateVal]" :key="index">
                                           <span v-if="list.id==scope.row[item.prop]">
                                           {{list.name}}
                                           </span>
                             </span>
                         </span>
                            <span v-else>
                              {{scope.row[item.prop]}}
                         </span>
                        </span>
                    </template>
                </el-table-column>
                <el-table-column label="操作" width="90" align="center" fixed="right">
                    <template slot-scope="scope">
                        <el-button size="mini" type="danger" @click="delAddPur(scope.$index)">删除</el-button>
                    </template>
                </el-table-column>
            </el-table>
            <div slot="footer" class="dialog-footer">
                <el-button type="primary" @click="confirmAdd">确定</el-button>
                <el-button @click="cancelAdd">取消</el-button>
            </div>
        </el-dialog>

        <!--修改-->
        <el-dialog title="取消采购单" :visible.sync="updateCancelPurMask" :class="{'more-forms':moreForms}">
            <el-button type="text">基本信息</el-button>
            <div class="searchBox cancelPur">
                <span>
                    <label>取消采购单号</label>
                    <el-input placeholder="系统自动生成" disabled v-model="cancelOrder"></el-input>
                </span>
                <span>
                    <label>采购单号</label>
                    <el-input disabled v-model="updatePurOrder"></el-input>
                    <i class="el-icon-more cancelIcon" @click="selectPurOrder"></i>
                     <el-button type="primary" @click="autoFill">自动填充</el-button>
                    <el-button  @click="cancelFill">取消填充</el-button>
                </span>
            </div>
            <el-button type="text">取消采购明细</el-button>
            <el-table :data="updateStockVal" fit highlight-current-row  :height="350" :row-class-name="cancelRowCName" @cell-click="addCellClick">
                <el-table-column v-for="(item,index) in cancelHead" :label="item.label" align="center" :width="item.width" :key="index">
                    <template slot-scope="scope">
                        <span v-if="item.prop == 'cancel_purchase_quantity'">
                            <span v-if="addCurRow == 'index'+scope.$index">
                                <el-input v-model.trim="scope.row[item.prop]" @input="purQChg(scope.row)"></el-input>
                            </span>
                            <span v-else>
                                {{scope.row[item.prop]}}
                            </span>
                        </span>
                        <span v-else>
                            <span v-if="item.type == 'img'">
                             <el-popover
                                     placement="right"
                                     trigger="hover"
                                     popper-class="picture_detail">
                       <img :src="scope.row[item.prop]">
    <img slot="reference" :src="scope.row[item.prop]">
   </el-popover>
                        </span>
                            <span v-else-if="item.type=='select'">
                             <span v-for="(list,index) in resData[item.stateVal]" :key="index">
                                           <span v-if="list.id==scope.row[item.prop]">
                                           {{list.name}}
                                           </span>
                             </span>
                         </span>
                            <span v-else>
                              {{scope.row[item.prop]}}
                         </span>
                        </span>
                    </template>
                </el-table-column>
                <el-table-column label="操作" width="90" align="center" fixed="right">
                    <template slot-scope="scope">
                        <el-button size="mini" type="danger" @click="delAddPur(scope.$index)">删除</el-button>
                    </template>
                </el-table-column>
            </el-table>
            <div slot="footer" class="dialog-footer">
                <el-button type="primary" @click="confirmAdd">确定</el-button>
                <el-button @click="cancelAdd">取消</el-button>
            </div>
        </el-dialog>

        <!--采购单数据-->
        <el-dialog title="选择采购单" :visible.sync="purOrderMask">
            <el-table :data="purVal" fit height="300" @row-click="selectPur">
                <el-table-column v-for="(item,index) in purHead" :label="item.label" align="center" :key="index" :width="item.width">
                    <template slot-scope="scope">
                        {{item.inProp?scope.row[item.prop][item.inProp]:scope.row[item.prop]}}
                    </template>
                </el-table-column>
            </el-table>
            <div slot="footer" class="dialog-footer">
                <el-button type="primary" @click="confirmPurOrder">确定</el-button>
                <el-button @click="cancelPurOrder">取消</el-button>
            </div>
        </el-dialog>

        <!--删除单条-->
        <el-popover
                placement="top"
                width="160"
                v-model="showDel" slot="tip">
            <p>确定删除该条数据？</p>
            <div style="text-align: right; margin: 0">
                <el-button size="mini" type="text" @click="cancelD">取消</el-button>
                <el-button type="primary" size="mini" @click="confirmD(delUrl,delId)">确定</el-button>
            </div>
        </el-popover>
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
            ent: this.updatePur
          },
          {
            cnt: '删除',
            icon: 'bf-del',
            ent: this.delBatch
          },
          {
            cnt: '提交',
            icon: 'bf-submit',
            ent: this.test
          },
          {
            cnt: '导出',
            icon: 'bf-out',
            ent: this.test
          },
          {
            cnt: '刷新',
            icon: 'bf-refresh',
            ent: this.refresh
          }
        ],
        searchBox: {
          goodsName: ''
        },
        /*获取*/
        topActiveName: '0',
        newData:[],
        partData: [],
        loading: true,
        checkboxInit: false,
        tabsHead:[
          {
            label: '取消单号',
            width: '200',
            prop: 'cancel_purchases_no',
            type: 'text',
          },
          {
            label: '采购单号',
            width: '200',
            prop: 'purchase',
            inProp: 'purchase_order_no',
            type: 'text',
          },
          {
            label: '创建人',
            width: '120',
            prop: 'creator',
            type: 'text',
          },
          {
            label: '提交人',
            width: '120',
            prop: 'submitter',
            type: 'text',
          },
          {
            label: '创建时间',
            width: '200',
            prop: 'created_at',
            type: 'text',
          },
          {
            label: '提交时间',
            width: '200',
            prop: 'submit_at',
            type: 'text',
          }
        ],
        btmActiveName: '0',
        detailData: [],
        detailHead: [
          {
            label: '子件图片',
            width: '120',
            prop: 'img_url',
            type: 'img',
          },
          {
            label: '商品编码',
            width: '150',
            prop: 'commodity_code',
            type: 'text',
          },
          {
            label: '商品简称',
            width: '150',
            prop: 'short_name',
            type: 'text',
          },
          {
            label: '子件编码',
            width: '150',
            prop: 'component_code',
            type: 'text',
          },
          {
            label: '子件名称',
            width: '130',
            prop: 'spec',
            type: 'text',
          },
          {
            label: '供应商',
            width: '130',
            prop: 'suppliers_id',
            type: 'select',
            stateVal:'suppliers'
          },
          {
            label: '取消数量',
            width: '100',
            prop: 'cancel_purchase_quantity',
            type: 'number',
          }
        ],
        /*新增*/
        purOrderMask: false,
        cancelPurMask: false,
        addPurOrder: '',
        cancelHead:[
          {
            label: '子件图片',
            width:'120',
            prop: 'img_url',
            type: 'img',
          },
          {
            label: '采购单号',
            width:'200',
            prop: 'purchase_order_no',
            type: 'text',
          },
          {
            label: '商品编码',
            width:'140',
            prop: 'commodity_code',
            type: 'text',
          },
          {
            label: '供应商',
            width:'130',
            prop: 'supplier_id',
            type: 'select',
            stateVal: 'suppliers'
          },
          {
            label: '商品简称',
            width:'130',
            prop: 'short_name',
            type: 'text',
          },
          {
            label: '子件编码',
            width:'130',
            prop: 'component_code',
            type: 'text',
          },
          {
            label: '子件名称',
            width:'120',
            prop: 'spec',
            type: 'text',
          },
          {
            label: '采购数',
            width:'100',
            prop: 'purchase_quantity',
            type: 'number',
          },
          {
            label: '已入库数',
            width:'100',
            prop: 'stock_in_count',
            type: 'number',
          },
          {
            label: '取消数量',
            width: '100',
            prop: 'cancel_purchase_quantity',
            type: 'number',
          }
        ],
        addCurRow:'',
        addStockVal:[],
        moreForms: true,
        purHead:[
          {
            label: '采购单号',
            width: '200',
            prop: 'purchase_order_no',
            type: 'text',
          },
          {
            label: '创建时间',
            prop: 'user',
            width: '200',
            inProp:'created_at',
            type: 'text',
          },
          {
            label: '创建人',
            prop: 'user',
            width: '120',
            inProp:'username',
            type: 'text',
          }
        ],
        purVal:[],
        purOrderRow:{},
        /*修改*/
        updateCancelPurMask: false,
        cancelOrder: '',
        updatePurOrder: '',
        updateStockVal: [],
        purchaseId: '',
        /*删除单条*/
        showDel: false,
        delId:'',
        delUrl:'',
        /*批量删除*/
        delBatchUrl: '',
        ids:[],
        checkboxId: '',
        curRowId:'',
      }
    },
    computed:{
      urls:{
        get:function(){
          return this.$store.state.urls
        },
        set:function(){}
      },
      resData:{
        get:function(){
          return this.$store.state.responseData
        },
        set:function(){}
      },
    },
    methods: {
      test() {
        console.log(1);
      },
      /*获取数据*/
      topTabsClick() {
        this.loading = true;
        this.fetchData();
      },
      fetchData() {
        let index = this.topActiveName - 0;
        this.detailData = [];
        switch (index) {
          case 0:
            this.newOpt[0].nClick = false;
            this.newOpt[1].nClick = false;
            this.newOpt[2].nClick = false;
            this.newOpt[3].nClick = false;
            this.$fetch(this.urls.cancelpurchases, {
              'status': true,
              'is_submit': false,
              'include': 'purchase,cancelPurchaseDetails.cancelPurchase,cancelPurchaseDetails.purchaseDetail,cancelPurchaseDetails.purchaseDetail.productComponent.product'
            })
              .then(res => {
                this.loading = false;
                this.newData = res.data;
                let pg = res.meta.pagination;
                this.$store.dispatch('currentPage', pg.current_page);
                this.$store.commit('PER_PAGE', pg.per_page);
                this.$store.commit('PAGE_TOTAL', pg.total);
                this.$store.dispatch('suppliers', '/suppliers');
                if(res.data[0]['cancelPurchaseDetails']['data'].length>=0){
                  res.data[0]['cancelPurchaseDetails']['data'].map(item=>{
                    let list = {
                      img_url: item['purchaseDetail']['productComponent'].img_url,
                      commodity_code: item['purchaseDetail']['productComponent']['product'].commodity_code,
                      short_name: item['purchaseDetail']['productComponent']['product'].short_name,
                      component_code: item['purchaseDetail']['productComponent'].component_code,
                      spec: item['purchaseDetail']['productComponent'].spec,
                      suppliers_id: item['purchaseDetail'].suppliers_id,
                      cancel_purchase_quantity: item.cancel_purchase_quantity,
                      id: item.id
                    };
                    this.detailData.push(list);
                  })
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
              });
            break;
          case 1:
            this.newOpt[0].nClick = true;
            this.newOpt[1].nClick = true;
            this.newOpt[2].nClick = true;
            this.newOpt[3].nClick = true;
            this.$fetch(this.urls.cancelpurchases, {
              'status': true,
              'is_submit': true,
              include: 'purchase,cancelPurchaseDetails'})
              .then(res => {
                this.loading = false;
                this.partData = res.data;
                let pg = res.meta.pagination;
                this.$store.dispatch('currentPage', pg.current_page);
                this.$store.commit('PER_PAGE', pg.per_page);
                this.$store.commit('PAGE_TOTAL', pg.total);
                if(res.data[0]['cancelPurchaseDetails']['data'].length>=0){
                  res.data[0]['cancelPurchaseDetails']['data'].map(item=>{
                    let list = {
                      img_url: item['purchaseDetail']['productComponent'].img_url,
                      commodity_code: item['purchaseDetail']['productComponent']['product'].commodity_code,
                      short_name: item['purchaseDetail']['productComponent']['product'].short_name,
                      component_code: item['purchaseDetail']['productComponent'].component_code,
                      spec: item['purchaseDetail']['productComponent'].spec,
                      suppliers_id: item['purchaseDetail'].suppliers_id,
                      cancel_purchase_quantity: item.cancel_purchase_quantity,
                      id: item.id
                    };
                    this.detailData.push(list);
                  })
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
              });
            break;
        }
      },
      cancelPRClick(row){
        this.curRowId = row.id;
        console.log('row',row);
        this.detailData = [];
        if(row['cancelPurchaseDetails']['data'].length>=0){
         row['cancelPurchaseDetails']['data'].map(item=>{
            let list = {
              img_url: item['purchaseDetail']['productComponent'].img_url,
              commodity_code: item['purchaseDetail']['productComponent']['product'].commodity_code,
              short_name: item['purchaseDetail']['productComponent']['product'].short_name,
              component_code: item['purchaseDetail']['productComponent'].component_code,
              spec: item['purchaseDetail']['productComponent'].spec,
              suppliers_id: item['purchaseDetail'].suppliers_id,
              cancel_purchase_quantity: item.cancel_purchase_quantity,
              id: item.id
            };
            this.detailData.push(list);
          })
        }
      },
      /*新增*/
      addNew(){
        this.cancelPurMask = true;
        this.addPurOrder = '';
        this.addStockVal = [];
      },
      selectPurOrder(){
        if(this.cancelPurMask){
          this.purOrderMask = true;
          let obj=[];
          this.$fetch(this.urls.purchases,{'purchase_status':'new','is_audit':true,'status': true,'include':'user,purchaseLists.purchaseDetails.productComponent,purchaseLists.purchase,purchaseLists.combination.product'})
            .then(res => {
              res.data.map(item=>{
                obj.push(item);
              });
            }, err => {
              console.log(err);
            });
          this.$fetch(this.urls.purchases,{'purchase_status':'section','is_audit':true,'status': true,'include':'user,purchaseLists.purchaseDetails.productComponent,purchaseLists.purchase,purchaseLists.combination.product'})
            .then(res => {
              res.data.map(item=>{
                obj.push(item);
              });
            }, err => {
              console.log(err);
            });
          this.purVal = obj;
        }else{
          this.purOrderMask = true;
          let obj=[];
          this.$fetch(this.urls.purchases+'/'+ this.purchaseId,{'include':'user,purchaseLists.purchaseDetails.productComponent,purchaseLists.purchase,purchaseLists.combination.product'})
            .then(res => {
              obj.push(res);
            }, err => {
              console.log(err);
            });
          this.purVal = obj;
        }
        console.log(' this.purVal',this.purVal);
      },
      selectPur(row){
        let rowData = row;
        this.purOrderRow = rowData;
      },
      confirmPurOrder(){
        if(this.cancelPurMask){
          this.addStockVal = [];
          this.purOrderRow['purchaseLists']['data'].map(item=>{
            this.addPurOrder = item['purchase'].purchase_order_no;
            item['purchaseDetails']['data'].map(detailItem=>{
              let list = {
                img_url: detailItem.productComponent.img_url,
                purchase_order_no: item['purchase'].purchase_order_no,
                commodity_code: item['combination']['product'].commodity_code,
                supplier_id: item['combination']['product'].supplier_id,
                short_name: item['combination']['product'].short_name,
                component_code: detailItem.productComponent.component_code,
                spec: detailItem.productComponent.spec,
                purchase_quantity: detailItem.purchase_quantity,
                stock_in_count: detailItem.stock_in_count,
                cancel_purchase_quantity: '',
                purchase_details_id: detailItem.id
              };
              this.addStockVal.push(list);
            })
          });
          this.purOrderMask = false;
        }else{
          let purchase_details_id = [];
          this.updateStockVal.map(item=>{
            purchase_details_id.push(item.purchase_details_id);
          });
          console.log('purchase_details_id',purchase_details_id);
           this.purOrderRow['purchaseLists']['data'].map(item=>{
             this.updatePurOrder = item['purchase'].purchase_order_no;
             item['purchaseDetails']['data'].map(detailItem=>{
               let list = {
                 img_url: detailItem.productComponent.img_url,
                 purchase_order_no: item['purchase'].purchase_order_no,
                 commodity_code: item['combination']['product'].commodity_code,
                 supplier_id: item['combination']['product'].supplier_id,
                 short_name: item['combination']['product'].short_name,
                 component_code: detailItem.productComponent.component_code,
                 spec: detailItem.productComponent.spec,
                 purchase_quantity: detailItem.purchase_quantity,
                 stock_in_count: detailItem.stock_in_count,
                 cancel_purchase_quantity: '',
                 purchase_details_id: detailItem.id
               };
               if(purchase_details_id.indexOf(list.purchase_details_id)==-1){
                 this.updateStockVal.push(list);
               }
             })
           });
           this.purOrderMask = false;
        }
      },
      delAddPur(index){
        this.addStockVal.splice(index,1);
      },
      cancelPurOrder(){
        this.purOrderMask = false;
        this.$message({
          message:'取消添加采购单',
          type: 'info'
        })
      },
      cancelRowCName({row,rowIndex}){
        row.index = rowIndex;
      },
      purQChg(row){
        /*如果该数大于采购-已入库数，提示取消在途数必须小于或者等于在途数减去已入库数*/
        let maxNum = (row.purchase_quantity-0)-(row.stock_in_count-0);
        if(row.cancel_purchase_quantity>maxNum){
          this.$message.error('取消在途数必须小于或者等于在途数减去已入库数');
          row.cancel_purchase_quantity = 0;
        }
      },
      addCellClick(row){
        this.addCurRow = 'index'+row.index;
      },
      autoFill(){
        /*所有的取消数量等于采购数-已入库数*/
        if(this.cancelPurMask){
          this.addStockVal.map(item=>{
            item.cancel_purchase_quantity = (item.purchase_quantity-0)-(item.stock_in_count-0);
          })
        }else{
          this.updateStockVal.map(item=>{
            item.cancel_purchase_quantity = (item.purchase_quantity-0)-(item.stock_in_count-0);
          })
        }
      },
      cancelFill(){
        /*所有的取消数量归零*/
        if(this.cancelPurMask){
          this.addStockVal.map(item=>{
            item.cancel_purchase_quantity = 0;
          })
        }else{
          this.updateStockVal.map(item=>{
            item.cancel_purchase_quantity = 0;
          })
        }
      },
      confirmAdd(){
        if(this.cancelPurMask){
          this.cancelPurMask = false;
          let submitForm={
            purchases_id: this.purOrderRow.id,
            cancel_purchase_details: []
          };
          this.addStockVal.map(item=>{
            if(item.cancel_purchase_quantity>0){
              submitForm.cancel_purchase_details.push({
                purchase_details_id: item.purchase_details_id,
                cancel_purchase_quantity: item.cancel_purchase_quantity
              })
            }
          });
          this.$post(this.urls.cancelpurchases,submitForm)
            .then(()=>{
              this.cancelPurMask = false;
              this.refresh();
              this.$message({
                message:'添加取消采购单成功',
                type:'success'
              })
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
        }else{
          this.updateCancelPurMask = false;
          let submitForm={
            purchases_id: this.purchaseId,
            cancel_purchase_details: []
          };
          console.log(' this.updateStockVal',this.updateStockVal);
          this.updateStockVal.map(item=>{
            if(item.cancel_purchase_quantity>0){
              if(item.id){
                submitForm.cancel_purchase_details.push({
                  id: item.id,
                  purchase_details_id: item.purchase_details_id,
                  cancel_purchase_quantity: item.cancel_purchase_quantity
                })
              }else{
                submitForm.cancel_purchase_details.push({
                  purchase_details_id: item.purchase_details_id,
                  cancel_purchase_quantity: item.cancel_purchase_quantity
                })
              }
            }
          });
          let id = this.checkboxId?this.checkboxId:this.curRowId;
          this.$patch(this.urls.cancelpurchases+'/'+id,submitForm)
            .then(()=>{
              this.updateCancelPurMask = false;
              this.refresh();
              this.$message({
                message:'修改取消采购单成功',
                type:'success'
              })
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
        }
      },
      cancelAdd(){
        if(this.cancelPurMask){
          this.cancelPurMask = false;
          this.$message({
            message:'取消添加取消采购单',
            type:'info'
          })
        }else{
          this.updateCancelPurMask = false;
          this.$message({
            message:'取消修改取消采购单',
            type:'info'
          })
        }
      },
      /*修改*/
      updatePur(){
        if (this.newOpt[1].nClick) {
          return
        } else {
          this.cancelOrder = '';
          this.updatePurOrder = '';
          this.updateStockVal = [];
          this.updateCancelPurMask = true;
          /*判断当前复选框是否有值，有的话修改复选框最后一项，否则修改currentId*/
          let id = this.checkboxId?this.checkboxId:this.curRowId;
            this.$fetch(this.urls.cancelpurchases + '/' + id,{'include':'purchase,cancelPurchaseDetails.cancelPurchase,cancelPurchaseDetails.purchaseDetail,cancelPurchaseDetails.purchaseDetail.productComponent,cancelPurchaseDetails.purchaseDetail.productComponent.product'}).then(res => {
              this.cancelOrder = res['cancel_purchases_no'];
              this.updatePurOrder = res['purchase']['purchase_order_no'];
              this.purchaseId = res.purchases_id;
              let resData = {
                id: res.id,
                img_url: res['cancelPurchaseDetails']['data'][0]['purchaseDetail']['productComponent'].img_url,
                purchase_order_no: res['purchase'].purchase_order_no,
                commodity_code: res['cancelPurchaseDetails']['data'][0]['purchaseDetail']['productComponent']['product'].commodity_code,
                supplier_id: res['cancelPurchaseDetails']['data'][0]['purchaseDetail']['productComponent']['product'].supplier_id,
                short_name: res['cancelPurchaseDetails']['data'][0]['purchaseDetail']['productComponent']['product'].short_name,
                component_code: res['cancelPurchaseDetails']['data'][0]['purchaseDetail']['productComponent'].component_code,
                spec: res['cancelPurchaseDetails']['data'][0]['purchaseDetail']['productComponent'].spec,
                purchase_quantity: res['cancelPurchaseDetails']['data'][0]['purchaseDetail'].purchase_quantity,
                stock_in_count: res['cancelPurchaseDetails']['data'][0]['purchaseDetail'].stock_in_count,
                cancel_purchase_quantity: res['cancelPurchaseDetails']['data'][0].cancel_purchase_quantity,
                purchase_details_id: res['cancelPurchaseDetails']['data'][0].purchase_details_id
              };
              this.updateStockVal.push(resData);
            }, err => {
              console.log(err);
            })
        }
      },
      /*单条删除*/
      delSingle(row,e){
        this.showDel = true;
        $('.el-popper').css({left: e.x - 100 + 'px', top: e.y - 125 + 'px'});
        this.delId = row.id;
        this.delUrl = row['cancelPurchaseDetails']?this.urls.cancelpurchases:this.urls.cancelpurchasedetails;
      },
      cancelD(){
        this.showDel = false;
        this.$message({
          message: '取消删除',
          type: 'info'
        });
      },
      confirmD(url,id){
        this.$del(url+'/'+id)
          .then(()=>{
            this.$message({
              message: '删除成功',
              type: 'success'
            });
            this.showDel = false;
            this.refresh();
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
      /*批量删除*/
      handleSelectionChange(val){
        /*拿到id集合*/
        let delArr = [];
        val.forEach(selectedItem => {
          delArr.push(selectedItem.id);
        });
        this.ids = delArr.join(',');
        /*拿到当前id*/
        this.checkboxId =val.length>0?val[val.length-1].id:'';
      },
      delBatch(){
        if (this.ids.length === 0) {
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
            this.$del(this.urls.cancelpurchases, {ids: this.ids})
              .then(() => {
                this.$message({
                  message: '删除成功',
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
          }).catch(() => {
            this.$message({
              type: 'info',
              message: '已取消删除'
            });
          });
        }
      },
      /*分页*/
      handlePagChg(page){
        this.$fetch(this.urls['cancelpurchases']+'?page='+page)
          .then(res=>{
            this.topActiveName=='0'?this.newData = res.data:this.partData=res.data;
          })
      },
      /*刷新*/
      refresh(){
        this.loading = true;
        this.fetchData();
      },
    },
    mounted() {
      this.fetchData();
      this.$store.dispatch('setOpt', this.newOpt);
      const that = this;
      $(window).resize(() => {
        that.$store.dispatch('setOpt', that.newOpt);
      });
    }
  }
</script>