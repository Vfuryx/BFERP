<template>
    <div>
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
        <el-tabs v-model="activeName" @tab-click="clickTabs">
            <el-tab-pane v-for="item in tabs" :label=item.label :name=item.name>
                 <light-table :listData="tabsData"
                            :tableHead="tabsHead" @editSave="editSave" @handleEdit="handleEdit" @del="del" :loading="loading[activeName]" @edit="edit" @editCancel="editCancel" :nEditInRow="nEditInRow"></light-table>
            </el-tab-pane>
           <!-- <el-tab-pane label="已完成" name="1">
                &lt;!&ndash; <light-table :listData="partData"
                              :tableHead="topTabsHead" @editSave="editSave" @handleEdit="handleEdit" @del="del" :loading="loading[activeName]" :currentIndex="currentIndex" @edit="edit" @editCancel="editCancel" :nEditInRow="nEditInRow"></light-table>&ndash;&gt;
            </el-tab-pane>-->
        </el-tabs>

        <Pagination :page-url="urls['cancelpurchases']"></Pagination>

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
                    <!--v-model="searchBox.goodsName" -->
                    <el-input disabled></el-input>
                    <i class="el-icon-more cancelIcon" @click="selectPurOrder"></i>
                     <el-button type="primary" @click="autoFill">自动填充</el-button>
                    <el-button  @click="cancelFill">取消填充</el-button>
                </span>
            </div>
            <el-button type="text">取消采购明细</el-button>
            <el-table :data="addStockVal" fit highlight-current-row  :height="300" :row-class-name="cancelRowName" @cell-click="addCellClick" @current-change="addCurChg">
                <el-table-column v-for="(item,index) in cancelHead" :label="item.label" align="center" :width="item.width" :key="index">
                    <template slot-scope="scope">
                        <!-- <span v-if="item.type=='select'">
                             <span v-if="scope.row[item.prop]==''"></span>
                             <span v-else-if="typeof scope.row[item.prop] =='object' && item.nmProp">

                                  {{scope.row[item.prop][item.inProp]}}
                             </span>
                             <span v-else>
                                    <span v-for="(list,index) in resData[item.stateVal]" :key="index">
                                        <span v-if="item.inProp">
                                           <span v-if="list.id==scope.row[item.prop][item.inProp]">
                                           {{list.name?list.name:''}}
                                           </span>
                                        </span>
                                        <span v-else>
                                           <span v-if="list.id==scope.row[item.prop]">
                                     {{list.name?list.name:''}}
                                 </span>
                                        </span>
                             </span>
                             </span>
                         </span>
                         <span v-else>
                             {{item.inProp?scope.row[item.prop][item.inProp]:scope.row[item.prop]}}
                         </span>-->
                    </template>
                </el-table-column>
                <el-table-column label="取消数量" align="center" width="90">
                    <template slot-scope="scope">
                        <el-input size="small" type="number" v-model="cancelNum[scope.$index]" :placeholder="each.holder" @change="handleEdit"></el-input>
                    </template>
                </el-table-column>
                <el-table-column label="操作" width="90" align="center" fixed="right">
                    <template slot-scope="scope">
                        <el-button size="mini" type="danger" @click="delPurDtl(scope.row)">删除</el-button>
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
            <el-table :data="purVal" fit highlight-current-row  :height="300" @row-click="selectPur">
                <el-table-column v-for="(item,index) in purHead" :label="item.label" align="center" :key="index">
                    <template slot-scope="scope">
                        {{scope.row[item.prop]}}
                    </template>
                </el-table-column>
            </el-table>
            <div slot="footer" class="dialog-footer">
                <el-button type="primary" @click="confirmPurOrder">确定</el-button>
                <el-button @click="cancelPurOrder">取消</el-button>
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
            ent: this.test
          },
          {
            cnt: '删除',
            icon: 'bf-del',
            ent: this.test
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
            ent: this.test
          }
        ],
        searchBox: {
          goodsName: ''
        },
        activeName:'0',
        tabs:[
          {
            label: '新建',
            name:'0'
          },
          {
            label: '已完成',
            name:'1'
          }
        ],
        loading:[true,true],
        tabsHead:[
          {
            label: '取消单号',
            prop: '',
            type: 'text',
          },
          {
            label: '采购单号',
            prop: '',
            type: 'text',
          },
         /* {
            label: '合同编号',
            width: '150',
            prop: '',
            type: 'text',
          },*/
          {
            label: '类型',
            prop: '',
            type: 'text',
          },
          {
            label: '创建人',
            prop: '',
            type: 'text',
          },
          {
            label: '提交人',
            prop: '',
            type: 'text',
          },
          {
            label: '创建时间',
            prop: '',
            type: 'text',
          },
          {
            label: '提交时间',
            prop: '',
            type: 'text',
          },
        ],
        tabsData:[],
        purchase_status:['新建','finish'],
        /*新增*/
        cancelPurMask: false,
        cancelHead:[
          {
            label: '采购单号',
            prop: '',
            type: 'text',
          },
          {
            label: '商品编码',
            prop: '',
            type: 'text',
          },
          {
            label: '供应商',
            prop: '',
            type: 'select',
          },
          {
            label: '商品简称',
            prop: '',
            type: 'text',
          },
          {
            label: '规格编码',
            prop: '',
            type: 'text',
          },
          {
            label: '规格名称',
            prop: '',
            type: 'text',
          },
          {
            label: '采购数',
            prop: '',
            type: 'text',
          },
          {
            label: '已入库数',
            prop: '',
            type: 'text',
          }
        ],
        cancelNum:[],
        /*修改*/
        nEditInRow: false,
        moreForms: true,
        purOrderMask: false,
        purHead:[
          {
            label: '采购单号',
            prop: 'purchase_order_no',
            type: 'text',
          },
          {
            label: '创建时间',
            prop: 'created_at',
            type: 'text',
          },
          {
            label: '创建人',
            prop: 'user_id',
            type: 'text',
          }
        ],
        purVal:[],
        purOrderRow:{},
        addStockVal:[],
      }
    },
    computed:{
      urls:{
        get:function(){
          return this.$store.state.urls
        },
        set:function(){}
      }
    },
    /*采购单只获取新建和部分完成的*/
    methods: {
      test() {
        console.log(1);
      },
      clickTabs() {
        let index = this.activeName - 0;
        switch (index) {
          case 0:
            this.newOpt[0].nClick = false;
            this.newOpt[1].nClick = false;
            this.newOpt[2].nClick = false;
            this.newOpt[3].nClick = false;
            break
          case 1:
            this.newOpt[0].nClick = true;
            this.newOpt[1].nClick = true;
            this.newOpt[2].nClick = true;
            this.newOpt[3].nClick = true;
            break
        }
        this.loading = [true, true];
        this.getData();
      },
      /*获取数据*/
      getData() {
        this.$fetch(this.urls.cancelpurchases, {purchase_status: this.purchase_status[this.activeName]})
          .then(res => {
            this.loading[this.activeName] = false;
            this.tabsData[this.activeName] = res.data;
            let pg = res.meta.pagination;
            this.$store.dispatch('currentPage', pg.current_page);
            this.$store.commit('PER_PAGE', pg.per_page);
            this.$store.commit('PAGE_TOTAL', pg.total);
            /*仓库、仓库类型*/
            // this.$store.dispatch('warehouses','/warehouses');
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
        /*
        let index = this.activeName-0;
        switch(index){
          case 0:
            this.newOpt[0].nClick = false;
            this.newOpt[1].nClick = false;
            this.newOpt[2].nClick = false;
            this.newOpt[3].nClick = false;
            this.$fetch(this.urls.cancelpurchases,{purchase_status:'new'})
              .then(res => {
                this.loading = false;
                this.newData = res.data;
                let pg = res.meta.pagination;
                this.$store.dispatch('currentPage', pg.current_page);
                this.$store.commit('PER_PAGE', pg.per_page);
                this.$store.commit('PAGE_TOTAL', pg.total);
                /!*仓库、仓库类型*!/
                // this.$store.dispatch('warehouses','/warehouses');
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
            this.$fetch(this.stockInUrl,{purchase_status:'section'})
              .then(res => {
                this.partLoading = false;
                this.partData = res.data;
                let pg = res.meta.pagination;
                this.$store.dispatch('currentPage', pg.current_page);
                this.$store.commit('PER_PAGE', pg.per_page);
                this.$store.commit('PAGE_TOTAL', pg.total);
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
          case 2:
            this.newOpt[3].nClick = true;
            this.newOpt[4].nClick = true;
            this.newOpt[5].nClick = false;
            this.$fetch(this.stockInUrl,{purchase_status:'finish'})
              .then(res => {
                this.finishLoading = false;
                this.finishData = res.data;
                let pg = res.meta.pagination;
                this.$store.dispatch('currentPage', pg.current_page);
                this.$store.commit('PER_PAGE', pg.per_page);
                this.$store.commit('PAGE_TOTAL', pg.total);
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
            break
        }
        /!* this.$fetch(this.purchasesUrl)
           .then(res => {
             console.log(res);
             /!* this.newLoading = false;
              this.getsInfo = res.data;
              this.getsInfo.map(item=>{
                if(item.purchase_status=="新建"){
                  this.newData.push(item);
                }else if(item.purchase_status=="部分完成"){
                  this.partData.push(item);
                }else{
                  this.readyData.push(item);
                }
              });
              this.newLoading = false;
              /!*let pg = res.meta.pagination;
              this.$store.dispatch('currentPage', pg.current_page);
              this.$store.commit('PER_PAGE', pg.per_page);
              this.$store.commit('PAGE_TOTAL', pg.total);*!/
              this.$store.dispatch('warehouses','/warehouses');*!/
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
           })*!/
      },*/
      },
      /*新增*/
      addNew(){
        this.cancelPurMask = true;
      },
      selectPurOrder(){
        /*获取采购单数据*/
        this.purOrderMask = true;
        let obj=[];
        this.$fetch(this.urls.purchases,{'purchase_status':'new'})
          .then(res => {
            obj.push(res.data);
          }, err => {
            console.log(err);
          });
        this.$fetch(this.urls.purchases,{'purchase_status':'section'})
          .then(res => {
            obj.push(res.data);
          }, err => {
            console.log(err);
          });
        this.purVal = obj;
      },
      selectPur(row){
        console.log(row);
        this.purOrderRow = row;
      },
      confirmPurOrder(){
        this.purOrderMask = false;
        /*点击确定，传递当前id*/
        /*每次只能选择一行，拿到当前行的采购单号，然后填充采购单号，并显示单号下面的数据*/
      },
      cancelPurOrder(){
        this.purOrderMask = false;
      },
      cancelRowName({row,rowIndex}){
        row.index = rowIndex;
      },
      /*监控输入框变化*/
      handleEdit(){},
      /*单元格点击*/
      addCellClick(row, column, cell, event){},
      /*行切换*/
      addCurChg(currentRow,oldCurrentRow){
        if(oldCurrentRow){

        }
      },
     /*自动填充*/
      autoFill(){
        /*所有的取消数量等于采购数*/
      },
      /*取消填充*/
      cancelFill(){
        /*所有的取消数量归零*/
      },
      confirmAdd(){
        this.cancelPurMask = false;
      },
      cancelAdd(){
        this.cancelPurMask = false;
      },
      /*修改*/
      handleEdit(){},
      editSave(){},
      edit(){},
      editCancel(){},
      /*删除*/
      del(){}
    },
    mounted() {
      // this.getData();
      this.$store.dispatch('setOpt', this.newOpt);
      const that = this;
      $(window).resize(() => {
        that.$store.dispatch('setOpt', that.newOpt);
      });
    }
  }
</script>