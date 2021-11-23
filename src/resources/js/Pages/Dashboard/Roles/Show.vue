<template>
  <dashboard-component>
    <form>
      <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        {{ $t("system.dashboard.show") }} {{ $t("system.role.role") }}
      </h2>
      <div
        class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
      >
        <label class="block text-sm mb-4">
          <span class="text-gray-700 dark:text-gray-400">{{
            $t("system.dashboard.role")
          }}</span>
          <input
            class="
              block
              w-full
              mt-1
              text-sm
              dark:border-gray-600 dark:bg-gray-700
              focus:border-purple-400
              focus:outline-none
              focus:shadow-outline-purple
              dark:text-gray-300 dark:focus:shadow-outline-gray
              form-input
            "
            type="text"
            :value="role.name"
            disabled="disabled"
          />
        </label>
        <label class="block text-sm mb-4">
          <span class="text-gray-700 dark:text-gray-400">{{
            $t("system.dashboard.permissions")
          }}</span>
          <select
            class="
              block
              w-full
              mt-1
              text-sm
              dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700
              form-multiselect
              focus:border-purple-400
              focus:outline-none
              focus:shadow-outline-purple
              dark:focus:shadow-outline-gray
            "
            multiple=""
            :value="rolePermissions"
            disabled="disabled"
          >
            <option v-for="permission in permissions" :key="permission.id" :value="permission.name">{{permission.name}}</option>
          </select>
        </label>
      </div>
    </form>
  </dashboard-component>
</template>

<script>
import DashboardComponent from "../../../components/Dashboard/DashboardComponent.vue";
export default {
  props: {
    permissions: Array,
    role: Object,
    rolePermissions: Array,
  },
  components: { DashboardComponent },
};
</script>

<style>
</style>