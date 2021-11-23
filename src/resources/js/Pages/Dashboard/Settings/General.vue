<template>
  <form @submit.prevent="saveGeneralSettings">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
      {{ $t("system.dashboard.settings") }}
    </h2>
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
      <label class="block text-sm mb-4">
        <span class="text-gray-700 dark:text-gray-400">{{
          $t("system.system.application_name")
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
          v-model="form.appName"
          type="text"
        />
      </label>
      <label class="block text-sm mb-4">
        <span class="text-gray-700 dark:text-gray-400">{{
          $t("system.system.language")
        }}</span>
        <select
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
          v-model="form.language"
        >
          <option value="ar">{{ $t("system.system.arabic") }}</option>
          <option value="en">{{ $t("system.system.english") }}</option>
        </select>
      </label>
      <label class="block text-sm mb-4">
        <span class="text-gray-700 dark:text-gray-400">{{
          $t("system.system.style")
        }}</span>
        <select
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
          v-model="form.style"
        >
          <option value="auto">{{ $t("system.system.auto") }}</option>
          <option value="dark">{{ $t("system.system.dark") }}</option>
          <option value="light">{{ $t("system.system.light") }}</option>
        </select>
      </label>
      <button
        class="
          mt-4
          px-4
          py-2
          text-sm
          font-medium
          leading-5
          text-white
          transition-colors
          duration-150
          bg-purple-600
          border border-transparent
          rounded-lg
          active:bg-purple-600
          hover:bg-purple-700
          focus:outline-none focus:shadow-outline-purple
        "
        type="submit"
      >
        {{ $t("system.dashboard.edit") }}
      </button>
    </div>
  </form>
</template>

<script>
import { Inertia } from "@inertiajs/inertia";
export default {
  data() {
    return {
      form: this.$inertia.form({
        appName: this.$page.props.appName,
        language: this.$page.props.language,
        style: this.$page.props.style,
      }),
    };
  },
  methods: {
    saveGeneralSettings() {
      this.form.post("/settings/general");
    },
  },
};
</script>

<style>
</style>