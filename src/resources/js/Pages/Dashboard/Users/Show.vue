<template>
  <dashboard-component>
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
      {{ $t("system.dashboard.show") }} {{ $t("system.user.user") }}
    </h2>
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
      <label class="block text-sm mb-4">
        <span class="text-gray-700 dark:text-gray-400">{{
          $t("validation.attributes.name")
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
          disabled="disabled"
          placeholder="Jane Doe"
          type="text"
          :value="user.name"
        />
      </label>
      <label class="block text-sm mb-4">
        <span class="text-gray-700 dark:text-gray-400">{{
          $t("validation.attributes.email")
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
          placeholder="example@example.com"
          type="email"
          :value="user.email"
          disabled="disabled"
        />
      </label>
      <Link
          class="
            w-full
            px-5
            py-3
            text-sm
            font-medium
            leading-5
            text-white
            transition-colors
            duration-150
            bg-purple-600
            border border-transparent
            rounded-lg
            sm:w-auto sm:px-4 sm:py-2
            active:bg-purple-600
            hover:bg-purple-700
            focus:outline-none focus:shadow-outline-purple
          "
          href="/users"
        >
          {{$t("system.dashboard.back") }}
        </Link>
    </div>
  </dashboard-component>
</template>

<script>
import DashboardComponent from "../../../components/Dashboard/DashboardComponent.vue";
import ModalComponent from "../../../components/Dashboard/ModalComponent.vue";
import {Link} from "@inertiajs/inertia-vue";
export default {
  props: {
    user: Object,
  },
  components: { DashboardComponent, ModalComponent, Link },
};
</script>

<style>
</style>