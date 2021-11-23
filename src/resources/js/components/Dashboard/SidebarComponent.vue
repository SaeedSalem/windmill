<template>
  <div>
    <Link
      :class="[this.$store.getters.dir == 'rtl'?'rtl-logo':'', 'ml-6 text-lg font-bold text-gray-800 dark:text-gray-200']"
      href="/"
    >
      Windmill
    </Link>
    <ul class="mt-6">
      <li :class="[$page.url === '/home'?'text-gray-800 dark:text-gray-100':'', 'relative px-6 py-3']">
        <span v-if="$page.url === '/home'" :class="[this.$store.getters.dir == 'ltr'?'rounded-tr-lg rounded-br-lg left-0':'rounded-tl-lg rounded-bl-lg right-0','absolute inset-y-0 w-1 bg-purple-600']" aria-hidden="true"></span>
        <Link
          :class="'inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200'"
          href="/home"
        >
          <svg
            class="w-5 h-5"
            aria-hidden="true"
            fill="none"
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            viewBox="0 0 24 24"
            stroke="currentColor"
          >
            <path
              d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
            ></path>
          </svg>
          <span :class="[this.$store.getters.dir == 'ltr'?'ml-4':'mr-4']">{{$t('system.dashboard.dashboard')}}</span>
        </Link>
      </li>
    </ul>
    <ul>
      <li :class="[$page.url.startsWith('/users')?'text-gray-800 dark:text-gray-100':'', 'relative px-6 py-3']">
        <span v-if="$page.url.startsWith('/users')" :class="[this.$store.getters.dir == 'ltr'?'rounded-tr-lg rounded-br-lg left-0':'rounded-tl-lg rounded-bl-lg right-0','absolute inset-y-0 w-1 bg-purple-600']" aria-hidden="true"></span>
        <Link
          v-if="$page.props.hasPermissions.view_users"
          class="
            inline-flex
            items-center
            w-full
            text-sm
            font-semibold
            transition-colors
            duration-150
            hover:text-gray-800
            dark:hover:text-gray-200
          "
          href="/users"
        >
          <svg
            class="w-5 h-5"
            aria-hidden="true"
            fill="none"
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            viewBox="0 0 24 24"
            stroke="currentColor"
          >
            <path
              d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"
            ></path>
          </svg>
          <span :class="[this.$store.getters.dir == 'ltr'?'ml-4':'mr-4']">{{$t('system.dashboard.users')}}</span>
        </Link>
      </li>
    </ul>
  </div>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue";
export default {
  components: {
    Link,
  },
  data() {
    return {
      isPagesMenuOpen: false,
    };
  },
  methods: {
    togglePagesMenu() {
      this.isPagesMenuOpen = !this.isPagesMenuOpen;
    },
  },
};
</script>

<style>
.rtl-logo{
  margin-right: 30px;
}
</style>