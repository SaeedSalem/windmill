<template>
  <auth-component
    :title="$t('system.auth.recover_password')"
    darkImage="../img/forgot-password-office-dark.jpeg"
    ligthImage="../img/forgot-password-office.jpeg"
  >
    <form @submit.prevent="resetPassword">
      <label class="block text-sm">
        <span class="text-gray-700 dark:text-gray-400">{{$t('validation.attributes.email')}}</span>
        <input
          class="
            block
            w-full
            mt-1
            text-sm
            dark:border-gray-600
            dark:bg-gray-700
            focus:border-purple-400
            focus:outline-none
            focus:shadow-outline-purple
            dark:text-gray-300
            dark:focus:shadow-outline-gray
            form-input
          "
          placeholder="example@example.com"
          v-model="form.email"
        />
      </label>
      <button
        class="
          block
          w-full
          px-4
          py-2
          mt-4
          text-sm
          font-medium
          leading-5
          text-center text-white
          transition-colors
          duration-150
          bg-purple-600
          border border-transparent
          rounded-lg
          active:bg-purple-600
          hover:bg-purple-700
          focus:outline-none
          focus:shadow-outline-purple
        "
        type="submit"
      >
        {{$t('system.auth.recover_password')}}
      </button>
    </form>
    <p class="mt-4">
      <Link
        class="
          text-sm
          font-medium
          text-purple-600
          dark:text-purple-400
          hover:underline
        "
        href="/login"
      >
        {{$t('system.auth.have_account')}}
      </Link>
    </p>
    <p class="mt-1">
      <Link
        class="
          text-sm
          font-medium
          text-purple-600
          dark:text-purple-400
          hover:underline
        "
        href="/register"
      >
        {{$t('system.auth.create_account')}}
      </Link>
    </p>
  </auth-component>
</template>

<script>
import AuthComponent from "../../../components/AuthComponent";
import { Link } from "@inertiajs/inertia-vue";
export default {
  data() {
    return {
      form: this.$inertia.form({
        email: null,
      }),
    };
  },
  components: { AuthComponent, Link },
  methods: {
    resetPassword() {
      this.form.post('/password/email');
    },
  },
};
</script>

<style>
</style>