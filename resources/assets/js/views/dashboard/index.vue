<template>
    <div>
        <div class="dashboard-container">
            <p class="dashboard-text">name:{{name}}</p>
            <p class="dashboard-text">roles:
                <span v-for='role in roles' :key='role'>{{role}}</span>
            </p>
            <el-button @click="toggle">默认按钮</el-button>
            <el-dialog :title="formDialog.title" :visible.sync="formDialog.dialogFormVisible">
                <el-form>
                    <el-form-item v-for="(item,index) in formDialog.form" :key="item.key" :label="item.label"
                                  :label-width="item.formLabelWidth">
                        <span v-if="item.type == 'text'">
                            <el-input v-model="name" auto-complete="off"></el-input>
                        </span>
                        <span v-else-if="item.type=='select'">
                            <el-select v-model="item.ps">
                                <el-option v-for="list in item.status" :key="list.key" :label="list.label" :value="list.value"></el-option>
                            </el-select>
                        </span>
                    </el-form-item>
                </el-form>
                <div slot="footer" class="dialog-footer">
                    <el-button @click="cancelAdd">取 消</el-button>
                    <el-button type="primary" @click="confirmAdd">确 定</el-button>
                </div>
            </el-dialog>
        </div>
    </div>
</template>

<script>
  import {mapGetters} from 'vuex'

  export default {
    name: 'dashboard',
    data() {
      return {
        newOpt: [],
        title: '新增',
        formDialog: {
          title: '测试',
          dialogFormVisible: false,
          form: [
            {
              label: '名称',
              type:'text',
              formLabelWidth: '120px',
              name:'hh'
            },
            {
              label: '代码',
              type:'text',
              formLabelWidth: '120px',
              name: 'vv'
            },
            {
              label: '状态',
              type:'select',
              formLabelWidth: '120px',
              ps:{
                s: '1',
              },
              status:[
                {
                  label:'是',
                  value: 1
                },
                {
                  label: '否',
                  value: 0
                }
              ],
            },
           ],
        },
      }
    },
    computed: {
      ...mapGetters([
        'name',
        'roles'
      ]),
      getKey(){
        let arr = this.formDialog.form.ps;

      }
    },
    components: {
      // addM
    },
    methods: {
      toggle() {
        this.formDialog.dialogFormVisible = !this.formDialog.dialogFormVisible;
      },
      confirmAdd() {
        console.log(1);
      },
      cancelAdd() {
        console.log(2);
      }

    },
    mounted() {
      this.$store.state.opt.opts = this.newOpt;
    }
  }
</script>

<style rel="stylesheet/scss" lang="scss" scoped>
    .dashboard {
        &-container {
            margin: 30px;
        }
        &-text {
            font-size: 30px;
            line-height: 46px;
        }
    }
</style>
