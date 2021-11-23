<template>
  <div
    :class="{ 'theme-dark': this.$page.props.isDark }"
    :lang="this.$lang.getLocale()"
    :dir="this.$store.getters.dir"
  >
  <Head>
    <title>{{this.$page.props.appName}} - {{ title }}</title>
  </Head>
    <div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
      <div
        class="
          flex-1
          h-full
          max-w-4xl
          mx-auto
          overflow-hidden
          bg-white
          rounded-lg
          shadow-xl
          dark:bg-gray-800
        "
      >
        <div class="flex flex-col overflow-y-auto md:flex-row">
          <div class="h-32 md:h-auto md:w-1/2">
            <img
              aria-hidden="true"
              class="object-cover w-full h-full dark:hidden"
              :src="ligthImage"
              alt="Office"
            />
            <img
              aria-hidden="true"
              class="hidden object-cover w-full h-full dark:block"
              :src="darkImage"
              alt="Office"
            />
          </div>
          <div
            class="
              flex
              items-center
              justify-center
              p-6
              sm:p-12
              md:w-1/2
              dark:dark-form
            "
          >
            <div class="w-full">
              <h1
                class="
                  mb-4
                  text-xl
                  font-semibold
                  text-gray-700
                  dark:text-gray-200
                "
              >
                {{ title }}
              </h1>
              <slot />
              <p class="mt-1">
                <button
                  class="
                    text-sm
                    font-medium
                    text-purple-600
                    dark:text-purple-400
                    hover:underline
                  "
                  @click="changeLanguage"
                >
                  {{ $t("system.auth.change_language") }}
                </button>
              </p>
              <div
                class="
                  ml-4
                  mt-6
                  text-center text-sm text-gray-500
                  sm:text-right
                  sm:ml-0
                "
              >
                <span v-if="application_version">Laravel v{{ application_version }}</span> <span v-if="php_version">(PHP v{{ php_version }})</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import "../assets/init-alpine";
import { Link, Head } from "@inertiajs/inertia-vue";
export default {
  props: {
    title: String,
    ligthImage: String,
    darkImage: String,
    application_version: String,
    php_version: String,
  },
  data() {
    return {};
  },
  mounted() {
    if(this.$store.getters.language){
      this.$lang.setLocale(this.$store.getters.language);
    }else{
      this.$lang.setLocale(this.$page.props.language);
      this.$store.commit("changeLanguage", this.$page.props.language);
    }
    if (this.$lang.getLocale() == "ar") {
      this.$store.commit("changeDir", "rtl");
    }
  },
  components: {
    Link,
    Head
  },
  methods: {
    changeLanguage(){
      if(this.$lang.getLocale() == "en"){
        this.$store.commit('changeDir', 'rtl');
        this.$store.commit("changeLanguage", 'ar');
        this.$lang.setLocale("ar");
      }else{
        this.$store.commit('changeDir', 'ltr');
        this.$store.commit("changeLanguage", 'en');
        this.$lang.setLocale("en");
      }
    },
  },
};
</script>

<style>
</style>