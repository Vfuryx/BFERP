<template>
    <div>
        <v-tabs :table-key="tableKey" :url="url" @edit="edit" ref="tabs" :title="title" :rule-form="ruleForm" :rules="rules" :add-arr="addArr"></v-tabs>
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
            ent: this.doDelMore
          },
          {
            cnt: '刷新',
            icon: 'bf-refresh',
            ent: this.refresh
          }
        ],
        tableKey:[
          [
            {
              label: '仓库名称',
              width: '180',
              prop: "name",
              holder: '请输入标记名称',
              type: 'text'
            },
            {
              label: '仓库地址',
              width: '260',
              prop: "address",
              holder: '请输入仓库地址',
              type: 'text',
              lists:'more_prop'
            },
            {
              label: '是否默认仓库',
              width: '160',
              prop: "is_default",
              holder: '描述',
              type: 'select_def'
            },
            {
              label: '是否可用',
              width: '160',
              prop: "status",
              holder: '状态',
              type: 'select_stu',
              doSort: true
            }
          ]
        ],
        url:['/warehouses'],
        title: ['新建仓库'],
        ruleForm: [{
          name: '',
          province:'',
          city:'',
          district:'',
          address: '',
          is_default: '0',
          status: '1'
        }],
        rules: [{
          name: [
            {required: true, message: '请输入仓库名称', trigger: 'blur'},
          ],
          province: [
            {required: true, message: '请输入仓库地址(省)', trigger: 'blur'},
          ],
           city: [
            {required: true, message: '请输入仓库地址(市)', trigger: 'blur'},
          ],
          district: [
            {required: true, message: '请输入仓库地址(区)', trigger: 'blur'},
          ],
          address: [
            {required: true, message: '请输入仓库地址(县)', trigger: 'blur'},
          ],

        }],
        addArr:[[
          {
            label:'仓库名称',
            prop:'name',
            holder:'请输入仓库名称',
            type: 'text'
          },
          {
            label:'地址(省)',
            prop:'province',
            holder:'请输入仓库地址(省)',
            type: 'text'
          },
          {
            label:'地址(市)',
            prop:'city',
            holder:'请输入仓库地址(市)',
            type: 'text'
          },
          {
            label:'地址(区)',
            prop:'district',
            holder:'请输入仓库地址(区)',
            type: 'text'
          },
          {
            label:'地址(县)',
            prop:'address',
            holder:'请输入县及以下地址',
            type: 'text'
          },
          {
            label:'是否默认',
            prop:'is_default',
            holder:'请选择是否默认',
            type: 'select_def'
          },
          {
            label:'是否可用',
            prop:'status',
            holder:'请选择是否可用',
            type: 'select_stu'
          }
        ]]
      }
    },
    methods:{
      addNew(){
        this.$store.dispatch('setShowAdd',true);
      },
      edit(row){
        let obj = {
          id: row.id,
          name: row.name,
          province: row.province,
          city: row.city,
          district: row.district,
          address: row.address,
          is_default: row.is_default,
          status: row.status
        };
        this.$store.dispatch('setRow',row);
        this.$store.dispatch('setUrl',this.url[0]+"/");
        this.$store.dispatch('doEdit',obj);
      },
      doDelMore(){
        this.$refs.tabs.$emit('delMore')
      },
      refresh(){
        this.$store.dispatch('refresh');
      }
    },
    mounted() {
      this.$store.dispatch('setTabs',false);
      this.$store.dispatch('setOpt',this.newOpt);
      let that = this;
      $(window).resize(() => {
        that.$store.dispatch('setOpt',that.newOpt);
      });
    }
  }
</script>