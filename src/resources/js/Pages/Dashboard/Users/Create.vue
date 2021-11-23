<template>
  <dashboard-component>
    <form @submit.prevent="createUser">
      <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        {{ $t("system.dashboard.create") }} {{ $t("system.user.user") }}
      </h2>
      <div
        class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
      >
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
            placeholder="Jane Doe"
            type="text"
            v-model="form.name"
          />
          <span
            v-if="form.errors.name"
            class="text-xs text-red-600 dark:text-red-400"
          >
            {{ form.errors.name }}
          </span>
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
            v-model="form.email"
          />
          <span
            v-if="form.errors.email"
            class="text-xs text-red-600 dark:text-red-400"
          >
            {{ form.errors.email }}
          </span>
        </label>
        <label class="block text-sm mb-4">
          <span class="text-gray-700 dark:text-gray-400">{{
            $t("validation.attributes.password")
          }}</span>
          <div class="relative text-gray-500 focus-within:text-purple-600">
            <input
              :class="[
                $store.getters.dir == 'ltr' ? 'pr-20' : 'pl-20',
                'block w-full mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input',
              ]"
              placeholder="****************"
              type="password"
              v-model="form.password"
            />
            <button
              :class="[
                $store.getters.dir == 'ltr'
                  ? 'right-0 rounded-r-md'
                  : 'left-0 rounded-l-md',
                'absolute inset-y-0 px-4 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple',
              ]"
              @click="generatePassword"
              type="button"
            >
              {{ $t("system.dashboard.generate") }}
              {{ $t("validation.attributes.password") }}
            </button>
          </div>
          <span
            v-if="form.errors.email"
            class="text-xs text-red-600 dark:text-red-400"
          >
            {{ form.errors.password }}
          </span>
        </label>
        <label class="block text-sm mb-4">
          <span class="text-gray-700 dark:text-gray-400">{{
            $t("validation.attributes.password_confirmation")
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
            placeholder="****************"
            type="password"
            v-model="form.password_confirmation"
          />
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
          {{ $t("system.dashboard.create") }}
        </button>
      </div>
    </form>
    <modal-component
      @closeModal="closeModal"
      v-if="showModal"
      @close="showModal = false"
    >
      <div slot="header">
        <h3>
          {{ $t("system.dashboard.generate") }}
          {{ $t("validation.attributes.password") }}
        </h3>
      </div>
      <div slot="body">
        <label class="block text-sm mb-4">
          <span class="text-gray-700 dark:text-gray-400">{{
            $t("validation.attributes.password")
          }}</span>
          <div class="relative text-gray-500 focus-within:text-purple-600">
            <input
              :class="[
                $store.getters.dir == 'ltr' ? 'pr-20' : 'pl-20',
                'block w-full mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input',
              ]"
              type="text"
              v-model="randomPassword"
            />
            <button
              :class="[
                $store.getters.dir == 'ltr'
                  ? 'right-0 rounded-r-md'
                  : 'left-0 rounded-l-md',
                'absolute inset-y-0 px-4 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple',
              ]"
              @click="generatePassword"
              type="button"
            >
              {{ $t("system.dashboard.generate") }}
              {{ $t("validation.attributes.password") }}
            </button>
          </div>
          <span
            class="text-xs"
          >
            {{$t('system.dashboard.copy_password') }}
          </span>
        </label>
      </div>
      <div slot="footer">
        <button
          @click="closeModal"
          class="
            w-full
            px-5
            py-3
            text-sm
            font-medium
            leading-5
            text-white text-gray-700
            transition-colors
            duration-150
            border border-gray-300
            rounded-lg
            dark:text-gray-400
            sm:px-4 sm:py-2 sm:w-auto
            active:bg-transparent
            hover:border-gray-500
            focus:border-gray-500
            active:text-gray-500
            focus:outline-none focus:shadow-outline-gray
          "
        >
          {{$t('system.dashboard.cancel')}}
        </button>
        <button
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
          @click="usePassword"
        >
          {{$t("system.dashboard.use_it") }}
        </button>
      </div>
    </modal-component>
  </dashboard-component>
</template>

<script>
import DashboardComponent from "../../../components/Dashboard/DashboardComponent.vue";
import ModalComponent from "../../../components/Dashboard/ModalComponent.vue";
export default {
  data() {
    return {
      form: this.$inertia.form({
        name: null,
        email: null,
        password: null,
        password_confirmation: null,
      }),
      showModal: false,
      randomPassword: "",
    };
  },
  components: { DashboardComponent, ModalComponent },
  methods: {
    createUser() {
      this.form.post("/users");
    },
    closeModal() {
      this.showModal = false;
    },
    generatePassword() {
      this.randomPassword = '';
      for (var index = 0; index < 11; index++) {
        var upperCase = Math.floor(Math.random() * 2);
        if (upperCase == 0) {
          this.randomPassword += Math.random().toString(36).substring(2, 3);
        } else {
          this.randomPassword += Math.random()
            .toString(36)
            .substring(2, 3)
            .toUpperCase();
        }
      }
      this.showModal = true;
    },
    usePassword(){
      this.form.password = this.randomPassword;
      this.form.password_confirmation = this.randomPassword;
      this.showModal = false;
    }
  },
};
</script>

<style>
</style>