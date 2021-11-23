<template>
  <auth-component
    :title="$t('system.auth.login')"
    darkImage="img/login-office-dark.jpeg"
    ligthImage="img/login-office.jpeg"
  >
    <form @submit.prevent="login">
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
          type="email"
          v-model="form.email"
        />
        <span v-if="form.errors.email" class="text-xs text-red-600 dark:text-red-400">
          {{ form.errors.email }}
        </span>
      </label>
      <label class="block mt-4 text-sm">
        <span class="text-gray-700 dark:text-gray-400">{{$t('validation.attributes.password')}}</span>
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
          placeholder="***************"
          type="password"
          v-model="form.password"
        />
        <span v-if="form.errors.password" class="text-xs text-red-600 dark:text-red-400">
          {{ form.errors.password }}
        </span>
      </label>

      <!-- You should use a button here, as the anchor is only used for the example  -->
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
        {{$t('system.auth.login')}}
      </button>

      <hr class="my-8" />

      <p class="mt-4">
        <Link
          class="
            text-sm
            font-medium
            text-purple-600
            dark:text-purple-400
            hover:underline
          "
          href="/password/reset"
        >
          {{$t('system.auth.forgot')}}
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
    </form>
  </auth-component>
</template>

<script>
import AuthComponent from "../../components/AuthComponent";
import { Link } from "@inertiajs/inertia-vue";
export default {
  data(){
    return {
      form: this.$inertia.form({
        email: null,
        password: null,
      })
    }
  },
  components: {
    AuthComponent,
    Link,
  },
  methods: {
    login(){
      this.form.post('/login');
    }
  }
};
</script>

<style>
.dark-form {
  background-color: rgba(26, 28, 35, var(--bg-opacity));
}
</style>