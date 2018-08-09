<template>
    <div>
        <div class="search_box">
            <div class="searchBox">
                <span>
                    <label>采购单号</label>
                    <el-input v-model="searchBox.vip_name" clearable></el-input>
                </span>
                <span>
                    <label>商品名称</label>
                    <el-input v-model="searchBox.order_num" clearable></el-input>
                </span>
                <span>
                    <label>规格名称</label>
                    <el-input v-model="searchBox.order_man" clearable></el-input>
                </span>
                <span v-if="filterBox">
                    <label>供应商</label>
                   <el-select v-model="searchBox.order_shop" clearable placeholder="请选择">
                                    <el-option
                                            v-for="item in searchBox.orderShops"
                                            :key="item.value"
                                            :label="item.label"
                                            :value="item.value">
                                    </el-option>
                                </el-select>
                </span>
                <span v-else>
                    <el-button type="primary" @click="check">筛选</el-button>
                    <el-button @click="resets" style="margin-right: 5px">重置</el-button>
                                <span @click="toggleShow">
                                    <el-button type="text">展开</el-button>
                                    <i class="el-icon-arrow-down" style="color:#409EFF"></i>
                                </span>
                            </span>
            </div>
            <div class="searchBox" v-show="filterBox">
                 <span>
                     <label>创建时间</label>
                     <el-date-picker v-model="searchBox.order_promiseDate" type="daterange" range-separator="至" start-placeholder="开始日期" end-placeholder="结束日期">
                     </el-date-picker>
                 </span>
                <span>
                     <label>打印时间</label>
                     <el-date-picker v-model="searchBox.order_promiseDate" type="daterange" range-separator="至" start-placeholder="开始日期" end-placeholder="结束日期">
                     </el-date-picker>
                 </span>
                <span>
                     <label>承诺时间</label>
                     <el-date-picker v-model="searchBox.order_promiseDate" type="daterange" range-separator="至" start-placeholder="开始日期" end-placeholder="结束日期">
                     </el-date-picker>
                 </span>
            </div>
            <div class="searchBox" v-show="filterBox">
                <span>
                     <label>到货时间</label>
                     <el-date-picker v-model="searchBox.order_promiseDate" type="daterange" range-separator="至" start-placeholder="开始日期" end-placeholder="结束日期">
                     </el-date-picker>
                 </span>
                <span>
                    <label>色号</label>
                    <el-input v-model="searchBox.order_mark"
                              clearable></el-input>
                </span>
                <span>
                    <label>合同编号</label>
                    <el-input v-model="searchBox.order_mark"
                              clearable></el-input>
                </span>
                <span>
                    <label>买家昵称</label>
                    <el-input v-model="searchBox.order_mark" clearable></el-input>
                </span>
            </div>
            <div class="opt" v-if="filterBox" style="text-align: right">
                <el-button type="primary" @click="check">筛选</el-button>
                <el-button @click="resets">重置</el-button>
                <span @click="toggleShow" style="display: inline">
                                <el-button type="text">收起</el-button>
                                <i class="el-icon-arrow-up" style="color:#409EFF"></i>
                            </span>
            </div>
        </div>
        <el-tabs v-model="topActiveName" @tab-click="clickTopTabs">
            <el-tab-pane label="新建" name="0">
                <light-table :listData="newData"
                             :tableHead="tableHead" @editSave="editSave" @handleEdit="handleEdit" @del="del" :loading="newLoading" :currentIndex="currentIndex" @edit="edit" @editCancel="editCancel" :nEditInRow="nEditInRow[this.topActiveName]" :height="400"  @handleSelect="handleSelectionChange"></light-table>
            </el-tab-pane>
            <el-tab-pane label="部分完成" name="1">
                <light-table :listData="partData" :loading="partLoading"
                             :tableHead="tableHead" @editSave="editSave" @handleEdit="handleEdit"
                             @del="del" :currentIndex="currentIndex" @edit="edit"
                             @editCancel="editCancel" :nEditInRow="nEditInRow[this.topActiveName]" :height="400"></light-table>
            </el-tab-pane>
            <el-tab-pane label="已完成" name="2">
                <light-table :listData="finishData" :loading="finishLoading"
                             :tableHead="tableHead" @editSave="editSave" @handleEdit="handleEdit" @del="del" :currentIndex="currentIndex" @edit="edit"
                             @editCancel="editCancel" :nEditInRow="nEditInRow[this.topActiveName]" :height="400"></light-table>
            </el-tab-pane>
        </el-tabs>
        <Pagination :page-url="purchasesUrl"></Pagination>
        <el-tabs v-model="btmActiveName" @tab-click="clickBtmTabs">
            <el-tab-pane label="采购单明细" name="0">
                采购单明细
            </el-tab-pane>
            <el-tab-pane label="组合展示列表" name="1">
                组合展示列表
            </el-tab-pane>
            <el-tab-pane label="唯一码" name="2">
                唯一码
            </el-tab-pane>
        </el-tabs>

        <!--新建采购单-->
        <el-dialog title="新建采购单" :visible.sync="addNewPurchase" :class="{'more-forms':moreForms,'threeParts':threeParts}">
            <el-button type="text">基本信息</el-button>
            <add-new :rule-form="newPurchaseVal" :rules="newPurchaseRules" :add-arr="purchaseHead" :onlyInputs="true"></add-new>
            <el-button type="text">采购明细</el-button>
            <el-table :data="purchaseDetailVal"  fit highlight-current-row
                      type="index" :height="300">
                <!--:row-class-name="specRowClassName"-->
                <el-table-column v-for="(item,index) in purchaseDtlHead" :label="item.label" align="center" :width="item.width" :key="index">
                    <template slot-scope="scope">
                        <span v-if="item.type=='color'">
                                 <span class="tableColor" :style="{backgroundColor:scope.row.color}"></span>
                         {{scope.row[item.prop]}}
                            </span>
                        <span v-else-if="item.type=='select_stu'">
                                <i class='showStatus' :class="{'statusActive':scope.row.status==0?false:true}"></i>
                                 {{scope.row[item.prop]==0?'停用':'启用'}}
                            </span>
                        <span v-else-if="item.type=='select_def'">
                                 {{scope.row[item.prop]==0?'否':'是'}}
                            </span>
                        <span v-else-if="item.type=='select'">
                            <span v-if="scope.row[item.prop]==''">
                                {{}}
                            </span>
                            <span v-else-if="typeof scope.row[item.prop] =='object'">

                                 {{scope.row[item.prop][item.inProp]}}
                            </span>
                            <span v-else>
                                   <span v-for="(list,index) in resData[each.stateVal]" :key="index">
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
                            <span v-if="item.inProp">
                                     {{scope.row[item.prop][item.inProp]}}
                                </span>
                                <span v-else>
                                     {{scope.row[item.prop]}}
                                </span>
                        </span>
                    </template>
                </el-table-column>
                <el-table-column v-for="each in purchaseDtlEditHead" :label="each.label" align="center" :width="each.width" :key="each.inProp">
                    <template slot-scope="scope">
                        <span v-if="purDtlIndex =='index'+scope.$index">
                            <span v-if="each.type=='number'">
                                <el-input size="small" type="number" v-model="specDtlInfo[each.inProp]" :placeholder="each.holder" @change="handleEdit"></el-input>
                            </span>
                            <span v-else-if="each.type == 'textarea'">
                                      <el-input type="textarea" size="small" v-model="specDtlInfo[each.inProp]" :placeholder="each.holder" @change="handleEdit"></el-input>
                                </span>
                            <span v-else-if="each.type == 'select'">
                                    <el-select v-model="specDtlInfo[each.inProp]" :placeholder="each.holder">
                                       <span v-for="list in resData[each.stateVal]" :key="list.id">
                                            <el-option :label="list.name" :value="list.id"></el-option>
                                       </span>
                                   </el-select>
                                </span>
                            <span v-else-if="each.type == 'datepicker'">
                                   <el-date-picker
                                           v-model="specDtlInfo[each.inProp]"
                                           type="date"
                                           placeholder="选择日期"  @change="dateChangebirthday" format="yyyy/MM/dd" value-format="yyyy/MM/dd">
                            </el-date-picker>
                                </span>
                            <span v-else>
                                   <el-input size="small" v-model="specDtlInfo[each.inProp]" :placeholder="each.holder" @change="handleEdit"></el-input>
                                </span>
                        </span>
                        <span v-else>
                            <span v-if="each.type=='select'">
                                <span v-for="list in resData[each.stateVal]" :key="list.id">
                                           <span v-if="each.inProp">
                                              <span v-if="list.id==specDtlInfo[each.inProp]">
                                              {{list.name}}
                                              </span>
                                           </span>
                            </span>
                        </span>
                            <span v-else>
                                 {{specDtlInfo[each.inProp]}}
                             </span>
                        </span>
                    </template>
                </el-table-column>
                <el-table-column label="状态" width="100">
                    <template slot-scope="scope">
                        {{"新建"}}
                    </template>
                </el-table-column>
                <el-table-column label="操作" width="150" align="center" fixed="right">
                    <template slot-scope="scope">
                        <span v-if="purDtlIndex=='index'+scope.$index">
                            <el-button size="mini" @click="purDtlSave(scope.row,scope.$index)">保存</el-button>
                            <el-button size="mini" @click="purDtlCancel">取消
                            </el-button>
                        </span>
                        <span v-else>
                                 <el-button size="mini" @click="editPurDtl(scope.row,scope.$index)">编辑</el-button>
                            <el-button size="mini" type="danger" @click="delPurDtl(scope.row,$event,scope.$index)">删除</el-button>
                        </span>
                    </template>
                </el-table-column>
            </el-table>
            <el-button type="text">组合展示列表</el-button>
            <el-table :data="purchaseDetailVal"  fit highlight-current-row
                      type="index" :height="160">
                <!--:row-class-name="specRowClassName"-->
                <el-table-column v-for="(item,index) in purchaseDtlHead" :label="item.label" align="center" :width="item.width" :key="index">
                    <template slot-scope="scope">
                        <span v-if="item.type=='color'">
                                 <span class="tableColor" :style="{backgroundColor:scope.row.color}"></span>
                         {{scope.row[item.prop]}}
                            </span>
                        <span v-else-if="item.type=='select_stu'">
                                <i class='showStatus' :class="{'statusActive':scope.row.status==0?false:true}"></i>
                                 {{scope.row[item.prop]==0?'停用':'启用'}}
                            </span>
                        <span v-else-if="item.type=='select_def'">
                                 {{scope.row[item.prop]==0?'否':'是'}}
                            </span>
                        <span v-else-if="item.type=='select'">
                            <span v-if="scope.row[item.prop]==''">
                                {{}}
                            </span>
                            <span v-else-if="typeof scope.row[item.prop] =='object'">

                                 {{scope.row[item.prop][item.inProp]}}
                            </span>
                            <span v-else>
                                   <span v-for="(list,index) in resData[each.stateVal]" :key="index">
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
                            <span v-if="item.inProp">
                                     {{scope.row[item.prop][item.inProp]}}
                                </span>
                                <span v-else>
                                     {{scope.row[item.prop]}}
                                </span>
                        </span>
                    </template>
                </el-table-column>
                <el-table-column v-for="each in purchaseDtlEditHead" :label="each.label" align="center" :width="each.width" :key="each.inProp">
                    <template slot-scope="scope">
                        <span v-if="purDtlIndex =='index'+scope.$index">
                            <span v-if="each.type=='number'">
                                <el-input size="small" type="number" v-model="specDtlInfo[each.inProp]" :placeholder="each.holder" @change="handleEdit"></el-input>
                            </span>
                            <span v-else-if="each.type == 'textarea'">
                                      <el-input type="textarea" size="small" v-model="specDtlInfo[each.inProp]" :placeholder="each.holder" @change="handleEdit"></el-input>
                                </span>
                            <span v-else-if="each.type == 'select'">
                                    <el-select v-model="specDtlInfo[each.inProp]" :placeholder="each.holder">
                                       <span v-for="list in resData[each.stateVal]" :key="list.id">
                                            <el-option :label="list.name" :value="list.id"></el-option>
                                       </span>
                                   </el-select>
                                </span>
                            <span v-else-if="each.type == 'datepicker'">
                                   <el-date-picker
                                           v-model="specDtlInfo[each.inProp]"
                                           type="date"
                                           placeholder="选择日期"  @change="dateChangebirthday" format="yyyy/MM/dd" value-format="yyyy/MM/dd">
                            </el-date-picker>
                                </span>
                            <span v-else>
                                   <el-input size="small" v-model="specDtlInfo[each.inProp]" :placeholder="each.holder" @change="handleEdit"></el-input>
                                </span>
                        </span>
                        <span v-else>
                            <span v-if="each.type=='select'">
                                <span v-for="list in resData[each.stateVal]" :key="list.id">
                                           <span v-if="each.inProp">
                                              <span v-if="list.id==specDtlInfo[each.inProp]">
                                              {{list.name}}
                                              </span>
                                           </span>
                            </span>
                        </span>
                            <span v-else>
                                 {{specDtlInfo[each.inProp]}}
                             </span>
                        </span>
                    </template>
                </el-table-column>
                <el-table-column label="状态" width="100">
                    <template slot-scope="scope">
                        {{"新建"}}
                    </template>
                </el-table-column>
                <el-table-column label="操作" width="150" align="center" fixed="right">
                    <template slot-scope="scope">
                        <span v-if="purDtlIndex=='index'+scope.$index">
                            <el-button size="mini" @click="purDtlSave(scope.row,scope.$index)">保存</el-button>
                            <el-button size="mini" @click="purDtlCancel">取消
                            </el-button>
                        </span>
                        <span v-else>
                                 <el-button size="mini" @click="editPurDtl(scope.row,scope.$index)">编辑</el-button>
                            <el-button size="mini" type="danger" @click="delPurDtl(scope.row,$event,scope.$index)">删除</el-button>
                        </span>
                    </template>
                </el-table-column>
            </el-table>
            <div slot="footer" class="dialog-footer clearfix">
                <div style="float: left">
                    <el-button type="primary" @click="addPurchaseDetail">增加明细</el-button>
                </div>
                <div style="float: right">
                    <el-button type="primary" @click="confirmAddPur">确定</el-button>
                    <el-button @click="cancelAdd">取消</el-button>
                </div>
            </div>
        </el-dialog>

        <!--修改采购单-->
        <el-dialog title="修改采购单" :visible.sync="chgPurchase" :class="{'more-forms':moreForms}">
            <!--修改信息-->
            <add-new :rule-form="chgPurchaseVal" :rules="newPurchaseRules" :add-arr="purchaseHead" :onlyInputs="true" :hasSelect="true"></add-new>
            <el-button @click="">添加采购明细信息</el-button>
            <!--修改采购明细-->
            <el-table :data="chgPurchaseVal.purchase_details"  fit highlight-current-row type="index" :height="300">
                <!--:row-class-name="specRowClassName"-->
                <!-- <el-table-column v-for="(item,index) in purchaseDtlHead" :label="item.label" align="center" :width="item.width" :key="index">
                     <template slot-scope="scope">
                         <span v-if="item.type=='color'">
                                  <span class="tableColor" :style="{backgroundColor:scope.row.color}"></span>
                          {{scope.row[item.prop]}}
                             </span>
                         <span v-else-if="item.type=='select_stu'">
                                 <i class='showStatus' :class="{'statusActive':scope.row.status==0?false:true}"></i>
                                  {{scope.row[item.prop]==0?'停用':'启用'}}
                             </span>
                         <span v-else-if="item.type=='select_def'">
                                  {{scope.row[item.prop]==0?'否':'是'}}
                             </span>
                         <span v-else-if="item.type=='select'">
                             <span v-if="scope.row[item.prop]==''">
                                 {{}}
                             </span>
                             <span v-else-if="typeof scope.row[item.prop] =='Object'">

                                  {{scope.row[item.prop][item.inProp]}}
                             </span>
                             <span v-else>
                                    <span v-for="(list,index) in sonArr[item.stateVal]" :key="index">
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
                             <span v-if="item.inProp">
                                      {{scope.row[item.prop][item.inProp]}}
                                 </span>
                                 <span v-else>
                                      {{scope.row[item.prop]}}
                                 </span>
                         </span>
                     </template>
                 </el-table-column>-->
                <el-table-column v-for="each in purchaseDtlEditHead" :label="each.label" align="center" :width="each.width" :key="each.inProp">
                    <template slot-scope="scope">
                        <span v-if="purDtlIndex =='index'+scope.$index">
                            <span v-if="each.type=='number'">
                                <el-input size="small" type="number" v-model="scope.row[each.inProp]" :placeholder="each.holder" @change="handleEdit"></el-input>
                            </span>
                            <span v-else-if="each.type == 'textarea'">
                                      <el-input type="textarea" size="small" v-model="scope.row[each.inProp]" :placeholder="each.holder" @change="handleEdit"></el-input>
                                </span>
                            <span v-else-if="each.type == 'select'">
                                    <el-select v-model="scope.row[each.inProp]" :placeholder="each.holder">
                                       <span v-for="list in suppliers" :key="list.id">
                                            <el-option :label="list.name" :value="list.id"></el-option>
                                       </span>
                                   </el-select>
                                </span>
                            <span v-else-if="each.type == 'datepicker'">
                                   <el-date-picker
                                           v-model="scope.row[each.inProp]"
                                           type="date"
                                           placeholder="选择日期"  @change="dateChangebirthday" format="yyyy/MM/dd" value-format="yyyy/MM/dd">
                            </el-date-picker>
                                </span>
                            <span v-else>
                                   <el-input size="small" v-model="scope.row[each.inProp]" :placeholder="each.holder" @change="handleEdit"></el-input>
                                </span>
                        </span>
                        <span v-else>
                            <span v-if="each.type=='select'">
                                <span v-for="list in suppliers" :key="list.id">
                                           <span v-if="each.inProp">
                                              <span v-if="list.id==scope.row[each.inProp]">
                                              {{list.name}}
                                              </span>
                                           </span>
                            </span>
                        </span>
                            <span v-else>
                                 {{scope.row[each.inProp]}}
                             </span>
                        </span>
                    </template>
                </el-table-column>
                <el-table-column label="状态" width="100">
                    <template slot-scope="scope">
                        {{"新建"}}
                    </template>
                </el-table-column>
                <el-table-column label="操作" width="150" align="center" fixed="right">
                    <template slot-scope="scope">
                        <span v-if="purDtlIndex=='index'+scope.$index">
                            <el-button size="mini" @click="savePurChg(scope.row,scope.$index)">保存</el-button>
                            <el-button size="mini" @click="purDtlCancel">取消
                            </el-button>
                        </span>
                        <span v-else>
                                 <el-button size="mini" @click="editPurChg(scope.row,scope.$index)">编辑</el-button>
                            <el-button size="mini" type="danger" @click="delPurChg(scope.row,scope.$index)">删除</el-button>
                        </span>
                    </template>
                </el-table-column>
            </el-table>

            <!--底部操作按钮-->
            <div slot="footer" class="dialog-footer clearfix">
                <div style="float: left">
                    <el-button type="primary" @click="addChgPurDtl">增加明细</el-button>
                </div>
                <div style="float: right">
                    <el-button type="primary" @click="confirmEditPur(editId)">确定</el-button>
                    <el-button @click="cancelEdit">取消</el-button>
                </div>
            </div>
        </el-dialog>

        <!--商品明细-->
        <el-dialog title="商品明细" :visible.sync="addPurchaseDetailMask" :class="{'more-forms':moreForms,'threeParts':threeParts}">
            <el-button type="text">选择商品</el-button>
            <div class="searchBox">
                <span>
                    <label>商品编码</label>
                    <el-input v-model="searchPro.commodity_code" clearable placeholder="请输入商品编码" @keyup.enter.native="searchProClick"></el-input>
                </span>
                <span>
                    <label>规格编码</label>
                    <el-input v-model="searchPro.spec_code" clearable placeholder="请输入规格编码" @keyup.enter.native="searchProClick"></el-input>
                </span>
                <span>
                     <label>店铺名称</label>
                   <el-select v-model="searchPro.shops_id" clearable placeholder="请选择店铺名称" @keyup.enter.native="searchProClick">
                       <el-option v-for="item in resData.shops" :key="item.value" :label="item.nick" :value="item.id"></el-option>
                   </el-select>
                </span>
                <el-button type="primary" @click="searchProClick">查询</el-button>
            </div>
            <el-table :data="proDtlData" highlight-current-row type="index" height="160" :row-class-name="rowSpecIndex" @row-click="togglePro">
                <light-table :tableHead="proHead" :onlyTableColumn="true" :hasSelect="true"></light-table>
            </el-table>
            <el-button type="text">规格</el-button>
                <el-table :data="specData"  fit highlight-current-row type="index" height="230" :row-class-name="specRowClassName" @row-click="specRowClick">
                <!--不可编辑-->
                <el-table-column v-for="(item,index) in specHead" :label="item.label" align="center" :width="item.width" :key="index">
                    <template slot-scope="scope">
                        <span v-if="item.type=='color'">
                                 <span class="tableColor" :style="{backgroundColor:scope.row.color}"></span>
                         {{scope.row[item.prop]}}
                            </span>
                        <span v-else-if="item.type=='select_stu'">
                                <i class='showStatus' :class="{'statusActive':scope.row.status==0?false:true}"></i>
                                 {{scope.row[item.prop]==0?'停用':'启用'}}
                            </span>
                        <span v-else-if="item.type=='select_def'">
                                 {{scope.row[item.prop]==0?'否':'是'}}
                            </span>
                        <span v-else-if="item.type=='select'">
                            <span v-if="scope.row[item.prop]==''">
                                {{}}
                            </span>
                            <span v-else-if="typeof scope.row[item.prop] =='object' && scope.row[item.nameProp]">
                                 {{scope.row[item.prop][item.nameProp]}}
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
                        <span v-else-if="item.type=='checkbox'">
                             <el-checkbox :checked="scope.row[item.prop][item.inProp]== 1?true:false" disabled>{{scope.row[item.prop][item.inProp]}}</el-checkbox>
                           <!-- <span v-if="item.inProp">
                                <span v-if="scope.row[item.prop][item.inProp]==1">
                                    <el-checkbox :checked="true" disabled></el-checkbox>
                                </span>
                                <span v-else>
                                    <el-checkbox :checked="false" disabled></el-checkbox>
                                </span>
                             </span>
                            <span v-else>
                                 <span v-if="scope.row[item.prop]==1">
                                     <el-checkbox :checked="true" disabled></el-checkbox>
                                 </span>
                                 <span v-else>
                                     <el-checkbox :checked="false" disabled></el-checkbox>
                                 </span>
                             </span>-->
                         </span>
                        <span v-else>
                            <span v-if="item.inProp">
                                     {{scope.row[item.prop][item.inProp]}}
                                </span>
                                <span v-else>
                                     {{scope.row[item.prop]}}
                                </span>
                        </span>
                    </template>
                </el-table-column>
                <!--可编辑-->
                <el-table-column v-for="each in specHeadEdit" :label="each.label" align="center" :width="each.width" :key="each.inProp">
                    <template slot-scope="scope">
                        <span v-if="specIndex =='index'+scope.$index">
                            <span v-if="each.type=='number'">
                                <el-input size="small" type="number" v-model="specDtlInfo[scope.$index][each.prop]" :placeholder="each.holder" @change="handleEdit"></el-input>
                            </span>
                            <span v-else-if="each.type == 'textarea'">
                                      <el-input type="textarea" size="small" v-model="specDtlInfo[scope.$index][each.prop]" :placeholder="each.holder" @change="handleEdit"></el-input>
                                </span>
                            <span v-else-if="each.type == 'select'">
                                    <el-select v-model="specDtlInfo[scope.$index][each.prop]" :placeholder="each.holder">
                                       <span v-for="list in resData[each.stateVal]" :key="list.id">
                                            <el-option :label="list.name?list.name:list.title" :value="list.id"></el-option>
                                       </span>
                                   </el-select>
                                </span>
                            <span v-else-if="each.type == 'datepicker'">
                                   <el-date-picker
                                           v-model="specDtlInfo[scope.$index][each.prop]"
                                           type="date"
                                           placeholder="选择日期"  @change="dateChangebirthday" format="yyyy/MM/dd" value-format="yyyy/MM/dd">
                            </el-date-picker>
                                </span>
                            <span v-else>
                                   <el-input size="small" v-model="specDtlInfo[each.inProp]" :placeholder="each.holder" @change="handleEdit"></el-input>
                                </span>
                            <!-- <span v-if="each.type=='number'">
                                <el-input size="small" type="number" v-model="scope.row[each.prop][each.inProp]" :placeholder="each.holder" @change="handleEdit"></el-input>
                            </span>
                            <span v-else-if="each.type == 'textarea'">
                                      <el-input type="textarea" size="small" v-model="scope.row[each.prop][each.inProp]" :placeholder="each.holder" @change="handleEdit"></el-input>
                                </span>
                            <span v-else-if="each.type == 'select'">
                                    <el-select v-model="scope.row[each.prop][each.inProp]" :placeholder="each.holder">
                                       <span v-for="list in resData[each.stateVal]" :key="list.id">
                                            <el-option :label="list.name?list.name:list.title" :value="list.id"></el-option>
                                       </span>
                                   </el-select>
                                </span>
                            <span v-else-if="each.type == 'datepicker'">
                                   <el-date-picker
                                           v-model="scope.row[each.prop][each.inProp]"
                                           type="date"
                                           placeholder="选择日期"  @change="dateChangebirthday" format="yyyy/MM/dd" value-format="yyyy/MM/dd">
                            </el-date-picker>
                                </span>
                            <span v-else>
                                   <el-input size="small" v-model="specDtlInfo[each.inProp]" :placeholder="each.holder" @change="handleEdit"></el-input>
                                </span>-->
                        </span>
                        <span v-else>
                            <!--如果需要读取返回的数据并可以修改-->
                           <!-- <span v-if="each.readBefore">
                                 {{scope.row[each.prop][each.inProp]}}
                               &lt;!&ndash; <span v-if="each.type=='select'">
                                     <span v-for="list in resData[each.stateVal]" :key="list.id">
                                           <span v-if="each.inProp">
                                              <span v-if="list.id==specDtlInfo[each.inProp]">
                                              {{list.name}}
                                              </span>
                                           </span>
                            </span>
                        </span>&ndash;&gt;
                                &lt;!&ndash;<span v-else>&ndash;&gt;
                                   &lt;!&ndash; <span v-if="item.inProp">
                                        {{scope.row[item.prop][item.inProp]}}
                                    </span>
                                    <span v-else>
                                        {{scope.row[item.prop]}}
                                    </span>&ndash;&gt;
                             &lt;!&ndash;</span>&ndash;&gt;
                            </span>
                            <span v-else>
                                <span v-if="each.type=='select'">
                                <span v-for="list in resData[each.stateVal]" :key="list.id">
                                           <span v-if="each.inProp">
                                              <span v-if="list.id==specDtlInfo[each.inProp]">
                                              {{list.name}}
                                              </span>
                                           </span>
                            </span>
                        </span>
                                <span v-else>
                                 {{specDtlInfo[each.inProp]}}
                             </span>
                            </span>-->
                        </span>
                    </template>
                </el-table-column>
            </el-table>
            <el-button type="text">组合商品信息</el-button>
                <el-table :data="combData" fit highlight-current-row height="160"
                      :row-class-name="sonSpecRowClassName" @row-click="sonSpecRowClick">
                <el-table-column v-for="(item,index) in combProHead" :label="item.label" align="center" :width="item.width" :key="index">
                    <template slot-scope="scope">
                        <span v-if="item.type=='select'">
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
                        </span>
                    </template>
                </el-table-column>
                <el-table-column v-for="each in combProEditHead" :label="each.label" align="center" :width="each.width" :key="each.inProp">
                    <template slot-scope="scope">
                        <span v-if="combEdit =='index'+scope.$index">
                            <span v-if="each.type=='number'">
                                <el-input size="small" type="number" v-model="specDtlInfo[each.inProp]" :placeholder="each.holder" @change="handleEdit"></el-input>
                            </span>
                            <span v-else-if="each.type == 'textarea'">
                                      <el-input type="textarea" size="small" v-model="specDtlInfo[each.inProp]" :placeholder="each.holder" @change="handleEdit"></el-input>
                                </span>
                            <span v-else-if="each.type == 'select'">
                                    <el-select v-model="specDtlInfo[each.inProp]" :placeholder="each.holder">
                                       <span v-for="list in resData[each.stateVal]" :key="list.id">
                                            <el-option :label="list.name" :value="list.id"></el-option>
                                       </span>
                                   </el-select>
                                </span>
                            <span v-else-if="each.type == 'datepicker'">
                                   <el-date-picker
                                           v-model="specDtlInfo[each.inProp]"
                                           type="date"
                                           placeholder="选择日期"  @change="dateChangebirthday" format="yyyy/MM/dd" value-format="yyyy/MM/dd">
                            </el-date-picker>
                                </span>
                            <span v-else>
                                   <el-input size="small" v-model="specDtlInfo[each.inProp]" :placeholder="each.holder" @change="handleEdit"></el-input>
                                </span>
                        </span>
                        <span v-else>
                            <span v-if="each.type=='select'">
                                <span v-for="list in resData[each.stateVal]" :key="list.id">
                                           <span v-if="each.inProp">
                                              <span v-if="list.id==specDtlInfo[each.inProp]">
                                              {{list.name}}
                                              </span>
                                           </span>
                            </span>
                        </span>
                            <span v-else>
                                 {{combEditVal[each.inProp]}}
                             </span>
                        </span>
                    </template>
                </el-table-column>
            </el-table>
            <div slot="footer" class="dialog-footer clearfix">
                <div style="float: right">
                    <el-button type="primary" @click="confirmAddPDetail">确定</el-button>
                    <el-button @click="cancelAddPDetail">取消</el-button>
                </div>
            </div>
        </el-dialog>

        <!--删除采购单-->
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
    </div>
</template>
<script>
  import { mapGetters } from 'vuex'
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
            ent: this.editPur,
            nClick: false
          },
          {
            cnt: '删除',
            icon: 'bf-del',
            ent: this.delMore,
            nClick: false
          },
          {
            cnt: '提交',
            icon: 'bf-submit',
            ent: this.test,
            nClick: false
          },
          {
            cnt: '审核',
            icon: 'bf-audit',
            ent: this.test
          },
          {
            cnt: '退审',
            icon: 'bf-auditfaild',
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
            cnt: '订单采购',
            icon: 'bf-purchase',
            ent: this.test
          },
          {
            cnt: '生产排单',
            icon: 'bf-machie',
            ent: this.test
          },
          {
            cnt: '打印',
            icon: 'bf-printer',
            ent: this.test
          },
          {
            cnt: '刷新',
            icon: 'bf-refresh',
            ent: this.refresh
          }
        ],
        filterBox: false,
        searchBox: {
          vip_name: '',
          order_num: '',
          order_man: '',
          order_phone: '',
          order_money: '',
          order_address: '',
          order_goods: '',
          order_staff: '',
          order_promiseDate: '',
          order_workDate: '',
          order_transMStart: '',
          order_transMEnd: '',
          orderCompany: [
            {label: 'ceshi', value: 0}
          ],
          order_customerInves: '',
          order_mark: '',
          order_flag: '',
          ordertbFlag: [
            {label: 'ceshi', value: 0}
          ],
          order_lock: '',
          orderLock: [
            {label: 'ceshi', value: 0}
          ],
          order_company: '',
          order_shop: '',
          orderShops: [
            {label: 'ceshi', value: 0}
          ],
        },
        topActiveName:'0',
        currentIndex:'',
        tableHead:[
          {
            label: '采购单编号',
            width: '200',
            prop: 'purchase_order_no',
            type: 'text',
          },
          {
            label: '状态',
            width: '120',
            prop: 'purchase_status',
            type: 'text',
          },
          {
            label: '订单编号',
            width: '180',
            prop: 'order_no',
            type: 'text',
          },
          {
            label: '创建人',
            width: '120',
            prop: 'user_id',
            type: 'text',
          },
          {
            label: '创建日期',
            width: '180',
            prop: 'created_at',
            type: 'text',
          },
          {
            label: '打印时间',
            width: '180',
            prop: '',
            type: 'text',
          },
          /* {
            label: '审核时间',
            width: '120',
            prop: '',
            type: 'text',
          },*/
          {
            label: '承诺发货时间',
            width: '180',
            prop: 'promise_delivery_time',
            type: 'text',
          },
          {
            label: '客户名',
            width: '120',
            prop: 'client_name',
            type: 'text',
          },
          {
            label: '买家昵称',
            width: '120',
            prop: 'buyer_nick',
            type: 'text',
          },
          {
            label: '省市区',
            width: '150',
            prop: '',
            type: 'text',
          },
          /*{
           label: '采购收货人',
           width: '120',
           prop: '',
           type: 'text',
         },*/
          {
            label: '采购收货地址',
            width: '160',
            prop: 'order_address',
            type: 'text',
          },
          /* {
            label: '合同编号',
            width: '120',
            prop: '',
            type: 'text',
          },*/
          {
            label: '备注',
            width: '140',
            prop: 'remark',
            type: 'text',
          },
          {
            label: '采购单来源',
            width: '140',
            prop: 'source',
            type: 'text',
          },
          {
            label: '原订单业务员',
            width: '120',
            prop: 'salesman',
            type: 'text',
          },
          {
            label: '提交',
            width: '120',
            prop: 'is_submit',
            type: 'select_def',
          },
          {
            label: '打印',
            width: '120',
            prop: 'is_print',
            type: 'select_def',
          },
          {
            label: '审核',
            width: '120',
            prop: 'is_check',
            type: 'select_def',
          },
          {
            label: '修改',
            width: '120',
            prop: 'is_change',
            type: 'select_def',
          },
          /* {
            label: '已排单',
            width: '120',
            prop: '',
            type: 'text',
          },*/
          /* {
            label: '排单时间',
            width: '120',
            prop: '',
            type: 'text',
          },*/
          /*{
           label: '仓库',
           width: '120',
           prop: 'warehouse_id',
           type: 'text',
         }*/
        ],
        nEditInRow:[true,true,true],
        btmActiveName:'0',
        purchasesUrl:'/purchases',
        getsInfo:[],
        newData:[],
        partData:[],
        finishData:[],
        newLoading: true,
        partLoading: true,
        finishLoading: true,
        delArr:[],
        editId:'',
        multipleSelection:[],
        addNewPurchase: false,
        newPurchaseVal:{
          receiver:'',
          receiver_address:'',
          warehouse_id:'',
          remark:'',
          purchase_details:[]
        },
        newPurchaseRules:{
          receiver: [
            {required: true, message: '收货人必填', trigger: 'blur'},
          ],
          receiver_address: [
            {required: true, message: '收货地址必填', trigger: 'blur'},
          ],
          warehouse_id: [
            {required: true, message: '仓库必选', trigger: 'blur'},
          ]
        },
        purchaseHead:[
          {
            label: '采购单号',
            prop: 'purchase_order_no',
            holder: '系统自动生成',
            type: 'text',
            addChgAble: true
          },
          {
            label: '采购状态',
            prop: 'purchase_status',
            holder: '新建',
            type: 'select',
            addChgAble: true
          },
          {
            label: '收货人',
            prop: 'receiver',
            holder: '请输入收货人',
            type: 'text',
          },
          {
            label: '收货地址',
            prop: 'receiver_address',
            holder: '请输入收货地址',
            type: 'text',
          },
          {
            label: '采购备注',
            prop: 'remark',
            holder: '请输入采购备注',
            type: 'textarea',
          },
        /*  {
            label: '仓库',
            prop: 'warehouse_id',
            holder: '请选择仓库',
            type: 'select',
            val:'warehouses',
            stateVal:'wareHouse'
          }*/
        ],
        moreForms: true,
        threeParts: true,
        purchaseDetailVal:[],
        /*采购明细*/
        purchaseDtlHead:[
          {
            label: '规格图片',
            width: '120',
            // prop: 'specInfo',
            prop: "img_url",
            type: 'text',
          },
         /* {
            label: '商品编码',
            width: '120',
            prop: "goods",
            inProp:'commodity_code',
            type: 'text',
          },
          {
            label: '商品简称',
            width: '120',
            prop: "goods",
            inProp:'short_name',
            type: 'text',
          },*/
          {
            label: '规格编码',
            width: '120',
            // prop: 'specInfo',
            prop: "spec_code",
            type: 'text',
          },
          {
            label: '规格名称',
            width: '120',
            prop: 'specInfo',
            inProp: "spec",
            type: 'text',
          },
          {
            label: '库存数',
            width: '120',
            prop: '',
            inProp: "",
            type: 'text'
          },
          {
            label: '订单数',
            width: '120',
            prop: '',
            inProp: "",
            type: 'text'
          },
          {
            label: '在途数',
            width: '120',
            prop: '',
            inProp: "",
            type: 'text'
          },
          {
            label: '在途数(提交)',
            width: '120',
            prop: '',
            inProp: "",
            type: 'text'
          },
          {
            label: '可用数',
            width: '120',
            prop: '',
            inProp: "",
            type: 'text'
          },
          {
            label: '已入库数',
            width: '120',
            prop: '',
            inProp: "",
            type: 'text'
          },
          {
            label: '需采购数',
            width: '120',
            prop: '',
            inProp: "",
            type: 'text',
          },
        ],
        purchaseDtlEditHead:[
          {
            label: '采购数',
            width: '120',
            prop: 'addInfo',
            inProp: "purchase_quantity",
            holder: '请输入采购数',
            type: 'number',
          },
          {
            label: '采购店铺',
            width: '120',
            prop: 'addInfo',
            inProp: "shops_id",
            holder: '请输入采购店铺',
            type: 'text',
          },
          {
            label: '供应商',
            width: '120',
            prop: 'addInfo',
            inProp: "suppliers_id",
            holder: '请选择供应商',
            type: 'select',
          },
          {
            label: '采购成本',
            width: '120',
            prop: 'addInfo',
            inProp: "purchase_cost",
            holder: '请输入采购成本',
            type: 'number',
          },
          {
            label: '仓库成本',
            width: '120',
            prop: 'addInfo',
            inProp: "warehouse_cost",
            holder: '请输入仓库成本',
            type: 'number',
          },
          {
            label: '佣金点',
            width: '120',
            prop: 'addInfo',
            inProp: "commission",
            holder: '请输入佣金点',
            type: 'number',
          },
          /* {
             label: '采购总成本',
             width: '120',
             prop: 'addInfo',
             inProp: "",
             holder: '请输入规格编号',
             type: 'text',
           },*/
          {
            label: '采购运费',
            width: '120',
            prop: 'addInfo',
            inProp: "purchase_freight",
            holder: '请输入采购运费',
            type: 'number',
          },
          {
            label: '折扣',
            width: '120',
            prop: 'addInfo',
            inProp: "discount",
            holder: '请输入折扣',
            type: 'number',
          },
          {
            label: '色号',
            width: '120',
            prop: 'addInfo',
            inProp: "colour_num",
            holder: '请输入色号',
            type: 'text',
          },
          {
            label: '油漆',
            width: '120',
            prop: 'addInfo',
            inProp: "paint",
            holder: '请输入油漆',
            type: 'text',
          },
          {
            label: '木架费',
            width: '120',
            prop: 'addInfo',
            inProp: "wooden_frame_costs",
            holder: '请输入木架费',
            type: 'number',
          },
          {
            label: '到货时间',
            width: '120',
            prop: 'addInfo',
            inProp: "arrival_time",
            holder: '请输入到货时间',
            type: 'datepicker',
          },
          {
            label: '备注',
            width: '120',
            prop: 'addInfo',
            inProp: "remark",
            holder: '请输入备注',
            type: 'textarea',
          }
        ],
        addPurchaseDetailMask: false,
        proIndex:'',
        proDtlData:[],
        // proDtlSpec:[],
        proVal:[],
        proHead:[
          {
            label: '店铺',
            prop: "shop_nick",
            width: '130',
            type: 'text',
          },
          {
            label: '商品简称',
            prop: "short_name",
            width: '150',
            type: 'text',
          },
          {
            label: '商品编码',
            prop: "commodity_code",
            width: '160',
            type: 'text',
          },
          {
            label: '供应商',
            prop: 'supplier',
            inProp: 'name',
            width: '130',
            type: 'text'
          }
        ],
        specVal:[],
        specHead:[
          {
            label: '组合商品',
            width: '90',
            prop: "is_combination",
            type: 'checkbox',
          },
          {
            label: '规格图片',
            width: '120',
            prop: "img_url",
            type: 'text',
          },
          {
            label: '规格编码',
            width: '120',
            prop: "spec_code",
            type: 'text',
          },
          {
            label: '规格名称',
            width: '120',
            prop: "spec",
            type: 'text',
          },
          {
            label: '库存预警数',
            width: '120',
            prop: "inventory_warning",
            type: 'text'
          },
          {
            label: '采购运费',
            width: '120',
            prop: 'purchase_freight',
            type: 'text'
          },
          {
            label: '仓库成本',
            width: '120',
            prop: "warehouse_cost",
            type: 'number'
          },
          {
            label: '佣金点',
            width: '120',
            prop: "commission",
            type: 'number'
          },
          {
            label: '折扣',
            width: '120',
            prop: "discount",
            type: 'number'
          },
          {
            label: '木架费',
            width: '120',
            prop: "wooden_frame_costs",
            type: 'number'
          }
        ],
        goodsUrl:'/goods',
        specUrl: '/productspecs',
        warehouseUrl:'/stocks',
        specDtlInfo:[],
      /*  specDtlInfo:{
          purchase_quantity: '',
          shops_id: '',
          suppliers_id:'',
          arrival_time:'',
          remark:''
        },*/
        specDtlArr:[],
        specInfoArr:[],
        /*手动输入值*/
        specHeadEdit:[
          {
            label: '采购数',
            width: '120',
            // prop: 'specDtlInfo',
            prop: "purchase_quantity",
            holder: '请输入采购数',
            type: 'number'
          },
          {
            label: '采购店铺',
            width: '120',
            // prop: 'specDtlInfo',
            prop: "shops_id",
            holder: '请输入采购店铺',
            stateVal: 'shops',
            type: 'select'
          },
          {
            label: '供应商',
            width: '120',
            // prop: 'specDtlInfo',
            prop: "suppliers_id",
            holder: '请选择供应商',
            stateVal:'suppliers',
            type: 'select'
          },
          {
            label: '到货时间',
            width: '155',
            // prop: 'specDtlInfo',
            prop: "arrival_time",
            holder: '请输入到货时间',
            type: 'datepicker'
          },
          {
            label: '备注',
            width: '120',
            prop: 'specDtlInfo',
            inProp: "remark",
            holder: '请输入备注',
            type: 'textarea'
          }
        ],
        specIndex:'',
        patchData:[],
        idArr:[],
        purDtlIndex:[],
        showDel: false,
        delDtlIndex:'',
        chgPurchase:false,
        chgPurchaseVal:{},
        purchaseChgVal:{},
        purDetailsUlr:'/purchasedetails',
        currentRowSpec:{},
        wareHousesId:'',
        combProVal:[],
        combProHead:[
          {
            label: '规格图片',
            width: '160',
            prop: 'com_pro_spec',
            inProp: "img_url",
            type: 'text'
          },
          {
            label: '规格编码',
            width: '160',
            prop: 'com_pro_spec',
            inProp: "spec_code",
            type: 'text'
          },
          {
            label: '规格名称',
            width: '250',
            prop: "com_pro_spec",
            inProp: 'spec',
            type: 'text'
          },
          {
            label: '采购成本',
            width: '120',
            prop: 'com_pro_spec',
            inProp: "purchase_cost",
            type: 'number'
          },
          {
            label: '仓库成本',
            width: '120',
            prop: 'com_pro_spec',
            inProp: "warehouse_cost",
            type: 'number'
          },
          {
            label: '佣金点',
            width: '120',
            prop: 'com_pro_spec',
            inProp: "commission",
            type: 'number'
          },
          {
            label: '折扣',
            width: '120',
            prop: 'com_pro_spec',
            inProp: "discount",
            type: 'number'
          },
          {
            label: '木架费',
            width: '120',
            prop: 'com_pro_spec',
            inProp: "wooden_frame_costs",
            type: 'number'
          }
        ],
        combEdit:'',
        combEditVal:{},
        combProEditHead:[
          {
            label: '采购数',
            width: '120',
            prop: 'combEditVal',
            inProp: "purchase_quantity",
            holder: '请输入采购数',
            type: 'number'
          },
          {
            label: '采购店铺',
            width: '120',
            prop: 'combEditVal',
            inProp: "shops_id",
            holder: '请输入采购店铺',
            type: 'select',
            stateVal: 'shops'
          },
          {
            label: '供应商',
            width: '120',
            prop: 'combEditVal',
            inProp: "suppliers_id",
            holder: '请选择供应商',
            type: 'select',
            stateVal:'suppliers'
          },
          {
            label: '到货时间',
            width: '120',
            prop: 'combEditVal',
            inProp: "arrival_time",
            holder: '请输入到货时间',
            type: 'datepicker'
          },
          {
            label: '备注',
            width: '120',
            prop: 'combEditVal',
            inProp: "remark",
            holder: '请输入备注',
            type: 'textarea'
          }
        ],
        /*商品明细*/
        searchPro:{
          commodity_code:'',
          spec_code: '',
          shops_id:''
        },
        // specRowIndex: 0,
        specData:[],
        combData:[],
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
    methods:{
      test(){
        console.log(1);
      },
      /*查询*/
      check(){},
      toggleShow(){
        this.filterBox = !this.filterBox;
      },
      resets(){
        this.searchBox = {};
      },
      /*获取采购数据*/
      getData() {
        let index = this.topActiveName-0;
        switch(index){
          case 0:
            this.newOpt[1].nClick = false;
            this.newOpt[2].nClick = false;
            this.newOpt[3].nClick = false;
            this.$fetch(this.urls.purchases,{purchase_status:'new'})
              .then(res => {
                this.newLoading = false;
                this.newData = res.data;
                let pg = res.meta.pagination;
                this.$store.dispatch('currentPage', pg.current_page);
                this.$store.commit('PER_PAGE', pg.per_page);
                this.$store.commit('PAGE_TOTAL', pg.total);
                this.$store.dispatch('warehouses','/warehouses');
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
            this.newOpt[1].nClick = true;
            this.newOpt[2].nClick = true;
            this.newOpt[3].nClick = false;
            this.$fetch(this.purchasesUrl,{purchase_status:'section'})
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
            this.newOpt[1].nClick = true;
            this.newOpt[2].nClick = true;
            this.newOpt[3].nClick = true;
            this.$fetch(this.purchasesUrl,{purchase_status:'finish'})
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
        /* this.$fetch(this.purchasesUrl)
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
           })*/
      },
      /*顶部tabs切换*/
      clickTopTabs(){
        this.getData();
      },
      /*新建采购单*/
      addNew(){
        this.addNewPurchase = true;
        /*新增时数据更新*/
        this.newPurchaseVal = {
          receiver:'',
          receiver_address:'',
          warehouse_id:'',
          remark:'',
          purchase_details:[]
        };
        this.purchaseDetailVal=[];
      },
      /*新建时增加明细*/
      addPurchaseDetail(){
        /*初始化*/
        // this.proDtlSpec = [];
        this.specDtlArr= [];
        this.wareHousesId ='';
        this.specIndex = '';
        this.addPurchaseDetailMask = true;
        this.$store.dispatch('suppliers','/suppliers');
        this.$store.dispatch('warehouses','/warehouses');
        this.$store.dispatch('shops','/shops');
      },
      rowSpecIndex({row,rowIndex}){
        row.index = rowIndex;
      },
     /*商品行点击*/
      togglePro(row){
        this.specData = row.productspecs;
        this.combData = row.productspecs[0].combinations;
       /* let specDtlInfo = {
          purchase_quantity: '',
          shops_id: '',
          suppliers_id:'',
          arrival_time:'',
          remark:''
        }*/

        /*输入采购信息初始化*/
        // this.specDtlArr[row.index] = specDtlInfo;

      },
      specRowClassName({row, rowIndex}){
        row.index = rowIndex;
      },
      /*规格行点击*/
      specRowClick(row){
        this.combData = row.combinations;
        this.specIndex = 'index'+row.index;
        /*
        * 规格只能编辑不能删除及其他
        * 子规格的采购数、采购店铺、供应商、仓库成本、佣金点、折扣、色号、油漆、木架费、到货时间与父规格保持一致
        * */
        this.currentRowSpec = row;
        /*直接拼接当前行*/
        // this.currentRowSpec.pur_inputs=this.specDtlInfo;
        // console.log(this.currentRowSpec);
        /*切换时
        如果没有组合，就不提示
        如果是组合数据，提示是否保存当前数据，如果保存就保存数据，否则显示原数据不保存*/
       /* switch(row.pro_specs.is_combination){
          /!*不管是否组合，序号唯一
          * 根据序号替换*!/
          case 0:
            /!*没有组合
            * 数组替换*!/
            break;
          case 1:
            /!*组合
            * 编辑完成之后点击当前行，不提示
            * 只要有数据变化，点击其他行，提示是否保存数据
            * 如果保存就保存数据，否则还原数据，新添加的清空*!/
            /!**!/
            this.$confirm('此操作将永久删除该文件, 是否继续?', '提示', {
              confirmButtonText: '确定',
              cancelButtonText: '取消',
              type: 'warning'
            }).then(() => {
              /!*数据去重存入新数组*!/
              // Object.assign(this.$data.currentRowSpec[row.index],row);
              // Object.assign(this.$data.currentRowSpec[row.index].pur_inputs,this.specDtlInfo);
              this.$message({
                type: 'success',
                message: '删除成功!'
              });
            }).catch(() => {
              /!*恢复原数据*!/
              Object.assign(this.$data.specDtlInfo, this.$options.data().specDtlInfo);
             /!* this.specDtlInfo ={
                purchase_quantity: '',
                shops_id: '',
                suppliers_id:'',
                arrival_time:'',
                remark:''
              }*!/
              this.$message({
                type: 'info',
                message: '已取消删除'
              });
            });
        }*/
      },
      sonSpecRowClassName({row,rowIndex}){
        row.index = rowIndex;
      },
      sonSpecRowClick(row){
        /*子规格点击哪行处于编辑模式
        * 可编辑部分不会影响到父规格*/
      },
      /*确定增加明细*/
      confirmAddPDetail(){
        /*点击确定，不取消面板，把有数据传送给新增采购单页面*/
        // this.purchaseDetailVal = this.patchData;
        /*如果当前有两条数据*/
        // console.log(this.specDtlInfo);
        /*清空所有 提示添加成功*/
        /*  this.$message({
            message:'添加成功',
            type: 'success'
          });*/
       /* for(let list in this.specDtlInfo){
          if(list=='purchase_quantity' && this.specDtlInfo['purchase_quantity']==''){
            this.$message({
              message: '采购数不能为空',
              type: 'info'
            })
            return
          }else if(this.specDtlInfo[list]==''){
            this.$message({
              message: '数据不完整',
              type: 'info'
            })
          }
        }
        this.currentRowSpec['purInfo']=this.specDtlInfo;*/
        this.newPurchaseVal = this.currentRowSpec;
        console.log(this.currentRowSpec);
      },
      /*取消添加商品明细*/

      /*根据id获取商品明细数据*/
    /*  getProInfo(){
        this.$fetch(this.warehouseUrl,
          {warehouse_id:this.wareHousesId})
            .then(res=>{
              this.proDtlData = res.data;
              this.proDtlSpec.push(res.data[0]);
            },err=>{});
        },*/
      handleEdit(){},
      edit(){},
      editSave(){},
      editCancel(){},
      /*底部tabs切换*/
      clickBtmTabs(){},
      /*删除单条*/
      del(row,e){
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
        this.$del(this.purchasesUrl + '/' + id)
          .then(() => {
            this.$message({
              message: '删除成功',
              type: 'success'
            });
            this.showDel = false;
            /*执行对应页面的刷新并停留在对应tab页面*/
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
      /*刷新*/
      refresh() {
        /*要分情况
        * 在新建页面刷新，仍停留在新建
        * 在部分完成，仍停留在部分完成
        * 在已完成，仍停留在已完成
        * 执行对应页面的刷新,并停留在对应页面*/
        this.stockLoading = true;
        this.getData();
      },
      /*批量删除 只针对新建模块*/
      delMore() {
        if(this.newOpt[2].nClick){
          return
        }else{
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
              this.$del(this.purchasesUrl, {ids: this.delArr})
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
      /*新增数据 只针对新建模块*/

      /*确定添加采购单*/
      confirmAddPur(){
        /*提交数据，发送请求*/
        /*遍历purchaseDetailVal，每一条数据都push进去*/
        this.purchaseDetailVal.map(item=>{
          let obj = {
            product_specs_id: item.specInfo.id,
            purchase_quantity: item.addInfo.purchase_quantity,
            shops_id:item.addInfo.shops_id,
            suppliers_id:item.addInfo.suppliers_id,
            purchase_cost:item.addInfo.purchase_cost,
            warehouse_cost:item.addInfo.warehouse_cost,
            purchase_freight:item.addInfo.purchase_freight,
            commission:item.addInfo.commission,
            discount:item.addInfo.discount,
            colour_num:item.addInfo.colour_num,
            paint:item.addInfo.paint,
            wooden_frame_costs:item.addInfo.wooden_frame_costs,
            arrival_time:item.addInfo.arrival_time,
            remark:item.addInfo.remark,
          };
          this.newPurchaseVal.purchase_details.push(obj)
        });
        this.$post(this.purchasesUrl,this.newPurchaseVal)
          .then(()=>{
              this.$message({
                message: '新建采购单成功',
                type: 'success'
              });
              this.addNewPurchase = false;
              this.refresh();
            },
            err=>{
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
      cancelAdd(){
        this.addNewPurchase = false;
        this.$message({
          message: '取消新建采购单',
          type:'info'
        });
        this.newPurchaseVal = {
          receiver:'',
          receiver_address:'',
          warehouse_id:'',
          remark:'',
          purchase_details:[]
        };
      },
      /*增加明细*/
      cancelAddPDetail(){
        this.addPurchaseDetailMask = false;
        this.$message({
          message: '取消添加商品明细',
          type:'info'
        })
        this.purchaseDetailVal = []
      },
      /*点击编辑按钮*/
      editSpec(row){
        this.specIndex = 'index'+row.index;
      },
      specCancel(){
        this.specIndex = '';
      },
      /*保存编辑的商品明细*/
      specSave(row){
        console.log(row);
        /*点击保存，当前信息更新
        * 点击确定，才会把所有的
        * 点击哪行哪一行打开哪一行的编辑模式*/
        /*如果编辑过就需要进行添加
        * 规格id唯一，根据规格进行判断*/
        let index = row.index;
        let id = row.id;
        // this.specInfoArr[index]=this.specDtlInfo;
        this.specIndex = '';
        let  obj = {
          goods: this.proVal[0].goods,
          specInfo: row,
          addInfo:this.specInfoArr[index]
        };
        if(this.patchData.length ==0){
          this.patchData.push(obj);
          this.idArr.push(obj.specInfo.id);
        }else{
          this.patchData.map(item=>{
            /*遍历每一项，是否有id存在，存在的话，删除当前项，然后push,否则直接push*/
            if(this.idArr.indexOf(obj.specInfo.id>=0)){
              /*如果id存在,替换掉*/
              this.patchData.splice(this.idArr.indexOf(obj.specInfo.id),1);
              this.patchData.push(obj);
            }else{
              this.patchData.push(obj);
              this.idArr.push(obj.specInfo.id);
            }
          })
        }

      },

      /*商品明细行点击*/

      /*商品明细确定*/

      dateChangebirthday(val) {
        // this.specDtlInfo.arrival_time = val;
      },
      /*删除明细*/
      delPurDtl(row,e,index){
        this.$confirm('此操作将永久删除该数据, 是否继续?', '提示', {
          confirmButtonText: '确定',
          cancelButtonText: '取消',
          type: 'warning'
        }).then(() => {
          this.purchaseDetailVal.splice(index,1);
          this.$message({
            message: '删除成功',
            type: 'success'
          });
        }).catch(() => {
          this.$message({
            type: 'info',
            message: '已取消删除'
          });
        });
      },
      purDtlCancel(){
        this.purDtlIndex = ''
      },
      editPurDtl(row,index){
        this.purDtlIndex = 'index'+index;
        /*点击编辑也替换保存数据*/
        // this.purchaseDetailVal[index].addInfo = this.specDtlInfo;
      },
      purDtlSave(row,index){
        this.purDtlIndex = '';
        /*保存时替换保存数据*/
        // this.purchaseDetailVal[index].addInfo = this.specDtlInfo;
      },
      /*修改采购单*/
      editPur(){
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
            this.chgPurchase = true;
            this.$patch(this.purchasesUrl + '/' + this.editId).then(res => {
              this.chgPurchaseVal= {
                receiver:res.receiver,
                receiver_address: res.receiver_address,
                warehouse_id: res.warehouse_id,
                remark: res.remark,
                purchase_details: res.purchase_details
              };
              this.$store.dispatch('suppliers','/suppliers');
            }, err => {
              console.log(err);
            })
          }
        }
      },
      confirmEditPur(id){
        /*接收id 更新数据，发送请求*/
        /*确定时，如果没有明细数据，提示不能为空*/
        if(this.chgPurchaseVal.purchase_details.length == 0){
          this.$message({
            message:'明细数据不能为空',
            type: 'info'
          });
          return
        }else{
          this.$patch(this.purchasesUrl + '/' + id, this.chgPurchaseVal)
            .then(() => {
              console.log(this.chgPurchaseVal);
              this.$message({
                message: '修改成功',
                type: 'success'
              });
              this.chgPurchase =false;
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
        }
      },
      cancelEdit(){
        this.chgPurchase = false;
      },
      /*修改时增加明细*/
      addChgPurDtl(){
        this.proVal = [];
        this.specVal = [];
        /*初始化*/
        /*this.specDtlInfo={
          purchase_quantity: '',
          shops_id: '',
          suppliers_id:'',
          // purchase_cost:'',
          // purchase_freight:'',
          // warehouse_cost:'',
          // commission:'',
          // discount:'',
          // colour_num:'',
          // paint:'',
          // wooden_frame_costs:'',
          arrival_time:'',
          remark:''
        };*/
        this.addPurchaseDetailMask = true;
        /*获取到仓库id，然后发送请求仓库信息*/
        let id = this.chgPurchaseVal.warehouse_id;
        this.$fetch(this.warehouseUrl+'/'+id)
          .then(res=>{
            this.proVal.push(res);
            this.specVal.push(res.pro_specs);
          },err=>{});
      },
      editPurChg(row,index){
        this.purDtlIndex = 'index'+index;
      },
      delPurChg(row,index){
        /*前后端一起删除*/
        let _self = this;
        this.$confirm('此操作将永久删除该数据, 是否继续?', '提示', {
          confirmButtonText: '确定',
          cancelButtonText: '取消',
          type: 'warning'
        }).then(() => {
          _self.$delete(_self.purDetailsUlr+'/'+row.id).then(()=>{
            _self.$message({
              message: '删除成功',
              info:'success'
            });
            _self.chgPurchaseVal.purchase_details.splice(index,1);
          },err=>{});
        }).catch(() => {
          this.$message({
            type: 'info',
            message: '已取消删除'
          });
        });
      },
      savePurChg(){
        this.purDtlIndex = '';
      },
      /*查询商品明细*/
      searchProClick(){
        this.$fetch(this.urls.goods,this.searchPro)
          .then(res => {
            // console.log(res);
            this.proDtlData = res.data;
            this.specData = res.data[0].productspecs;
            this.combData = res.data[0].productspecs[0].combinations;
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
      },
    },
    mounted() {
      this.getData();
      this.$store.dispatch('setOpt', this.newOpt);
      const that = this;
      $(window).resize(() => {
        that.$store.dispatch('setOpt', that.newOpt);
      });
    }
  }
</script>
