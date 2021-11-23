<template>
  <auth-component
    :title="$t('system.auth.register')"
    darkImage="img/create-account-office-dark.jpeg"
    ligthImage="img/create-account-office.jpeg"
  >
    <form @submit.prevent="register">
      <label class="block text-sm">
        <span class="text-gray-700 dark:text-gray-400">{{$t('validation.attributes.name')}}</span>
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
          placeholder="Caterina Roob"
          type="text"
          v-model="form.name"
        />
        <span v-if="form.errors.name" class="text-xs text-red-600 dark:text-red-400">
          {{ form.errors.name }}
        </span>
      </label>
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
      <label class="block mt-4 text-sm">
        <span class="text-gray-700 dark:text-gray-400">{{$t('validation.attributes.password_confirmation')}}</span>
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
          v-model="form.password_confirmation"
        />
      </label>

      <div class="flex mt-6 text-sm">
        <label class="flex items-center dark:text-gray-400">
          <input
            type="checkbox"
            class="
              text-purple-600
              form-checkbox
              focus:border-purple-400
              focus:outline-none
              focus:shadow-outline-purple
              dark:focus:shadow-outline-gray
            "
            v-model="form.agree"
          />
          <span class="ml-2 mr-2">
            {{$t('system.auth.agree')}}
            <Link href="/" class="underline">{{$t('system.auth.privacy')}}</Link>
          </span>
        </label>
      </div>

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
        {{$t('system.auth.register')}}
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
          href="/login"
        >
          {{$t('system.auth.have_account')}}
        </Link>
      </p>
    </form>
  </auth-component>
</template>

<script>
import AuthComponent from "../../components/AuthComponent.vue";
import { Link } from "@inertiajs/inertia-vue";
export default {
    data(){
        return {
            form: this.$inertia.form({
                name:null,
                email: null,
                password: null,
                password_confirmation: null,
                agree: null,
            })
        }
    },
  components: { AuthComponent, Link },
  methods: {
    register() {
        this.form.post('register');
    },
  },
};
</script>

<style>
</style>