<template>
    <div>
        <div v-if="onlyTableColumn">
            <el-table-column v-for="(item,index) in tableHead" :label="item.label" align="center" :width="item.width" :key="index" :sortable="item.doSort" :prop="item.prop">
                <template slot-scope="scope">
                    <span v-if="currentIndex =='index'+scope.$index || inRowAdd">
                        <!--<span v-if="item.ableEdit">-->
                            <span v-if="item.type=='color'">
                                 <el-color-picker v-model="scope.row[item.prop]" @change="handleEdit" size="mini"></el-color-picker>
                            </span>
                            <span v-else-if="item.type=='tel'">
                                   <el-input size="small" type="tel" v-model.trim="scope.row[item.prop]" :placeholder="item.holder" @change="handleEdit" :disabled="item.chgAble"></el-input>
                            </span>
                            <span v-else-if="item.type=='number'">
                                   <el-input size="small" type="number" v-model.trim="scope.row[item.prop]" :placeholder="item.holder" @change="handleEdit" :disabled="item.chgAble"></el-input>
                            </span>
                            <span v-else-if="item.type=='url'">
                          <el-input size="small" type="url" v-model.trim="scope.row[item.prop]" :placeholder="item.holder" @change="handleEdit" :disabled="item.chgAble"></el-input>
                        </span>
                            <span v-else-if="item.type == 'select_stu'">
                                     <el-select v-model.trim="scope.row[item.prop]" :placeholder="item.holder" @change="handleEdit" :disabled="item.chgAble">
                                         <el-option label="0-停用" value="0"></el-option>
                                         <el-option label="1-启用" value="1"></el-option>
                                     </el-select>
                                </span>
                            <span v-else-if="item.type == 'select_def'">
                                     <el-select v-model.trim="scope.row[item.prop]" :placeholder="item.holder" @change="handleEdit" :disabled="item.chgAble">
                                         <el-option label="0-否" value="0"></el-option>
                                         <el-option label="1-是" value="1"></el-option>
                                     </el-select>
                                </span>
                            <span v-else-if="item.type == 'textarea'">
                                  <el-input type="textarea" size="small" v-model.trim="scope.row[item.prop]" :placeholder="item.holder" @change="handleEdit"></el-input>
                            </span>
                            <span v-else-if="item.type == 'select'">
                                <el-select v-model="scope.row[item.prop]" :placeholder="item.holder" :disabled="item.chgAble">
                                   <span v-for="list in sonArr[item.stateVal]" :key="list.id">
                                        <el-option :label="list.name" :value="list.id"></el-option>
                                   </span>
                               </el-select>
                            </span>
                            <span v-else-if="item.type == 'checkbox'">
                                <!--处于编辑模式时
                                如果是分开的表格，传递editSign以区分新建和修改
                                如果是同一个表格的不同状态 编辑模式都可编辑，如果实在不能编辑，抛出在可编辑arrHead之外-->
                                <span v-if="item.editSign">
                                    <span v-if="item.inProp">
                                        <el-checkbox :checked="scope.row[item.prop][item.inProp]" :disabled="editSign?item.editChgAble:item.chgAble"></el-checkbox>
                                    </span>
                                    <span v-else>
                                        <el-checkbox v-model="scope.row[item.prop]" :disabled="editSign?item.editChgAble:item.chgAble"></el-checkbox>
                                    </span>
                                </span>
                                <span v-else>
                                    <el-checkbox v-model="scope.row[item.prop]"></el-checkbox>
                                </span>

                            </span>
                            <span v-else>
                                   <el-input size="small" v-model.trim="scope.row[item.prop]" :placeholder="item.holder" @change="handleEdit" :disabled="item.chgAble"></el-input>
                            </span>
                        <!--</span>-->
                     </span>
                    <span v-else>
                        <!--第一行 而且是作为判断条件存在的-->
                        <span v-if="scope.$index==0 && scope.row.judge">
                            <span v-if="item.type=='checkbox'">
                               <el-checkbox v-model="scope.row[item.prop]">{{scope.row[item.prop]}}</el-checkbox>
                            </span>
                        </span>
                        <span v-else>
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
                                <span v-if="scope.row[item.prop]==''"></span>
                                <span v-else-if="typeof scope.row[item.prop] =='object' && scope.row[item.nameProp]">
                                     {{scope.row[item.prop][item.nameProp]}}
                                </span>
                                <!--如果不是对象，要根据id找到对应的name 拿到sonArr值-->
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
                            <span v-else-if="item.type=='checkbox'">
                                <!--<span v-if="item.inProp">
                                          <el-checkbox v-model="scope.row[item.prop][item.inProp]" :disabled="editSign?item.editChgAble:item.chgAble"></el-checkbox>
                                      </span>
                                <span v-else>
                                          <el-checkbox v-model="scope.row[item.prop]" :disabled="editSign?item.editChgAble:item.chgAble"></el-checkbox>
                                      </span>-->
                                <!--表格内部复选框，如果是非编辑状态一律不可点击-->
                                <span v-if="item.inProp">
                                          <el-checkbox v-model="scope.row[item.prop][item.inProp]" :disabled="true"></el-checkbox>
                                      </span>
                                <span v-else>
                                          <el-checkbox v-model="scope.row[item.prop]" :disabled="true"></el-checkbox>
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
                        </span>
                    </span>
                </template>
            </el-table-column>
        </div>
        <div v-else>
            <el-table :data="tabData"  fit highlight-current-row
                      @selection-change="handleSelectionChange"
                      element-loading-text="拼命加载中"
                      v-loading="loading"
                      element-loading-spinner="el-icon-loading"
                      element-loading-background="rgba(0, 0, 0, 0.6)"
                      @row-dblclick="dbClick"
                      :height="height"
                      @row-click="rowClick"
                      style="width: 100%"
                      :row-class-name="tableRowClassName"
                      ref="multipleTable"
            >
                <el-table-column
                        type="selection"
                        width="95" align="center"
                        :checked="checkboxInit" @change="toggleChecked">
                </el-table-column>

                <el-table-column v-for="(item,index) in tableHead" :label="item.label" align="center" :width="item.width" :key="index" :sortable="item.doSort" :prop="item.prop">
                    <template slot-scope="scope">
                    <span v-if="currentIndex =='index'+scope.$index || inRowAdd">
                        <span v-if="item.type=='color'">
                                 <el-color-picker v-model="scope.row[item.prop]" @change="handleEdit" size="mini"></el-color-picker>
                            </span>
                        <span v-else-if="item.type=='tel'">
                               <el-input size="small" type="tel" v-model.trim="scope.row[item.prop]" :placeholder="item.holder" @change="handleEdit" :disabled="item.chgAble"></el-input>
                        </span>
                        <span v-else-if="item.type=='number'">
                               <el-input size="small" type="number" v-model.trim="scope.row[item.prop]" :placeholder="item.holder" @change="handleEdit" :disabled="item.chgAble"></el-input>
                        </span>
                        <span v-else-if="item.type=='url'">
                      <el-input size="small" type="url" v-model.trim="scope.row[item.prop]" :placeholder="item.holder" @change="handleEdit" :disabled="item.chgAble"></el-input>
                    </span>
                        <span v-else-if="item.type == 'select_stu'">
                                 <el-select v-model="scope.row[item.prop]" :placeholder="item.holder" @change="handleEdit" :disabled="item.chgAble">
                                     <el-option label="0-停用" value="0"></el-option>
                                     <el-option label="1-启用" value="1"></el-option>
                                 </el-select>
                            </span>
                        <span v-else-if="item.type == 'select_def'">
                                 <el-select v-model="scope.row[item.prop]" :placeholder="item.holder" @change="handleEdit" :disabled="item.chgAble">
                                     <el-option label="0-否" value="0"></el-option>
                                     <el-option label="1-是" value="1"></el-option>
                                 </el-select>
                            </span>
                        <span v-else-if="item.type == 'textarea'">
                              <el-input type="textarea" size="small" v-model.trim="scope.row[item.prop]"
                                        :placeholder="item.holder" @change="handleEdit"></el-input>
                        </span>
                        <span v-else-if="item.type == 'select'">
                             <el-select v-model="scope.row[item.prop]" :placeholder="item.holder" :disabled="item.chgAble">
                               <span v-for="list in sonArr[item.stateVal]" :key="list.id">
                                    <el-option :label="list.name" :value="list.id"></el-option>
                               </span>
                           </el-select>
                        </span>
                        <span v-else-if="item.type == 'checkbox'">
                                <!--处于编辑模式时
                                如果是分开的表格，传递editSign以区分新建和修改
                                如果是同一个表格的不同状态 编辑模式都可编辑，如果实在不能编辑，抛出在可编辑arrHead之外-->
                                <span v-if="item.editSign">
                                    <span v-if="item.inProp">
                                        <el-checkbox :checked="scope.row[item.prop][item.inProp]" :disabled="editSign?item.editChgAble:item.chgAble"></el-checkbox>
                                    </span>
                                    <span v-else>
                                        <el-checkbox v-model="scope.row[item.prop]" :disabled="editSign?item.editChgAble:item.chgAble"></el-checkbox>
                                    </span>
                                </span>
                                <span v-else>
                                    <el-checkbox v-model="scope.row[item.prop]"></el-checkbox>
                                </span>
                            </span>
                        <span v-else>
                               <el-input size="small" v-model.trim="scope.row[item.prop]" :placeholder="item.holder" @change="handleEdit" :disabled="item.chgAble"></el-input>
                            </span>
                     </span>
                     <span v-else>
                         <span v-if="scope.$index==0 && scope.row.judge">
                            <span v-if="item.type=='checkbox'">
                               <el-checkbox v-model="scope.row[item.prop]"></el-checkbox>
                            </span>
                        </span>
                         <span v-else>
                             <span v-if="item.type=='color'">
                                 <span class="tableColor" :style="{backgroundColor:scope.row.color}"></span>
                         {{scope.row[item.prop]}}
                            </span>
                             <span v-else-if="item.type=='select_stu'">
                                    <i class='showStatus' :class="{'statusActive':scope.row.status==0?false:true}"></i>
                                     {{scope.row[item.prop]?'启用':'停用'}}
                                </span>
                             <span v-else-if="item.type=='select_def'">
                                  {{scope.row[item.prop]?'是':'否'}}
                                </span>
                             <span v-else-if="item.type=='select'">
                                <!--非编辑状态，要么返回的是一个对象，直接读取；如果返回的时一个字符串，要遍历读取；如果新添加时候是一个空白，需要设为空-->
                                <span v-if="scope.row[item.prop]==''"></span>
                                <span v-else-if="typeof scope.row[item.prop] =='object' && item.nmProp">
                                     {{scope.row[item.prop][item.nmProp]}}
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
                                                  <!-- <span v-if="list.name">
                                                        &lt;!&ndash;{{list.name?list.name:''}}&ndash;&gt;
                                                        {{list.name}}
                                                   </span>
                                                   <span v-else-if="list.nick">
                                                        {{list.nick}}
                                                   </span>-->

                                    </span>
                                           </span>
                                </span>
                                </span>
                                </span>
                             <span v-else-if="item.type=='checkbox'">
                                <!-- <span v-if="item.prop || item.inProp">
                                     <span v-if="scope.$index==0">
                                         <el-checkbox :checked="tabData[0][item.prop]"></el-checkbox>
                                     </span>
                                     <span v-else>
                                        <span v-if="scope.row[item.inProp]">
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
                                 </span>
                                     </span>
                                 </span>-->
                               <!-- <span v-if="item.inProp">
                                     <el-checkbox v-model="scope.row[item.prop][item.inProp]" :disabled="editSign?item.editChgAble:item.chgAble"></el-checkbox>
                                      </span>
                                <span v-else>
                                    <el-checkbox v-model="scope.row[item.prop]" :disabled="editSign?item.editChgAble:item.chgAble"></el-checkbox>
                                      </span>-->
                                 <!--如果非编辑模式下 一律不可修改-->
                                  <span v-if="item.inProp">
                                     <el-checkbox v-model="scope.row[item.prop][item.inProp]" :disabled="true"></el-checkbox>
                                      </span>
                                <span v-else>
                                    <el-checkbox v-model="scope.row[item.prop]" :disabled="true"></el-checkbox>
                                      </span>
                             </span>
                             <span v-else>
                                  {{item.inProp?scope.row[item.prop][item.inProp]:scope.row[item.prop]}}
                            </span>
                         </span>
                     </span>
                    </template>
                </el-table-column>
                <el-table-column label="操作" width="160" align="center" fixed="right">
                    <template slot-scope="scope">
                        <span v-if="currentIndex=='index'+scope.$index">
                            <el-button size="mini" @click="editSave(scope.row)">保存</el-button>
                            <el-button size="mini" @click="editCancel">取消
                            </el-button>
                        </span>
                        <span v-else>
                        <!--<span v-if="doChange || editInRow">
                             <el-button size="mini" @click="edit(scope.$index)">编辑</el-button>
                        </span>
                        <el-button size="mini" type="danger" @click="del(scope.row,$event)">删除
                    </el-button>-->
                            <span v-if="doChange || editInRow || nEditInRow">
                             <!--<el-button size="mini" @click="edit(scope.$index)">编辑</el-button>-->
                                 <el-button size="mini" type="danger" @click="del(scope.row,$event)">删除</el-button>
                        </span>
                            <span v-else>
                                 <el-button size="mini" @click="edit(scope.$index,scope.row)">编辑</el-button>
                        <!--</span>-->
                                 <el-button size="mini" type="danger" @click="del(scope.row,$event)">删除</el-button>
                            </span>
                        <!--<el-button size="mini" type="danger" @click="del(scope.row,$event)">删除
                    </el-button>-->
                        </span>
                    </template>
                </el-table-column>
            </el-table>
        </div>
    </div>
</template>
<script>
  export default {
    props: ['loading', 'tableHead', 'listData', 'currentIndex', 'selects','doChange','height','inRowAdd','editInRow','onlyTableColumn','nEditInRow','hasSelect','editSign'],
    data() {
      return {
        checkboxInit: false,
        tabData: this.listData,
      }
    },
    watch: {
      listData: function (newValue) {
        this.tabData = newValue;
      },
    },
    computed:{
      sonArr:{
        get:function(){
          return this.$store.state.responseData
        },
        set:function(){}
      }
    },
    methods: {
      toggleChecked() {
        this.checkboxInit = !this.checkboxInit;
      },
      //批量删除
      handleSelectionChange(val) {
        this.$emit('handleSelect', val);
      },
      edit(index,row) {
        this.$emit('edit', index);
      },
      editCancel() {
        this.$emit('editCancel');
      },
      del(row, e) {
        this.$emit('del', row, e);
      },
      editSave(row) {
        this.$emit('editSave', row);
      },
      handleEdit() {
        this.$emit('handleEdit');
      },
      dbClick(row) {
        this.$emit('dbClick', row);
      },
      rowClick(row) {
        this.$refs.multipleTable.toggleRowSelection(row);
        this.$emit('rowClick', row);
      },
      tableRowClassName({row, rowIndex}) {
        if (rowIndex%2 == 1 ) {
          return 'warning-row';
        } else if (rowIndex%2==0) {
          return 'success-row';
        }
        return '';
      }
    },
    mounted() {}
  }
</script>
