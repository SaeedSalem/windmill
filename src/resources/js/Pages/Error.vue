<template>
  <base-component
    :title="title"
    darkImage="/img/error-dark.jpeg"
    ligthImage="/img/error.jpeg"
  >
    <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm welcome-mt">
      {{ description }}
    </div>
    <div v-if="status != 503">
      <p class="mt-1">
        <Link
          href="/home"
          v-if="this.$page.props.user"
          class="
            text-sm
            font-medium
            text-purple-600
            dark:text-purple-400
            hover:underline
          "
          >{{ $t("system.dashboard.dashboard") }}</Link
        >
      </p>
      <p class="mt-1">
        <Link
          href="/login"
          v-if="!this.$page.props.user"
          class="
            text-sm
            font-medium
            text-purple-600
            dark:text-purple-400
            hover:underline
          "
          >{{ $t("system.auth.have_account") }}</Link
        >
      </p>
      <p class="mt-1">
        <Link
          href="/register"
          v-if="!this.$page.props.user"
          class="
            text-sm
            font-medium
            text-purple-600
            dark:text-purple-400
            hover:underline
          "
          >{{ $t("system.auth.create_account") }}</Link
        >
      </p>
    </div>
  </base-component>
</template>

<script>
import BaseComponent from "../components/BaseComponent.vue";
import { Link } from "@inertiajs/inertia-vue";
export default {
  components: { BaseComponent, Link },
  props: {
    status: Number,
  },
  computed: {
    title() {
      return {
        503: this.$t("system.errors.503.title"),
        500: this.$t("system.errors.500.title"),
        404: this.$t("system.errors.404.title"),
        403: this.$t("system.errors.403.title"),
      }[this.status];
    },
    description() {
      return {
        503: this.$t("system.errors.503.description"),
        500: this.$t("system.errors.500.description"),
        404: this.$t("system.errors.404.description"),
        403: this.$t("system.errors.403.description"),
      }[this.status];
    },
  },
};
</script>

<style>
.welcome-mt {
  margin-bottom: 30px;
}
</style>