<template>
    <div>
        <el-tabs v-model="activeName" @tab-click="handleClick">
            <el-tab-pane label="物流公司" name="first">
                <light-table :light-key="lightKey" :loading="loading" @del-list="delList"></light-table>
            </el-tab-pane>
            <el-tab-pane label="物流城市" name="second">
                <light-table :light-key="logisticCity" :loading="loading"></light-table>
            </el-tab-pane>
            <el-tab-pane label="损坏商品" name="third">
                <light-table :light-key="damageGoods" :loading="loading"></light-table>
            </el-tab-pane>
        </el-tabs>
<!--
        &lt;!&ndash;删除&ndash;&gt;
        <del-mask :del-id="newId" :del-url="url"></del-mask>

        &lt;!&ndash;新增&ndash;&gt;
        <add-mask :showMask="showAdd" :title="title[0]" :rule-form="ruleForm[0]" :rules="rules[0]" :add-arr="addArr[0]"
                  :url="url"></add-mask>

        &lt;!&ndash;批量删除&ndash;&gt;
        <message-box></message-box>-->
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
            cnt: '删除',
            icon: 'bf-del',
            ent: this.delMore
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
            cnt: '同步',
            icon: 'bf-sync',
            ent: this.test
          },
          {
            cnt: '刷新',
            icon: 'bf-refresh',
            ent: this.test
          }
        ],
        activeName: 'first',
        lightKey: [
          {
            label: '物流代码',
            width: '180',
            prop: "code",
            holder: '请输入物流代码',
            type: 'text'
          },
          {
            label: '物流名称',
            width: '180',
            prop: "name",
            holder: '请输入物流名称',
            type: 'text'
          },
          {
            label: '报表格式',
            width: '220',
            prop: 'report',
            innerProp: ['paper_format'],
            holder: '请输入报表格式',
            type: 'text'
          },
          {
            label: '物流区域',
            width: '300',
            prop: "logistics_area",
            innerProp: ['code', 'name'],
            holder: '请输入区域',
            type: 'text'
          },
          {
            label: '预计到达天数',
            width: '260',
            prop: "expected_days",
            holder: '请输入天数',
            type: 'text'
          },
          {
            label: '发货订单数',
            width: '250',
            prop: "expected_days",
            holder: '请输入天数',
            type: 'text'
          },
          {
            label: '物流损坏货物次数',
            width: '280',
            prop: "expected_days",
            holder: '请输入天数',
            type: 'text'
          },
          {
            label: '运费类型',
            width: '250',
            prop: "freight_type",
            innerProp: 'name',
            holder: '请输入运费类型',
            type: 'text'
          },
          {
            label: '物流电话',
            width: '250',
            prop: "phone",
            holder: '请输入天数',
            type: 'text'
          },
          {
            label: '物流地址',
            width: '260',
            prop: "address",
            holder: '请输入天数',
            type: 'text'
          },
          {
            label: '备注',
            width: '200',
            prop: "remark",
            holder: '请输入天数',
            type: 'text'
          },
          {
            label: '创建时间',
            width: '200',
            prop: "created_at",
            holder: '请输入天数',
            type: 'text'
          },
          {
            label: '是否启用',
            width: '180',
            prop: "status",
            holder: '请输入天数',
            type: 'text'
          },
        ],
        newLogistic: [],
        logisticCity: [
          {
            label: '省',
            width: '180',
            prop: "code",
            holder: '请输入物流代码',
            type: 'text'
          },
          {
            label: '市',
            width: '180',
            prop: "code",
            holder: '请输入物流代码',
            type: 'text'
          },
          {
            label: '区',
            width: '180',
            prop: "code",
            holder: '请输入物流代码',
            type: 'text'
          },
          {
            label: '提货地址',
            width: '180',
            prop: "code",
            holder: '请输入物流代码',
            type: 'text'
          },
          {
            label: '提货电话',
            width: '180',
            prop: "code",
            holder: '请输入物流代码',
            type: 'text'
          },
          {
            label: '物流费用',
            width: '180',
            prop: "code",
            holder: '请输入物流代码',
            type: 'text'
          },
          {
            label: '重量单价',
            width: '180',
            prop: "code",
            holder: '请输入物流代码',
            type: 'text'
          },
          {
            label: '城市到达天数',
            width: '180',
            prop: "code",
            holder: '请输入物流代码',
            type: 'text'
          },
          {
            label: '中转或直达',
            width: '180',
            prop: "code",
            holder: '请输入物流代码',
            type: 'text'
          },
          {
            label: '包邮',
            width: '180',
            prop: "code",
            holder: '请输入物流代码',
            type: 'text'
          },
          {
            label: '备注',
            width: '180',
            prop: "code",
            holder: '请输入物流代码',
            type: 'text'
          },

        ],
        damageGoods: [
          {
            label: '系统单号',
            width: '180',
            prop: "code",
            holder: '请输入物流代码',
            type: 'text'
          },
          {
            label: '商品编码',
            width: '180',
            prop: "code",
            holder: '请输入物流代码',
            type: 'text'
          },
          {
            label: '规格编码',
            width: '180',
            prop: "code",
            holder: '请输入物流代码',
            type: 'text'
          },
          {
            label: '商品名称',
            width: '180',
            prop: "code",
            holder: '请输入物流代码',
            type: 'text'
          },
          {
            label: '规格名称',
            width: '180',
            prop: "code",
            holder: '请输入物流代码',
            type: 'text'
          },
          {
            label: '损坏数量',
            width: '180',
            prop: "code",
            holder: '请输入物流代码',
            type: 'text'
          },
          {
            label: '损坏金额',
            width: '180',
            prop: "code",
            holder: '请输入物流代码',
            type: 'text'
          },
          {
            label: '损坏来源',
            width: '180',
            prop: "code",
            holder: '请输入物流代码',
            type: 'text'
          },
          {
            label: '备注',
            width: '180',
            prop: "code",
            holder: '请输入物流代码',
            type: 'text'
          },
          {
            label: '创建人',
            width: '180',
            prop: "code",
            holder: '请输入物流代码',
            type: 'text'
          },
          {
            label: '创建时间',
            width: '180',
            prop: "code",
            holder: '请输入物流代码',
            type: 'text'
          }
        ],
        loading: true,
        newId: '',
        url: '/logistics',
        showAdd: false,
        title: ['新增物流公司', '新增城市信息','添加损坏商品'],
        ruleForm: [
          {
            code: '',
            name: '',
            report_id: '',
            logistics_area_id: '',
            expected_days: '',
            phone: '',
            address: '',
            freight_type_id: '',
            remark: '',
            status: '1'
          },
          {
            code: '',
            name: '',
          }
        ],
        rules: [{
          code: [
            {required: true, message: '请输入物流代码', trigger: 'blur'},
          ],
          name: [
            {required: true, message: '请输入物流名称', trigger: 'blur'},
          ],
          report_id: [
            {required: true, message: '请输入报表格式', trigger: 'blur'}
          ],
          expected_days: [
            {required: true, message: '请输入预计天数', trigger: 'blur'}
          ],
        }],
        addArr:[[
          {
            label:'物流代码',
            prop:'code',
            holder:'请输入物流代码',
            type: 'text'
          },
          {
            label:'物流名称',
            prop:'name',
            holder:'请输入物流名称',
            type: 'text'
          },
          {
            label:'报表格式',
            prop:'report_id',
            holder:'请输入报表格式',
            type: 'text',
          },
          {
            label:'物流区域',
            prop:'logistics_area_id',
            holder:'请选择状态',
            type: 'text'
          },
          {
            label:'预计天数',
            prop:'expected_days',
            holder:'请输入预计天数',
            type: 'text'
          },
          {
            label:'物流电话',
            prop:'phone',
            holder:'请输入物流电话',
            type: 'text'
          },
          {
            label:'物流地址',
            prop:'address',
            holder:'请输入物流地址',
            type: 'text'
          },
          {
            label:'运费类型',
            prop:'freight_type_id',
            holder:'请输入运费类型',
            type: 'text'
          },
          {
            label:'备注',
            prop:'remark',
            holder:'请输入备注',
            type: 'textarea'
          },
          {
            label:'是否启用',
            prop:'status',
            holder:'请选择是否启用',
            type: 'select_def'
          },

        ]],
      }
    },
    computed:{
      delArr:{
        get: function(){
          return this.$store.state.LightTable.delArr
        },
        set:function(){}
      }
    },
    methods: {
      test() {
        console.log(1);
      },
      //获取
      getAllData(url) {
        this.$fetch(url).then((res) => {
          console.log(res);
          this.$store.dispatch('setArr', res.data);
          this.loading = false;
          /*let pg = res.meta.pagination;
            this.pagination.current_page = pg.current_page;
            this.pagination.total = pg.total;
            this.pagination.per_page = pg.per_page;*/
        }, (err) => {
          this.$message.error({
            message: err.message
          });
        });
      },
      //删除
      delList(info) {
        console.log(info);
        console.log(info[0].index);
        this.$store.dispatch('setShow', true);
        $('.el-popper').css({left: info[1].x - 100 + 'px', top: info[2].y - 125 + 'px'});
        this.newId = "/" + info[0].index;
      },
      //新增
      addNew() {
        this.$store.dispatch('setShowAdd', true);
      },
      //批量删除
      delMore() {
        this.$store.dispatch('setUrl', this.url);
        this.$store.dispatch('setDelArr', this.delArr);
        this.$store.dispatch('delMore')
          .then(() => {
            this.getData();
          });
      },

      handleClick(tab,event) {
        if (tab.name == 'first') {
          this.getAllData(this.url[0]);
          this.url = '/logistics';
        } else if (tab.name == 'second') {
          this.getAllData(this.url[1]);
          this.url = '/logistics';
        }else{
          this.getAllData(this.url[2]);
          this.url = '/damagedgoods';
        }
      }
    },
    mounted() {
      this.getAllData('/logistics');
      this.$store.dispatch('setOpt', this.newOpt);
      let that = this;
      $(window).resize(() => {
        that.$store.dispatch('setOpt', that.newOpt);
      });
    }
  }
</script>
<!--<template>
    <div>
        <v-tabs :info-tabs="infoTabs" :table-key="tableKey" :url="url" @edit_0="edit0" @edit_1="edit1" ref="tabs" :title="title" :rule-form="ruleForm" :rules="rules" :add-arr="addArr"></v-tabs>
    </div>
</template>
<script>
    export default{
      data(){
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
              cnt: '同步',
              icon: 'bf-sync',
              ent: this.test
            },
            {
              cnt: '刷新',
              icon: 'bf-refresh',
              ent: this.test
            }
          ],
          infoTabs: [
            {
              title: '物流公司',
              name: '0',
            },
            {
              title: '物流城市',
              name: '1',
            },
            {
              title: '损坏商品',
              name: '2',
            }
          ],
          tableKey:[
            [
              {
              label: '物流代码',
              width: '180',
              prop: "code",
              holder: '请输入物流代码',
              type: 'text'
            },
            {
              label: '物流名称',
              width: '180',
              prop: "name",
              holder: '请输入物流名称',
              type: 'text'
            },
            {
              label: '报表格式',
              width: '220',
              prop: 'report',
              innerProp: ['paper_format'],
              holder: '请输入报表格式',
              type: 'text'
            },
            {
              label: '物流区域',
              width: '300',
              prop: "logistics_area",
              innerProp: ['code', 'name'],
              holder: '请输入区域',
              type: 'text'
            },
            {
              label: '预计到达天数',
              width: '260',
              prop: "expected_days",
              holder: '请输入天数',
              type: 'text'
            },
            {
              label: '发货订单数',
              width: '250',
              prop: "expected_days",
              holder: '请输入天数',
              type: 'text'
            },
            {
              label: '物流损坏货物次数',
              width: '280',
              prop: "expected_days",
              holder: '请输入天数',
              type: 'text'
            },
            {
              label: '运费类型',
              width: '250',
              prop: "freight_type",
              innerProp: 'name',
              holder: '请输入运费类型',
              type: 'text'
            },
            {
              label: '物流电话',
              width: '250',
              prop: "phone",
              holder: '请输入天数',
              type: 'text'
            },
            {
              label: '物流地址',
              width: '260',
              prop: "address",
              holder: '请输入天数',
              type: 'text'
            },
            {
              label: '备注',
              width: '200',
              prop: "remark",
              holder: '请输入天数',
              type: 'text'
            },
            {
              label: '创建时间',
              width: '200',
              prop: "created_at",
              holder: '请输入天数',
              type: 'text'
            },
            {
              label: '是否启用',
              width: '180',
              prop: "status",
              holder: '请输入天数',
              type: 'text'
            }
        ],
            [
              {
                label: '省',
                width: '180',
                prop: "code",
                holder: '请输入物流代码',
                type: 'text'
              },
              {
                label: '市',
                width: '180',
                prop: "code",
                holder: '请输入物流代码',
                type: 'text'
              },
              {
                label: '区',
                width: '180',
                prop: "code",
                holder: '请输入物流代码',
                type: 'text'
              },
              {
                label: '提货地址',
                width: '180',
                prop: "code",
                holder: '请输入物流代码',
                type: 'text'
              },
              {
                label: '提货电话',
                width: '180',
                prop: "code",
                holder: '请输入物流代码',
                type: 'text'
              },
              {
                label: '物流费用',
                width: '180',
                prop: "code",
                holder: '请输入物流代码',
                type: 'text'
              },
              {
                label: '重量单价',
                width: '180',
                prop: "code",
                holder: '请输入物流代码',
                type: 'text'
              },
              {
                label: '城市到达天数',
                width: '180',
                prop: "code",
                holder: '请输入物流代码',
                type: 'text'
              },
              {
                label: '中转或直达',
                width: '180',
                prop: "code",
                holder: '请输入物流代码',
                type: 'text'
              },
              {
                label: '包邮',
                width: '180',
                prop: "code",
                holder: '请输入物流代码',
                type: 'text'
              },
              {
                label: '备注',
                width: '180',
                prop: "code",
                holder: '请输入物流代码',
                type: 'text'
              },
            ],
            [
              {
                label: '系统单号',
                width: '180',
                prop: "code",
                holder: '请输入物流代码',
                type: 'text'
              },
              {
                label: '商品编码',
                width: '180',
                prop: "code",
                holder: '请输入物流代码',
                type: 'text'
              },
              {
                label: '规格编码',
                width: '180',
                prop: "code",
                holder: '请输入物流代码',
                type: 'text'
              },
              {
                label: '商品名称',
                width: '180',
                prop: "code",
                holder: '请输入物流代码',
                type: 'text'
              },
              {
                label: '规格名称',
                width: '180',
                prop: "code",
                holder: '请输入物流代码',
                type: 'text'
              },
              {
                label: '损坏数量',
                width: '180',
                prop: "code",
                holder: '请输入物流代码',
                type: 'text'
              },
              {
                label: '损坏金额',
                width: '180',
                prop: "code",
                holder: '请输入物流代码',
                type: 'text'
              },
              {
                label: '损坏来源',
                width: '180',
                prop: "code",
                holder: '请输入物流代码',
                type: 'text'
              },
              {
                label: '备注',
                width: '180',
                prop: "code",
                holder: '请输入物流代码',
                type: 'text'
              },
              {
                label: '创建人',
                width: '180',
                prop: "code",
                holder: '请输入物流代码',
                type: 'text'
              },
              {
                label: '创建时间',
                width: '180',
                prop: "code",
                holder: '请输入物流代码',
                type: 'text'
              }
            ],
          ],
          url:['/logistics','/logistics','/acctypes'],
          title:['新增物流公司','新增城市信息','添加损坏商品'],
          ruleForm:[
            {
              code: '',
              name: '',
              report_id: '',
              logistics_area_id: '',
              expected_days: '',
              phone: '',
              address: '',
              freight_type_id: '',
              remark: '',
              status: '1'
            },
            {
              name: '',
              status: '1'
            },
            {}
          ],
          rules:[
            {
              code: [
                {required: true, message: '请输入物流代码', trigger: 'blur'},
              ],
              name: [
                {required: true, message: '请输入物流名称', trigger: 'blur'},
              ],
              report_id: [
                {required: true, message: '请输入报表格式', trigger: 'blur'}
              ],
              expected_days: [
                {required: true, message: '请输入预计天数', trigger: 'blur'}
              ],
            },
            {},
            {}
          ],
          addArr:[
            [
              {
                label:'物流代码',
                prop:'code',
                holder:'请输入物流代码',
                type: 'text'
              },
              {
                label:'物流名称',
                prop:'name',
                holder:'请输入物流名称',
                type: 'text'
              },
              {
                label:'报表格式',
                prop:'report_id',
                holder:'请输入报表格式',
                type: 'text',
              },
              {
                label:'物流区域',
                prop:'logistics_area_id',
                holder:'请选择状态',
                type: 'text'
              },
              {
                label:'预计天数',
                prop:'expected_days',
                holder:'请输入预计天数',
                type: 'text'
              },
              {
                label:'物流电话',
                prop:'phone',
                holder:'请输入物流电话',
                type: 'text'
              },
              {
                label:'物流地址',
                prop:'address',
                holder:'请输入物流地址',
                type: 'text'
              },
              {
                label:'运费类型',
                prop:'freight_type_id',
                holder:'请输入运费类型',
                type: 'text'
              },
              {
                label:'备注',
                prop:'remark',
                holder:'请输入备注',
                type: 'textarea'
              },
              {
                label:'是否启用',
                prop:'status',
                holder:'请选择是否启用',
                type: 'select_def'
              },
            ],
            [
              {
                label:'类型',
                prop:'name',
                holder:'请输入类型',
                type: 'text'
              },
              {
                label:'状态',
                prop:'status',
                holder:'请选择状态',
                type: 'select_stu'
              }
            ],
            []
          ],
        }
      },
      methods:{
        test(){
          console.log(1);
        },
        addNew(){
          this.$store.dispatch('setShowAdd',true);
        },

        doDelMore(){
          this.$refs.tabs.$emit('delMore');
        },

        refresh(){
          this.$store.dispatch('refresh');
        },
        edit0(row){
          let obj = {
            id: row.id,
            markcode: row.markcode,
            markname: row.markname,
            color: row.color,
            description: row.description,
            status: row.status
          };
          this.$store.dispatch('setRow',row);
          this.$store.dispatch('setUrl',this.url[0]+"/");
          this.$store.dispatch('doEdit',obj);
        },

        edit1(row){
          let obj = {
            id: row.id,
            name: row.name,
            status: row.status
          };
          this.$store.dispatch('setRow',row);
          this.$store.dispatch('setUrl',this.url[1]+"/");
          this.$store.dispatch('doEdit',obj);
        },
      },
      mounted(){
        this.$store.dispatch('setTabs',true);
        this.$store.dispatch('setOpt',this.newOpt);
        let that = this;
        $(window).resize(() => {
          that.$store.dispatch('setOpt',that.newOpt);
        });
      }
    }
</script>-->
