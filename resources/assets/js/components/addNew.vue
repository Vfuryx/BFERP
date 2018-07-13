<template>
    <div>
        <el-dialog :title="title" :visible.sync="showAdd" @close="close">
            <el-form :model="ruleForm" :rules="rules" :ref="newRef" label-width="100px" :class="{'half-form':halfForm}">
                <el-form-item v-for="(item,index) in addArr" :key="index" :label="item.label" :prop="item.prop">
                    <span v-if="item.type=='text'">
                       <el-input v-model="ruleForm[item.prop]" :placehold="item.holder" :disabled="item.beAble"></el-input>
                    </span>
                    <span v-if="item.type=='tel'">
                       <el-input type="tel" v-model="ruleForm[item.prop]" :placehold="item.holder" :disabled="item.beAble"></el-input>
                    </span>
                    <span v-if="item.type=='number'">
                       <el-input type="number" v-model="ruleForm[item.prop]" :placehold="item.holder" :disabled="item.beAble"></el-input>
                    </span>
                    <span v-if="item.type=='url'">
                       <el-input type="url" v-model="ruleForm[item.prop]" :placehold="item.holder" :disabled="item.beAble"></el-input>
                    </span>
                    <span v-else-if="item.type=='pickColor'">
                       <el-color-picker v-model="ruleForm[item.prop]"></el-color-picker>
                    </span>
                    <span v-else-if="item.type=='select_stu'">
                        <el-select v-model="ruleForm[item.prop]" :placeholder="item.holder" :disabled="item.beAble">
                        <el-option label="停用" value="0"></el-option>
                        <el-option label="启用" value="1"></el-option>
                    </el-select>
                    </span>
                    <span v-else-if="item.type=='select_def'">
                        <el-select v-model="ruleForm[item.prop]" :placeholder="item.holder" :disabled="item.beAble">
                        <el-option label="否" value="0"></el-option>
                        <el-option label="是" value="1"></el-option>
                    </el-select>
                    </span>
                    <span v-else-if="item.type=='select'">
                           <el-select v-model="ruleForm[item.prop]" :placeholder="item.holder" :disabled="item.beAble">
                               <!--v-if="selects.length>1"-->
                               <span v-for="iList in selects" :key="iList.id">
                                   <span v-if="iList[index]">
                                    <el-option v-for="list in iList[index]" :key="list.id" :label="list.name" :value="list.id"></el-option>
                                       </span>
                               </span>
                              <!-- <span v-else>
                                     <el-option v-for="list in selects" :key="list.id" :label="list.name" :value="list.id"></el-option>
                                   </span>-->
                           </el-select>
                    </span>
                    <span v-else-if="item.type=='textarea'">
                         <el-input type="textarea" v-model="ruleForm[item.prop]" :placehode="item.holder"></el-input>
                    </span>
                    <span v-else-if="item.type=='new_casca'">
                         <el-cascader
                                 :options="options"
                                 v-model="selectedOptions" clearable>
  </el-cascader>
                    </span>
                </el-form-item>
            </el-form>
            <div slot="footer" class="dialog-footer">
                <el-button type="primary" @click="submitForm(newRef,url)">{{this.leftTab?this.leftTab:'添加'}}</el-button>
                <el-button @click="resetForm(newRef)">重置</el-button>
            </div>
        </el-dialog>
    </div>
</template>
<script>
  export default {
    props: ['visibleAdd','title', 'ruleForm', 'rules', 'addArr','submitData','url','newRef','halfForm','selects','leftTab'],
    data() {
      return {
        /*级联*/
        selectedOptions: [],
        options: [
          /*一级*/
          {
            value: 'zhinan',
            label: '指南',
            children: [
              /*二级*/
              {
                value: 'shejiyuanze',
                label: '设计原则',
                children: [
                  /*三级*/
                  {
                    value: 'yizhi',
                    label: '一致'
                  },
                  {
                    value: 'fankui',
                    label: '反馈'
                  }
                ]
              },
            ]
          },
        ],
        showAdd: false
      }
    },
    watch:{
      visibleAdd:function(newValue){
        this.showAdd = newValue
      }
    },
    methods: {
      submitForm(formName) {
        this.$refs[formName].validate((valid) => {
          if (valid) {
            this.$emit('submitEvent');
            // this.resetForm(this.newRef);
          } else {
            console.log('error submit!!');
            return false;
          }
        });
      },
      resetForm(formName) {
        this.$refs[formName].resetFields();
      },
      close(){
        this.$emit('CB-dialog',false)
      }
    },
    mounted(){    }
  }
</script>
<style>

</style>