<template>
  <welcome-component
    :title="$t('system.welcome.welcome')"
    darkImage="img/home-dark.jpeg"
    ligthImage="img/home.jpeg"
    :application_version="application_version"
    :php_version="php_version"
  >
    <div class="row">
      <div class="flex items-center">
        <svg
          fill="none"
          stroke="currentColor"
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="2"
          viewBox="0 0 24 24"
          :class="[
            this.$store.getters.dir == 'rtl' ? 'rtl-svg' : '',
            'w-8 h-8 text-gray-500',
          ]"
        >
          <path
            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"
          ></path>
        </svg>
        <div class="ml-4 text-lg leading-7 font-semibold">
          <Link
            href="https://laravel.com/docs"
            class="underline text-gray-900 dark:text-white"
            >Documentation</Link
          >
        </div>
      </div>
      <div class="ml-12">
        <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
          {{ $t("system.welcome.larvel_documentation") }}
        </div>
      </div>
    </div>
    <div class="row welcome-mt">
      <div class="flex items-center">
        <svg
          fill="none"
          stroke="currentColor"
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="2"
          viewBox="0 0 24 24"
          :class="[
            this.$store.getters.dir == 'rtl' ? 'rtl-svg' : '',
            'w-8 h-8 text-gray-500',
          ]"
        >
          <path
            d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"
          ></path>
          <path d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
        </svg>
        <div class="ml-4 text-lg leading-7 font-semibold">
          <Link
            href="https://laracasts.com"
            class="underline text-gray-900 dark:text-white"
            >Laracasts</Link
          >
        </div>
      </div>

      <div class="ml-12">
        <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
          {{ $t("system.welcome.laracast") }}
        </div>
      </div>
    </div>
    <div class="row welcome-mt">
      <div class="flex items-center">
        <svg
          fill="none"
          stroke="currentColor"
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="2"
          viewBox="0 0 24 24"
          :class="[
            this.$store.getters.dir == 'rtl' ? 'rtl-svg' : '',
            'w-8 h-8 text-gray-500',
          ]"
        >
          <path
            d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"
          ></path>
        </svg>
        <div class="ml-4 text-lg leading-7 font-semibold">
          <Link
            href="https://laravel-news.com/"
            class="underline text-gray-900 dark:text-white"
            >Laravel News</Link
          >
        </div>
      </div>

      <div class="ml-12">
        <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
          {{ $t("system.welcome.laravel_news_community") }}
        </div>
      </div>
    </div>
    <div class="row welcome-mt">
      <div class="flex items-center">
        <svg
          fill="none"
          stroke="currentColor"
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="2"
          viewBox="0 0 24 24"
          :class="[
            this.$store.getters.dir == 'rtl' ? 'rtl-svg' : '',
            'w-8 h-8 text-gray-500',
          ]"
        >
          <path
            d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
          ></path>
        </svg>
        <div
          class="
            ml-4
            text-lg
            leading-7
            font-semibold
            text-gray-900
            dark:text-white
          "
        >
          Vibrant Ecosystem
        </div>
      </div>

      <div class="ml-12">
        <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
          {{ $t("system.welcome.laravel_library") }}
          <Link href="https://forge.laravel.com" class="underline">Forge</Link>,
          <Link href="https://vapor.laravel.com" class="underline">Vapor</Link>,
          <Link href="https://nova.laravel.com" class="underline">Nova</Link>,
          <Link href="https://envoyer.io" class="underline">Envoyer</Link>
          {{ $t("system.welcome.next_level") }}
          <Link href="https://laravel.com/docs/billing" class="underline"
            >Cashier</Link
          >,
          <Link href="https://laravel.com/docs/dusk" class="underline"
            >Dusk</Link
          >,
          <Link href="https://laravel.com/docs/broadcasting" class="underline"
            >Echo</Link
          >,
          <Link href="https://laravel.com/docs/horizon" class="underline"
            >Horizon</Link
          >,
          <Link href="https://laravel.com/docs/sanctum" class="underline"
            >Sanctum</Link
          >,
          <Link href="https://laravel.com/docs/telescope" class="underline"
            >Telescope</Link
          >, {{ $t("system.welcome.and_more") }}
        </div>
      </div>
      <p class="mt-1 welcome-mt">
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
  </welcome-component>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue";
import WelcomeComponent from '../components/BaseComponent.vue';
export default {
  components: { Link, WelcomeComponent },
  props: {
    application_version: String,
    php_version: String,
  },
};
</script>

<style>
.rtl-svg {
  margin-left: 5px;
}
.welcome-mt {
  margin-top: 30px;
}
</style>