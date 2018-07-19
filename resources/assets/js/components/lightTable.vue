<template>
    <div>
        <el-table :data="tabData" fit highlight-current-row
                  type="index"
                  @selection-change="handleSelectionChange"
                  element-loading-text="拼命加载中"
                  v-loading="loading"
                  element-loading-spinner="el-icon-loading"
                  element-loading-background="rgba(0, 0, 0, 0.6)"
                  @row-dblclick="dbClick"
                  :height="height"
                  @row-click="rowClick"
        >
            <el-table-column
                    type="selection"
                    width="95" align="center"
                    :checked="checkboxInit" @change="toggleChecked">
            </el-table-column>

            <el-table-column v-for="(item,index) in tableHead" :label="item.label" align="center" width="item.width"
                             :key="index" :sortable="item.doSort" :prop="item.prop">
                <template slot-scope="scope">
                    <span v-if="currentIndex =='index'+scope.$index">
                        <span v-if="item.type=='color'">
                                 <el-color-picker v-model="scope.row[item.prop]" @change="handleEdit"
                                                  size="mini"></el-color-picker>
                            </span>
                        <span v-else-if="item.type=='tel'">
                               <el-input size="small" type="tel" v-model="scope.row[item.prop]" :placeholder="item.holder" @change="handleEdit" :disabled="item.beAble"></el-input>
                        </span>
                         <span v-else-if="item.type=='number'">
                               <el-input size="small" type="number" v-model="scope.row[item.prop]" :placeholder="item.holder" @change="handleEdit" :disabled="item.beAble"></el-input>
                        </span>
                        <span v-if="item.type=='url'">
                      <el-input size="small" type="url" v-model="scope.row[item.prop]" :placeholder="item.holder" @change="handleEdit" :disabled="item.beAble"></el-input>
                    </span>
                        <span v-else-if="item.type == 'select_stu'">
                                 <el-select v-model="scope.row[item.prop]" :placeholder="item.holder" @change="handleEdit" :disabled="item.beAble">
                                     <el-option label="0-停用" value="0"></el-option>
                                     <el-option label="1-启用" value="1"></el-option>
                                 </el-select>
                            </span>
                        <span v-else-if="item.type == 'select_def'">
                                 <el-select v-model="scope.row[item.prop]" :placeholder="item.holder" @change="handleEdit" :disabled="item.beAble">
                                     <el-option label="0-否" value="0"></el-option>
                                     <el-option label="1-是" value="1"></el-option>
                                 </el-select>
                            </span>
                        <span v-else-if="item.type == 'textarea'">
                              <el-input type="textarea" size="small" v-model="scope.row[item.prop]"
                                        :placeholder="item.holder" @change="handleEdit"></el-input>
                        </span>
                        <span v-else-if="item.type == 'select'">
                             <el-select v-model="scope.row[item.prop]" :placeholder="item.holder" @change="handleEdit" :disabled="item.beAble">
                                 <span v-for="iList in selects" :key="iList.id">
                                   <span v-if="iList[index]">
                                    <el-option v-for="list in iList[index]" :key="list.id" :label="list.name?list.name:list.short_name" :value="list.id"></el-option></span>
                               </span>
                             </el-select>
                        </span>
                        <span v-else>
                               <el-input size="small" v-model="scope.row[item.prop]" :placeholder="item.holder" @change="handleEdit" :disabled="item.beAble"></el-input>
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
                            <span v-if="scope.row[item.prop].name==null">
                                {{scope.row[item.prop].short_name}}
                            </span>
                            <span v-else-if="scope.row[item.prop].short_name==null"></span>
                                {{scope.row[item.prop].name}}
                            </span>
                            <span v-else>
                                 {{scope.row[item.prop]}}
                            </span>
                     </span>
                </template>
            </el-table-column>
            <el-table-column label="操作" width="160" align="center">
                <template slot-scope="scope">
                        <span v-if="currentIndex=='index'+scope.$index">
                            <el-button size="mini" @click="editSave(scope.row)">保存</el-button>
                            <el-button size="mini" @click="editCancel">取消
                            </el-button>
                        </span>
                    <span v-else>
                        <span v-if="doChange">
                             <el-button size="mini" @click="edit(scope.$index)">编辑</el-button>
                        </span>
                        <el-button size="mini" type="danger" @click="del(scope.row,$event)">删除
                    </el-button>
                        </span>
                </template>
            </el-table-column>
        </el-table>
    </div>
</template>
<script>
  export default {
    props: ['loading', 'tableHead', 'listData', 'currentIndex', 'selects','doChange','height'],
    data() {
      return {
        checkboxInit: false,
        tabData: this.listData
      }
    },
    watch: {
      listData: function (newValue) {
        this.tabData = newValue;
      }
    },
    computed: {
      newArr: {
        get: function () {
          return this.$store.state.LightTable.newArr
        },
        set: function () {
        }
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
      edit(index) {
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
        this.$emit('rowClick', row);
      }
    },
    mounted() {}
  }
</script>
