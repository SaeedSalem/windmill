<template>
  <dashboard-component>
    <general />
  </dashboard-component>
</template>

<script>
import DashboardComponent from "../../../components/Dashboard/DashboardComponent.vue";
import General from "./General.vue";
export default {
  components: {
    DashboardComponent,
    General,
  },
  props: {},
};
</script>

<style>
</style>