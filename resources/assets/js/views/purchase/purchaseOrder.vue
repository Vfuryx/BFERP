<template>
    <div>
        <!--查询-->
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
                                            v-for="item in resData.suppliers"
                                            :key="item.value"
                                            :label="item.name"
                                            :value="item.id">
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

        <!--采购数据-->
        <el-tabs v-model="topActiveName" @tab-click="clickTopTabs" id="subOutputRank-print">
            <el-tab-pane label="新建" name="0">
                <el-table :data="newData" fit ref="newTable"
                          @selection-change="handleSelectionChange"
                          v-loading="newLoading"
                          height="300"
                          :row-class-name="purRCName"
                          :row-style="rowStyle"
                          @row-click="purRowClick"
                         >
                    <el-table-column
                            type="selection"
                            width="95" align="center"
                            :checked="checkboxInit">
                    </el-table-column>
                    <el-table-column v-for="item in tableHead" :label="item.label" align="center" :width="item.width" :key="item.prop">
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
                                <span v-if="scope.row[item.prop]">
                                    {{item.inProp?scope.row[item.prop][item.inProp]:scope.row[item.prop]}}
                                </span>
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
            <el-tab-pane label="部分完成" name="1">
                <el-table :data="partData" fit ref="partTable"
                          @selection-change="handleSelectionChange"
                          v-loading="partLoading"
                          height="300"
                          @row-click="purRowClick">
                    <el-table-column
                            type="selection"
                            width="95" align="center"
                            :checked="checkboxInit">
                    </el-table-column>
                    <el-table-column v-for="item in tableHead" :label="item.label" align="center" :width="item.width" :key="item.prop">
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
                    <el-table-column label="操作" width="90" align="center" fixed="right">
                        <template slot-scope="scope">
                            <el-button size="mini" type="danger" @click="delPur(scope.row,$event)">删除</el-button>
                        </template>
                    </el-table-column>
                </el-table>
            </el-tab-pane>
            <el-tab-pane label="已完成" name="2">
                <el-table :data="finishData" fit ref="finishTable"
                          @selection-change="handleSelectionChange"
                          v-loading="finishLoading"
                          height="300"
                          @row-click="purRowClick">
                    <el-table-column
                            type="selection"
                            width="95" align="center"
                            :checked="checkboxInit">
                    </el-table-column>
                    <el-table-column v-for="item in tableHead" :label="item.label" align="center" :width="item.width" :key="item.prop">
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
                    <el-table-column label="操作" width="90" align="center" fixed="right">
                        <template slot-scope="scope">
                            <el-button size="mini" type="danger" @click="delPur(scope.row,$event)">删除</el-button>
                        </template>
                    </el-table-column>
                </el-table>
            </el-tab-pane>
        </el-tabs>

        <!--页码-->
        <Pagination :page-url="this.urls.purchases"></Pagination>

        <!--底部tabs-->
        <div class="clearfix">
            <div style="float: left;">
                <el-tabs v-model="leftActiveName">
                    <el-tab-pane label="采购列表" name="0">
                        <el-table :data="purListVal" fit style="width:230px;margin-right: 30px;" @row-click="purListRowClick">
                            <el-table-column v-for="item in purListHead" :label="item.label" align="center" :key="item.prop">
                                <template slot-scope="scope">
                                    {{scope.row[item.prop][item.inProp]}}
                                </template>
                            </el-table-column>
                            <el-table-column label="操作" width="90" align="center">
                                <template slot-scope="scope">
                                    <el-button size="mini" type="danger" @click="purListDtl(scope.row,$event)">删除</el-button>
                                </template>
                            </el-table-column>
                        </el-table>
                    </el-tab-pane>
                </el-tabs>
            </div>
           <div style="overflow: hidden">
               <el-tabs v-model="rightActiveName" @tab-click="clickRightTabs">
                   <el-tab-pane label="采购明细" name="0">
                       <el-table :data="purDetailsVal" fit>
                           <el-table-column v-for="item in purDetailsHead" :label="item.label" align="center" :width="item.width" :key="item.label">
                               <template slot-scope="scope">
                                   <span v-if="item.prop">
                                       <span v-if="item.type=='select'">
                                           <span v-for="list in resData[item.stateVal]" :key="list.id">
                                               <span v-if="list.id==scope.row[item.prop]">
                                                   {{list.name?list.name:list.title}}
                                               </span>
                                           </span>
                                       </span>
                                       <span v-else-if="item.type == 'img'">
                                           <el-popover
                                                   placement="right"
                                                   trigger="hover"
                                                   popper-class="picture_detail">
                                                <img :src="scope.row[item.prop][item.inProp]">
                                               <img slot="reference" :src="scope.row[item.prop][item.inProp]">
                                           </el-popover>
                                       </span>
                                       <span v-else>
                                           {{item.inProp?scope.row[item.prop][item.inProp]:scope.row[item.prop]}}
                                       </span>
                                   </span>
                               </template>
                           </el-table-column>
                           <el-table-column label="操作" width="90" align="center" fixed="right">
                               <template slot-scope="scope">
                                   <el-button size="mini" type="danger" @click="purDetailsDtl(scope.row,$event)">删除</el-button>
                               </template>
                           </el-table-column>
                       </el-table>
                   </el-tab-pane>
                   <el-tab-pane label="唯一码" name="1">
                       唯一码
                   </el-tab-pane>
               </el-tabs>
           </div>
        </div>

        <!--新建采购单-->
        <el-dialog title="新建采购单" :visible.sync="addPurchaseMask" :class="{'more-forms':moreForms,'threeParts':threeParts}">
            <el-button type="text">基本信息</el-button>
            <add-new :rule-form="addPurchaseForm" :rules="addPurchaseRules" :add-arr="addPurchaseHead" :onlyInputs="true"></add-new>
            <div class="clearfix">
                <div style="float: left">
                    <el-button type="text">采购sku</el-button>
                    <el-table :data="addPurchaseSkuVal" fit style="width: 200px;margin-right: 50px;" height="300" @row-click="addPurSkuRowClick">
                        <el-table-column v-for="item in addPurchaseSkuHead" :label="item.label" align="center" :key="item.prop">
                            <template slot-scope="scope">
                                {{scope.row[item.prop]==''?'':scope.row[item.prop]}}
                            </template>
                        </el-table-column>
                        <el-table-column label="操作" width="90" align="center">
                            <template slot-scope="scope">
                                <el-button size="mini" type="danger" @click="addPurSkuDel(scope.$index)">删除</el-button>
                            </template>
                        </el-table-column>
                    </el-table>
                </div>
                <div style="overflow: hidden">
                    <el-button type="text">采购子件</el-button>
                    <el-table :data="addPurchaseCompVal" fit height="300"  :row-class-name="addCompCName" @row-click="addCompRowClick">
                        <el-table-column v-for="item in addPurchaseCompHead" :label="item.label" align="center" :width="item.width" :key="item.label">
                            <template slot-scope="scope">
                                <span v-if="item.prop=='proPurchaseData'">
                                    <span v-if="addPurchaseCompIndex == 'index'+scope.$index">
                                        <span v-if="item.type=='number'">
                                        <el-input size="small" type="number" v-model.trim="scope.row[item.prop][item.inProp]" :placeholder="item.holder"></el-input>
                                    </span>
                                        <span v-else-if="item.type == 'textarea'">
                                                  <el-input type="textarea" size="small" v-model.trim="scope.row[item.prop][item.inProp]" :placeholder="item.holder"></el-input>
                                            </span>
                                        <span v-else-if="item.type == 'select'">
                                                <el-select v-model="scope.row[item.prop][item.inProp]" :placeholder="item.holder">
                                                   <span v-for="list in resData[item.stateVal]" :key="list.id">
                                                        <el-option :label="list.name?list.name:list.title" :value="list.id"></el-option>
                                                   </span>
                                               </el-select>
                                            </span>
                                        <span v-else-if="item.type == 'datepicker'">
                                   <el-date-picker
                                           v-model="scope.row[item.prop][item.inProp]"  type="date" placeholder="选择日期"  format="yyyy/MM/dd" value-format="yyyy/MM/dd">
                            </el-date-picker>
                                </span>
                                    </span>
                                    <span v-else>
                                        <span v-if="item.type=='select'">
                                            <span v-for="list in resData[item.stateVal]" :key="list.id">
                                                <span v-if="list.id==scope.row[item.prop][item.inProp]">
                                                    {{list.name?list.name:list.title}}
                                                </span>
                                            </span>
                                        </span>
                                <span v-else>
                                    {{scope.row[item.prop][item.inProp]}}
                                </span>
                            </span>
                                </span>
                                <span v-else-if="item.prop">
                                    <span v-if="item.type=='checkbox'">
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
                             {{item.inProp?scope.row[item.prop][item.inProp]:scope.row[item.prop]}}
                        </span>
                                 </span>
                            </template>
                        </el-table-column>
                        <el-table-column label="状态" width="90">
                            <template slot-scope="scope">
                                {{"新建"}}
                            </template>
                        </el-table-column>
                        <el-table-column label="操作" width="90" align="center" fixed="right">
                            <template slot-scope="scope">
                                <el-button size="mini" type="danger" @click="addPurCompDtl(scope.$index)">删除</el-button>
                            </template>
                        </el-table-column>
                    </el-table>
                </div>
            </div>
            <div slot="footer" class="dialog-footer clearfix">
                <div style="float: left">
                    <el-button type="primary" @click="addPurchaseDetail">增加明细</el-button>
                </div>
                <div style="float: right">
                    <el-button type="primary" @click="confirmAddPur">确定</el-button>
                    <el-button @click="cancelAddPur">取消</el-button>
                </div>
            </div>
        </el-dialog>

        <!--商品明细-->
        <el-dialog title="商品明细" :visible.sync="proMask" :class="{'more-forms':moreForms,'threeParts':threeParts}">
            <el-button type="text">选择商品</el-button>
            <div class="searchBox">
                <span>
                    <label>商品编码</label>
                    <el-input v-model.trim="proQuery.commodity_code" clearable placeholder="请输入商品编码" @keyup.enter.native="proQueryClick"></el-input>
                </span>
                <span>
                    <label>子件编码</label>
                    <el-input v-model.trim="proQuery.component_code" clearable placeholder="请输入子件编码" @keyup.enter.native="proQueryClick"></el-input>
                </span>
                <span>
                     <label>店铺名称</label>
                   <el-select v-model="proQuery.shops_id" clearable placeholder="请选择店铺名称" @keyup.enter.native="proQueryClick">
                       <el-option v-for="item in resData.shops" :key="item.value" :label="item.nick" :value="item.id"></el-option>
                   </el-select>
                </span>
                <el-button type="primary" @click="proQueryClick">查询</el-button>
            </div>
            <el-table :data="proDtlVal" highlight-current-row type="index" height="160" :row-class-name="proRowCName" @row-click="proRowClick">
                <el-table-column v-for="item in proHead" :label="item.label" align="center" :width="item.width" :key="item.label">
                    <template slot-scope="scope">
                        <!-- <span v-if="item.type=='checkbox'">
                              <el-checkbox v-model="scope.row[item.prop]" disabled></el-checkbox>
                          </span>-->
                        <span v-if="item.type=='img'">
                                <el-popover
                                        placement="right"
                                        trigger="hover"
                                        popper-class="picture_detail">
                       <img :src="scope.row[item.prop]">
    <img slot="reference" :src="scope.row[item.prop]" :alt="scope.row[item.alt]">
   </el-popover>
                            </span>
                        <span v-else-if="item.type=='select'">
                            {{scope.row[item.prop][item.nmProp]}}
                        </span>
                        <span v-else>
                             {{item.inProp?scope.row[item.prop][item.inProp]:scope.row[item.prop]}}
                        </span>
                    </template>
                </el-table-column>
            </el-table>
            <el-button type="text">sku信息</el-button>
            <el-table :data="proSkuVal" fit height="160" :row-class-name="proSkuCName" @row-click="proSkuRowClick">
                <el-table-column v-for="item in proSkuHead" :label="item.label" align="center" :width="item.width" :key="item.label">
                    <template slot-scope="scope">
                       <span v-if="item.prop">
                            {{item.inProp?scope.row[item.prop][item.inProp]:scope.row[item.prop]}}
                           <!--<span v-if="item.type=='select'">
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
                        </span>-->
                       </span>
                    </template>
                </el-table-column>
                <el-table-column v-for="each in combProEditHead" :label="each.label" align="center" :width="each.width" :key="each.label">
                    <template slot-scope="scope">
                        <span v-if="combEdit =='index'+scope.$index">
                            <span v-if="each.type=='number'">
                                <el-input size="small" type="number" v-model.trim="specDtlInfo[each.inProp]" :placeholder="each.holder"></el-input>
                            </span>
                            <span v-else-if="each.type == 'textarea'">
                                      <el-input type="textarea" size="small" v-model.trim="specDtlInfo[each.inProp]" :placeholder="each.holder"></el-input>
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
                                           placeholder="选择日期"  @change="dateChg" format="yyyy/MM/dd" value-format="yyyy/MM/dd">
                            </el-date-picker>
                                </span>
                            <span v-else>
                                   <el-input size="small" v-model.trim="specDtlInfo[each.inProp]" :placeholder="each.holder"></el-input>
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
            <el-button type="text">子件列表</el-button>
            <el-table :data="proCompVal" fit height="230" :row-class-name="proCompCName" @row-click="proCompRowClick">
                <el-table-column v-for="item in proCompHead" :label="item.label" align="center" :width="item.width" :key="item.label">
                    <template slot-scope="scope">
                        <span v-if="item.prop=='proPurchaseData'">
                            <span v-if="proCompRowIndex == 'index'+scope.$index">
                                <span v-if="item.type=='number'">
                                        <el-input size="small" type="number" v-model.trim="scope.row[item.prop][item.inProp]" :placeholder="item.holder" @change="compValChg"></el-input>
                                    </span>
                                <span v-else-if="item.type == 'textarea'">
                                          <el-input type="textarea" size="small" v-model.trim="scope.row[item.prop][item.inProp]" :placeholder="item.holder" @change="compValChg"></el-input>
                                    </span>
                                <span v-else-if="item.type == 'select'">
                                        <el-select v-model="scope.row[item.prop][item.inProp]" :placeholder="item.holder" @change="compValChg">
                                           <span v-for="list in resData[item.stateVal]" :key="list.id">
                                                <el-option :label="list.name?list.name:list.title" :value="list.id"></el-option>
                                           </span>
                                       </el-select>
                                    </span>
                                <span v-else-if="item.type == 'datepicker'" @change="compValChg">
                                   <el-date-picker v-model="scope.row[item.prop][item.inProp]"  type="date" placeholder="选择日期"  format="yyyy/MM/dd" value-format="yyyy/MM/dd">
                            </el-date-picker>
                                </span>
                            </span>
                            <span v-else>
                                <span v-if="item.type=='select'">
                                <span v-for="list in resData[item.stateVal]" :key="list.id">
                                    <span v-if="list.id==scope.row[item.prop][item.inProp]">
                                        {{list.name?list.name:list.title}}
                                    </span>
                                </span>
                            </span>
                                <span v-else>
                                    {{scope.row[item.prop][item.inProp]}}
                                </span>
                            </span>
                        </span>
                        <span v-else-if="item.prop">
                            <span v-if="item.type=='checkbox'">
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
                             {{item.inProp?scope.row[item.prop][item.inProp]:scope.row[item.prop]}}
                        </span>
                        </span>
                    </template>
                </el-table-column>
            </el-table>
            <div slot="footer" class="dialog-footer">
                <el-button type="primary" @click="confirmAddProDtl">确定</el-button>
                <el-button @click="cancelAddProDtl">取消</el-button>
            </div>
        </el-dialog>

        <!--修改采购单-->
        <el-dialog title="修改采购单" :visible.sync="updatePurMask" :class="{'more-forms':moreForms,'threeParts':threeParts}">
            <el-button type="text">基本信息</el-button>
            <add-new :rule-form="updatePurForm" :rules="addPurchaseRules" :add-arr="addPurchaseHead" :onlyInputs="true"></add-new>
            <div class="clearfix">
                <div style="float: left">
                    <el-button type="text">采购sku</el-button>
                    <el-table :data="updatePurSkuVal" fit style="width: 200px;margin-right: 50px;" height="300" @row-click="updatePurSkuRowClick">
                        <!-- :row-class-name="updateRowCName"-->
                        <el-table-column v-for="item in addPurchaseSkuHead" :label="item.label" align="center" :key="item.prop">
                            <template slot-scope="scope">
                                {{scope.row[item.prop]}}
                            </template>
                        </el-table-column>
                        <el-table-column label="操作" width="90" align="center">
                            <template slot-scope="scope">
                                <el-button size="mini" type="danger" @click="updatePurSkuDel(scope.row,scope.$index)">删除</el-button>
                            </template>
                        </el-table-column>
                    </el-table>
                </div>
                <div style="overflow: hidden">
                    <el-button type="text">采购子件</el-button>
                    <el-table :data="updatePurCompVal" fit height="300"  :row-class-name="updateCompCName" @row-click="updateCompRowClick">
                        <el-table-column v-for="item in addPurchaseCompHead" :label="item.label" align="center" :width="item.width" :key="item.label">
                            <template slot-scope="scope">
                                <span v-if="item.prop=='proPurchaseData'">
                                    <span v-if="updatePurCompIndex == 'index'+scope.$index">
                                        <span v-if="item.type=='number'">
                                        <el-input size="small" type="number" v-model.trim="scope.row[item.prop][item.inProp]" :placeholder="item.holder"></el-input>
                                    </span>
                                        <span v-else-if="item.type == 'textarea'">
                                                  <el-input type="textarea" size="small" v-model.trim="scope.row[item.prop][item.inProp]" :placeholder="item.holder"></el-input>
                                            </span>
                                        <span v-else-if="item.type == 'select'">
                                                <el-select v-model="scope.row[item.prop][item.inProp]" :placeholder="item.holder">
                                                   <span v-for="list in resData[item.stateVal]" :key="list.id">
                                                        <el-option :label="list.name?list.name:list.title" :value="list.id"></el-option>
                                                   </span>
                                               </el-select>
                                            </span>
                                        <span v-else-if="item.type == 'datepicker'">
                                   <el-date-picker
                                           v-model="scope.row[item.prop][item.inProp]"  type="date" placeholder="选择日期"  format="yyyy/MM/dd" value-format="yyyy/MM/dd">
                            </el-date-picker>
                                </span>
                                    </span>
                                    <span v-else>
                                        <span v-if="item.type=='select'">
                                            <span v-for="list in resData[item.stateVal]" :key="list.id">
                                                <span v-if="list.id==scope.row[item.prop][item.inProp]">
                                                    {{list.name?list.name:list.title}}
                                                </span>
                                            </span>
                                        </span>
                                <span v-else>
                                    {{scope.row[item.prop][item.inProp]}}
                                </span>
                            </span>
                                </span>
                                <span v-else-if="item.prop">
                                    <span v-if="item.type=='checkbox'">
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
                             {{item.inProp?scope.row[item.prop][item.inProp]:scope.row[item.prop]}}
                        </span>
                                 </span>
                            </template>
                        </el-table-column>
                        <el-table-column label="状态" width="90">
                            <template slot-scope="scope">
                                {{"新建"}}
                            </template>
                        </el-table-column>
                        <el-table-column label="操作" width="90" align="center" fixed="right">
                            <template slot-scope="scope">
                                <el-button size="mini" type="danger" @click="updateDelPurComp(scope.row,scope.$index)">删除</el-button>
                            </template>
                        </el-table-column>
                    </el-table>
                </div>
            </div>
            <div slot="footer" class="dialog-footer clearfix">
                <div style="float: left">
                    <el-button type="primary" @click="updateProDtl">增加明细</el-button>
                </div>
                <div style="float: right">
                    <el-button type="primary" @click="confirmUpdatePur(updateId)">确定</el-button>
                    <el-button @click="cancelUpdate">取消</el-button>
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
            ent: this.updatePur,
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
            ent: this.doCommit,
            nClick: false
          },
          {
            cnt: '审核',
            icon: 'bf-audit',
            ent: this.doAudit,
            nClick: false
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
            ent: this.doPrinter,
            nClick: false
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
         /* {
            label: '创建日期',
            width: '180',
            // prop: 'created_at',
            prop: '',
            type: 'text',
          },*/
          {
            label: '打印时间',
            width: '200',
            prop: 'print_at',
            inProp: 'date',
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
            prop: 'promise_ship_time',
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
          /*{
            label: '省市区',
            width: '150',
            prop: 'order_address',
            type: 'text',
          },*/
          {
           label: '采购收货人',
           width: '120',
           prop: 'receiver',
           type: 'text',
         },
          {
            label: '采购收货地址',
            width: '160',
            prop: 'receiver_address',
            type: 'text',
          },
          {
            label: '备注',
            width: '180',
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
            prop: 'business_personnel',
            type: 'text',
          },
          {
            label: '提交',
            width: '120',
            prop: 'is_submit',
            type: 'checkbox',
          },
          {
            label: '打印',
            width: '120',
            prop: 'is_print',
            type: 'checkbox',
          },
          {
            label: '审核',
            width: '120',
            prop: 'is_audit',
            type: 'checkbox',
          },
          {
            label: '修改',
            width: '120',
            prop: 'is_change',
            type: 'checkbox',
          }
        ],
        getsInfo:[],
        newData:[],
        partData:[],
        finishData:[],
        newLoading: true,
        partLoading: true,
        finishLoading: true,
        delArr:[],
        updateId:'',
        multipleSelection:[],
        addPurchaseMask: false,
        moreForms: true,
        threeParts: true,
        addPurchaseSkuVal:[],
        addPurSkuStagId: [],
        /*采购明细*/
        addPurchaseSkuHead:[
          {
            label: 'sku名称',
            // prop: 'combinations',
            // inProp: "name",
            prop: "name",
            type: 'text',
          }
        ],
        addPurCurSkuData:{},
        addPurchaseCompHead:[
          {
            label: '子件图片',
            width: '120',
            prop: "img_url",
            type: 'img',
          },
          {
            label: '子件编码',
            width: '120',
            prop: "component_code",
            type: 'text',
          },
          {
            label: '子件名称',
            width: '120',
            prop: "spec",
            type: 'text',
          },
          {
            label: '库存数',
            width: '120',
            prop: '',
            inProp: "",
            type: 'number'
          },
          {
            label: '订单数',
            width: '120',
            prop: '',
            inProp: "",
            type: 'number'
          },
          {
            label: '在途数',
            width: '120',
            prop: '',
            inProp: "",
            type: 'number'
          },
          {
            label: '在途数(提交)',
            width: '120',
            prop: '',
            inProp: "",
            type: 'number'
          },
          {
            label: '可用数',
            width: '120',
            prop: '',
            inProp: "",
            type: 'number'
          },
          {
            label: '已入库数',
            width: '120',
            prop: '',
            inProp: "",
            type: 'number'
          },
          {
            label: '需采购数',
            width: '120',
            prop: '',
            inProp: "",
            type: 'number',
          },
          {
            label: '采购数',
            width: '120',
            prop: 'proPurchaseData',
            inProp: "purchase_quantity",
            type: 'number',
          },
          {
            label: '采购店铺',
            width: '120',
            prop: 'proPurchaseData',
            inProp: "shops_id",
            stateVal: 'shops',
            type: 'select',
          },
          {
            label: '供应商',
            width: '120',
            prop: 'proPurchaseData',
            inProp: "suppliers_id",
            stateVal: 'suppliers',
            holder: '请选择供应商',
            type: 'select',
          },
          {
            label: '采购成本',
            width: '120',
            prop: 'proPurchaseData',
            inProp: "purchase_cost",
            holder: '请输入采购成本',
            type: 'number',
          },
          {
            label: '仓库成本',
            width: '120',
            prop: 'proPurchaseData',
            inProp: "warehouse_cost",
            holder: '请输入仓库成本',
            type: 'number',
          },
          {
            label: '佣金点',
            width: '120',
            prop: 'proPurchaseData',
            inProp: "commission",
            holder: '请输入佣金点',
            type: 'number',
          },
          {
            label: '采购运费',
            width: '120',
            prop: 'proPurchaseData',
            inProp: "purchase_freight",
            holder: '请输入采购运费',
            type: 'number',
          },
          {
            label: '折扣',
            width: '120',
            prop: 'proPurchaseData',
            inProp: "discount",
            holder: '请输入折扣',
            type: 'number',
          },
          {
            label: '木架费',
            width: '120',
            prop: 'proPurchaseData',
            inProp: "wooden_frame_costs",
            holder: '请输入木架费',
            type: 'number',
          },
          {
            label: '到货时间',
            width: '120',
            prop: 'proPurchaseData',
            inProp: "arrival_time",
            holder: '请输入到货时间',
            type: 'datepicker',
          },
          {
            label: '备注',
            width: '120',
            prop: 'proPurchaseData',
            inProp: "remark",
            holder: '请输入备注',
            type: 'textarea',
          }
        ],
        addPurchaseCompIndex: '',
        proMask: false,
        specDtlInfo:[],
        proCompRowIndex:'',
        patchData:[],
        idArr:[],
        showDel: false,
        delDtlIndex:'',
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
        /*新增采购*/
        addPurchaseHead:[
          {
            label: '采购单号',
            prop: 'purchase_order_no',
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
          }
        ],
        addPurchaseForm:{
          receiver:'',
          receiver_address:'',
          remark:'',
          purchase_lists:[]
        },
        addPurchaseRules:{
          receiver: [
            {required: true, message: '收货人必填', trigger: 'blur'},
          ],
          receiver_address: [
            {required: true, message: '收货地址必填', trigger: 'blur'},
          ]
        },
        addPurchaseCompVal: [],
        /*商品明细*/
        proQuery:{
          commodity_code:'',
          component_code: '',
          shops_id:''
        },
        proHead:[
          {
            label: '商品图片',
            prop: "img",
            width: '120',
            type: 'img',
            alt: '商品图片'
          },
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
            label: '商品名称',
            prop: "title",
            width: '130',
            type: 'text',
          },
          {
            label: '供应商',
            prop: 'supplier',
            nmProp: 'name',
            width: '130',
            type: 'select'
          }
        ],
        proRowIndex: '',
        purRow: {},
        purIndex: '',
        activeRow: 'index0',
        proCompVal:[],
        proCompHead:[
          {
            label: '通用子件',
            width: '90',
            prop: "is_common",
            type: 'checkbox',
          },
          {
            label: '子件图片',
            width: '120',
            prop: "img_url",
            type: 'img',
          },
          {
            label: '子件编码',
            width: '120',
            prop: "component_code",
            type: 'text',
          },
          {
            label: '子件名称',
            width: '120',
            prop: "spec",
            type: 'text',
          },
          {
            label: '库存数',
            width: '120',
            prop: "",
            inProp: '',
            type: 'number'
          },
          {
            label: '库存预警数',
            width: '120',
            prop: "inventory_warning",
            type: 'number'
          },
          {
            label: '订单数',
            width: '120',
            prop: "",
            inProp: '',
            type: 'number'
          },
          {
            label: '在途数',
            width: '120',
            prop: "",
            inProp: '',
            type: 'number'
          },
          {
            label: '在途数(提交)',
            width: '120',
            prop: "",
            inProp: '',
            type: 'number'
          },
          {
            label: '可用数',
            width: '120',
            prop: "",
            inProp: '',
            type: 'number'
          },
          {
            label: '采购数',
            width: '120',
            prop: 'proPurchaseData',
            inProp: "purchase_quantity",
            holder: '请输入采购数',
            type: 'number',
          },
          {
            label: '采购店铺',
            width: '120',
            prop: 'proPurchaseData',
            inProp: "shops_id",
            holder: '请选择采购店铺',
            stateVal: 'shops',
            type: 'select'
          },
          {
            label: '供应商',
            width: '120',
            prop: 'proPurchaseData',
            inProp: "suppliers_id",
            holder: '请选择供应商',
            stateVal:'suppliers',
            type: 'select'
          },
          {
            label: '采购成本',
            width: '120',
            prop: 'proPurchaseData',
            inProp: 'purchase_cost',
            type: 'number'
          },
          {
            label: '采购运费',
            width: '120',
            prop: 'proPurchaseData',
            inProp: 'purchase_freight',
            type: 'number'
          },
          {
            label: '仓库成本',
            width: '120',
            prop: "proPurchaseData",
            inProp: "warehouse_cost",
            type: 'number'
          },
          {
            label: '佣金点',
            width: '120',
            prop: "proPurchaseData",
            inProp: "commission",
            type: 'number'
          },
          {
            label: '折扣',
            width: '120',
            prop: "proPurchaseData",
            inProp: "discount",
            type: 'number'
          },
          {
            label: '木架费',
            width: '120',
            prop: "proPurchaseData",
            inProp: "wooden_frame_costs",
            type: 'number'
          },
          {
            label: '到货时间',
            width: '155',
            prop: 'proPurchaseData',
            inProp: "arrival_time",
            holder: '请输入到货时间',
            type: 'datepicker'
          },
          {
            label: '备注',
            width: '120',
            prop: 'proPurchaseData',
            inProp: "remark",
            holder: '请输入备注',
            type: 'textarea'
          }
        ],
        proSkuVal:[],
        proSkuHead:[
          {
            label: 'sku名称',
            width: '120',
            prop: "name",
            type: 'text'
          },
          {
            label: '组合件数',
            width: '120',
            prop: "",
            inProp: '',
            type: 'number'
          },
          {
            label: '库存数',
            width: '120',
            prop: "",
            inProp: '',
            type: 'number'
          },
          {
            label: '订单数',
            width: '120',
            prop: "",
            inProp: '',
            type: 'number'
          },{
            label: '在途数(提交)',
            width: '120',
            prop: "",
            inProp: '',
            type: 'number'
          },
          {
            label: '可用数',
            width: '120',
            prop: "",
            inProp: '',
            type: 'number'
          },
          /*
           {
            label: 'sku图片',
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
            label: '采购成本',
            width: '120',
            prop: '',
            inProp: "",
            type: 'number'
          },
          {
            label: '仓库成本',
            width: '120',
            prop: '',
            inProp: "",
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
          }*/
        ],
        proCurSkuData:{},
        proIndex:'',
        proDtlVal:[],
        proCompValChg: false,
        proCompIndex: '',
        compStagData:[],
        compStagId:[],
        /*修改采购*/
        updatePurMask:false,
        updatePurForm:{},
        updatePurSkuVal:[],
        updatePurCompVal:[],
        updatePurCompIndex:'',
        updatePurSkuStagId:[],
        updatePurSkuIndex:'',
        updateSkuRow:[],
        /*底部tabs*/
        checkboxInit: false,
        leftActiveName: '0',
        purListVal: [],
        purListHead:[
            {
              label: '采购名称',
              width: '200',
              prop: "combinations",
              inProp: "name",
              type: 'text'
            }
          ],
        rightActiveName: '0',
        purDetailsVal:[],
        delUrl: '',
        purDetailsHead:[
          {
            label: '子件图片',
            width: '120',
            prop: 'product_component',
            inProp: "img_url",
            type: 'img'
          },
          {
            label: '子件编码',
            width: '120',
            prop: 'product_component',
            inProp: "component_code",
            type: 'text'
          },
          {
            label: '子件名称',
            width: '160',
            prop: 'product_component',
            inProp: "spec",
            type: 'text'
          },
          {
            label: '店铺',
            width: '120',
            prop: "shops_id",
            type: 'select',
            stateVal: 'shops'
          },
          {
            label: '供应商',
            width: '120',
            prop: "suppliers_id",
            type: 'select',
            stateVal: 'suppliers',
          },
          {
            label: '采购数',
            width: '120',
            prop: "purchase_quantity",
            type: 'number'
          },
          {
            label: '采购成本',
            width: '100',
            prop: "purchase_cost",
            type: 'number'
          },
          {
            label: '采购运费',
            width: '120',
            prop: "purchase_freight",
            type: 'number'
          },
          {
            label: '仓库成本',
            width: '120',
            prop: 'warehouse_cost',
            type: 'number'
          },
          {
            label: '已入库数',
            width: '120',
            prop: "stock_in_count",
            type: 'number'
          },
          {
            label: '佣金点',
            width: '150',
            prop: 'commission',
            type: 'number'
          },
          {
            label: '折扣',
            width: '150',
            prop:'discount',
            type: 'number'
          },
          {
            label: '木架费',
            width: '120',
            prop: "wooden_frame_costs",
            type: 'checkbox'
          },
          /*{
            label: '采购总体积',
            width: '120',
            prop: "is_common",
            type: 'checkbox',
            // chgAble: false,
            // editChgAble: true,
          },*/
          {
            label: '成本价',
            width: '120',
            prop: 'product_component',
            inProp: "cost",
            type: 'number'
          },
         /* {
            label: '成本总价',
            width: '150',
            prop: "inventory_warning",
            type: 'number'
          },*/
          {
            label: '体积',
            width: '120',
            prop: 'product_component',
            inProp: "volume",
            type: 'number'
          },
          {
            label: '库存数',
            width: '120',
            prop: "",
            type: 'number'
          },
          {
            label: '订出数',
            width: '120',
            prop: "",
            type: 'number'
          },
          {
            label: '在途数',
            width: '120',
            prop: "",
            type: 'number'
          },
          {
            label: '在途数(提交)',
            width: '130',
            prop: "",
            type: 'number'
          },
          {
            label: '可用数',
            width: '120',
            prop: "",
            type: 'number'
          },
          {
            label: '需采购数',
            width: '130',
            prop: "",
            type: 'number'
          },
          {
            label: '到货时间',
            width: '150',
            prop: "arrival_time",
            type: 'text'
          },
          {
            label: '状态',
            width: '130',
            prop: "purchase_item_status",
            type: 'text'
          },
          {
            label: '备注',
            width: '120',
            prop: "remark",
            type: 'textarea'
          },
         /* {
            label: '商品备注',
            width: '120',
            prop: "is_stop_pro",
            type: 'checkbox'
          },
          {
            label: '面料图片',
            width: '120',
            prop: "is_stop_pro",
            type: 'checkbox'
          }*/
        ],
        hkey_path:"HKEY_CURRENT_USER\\Software\\Microsoft\\Internet Explorer\\PageSetup\\",

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
      test(){console.log(1);},
      /*查询*/
      check(){},
      toggleShow(){this.filterBox = !this.filterBox;},
      resets(){ this.searchBox = {};},
      /*获取采购数据*/
      clickTopTabs(){
        this.fetchPurchaseData();
      },
      fetchPurchaseData() {
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
                this.checkboxInit = false;
                let pg = res.meta.pagination;
                if(res.data[0] && res.data[0].purchase_lists[0]){
                  this.purListVal = res.data[0].purchase_lists[0];
                  this.purDetailsVal = res.data[0].purchase_lists[0].purchase_details;
                }
                this.$store.dispatch('currentPage', pg.current_page);
                this.$store.commit('PER_PAGE', pg.per_page);
                this.$store.commit('PAGE_TOTAL', pg.total);
                this.$store.dispatch('suppliers','/suppliers');
                this.$store.dispatch('shops','/shops');
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
            this.$fetch(this.urls.purchases,{purchase_status:'section'})
              .then(res => {
                this.partLoading = false;
                this.partData = res.data;
                this.checkboxInit = false;
                if(res.data[0] && res.data[0].purchase_lists[0]){
                  this.purListVal = res.data[0].purchase_lists[0];
                  this.purDetailsVal = res.data[0].purchase_lists[0].purchase_details;
                }
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
            this.$fetch(this.urls.purchases,{purchase_status:'finish'})
              .then(res => {
                this.finishLoading = false;
                this.finishData = res.data;
                this.checkboxInit = false;
                if(res.data[0] && res.data[0].purchase_lists[0]){
                  this.purListVal = res.data[0].purchase_lists[0];
                  this.purDetailsVal = res.data[0].purchase_lists[0].purchase_details;
                }
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
      },
      purRCName({row, rowIndex}){
        row.index = rowIndex;
      },
      purRowClick(row){
        this.purRow = row;
        // this.activeRow = 'index'+row.index;
        // this.$refs.newTable.toggleRowSelection(row);
        // this.$refs.partTable.toggleRowSelection(row);
        // this.$refs.finishTable.toggleRowSelection(row);
        this.purListVal = row.purchase_lists;
        this.purIndex = row.index;
        if(row.purchase_lists[0]){
          this.purDetailsVal = row.purchase_lists[0].purchase_details;
        }else{
          this.purDetailsVal = [];
        }
        this.newOpt[1].nClick = row['is_change']?true:false;
        this.newOpt[3].nClick = row['is_submit']?true:false;
        this.newOpt[10].nClick = row['is_print']?true:false;
        this.newOpt[4].nClick = row['is_audit']?true:false;
        // this.rowStyle({row, rowIndex});
      },
      purListRowClick(row){
        this.purDetailsVal = row.purchase_details;
      },
      purListDtl(row,e){
        this.showDel = true;
        $('.el-popper').css({left: e.x - 100 + 'px', top: e.y - 125 + 'px'});
        this.delId = row.id;
        if(row.purchase_order_no){
          this.delUrl = this.urls.purchases;
        }else if(row.purchases_id){
          this.delUrl = this.urls.purchaselists;
        }else {
          this.delUrl = this.urls.purchasedetails;
        }
      },
      /*刷新*/
      refresh() {
        this.newLoading = true;
        this.multipleSelection = [];
        this.checkboxInit = false;
        this.fetchPurchaseData();
      },
      /*新建采购单*/
      addNew(){
        this.addPurchaseMask = true;
        this.addPurchaseForm = {
          receiver:'',
          receiver_address:'',
          remark:'',
          purchase_lists:[]
        };
        this.addPurchaseSkuVal=[];
        this.addPurchaseCompVal=[];
        this.addPurSkuStagId=[];
      },
      addPurchaseDetail(){
        this.proRowIndex = '0';
        this.specDtlInfo= [];
        this.proDtlVal = [];
        this.proSkuVal = [];
        this.proCompVal =[];
        this.addPurchaseSkuVal = [];
        this.proCompRowIndex = '';
        this.proMask = true;
        Object.assign(this.proQuery,this.$options.data().proQuery);
      },
      addCompCName({row,rowIndex}){row.index = rowIndex;},
      addCompRowClick(row){
        this.addPurchaseCompIndex = 'index'+ row.index;
      },
      addPurSkuRowClick(row){
        this.addPurchaseCompVal = row.compData;
      },
      addPurSkuDel(index){
        this.addPurchaseSkuVal.splice(index,1);
        if(this.addPurchaseSkuVal.length>0){
          this.addPurchaseCompVal = this.addPurchaseSkuVal[0].compData;
        }else{
          this.addPurchaseCompVal = [];
        }
      },
      addPurCompDtl(index){
       /* this.$confirm('此操作将永久删除该数据, 是否继续?', '提示', {
          confirmButtonText: '确定',
          cancelButtonText: '取消',
          type: 'warning'
        }).then(() => {
          this.addPurchaseSkuVal.splice(index,1);
          this.$message({
            message: '删除成功',
            type: 'success'
          });
        }).catch(() => {
          this.$message({
            type: 'info',
            message: '已取消删除'
          });
        });*/
        this.addPurchaseCompVal.splice(index,1);
      },
      confirmAddPur(){
        this.addPurchaseSkuVal.map(item=>{
          let sku = {
            combinations_id: item.id,
            purchase_details:[]
          };
          item.compData.map(list=>{
            let comp = {
              product_components_id: list.id,
              purchase_quantity: list.proPurchaseData.purchase_quantity,
              shops_id:list.proPurchaseData.shops_id,
              suppliers_id:list.proPurchaseData.suppliers_id,
              purchase_cost:list.proPurchaseData.purchase_cost,
              warehouse_cost:list.proPurchaseData.warehouse_cost,
              purchase_freight:list.proPurchaseData.purchase_freight,
              commission:list.proPurchaseData.commission,
              discount:list.proPurchaseData.discount,
              wooden_frame_costs:list.proPurchaseData.wooden_frame_costs,
              arrival_time:list.proPurchaseData.arrival_time,
              remark:list.proPurchaseData.remark,
            };
            sku.purchase_details.push(comp);
          });
          this.addPurchaseForm.purchase_lists.push(sku);
        });
        // console.log(this.addPurchaseForm);
        this.$post(this.urls.purchases,this.addPurchaseForm)
          .then(()=>{
              this.$message({
                message: '新建采购单成功',
                type: 'success'
              });
              this.addPurchaseMask = false;
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
      cancelAddPur(){
        this.addPurchaseMask = false;
        this.$message({
          message: '取消新建采购单',
          type:'info'
        });
      },
      dateChg(val) {
        // this.specDtlInfo.arrival_time = val;
      },
      /*查询商品明细*/
      proQueryClick(){
        this.proCompValChg = false;
        this.proCompIndex = '0';
        this.compStagData=[];
        this.compStagId=[];
        this.$fetch(this.urls.products+'/search',this.proQuery)
          .then(res => {
            this.proDtlVal = res.data;
            if(res.data[0] && res.data[0].combinations[0].product_components){
              res.data[0].combinations[0].product_components.map(item=>{
                this.$set(item,'proPurchaseData',{
                  purchase_quantity: '',
                  shops_id: '',
                  suppliers_id:'',
                  arrival_time:'',
                  remark:'',
                  purchase_cost: item.purchase_cost,
                  purchase_freight: item.purchase_freight,
                  warehouse_cost: item.warehouse_cost,
                  commission: item.commission,
                  discount: item.discount,
                  wooden_frame_costs: item.wooden_frame_costs
                });
               /* item['proPurchaseData'] = {
                  purchase_quantity: '',
                  shops_id: '',
                  suppliers_id:'',
                  arrival_time:'',
                  remark:'',
                  purchase_cost: item.purchase_cost,
                  purchase_freight: item.purchase_freight,
                  warehouse_cost: item.warehouse_cost,
                  commission: item.commission,
                  discount: item.discount,
                  wooden_frame_costs: item.wooden_frame_costs
                }*/
              });
              this.proSkuVal = res.data[0].combinations;
              this.proCurSkuData = res.data[0].combinations[0];
              this.proCompVal = res.data[0].combinations[0].product_components;
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
      },
      proRowCName({row,rowIndex}){
        row.index = rowIndex;
      },
      proRowClick(row){
        /*有分页的取id再遍历比较，没有分页的直接去index*/
        this.proRowIndex = row.index;
        this.proCompValChg = false;
        this.compStagData=[];
        this.compStagId=[];
        this.combEdit = '';
        this.proCompRowIndex = '';
        if(row.combinations[0].product_components){
          row.combinations[0].product_components.map(item=>{
            this.$set(item,'proPurchaseData',{
              purchase_quantity: '',
              shops_id: '',
              suppliers_id:'',
              arrival_time:'',
              remark:'',
              purchase_cost: item.purchase_cost,
              purchase_freight: item.purchase_freight,
              warehouse_cost: item.warehouse_cost,
              commission: item.commission,
              discount: item.discount,
              wooden_frame_costs: item.wooden_frame_costs});
           /* item['proPurchaseData'] = {
              purchase_quantity: '',
              shops_id: '',
              suppliers_id:'',
              arrival_time:'',
              remark:'',
              purchase_cost: item.purchase_cost,
              purchase_freight: item.purchase_freight,
              warehouse_cost: item.warehouse_cost,
              commission: item.commission,
              discount: item.discount,
              wooden_frame_costs: item.wooden_frame_costs
            }*/
          });
        }
        this.proSkuVal = row.combinations;
        this.proCurSkuData = row.combinations[0];
        this.proCompVal = row.combinations[0].product_components;
      },
      proCompCName({row, rowIndex}){
        row.index = rowIndex;
      },
      compValChg(){
        this.proCompValChg = true;
      },
      proCompRowClick(row){
          this.proCompRowIndex = 'index'+row.index;
          this.proCompIndex = row.index;
          if(this.proCompValChg){
            if(this.compStagData.length>0){
              if(this.compStagId.indexOf(row.id)==-1){
                this.compStagData.push(row);
                this.compStagId.push(row.id);
              }else{
                this.compStagData.map((item,index)=>{
                  if(item.id == row.id){
                    this.compStagData.splice(index,1);
                  }
                });
                this.compStagData.push(row);
              }
            }else{
              this.compStagData.push(row);
              this.compStagId.push(row.id);
            }
            this.proCompValChg = false;
          }
          let newStagData = this.compStagData;
          this.proCurSkuData['compData']= newStagData;
      },
      confirmAddProDtl(){
        /*看sku id是否存在
        * 存在的话找该sku的子件id列表
        * 不存在的话 直接找子件id列表 每次添加的updateStagSku是一条数据*/
       if(this.addPurchaseMask){
         this.proCurSkuData.compData.map(compItem=>{
           for(let i in compItem.proPurchaseData){
             if(compItem.proPurchaseData[i]==''){
               this.$message.error("数据不完整不能添加");
             }
           }
         });
         let stagSku = this.proCurSkuData;
         if(this.addPurchaseSkuVal.length>0){
           if(this.addPurSkuStagId.indexOf(stagSku.id)==-1){
             this.addPurchaseSkuVal.push(stagSku);
             this.addPurSkuStagId.push(stagSku.id);
           }else{
             this.addPurchaseSkuVal.map((item,index)=>{
               if(item.id == stagSku.id){
                 this.addPurchaseSkuVal.splice(index,1);
               }
             });
             this.addPurchaseSkuVal.push(stagSku);
           }
         }else{
           this.addPurchaseSkuVal.push(stagSku);
           this.addPurSkuStagId.push(stagSku.id);
         }
         this.addPurchaseCompVal = this.addPurchaseSkuVal[0].compData;
         this.$message({
           message: '添加商品明细成功',
           type: 'success'
         });
       }else{
         let updateStagSku = this.proCurSkuData;
         console.log('confirm-add-pro updateStagSku',updateStagSku);
         if(updateStagSku.compData){
           /*先判断sku是否存在
         * 如果存在*/
           console.log('this.proCurSkuData',this.proCurSkuData);
           console.log('updateStagSku',updateStagSku);
           console.log('this.updatePurSkuVal',this.updatePurSkuVal);
           /*如果当前sku有数据*/
           if(this.updatePurSkuVal.length>0){
             this.updatePurSkuVal.map(skuID=>{
               this.updatePurSkuStagId.push(skuID.combinations_id)
             });
             console.log('updatePurSkuStagId',this.updatePurSkuStagId);
             /*如果sku不存在当前项*/
             console.log('==',this.updatePurSkuStagId.indexOf(updateStagSku.id));
             if(this.updatePurSkuStagId.indexOf(updateStagSku.id)==-1){
               this.updatePurForm.purchase_lists.push(updateStagSku);
               this.updatePurSkuStagId.push(updateStagSku.id);
               this.updatePurSkuVal.push({
                 name: updateStagSku.name,
                 combinations_id: updateStagSku.id,
                 compData: updateStagSku.compData,
                 is_newAdd: true
               });
               this.$message({
                 message: '添加商品明细成功',
                 type: 'success'
               });
               console.log('addPro',this.updatePurForm.purchase_lists);
             }else{
               /*如果当前sku id已存在*/
               /*找出当前sku的所有子件id*/
               // console.log('=0',this.updatePurForm.purchase_lists);
               this.updatePurForm.purchase_lists.map(purList=>{
                 if(purList.combinations_id == updateStagSku.id){
                   /*所有子件id*/
                   let is_existId = [];
                   console.log(' purList.purchase_details',purList.purchase_details);
                   purList.purchase_details.map(item=>{
                     is_existId.push({
                       id: item.id,
                       combId:item.product_components_id
                     });
                   });
                   console.log('is_existId',is_existId);
                   /*相同子件id覆盖*/
                   console.log('updateStagSku',updateStagSku);
                   updateStagSku.compData.map(compItem=>{
                     for(let i in is_existId){
                       if(is_existId[i]['combId'] == compItem.id){
                         compItem['combId']= is_existId[i]['id'];
                       }
                     }
                   });
                   for(let i in updateStagSku.compData){
                     updateStagSku.compData[i]['is_newAdd'] = true;
                     /*如果当前子件有重复id*/
                     if(updateStagSku.compData[i]['combId']){
                       purList.purchase_details.map((item,index)=>{
                         if(item.id == updateStagSku.compData[i]['combId']){
                           purList.purchase_details.splice(index,1);
                         }
                       })
                     }
                     purList.purchase_details.push(updateStagSku.compData[i]);
                     this.$message({
                       message: '添加商品明细成功',
                       type: 'success'
                     });
                   }
                 }
               });
             }
           }else{
             /*判断是否有子件
             * 如果没有不添加*/
             /*如果当前sku列表为空*/
             // if(updateStagSku.compData.length>0){
             updateStagSku.compData.map(item=>{
               item['is_newAdd'] = true;
             });
             this.updatePurForm.purchase_lists.push(updateStagSku);
             this.updatePurSkuStagId.push(updateStagSku.id);
             this.updatePurSkuVal.push({
               name: updateStagSku.name,
               combinations_id: updateStagSku.id,
               compData: updateStagSku.compData,
               is_newAdd: true
             });
             this.updatePurCompVal = updateStagSku.compData;
             this.$message({
               message: '添加商品明细成功',
               type: 'success'
             });
           }
         }else{
           this.$message.error("未添加商品子件")
         }
      }
    },
      proSkuCName({row,rowIndex}){
        row.index = rowIndex;
      },
      proSkuRowClick(row){
        this.proCompValChg = false;
        this.proCompIndex = '0';
        this.compStagData=[];
        this.compStagId=[];
        this.proCompRowIndex = '';
       row.product_components.map(item=>{
          this.$set(item,'proPurchaseData',{
            purchase_quantity: '',
            shops_id: '',
            suppliers_id:'',
            arrival_time:'',
            remark:'',
            purchase_cost: item.purchase_cost,
            purchase_freight: item.purchase_freight,
            warehouse_cost: item.warehouse_cost,
            commission: item.commission,
            discount: item.discount,
            wooden_frame_costs: item.wooden_frame_costs
          });
       });
        /*  /!* item['proPurchaseData'] = {
            purchase_quantity: '',
            shops_id: '',
            suppliers_id:'',
            arrival_time:'',
            remark:'',
            purchase_cost: item.purchase_cost,
            purchase_freight: item.purchase_freight,
            warehouse_cost: item.warehouse_cost,
            commission: item.commission,
            discount: item.discount,
            wooden_frame_costs: item.wooden_frame_costs
          }*!/
        this.proCompVal = row.product_components;*/
        this.proCompVal = Object.assign({},row.product_components);
        // this.proCompVal = row.product_components;
       /* this.proCompVal.map(item=>{
          this.$set(item,'proPurchaseData',{
            purchase_quantity: '',
            shops_id: '',
            suppliers_id:'',
            arrival_time:'',
            remark:'',
            purchase_cost: item.purchase_cost,
            purchase_freight: item.purchase_freight,
            warehouse_cost: item.warehouse_cost,
            commission: item.commission,
            discount: item.discount,
            wooden_frame_costs: item.wooden_frame_costs
          });
        });*/
        this.proCurSkuData = row;
      },
      cancelAddProDtl(){
        this.proMask = false;
      },
      /*修改采购单*/
      updatePur(){
        this.updatePurSkuVal = [];
        this.updatePurCompVal = [];
        this.updatePurCompIndex = '';
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
            this.updatePurMask = true;
            this.updatePurCompIndex = '0';
            this.$patch(this.urls.purchases + '/' + this.updateId).then(res => {
              this.updatePurForm= {
                purchase_order_no: res.purchase_order_no,
                 receiver:res.receiver,
                 receiver_address: res.receiver_address,
                 remark: res.remark,
                 purchase_lists: res.purchase_lists
               };
              /*this.updatePurSkuVal = this.updatePurForm.purchase_lists;
              if(this.updatePurForm.purchase_lists[0]){
                this.updatePurCompVal = this.updatePurForm.purchase_lists[0].purchase_details;
              }*/
               res.purchase_lists.map(item=>{
                 this.updatePurSkuVal.push({
                   name: item.combinations['name'],
                   id: item.id,
                   combinations_id: item.combinations_id,
                   purchase_details: item.purchase_details
                 });
                 item.purchase_details.map(list=>{
                   list['product_component']['compId'] = list.id;
                 })
               });
               if(res.purchase_lists[0]){
                 res.purchase_lists[0].purchase_details.map(list=>{
                   this.$set(list['product_component'], 'proPurchaseData', {
                     purchase_quantity: list.purchase_quantity,
                     shops_id: list.shops_id,
                     suppliers_id: list.suppliers_id,
                     arrival_time: list.arrival_time,
                     remark: list.remark,
                     purchase_cost: list.purchase_cost,
                     purchase_freight: list.purchase_freight,
                     warehouse_cost: list.warehouse_cost,
                     commission: list.commission,
                     discount: list.discount,
                     wooden_frame_costs: list.wooden_frame_costs
                   });
                 /*  list['product_component']['proPurchaseData'] = {
                     purchase_quantity: list.purchase_quantity,
                     shops_id: list.shops_id,
                     suppliers_id: list.suppliers_id,
                     arrival_time: list.arrival_time,
                     remark: list.remark,
                     purchase_cost: list.purchase_cost,
                     purchase_freight: list.purchase_freight,
                     warehouse_cost: list.warehouse_cost,
                     commission: list.commission,
                     discount: list.discount,
                     wooden_frame_costs: list.wooden_frame_costs
                   };*/
                   this.updatePurCompVal.push(list['product_component']);
                 })
               }
            }, err => {
              console.log(err);
            })
          }
        }
      },
      // updateRowCName({row, rowIndex}){ row.index = rowIndex;},
      updatePurSkuRowClick(row){
        // console.log('skuRowData',row);
        // console.log('updatePurCompIndex',this.updatePurCompIndex);
        // console.log('updateSkuRow',this.updateSkuRow);
        // this.updatePurCompIndex = row.index;
        this.updateSkuRow = row;
        console.log('this.updatePurForm.purchase_lists',this.updatePurForm.purchase_lists);
        console.log('row',row);
        console.log('updatePurCompVal',this.updatePurCompVal);
        if(row.is_newAdd){
          this.updatePurCompVal = row.compData;
        }else{
          this.updatePurCompVal = [];
          row.purchase_details.map(item=>{
            /*替换*/
            if(item.is_newAdd){
              this.updatePurCompVal.push(item);
            }else{
              item['product_component']['compId'] = item.id;
              // this.someObject = Object.assign({},this.someObject,{a:1,b:2})
              this.$set(item['product_component'],'proPurchaseData',{
                purchase_quantity: item.purchase_quantity,
                shops_id: item.shops_id,
                suppliers_id:item.suppliers_id,
                arrival_time:item.arrival_time,
                remark:item.remark,
                purchase_cost: item.purchase_cost,
                purchase_freight: item.purchase_freight,
                warehouse_cost: item.warehouse_cost,
                commission: item.commission,
                discount: item.discount,
                wooden_frame_costs: item.wooden_frame_costs
              })
             /* item['product_component']['proPurchaseData'] = {
                purchase_quantity: item.purchase_quantity,
                shops_id: item.shops_id,
                suppliers_id:item.suppliers_id,
                arrival_time:item.arrival_time,
                remark:item.remark,
                purchase_cost: item.purchase_cost,
                purchase_freight: item.purchase_freight,
                warehouse_cost: item.warehouse_cost,
                commission: item.commission,
                discount: item.discount,
                wooden_frame_costs: item.wooden_frame_costs
              };*/
              this.updatePurCompVal.push(item['product_component']);
            }
          });
        /*  this.updatePurForm.purchase_lists.map(item=>{
            if(item.id == row.id){
              item.purchase_details.map(compItem=>{
                // console.log('compItem',compItem);
                // console.log('compItem.id',compItem.id);
                /!*如果是新增的*!/
                if(compItem.is_newAdd){
                  this.updatePurCompVal.push(compItem);
                }else{
                  compItem['product_component']['compId'] = compItem.id;
                  compItem['product_component']['proPurchaseData'] = {
                    purchase_quantity: compItem.purchase_quantity,
                    shops_id: compItem.shops_id,
                    suppliers_id:compItem.suppliers_id,
                    arrival_time:compItem.arrival_time,
                    remark:compItem.remark,
                    purchase_cost: compItem.purchase_cost,
                    purchase_freight: compItem.purchase_freight,
                    warehouse_cost: compItem.warehouse_cost,
                    commission: compItem.commission,
                    discount: compItem.discount,
                    wooden_frame_costs: compItem.wooden_frame_costs
                  };
                  this.updatePurCompVal.push(compItem['product_component']);
                }
              });
            }
          })*/
        }
      /*  console.log('updateSkuRow',this.updateSkuRow);
        /!*判断是否有id*!/
        if(row.id){
          /!*this.updatePurCompVal = row.purchase_details;*!/
          this.updatePurCompVal = [];
          this.updatePurForm.purchase_lists.map(item=>{
            if(item.id == row.id){
              item.purchase_details.map(compItem=>{
                // console.log('compItem',compItem);
                // console.log('compItem.id',compItem.id);
                /!*如果是新增的*!/
                if(compItem.is_newAdd){
                  this.updatePurCompVal.push(compItem);
                }else{
                  compItem['product_component']['compId'] = compItem.id;
                  compItem['product_component']['proPurchaseData'] = {
                    purchase_quantity: compItem.purchase_quantity,
                    shops_id: compItem.shops_id,
                    suppliers_id:compItem.suppliers_id,
                    arrival_time:compItem.arrival_time,
                    remark:compItem.remark,
                    purchase_cost: compItem.purchase_cost,
                    purchase_freight: compItem.purchase_freight,
                    warehouse_cost: compItem.warehouse_cost,
                    commission: compItem.commission,
                    discount: compItem.discount,
                    wooden_frame_costs: compItem.wooden_frame_costs
                  };
                  this.updatePurCompVal.push(compItem['product_component']);
                }
              });
            }
          })
        }else{
          this.updatePurCompVal = row.compData;
        }*/
      },
      updatePurSkuDel(row,index){
        console.log('sku',row);
        console.log(this.updatePurForm.purchase_lists);
        /*判断是否是新增*/
        if(row.is_newAdd){
          this.updatePurSkuVal.splice(index,1);
          if(this.updatePurSkuVal[index+1]){
            this.updatePurCompVal = this.updatePurSkuVal[index+1].purchase_details;
          }
          this.$message({
            message: '删除采购sku成功',
            type: 'success'
          });
          this.updatePurForm.purchase_lists.map((item,index)=>{
            if(item.id == row.combinations_id){
              this.updatePurForm.purchase_lists.splice(index,1);
            }
          })
        }else{
          // console.log(this.updatePurForm.purchase_lists);
          this.$del(this.urls.purchaselists+'/'+row.id)
            .then(()=>{
              this.updatePurSkuVal.splice(index,1);
              this.$message({
                message: '删除采购sku成功',
                type: 'success'
              });
              /*对应的子件也要删除*/
              this.updatePurCompVal = [];
              if(this.updatePurSkuVal.length>0){
                this.updatePurForm.purchase_lists.map(item=>{
                  if(item.id == this.updatePurSkuVal[0]['id']){
                    item.purchase_details.map(compItem=>{
                      /*如果是新增的*/
                      if(compItem.is_newAdd){
                        this.updatePurCompVal.push(compItem);
                      }else{
                        this.$set(compItem['product_component'],'proPurchaseData',{
                          purchase_quantity: compItem.purchase_quantity,
                          shops_id: compItem.shops_id,
                          suppliers_id:compItem.suppliers_id,
                          arrival_time:compItem.arrival_time,
                          remark:compItem.remark,
                          purchase_cost: compItem.purchase_cost,
                          purchase_freight: compItem.purchase_freight,
                          warehouse_cost: compItem.warehouse_cost,
                          commission: compItem.commission,
                          discount: compItem.discount,
                          wooden_frame_costs: compItem.wooden_frame_costs
                        })
                       /* compItem['product_component']['proPurchaseData'] = {
                          purchase_quantity: compItem.purchase_quantity,
                          shops_id: compItem.shops_id,
                          suppliers_id:compItem.suppliers_id,
                          arrival_time:compItem.arrival_time,
                          remark:compItem.remark,
                          purchase_cost: compItem.purchase_cost,
                          purchase_freight: compItem.purchase_freight,
                          warehouse_cost: compItem.warehouse_cost,
                          commission: compItem.commission,
                          discount: compItem.discount,
                          wooden_frame_costs: compItem.wooden_frame_costs
                        };*/
                        this.updatePurCompVal.push(compItem['product_component']);
                      }
                    });
                  }
                })
              }
              this.updatePurForm.purchase_lists.map((item,listIndex)=>{
                if(item.id == row.id){
                  this.updatePurForm.purchase_lists.splice(listIndex,1);
                }
              })
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
        }
      },
      updateCompCName({row,rowIndex}){row.index = rowIndex;},
      updateCompRowClick(row){
        this.updatePurCompIndex = 'index'+ row.index;
        console.log('compRowData',row);
      },
      updateDelPurComp(row,index){
        console.log('comp',row);
        console.log(this.updatePurForm.purchase_lists);
        // console.log('updateSkuRow',this.updateSkuRow);
        /*原有的还是替换的，都可以通过id删除*/
        if(this.updateSkuRow.is_newAdd){
          /*sku新增*/
          this.updatePurCompVal.splice(index,1);
          this.$message({
            message: '删除采购子件成功',
            type: 'success'
          });
          /*通过sku id确认唯一性*/
          this.updatePurForm.purchase_lists.map(item=>{
            if(item.id == row.combinations_id){
              item.compData.splice(index,1);
            }
          })
        }else{
          /*sku已存在*/
          if(row.is_newAdd){
            /*替换comp*/
            this.$del(this.urls.purchasedetails+'/'+row.combId)
              .then(()=>{
                this.$message({
                  message: '删除采购子件成功',
                  type: 'success'
                });
                this.updatePurCompVal.splice(index,1);
                this.updatePurForm.purchase_lists.map(item=>{
                  if(item.id == this.updateSkuRow.id){
                    item.purchase_details.splice(index,1);
                  }
                })
              },()=>{
                this.$message.error('未找到该条数据，无法删除');
              })
          }else{
            /*原有comp*/
            this.$del(this.urls.purchasedetails+'/'+row.compId)
              .then(()=>{
                this.$message({
                  message: '删除采购子件成功',
                  type: 'success'
                });
                this.updatePurCompVal.splice(index,1);
                console.log('del',this.updatePurForm.purchase_lists);
                this.updatePurForm.purchase_lists.map(item=>{
                  if(item.id == this.updateSkuRow.id){
                    item.purchase_details.splice(index,1);
                  }
                })
              },()=>{
                this.$message.error('未找到该条数据，无法删除');
              })
          }
        }
      },
      updateProDtl(){
        this.proMask = true;
        Object.assign(this.proQuery,this.$options.data().proQuery);
        this.proDtlVal = [];
        this.proSkuVal = [];
        this.proCompVal =[];
      },
      confirmUpdatePur(id){
        if(this.updatePurForm.purchase_lists.length == 0){
          this.$message.error('采购单不能为空');
          return
        }else{
          let addSku = {
            receiver: this.updatePurForm.receiver,
            receiver_address: this.updatePurForm.receiver_address,
            remark: this.updatePurForm.remark,
            purchase_lists: []
          };
          this.updatePurForm.purchase_lists.map(item=> {
            if (item.compData) {
              let purList = {
                combinations_id: '',
                purchase_details: []
              };
              purList['combinations_id'] = item.id;
              item.compData.map(list => {
                let comp = {
                  product_components_id: list.id,
                  purchase_quantity: list.proPurchaseData.purchase_quantity,
                  shops_id: list.proPurchaseData.shops_id,
                  suppliers_id: list.proPurchaseData.suppliers_id,
                  purchase_cost: list.proPurchaseData.purchase_cost,
                  warehouse_cost: list.proPurchaseData.warehouse_cost,
                  purchase_freight: list.proPurchaseData.purchase_freight,
                  commission: list.proPurchaseData.commission,
                  discount: list.proPurchaseData.discount,
                  wooden_frame_costs: list.proPurchaseData.wooden_frame_costs,
                  arrival_time: list.proPurchaseData.arrival_time,
                  remark: list.proPurchaseData.remark,
                };
                purList['purchase_details'].push(comp);
              });
              addSku.purchase_lists.push(purList);
            } else {
              let purList = {
                id:'',
                combinations_id: '',
                purchase_details: []
              };
              purList['id'] = item.id;
              purList['combinations_id'] = item.combinations_id;
              console.log('item.purchase_details',item.purchase_details);
              item.purchase_details.map(alreadyList => {
                if(alreadyList.is_newAdd){
                  if(alreadyList.combId){
                    let newComp = {
                      is_newAdd: true,
                      id: alreadyList.combId,
                      product_components_id: alreadyList.id,
                      purchase_quantity: alreadyList.proPurchaseData.purchase_quantity,
                      shops_id: alreadyList.proPurchaseData.shops_id,
                      suppliers_id: alreadyList.proPurchaseData.suppliers_id,
                      purchase_cost: alreadyList.proPurchaseData.purchase_cost,
                      warehouse_cost: alreadyList.proPurchaseData.warehouse_cost,
                      purchase_freight: alreadyList.proPurchaseData.purchase_freight,
                      commission: alreadyList.proPurchaseData.commission,
                      discount: alreadyList.proPurchaseData.discount,
                      wooden_frame_costs: alreadyList.proPurchaseData.wooden_frame_costs,
                      arrival_time: alreadyList.proPurchaseData.arrival_time,
                      remark: alreadyList.proPurchaseData.remark,
                    };
                    purList['purchase_details'].push(newComp);
                  }else{
                    let newComp = {
                      is_newAdd: true,
                      product_components_id: alreadyList.id,
                      purchase_quantity: alreadyList.proPurchaseData.purchase_quantity,
                      shops_id: alreadyList.proPurchaseData.shops_id,
                      suppliers_id: alreadyList.proPurchaseData.suppliers_id,
                      purchase_cost: alreadyList.proPurchaseData.purchase_cost,
                      warehouse_cost: alreadyList.proPurchaseData.warehouse_cost,
                      purchase_freight: alreadyList.proPurchaseData.purchase_freight,
                      commission: alreadyList.proPurchaseData.commission,
                      discount: alreadyList.proPurchaseData.discount,
                      wooden_frame_costs: alreadyList.proPurchaseData.wooden_frame_costs,
                      arrival_time: alreadyList.proPurchaseData.arrival_time,
                      remark: alreadyList.proPurchaseData.remark,
                    };
                    purList['purchase_details'].push(newComp);
                  }
                }else{
                  let alreadyComp = {
                    id: alreadyList.id,
                    product_components_id: alreadyList.product_components_id,
                    purchase_quantity: alreadyList.purchase_quantity,
                    shops_id: alreadyList.shops_id,
                    suppliers_id: alreadyList.suppliers_id,
                    purchase_cost: alreadyList.purchase_cost,
                    warehouse_cost: alreadyList.warehouse_cost,
                    purchase_freight: alreadyList.purchase_freight,
                    commission: alreadyList.commission,
                    discount: alreadyList.discount,
                    wooden_frame_costs: alreadyList.wooden_frame_costs,
                    arrival_time: alreadyList.arrival_time,
                    remark: alreadyList.remark,
                  };
                  purList['purchase_details'].push(alreadyComp);
                }
              });
              addSku.purchase_lists.push(purList);
            }
          });
          this.$patch(this.urls.purchases + '/' + id, addSku)
            .then(() => {
              this.$message({
                message: '修改成功',
                type: 'success'
              });
              this.updatePurMask =false;
              this.refresh();
              this.multipleSelection = [];
              this.checkboxInit = false;
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
      cancelUpdate(){
        this.updatePurMask = false;
        this.$message({
          message: '取消修改采购单',
          type: 'info'
        })
      },
      /*单条删除*/
      delPur(row,e){
        this.showDel = true;
        $('.el-popper').css({left: e.x - 100 + 'px', top: e.y - 125 + 'px'});
        this.delId = row.id;
        if(row.purchase_order_no){
          this.delUrl = this.urls.purchases;
        }else if(row.purchases_id){
          this.delUrl = this.urls.purchaselists;
        }else {
          this.delUrl = this.urls.purchasedetails;
        }
      },
      rowStyle({row, rowIndex}){
        // console.log((this.purIndex) === rowIndex);
       /* if((this.purIndex) === rowIndex){
          return { "background-color": "red" }
        }*/
      },
      confirmD(url,id) {
        this.$del(url + '/' + id)
          .then(() => {
            this.$message({
              message: '删除成功',
              type: 'success'
            });
            this.showDel = false;
            this.refresh();
            if(this.newData[0] && this.newData[0].purchase_lists[0]){
              this.purListVal = this.newData[0].purchase_lists[0];
              this.purDetailsVal = this.newData[0].purchase_lists[0].purchase_details;
            }
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
      cancelD() {
        this.showDel = false;
        this.$message({
          message: '取消删除',
          type: 'info'
        });
      },
      purDetailsDtl(row,e){
        this.showDel = true;
        $('.el-popper').css({left: e.x - 100 + 'px', top: e.y - 125 + 'px'});
        this.delId = row.id;
        if(row.purchase_order_no){
          this.delUrl = this.urls.purchases;
        }else if(row.purchases_id){
          this.delUrl = this.urls.purchaselists;
        }else {
          this.delUrl = this.urls.purchasedetails;
        }
      },
      clickRightTabs(){},
      /*批量删除 只针对新建模块*/
      handleSelectionChange(val) {
        if (val.length != 0) {
          this.updateId = val[0].id;
        } else {
          this.updateId = '';
        }
        this.multipleSelection = val;
        let del = [];
        this.multipleSelection.forEach(selectedItem => {
          del.push(selectedItem.id);
        });
        this.delArr = del.join(',');
      },
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
              this.$del(this.urls.purchases, {ids: this.delArr})
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
      /*提交  提交之后不能修改*/
      doCommit(){
        if (this.newOpt[3].nClick) {
          return
        } else {
          if (this.multipleSelection.length == 0) {
            this.$message({
              message: '没有选择要提交的数据',
              type: 'warning'
            });
            return
          } else if (this.multipleSelection.length >= 2) {
            this.$message({
              message: '只能修改单条数据',
              type: 'warning'
            });
            return
          }else{
            this.$put(this.urls.purchases+'/'+this.updateId+'/submit')
              .then(()=>{
                this.$message({
                  message: '提交成功!',
                  type: 'success'
                })
                this.refresh();
              },err=>{
                this.$message.error(err.response.data.message);
              })
          }
        }
      },
      /*打印*/
      doPrinter(){
        if(!this.newOpt[10].nClick){
          this.$put(this.urls.purchases+'/'+this.purRow.id+'/print')
            .then(()=>{
              this.printBtn();
              this.$message({
                message: '打印成功!',
                type: 'success'
              });
              this.refresh();
            },err=>{
              this.$message.error(err.response.data.message);
            })
        }
      },
      printBtn() {
        this.remove_ie_header_and_footer();
        let subOutputRankPrint = document.getElementById('subOutputRank-print');
        let newContent =subOutputRankPrint.innerHTML;
        let oldContent = document.body.innerHTML;
        document.body.innerHTML = newContent;
        window.print();
        window.location.reload();
        document.body.innerHTML = oldContent;
        return false;
      },
      remove_ie_header_and_footer() {
        try {
          let RegWsh = new ActiveXObject("WScript.Shell");
          RegWsh.RegWrite(this.hkey_path + "header", "");
          RegWsh.RegWrite(this.hkey_path + "footer", "");
        } catch (e) {
        }
      },
      /*审核*/
      doAudit(){
        if(!this.newOpt[4].nClick){
          this.$put(this.urls.purchases+'/'+this.purRow.id+'/audit')
            .then(()=>{
              this.$message({
                message: '审核成功!',
                type: 'success'
              });
              this.refresh();
            },err=>{
              this.$message.error(err.response.data.message);
            })
        }
      },
    },
    mounted() {
      this.fetchPurchaseData();
      this.$store.dispatch('setOpt', this.newOpt);
      const that = this;
      $(window).resize(() => {
        that.$store.dispatch('setOpt', that.newOpt);
      });
    }
  }
</script>
