<template>
  <div class="dashboard-container">
    <div class="dashboard-text">name:{{name}}</div>
    <div class="dashboard-text">roles:<span v-for='role in roles' :key='role'>{{role}}</span></div>
    <div>
      <!--{{this.$store.state.user.token}}-->
      <!--{{this.$store.state.app.appMainHeight}}-->
      <template>
       <!-- <egrid border
               max-height="500"
               column-type="selection"
               :data="data"
               :columns="columns"
               :columns-schema="columnsSchema"
               :columns-props="columnsProps"
               :columns-handler="columnsHandler"
               @selection-change="selectionChange">
        </egrid>-->
      </template>
    </div>
  </div>
</template>

<script>
import { mapGetters } from 'vuex'

export default {
  name: 'dashboard',
    data(){
      return {
          newOpt: []
      }
    },
  computed: {
    ...mapGetters([
      'name',
      'roles'
    ])
  },
    mounted(){
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
