
<template>
  <div
    :class="{ 'theme-dark': dark }"
    :lang="this.$lang.getLocale()"
    :dir="this.$store.getters.dir"
  >
    <Head>
      <title>{{ this.$page.props.appName }}</title>
    </Head>
    <div
      class="flex h-screen bg-gray-50 dark:bg-gray-900"
      :class="{ 'overflow-hidden': isSideMenuOpen }"
    >
      <!-- Desktop sidebar -->
      <aside
        class="
          z-20
          hidden
          w-64
          overflow-y-auto
          bg-white
          dark:bg-gray-800
          md:block
          flex-shrink-0
        "
      >
        <div class="py-4 text-gray-500 dark:text-gray-400">
          <sidebar-component></sidebar-component>
        </div>
      </aside>
      <!-- Mobile sidebar -->
      <!-- Backdrop -->
      <div
        v-show="isSideMenuOpen"
        x-transition:enter="transition ease-in-out duration-150"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in-out duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="
          fixed
          inset-0
          z-10
          flex
          items-end
          bg-black bg-opacity-50
          sm:items-center sm:justify-center
        "
      ></div>
      <aside
        class="
          fixed
          inset-y-0
          z-20
          flex-shrink-0
          w-64
          mt-16
          overflow-y-auto
          bg-white
          dark:bg-gray-800
          md:hidden
        "
        v-show="isSideMenuOpen"
        x-transition:enter="transition ease-in-out duration-150"
        x-transition:enter-start="opacity-0 transform -translate-x-20"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in-out duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0 transform -translate-x-20"
        v-on:click="closeSideMenu"
        @keydown.escape="closeSideMenu"
      >
        <div class="py-4 text-gray-500 dark:text-gray-400">
          <sidebar-component></sidebar-component>
        </div>
      </aside>
      <div class="flex flex-col flex-1">
        <header class="z-10 py-4 bg-white shadow-md dark:bg-gray-800">
          <div
            class="
              container
              flex
              items-center
              justify-between
              h-full
              px-6
              mx-auto
              text-purple-600
              dark:text-purple-300
            "
          >
            <!-- Mobile hamburger -->
            <button
              :class="[
                this.$store.getters.dir == 'rtl' ? '-mr-1' : '-ml-1',
                'p-1 mr-5 rounded-md md:hidden focus:outline-none focus:shadow-outline-purple',
              ]"
              v-on:click="toggleSideMenu"
              aria-label="Menu"
            >
              <svg
                class="w-6 h-6"
                aria-hidden="true"
                fill="currentColor"
                viewBox="0 0 20 20"
              >
                <path
                  fill-rule="evenodd"
                  d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                  clip-rule="evenodd"
                ></path>
              </svg>
            </button>
            <!-- Search input -->
            <div class="flex justify-center flex-1 lg:mr-32">
              <div
                class="
                  relative
                  w-full
                  max-w-xl
                  mr-6
                  focus-within:text-purple-500
                "
              >
                <div class="absolute inset-y-0 flex items-center pl-2">
                  <svg
                    class="w-4 h-4"
                    aria-hidden="true"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                  >
                    <path
                      fill-rule="evenodd"
                      d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                      clip-rule="evenodd"
                    ></path>
                  </svg>
                </div>
                <input
                  :class="[
                    this.$store.getters.dir == 'rtl' ? 'rtl-search' : '',
                    'w-full pl-8 pr-2 text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-white focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input',
                  ]"
                  type="text"
                  :placeholder="$t('system.dashboard.search')"
                  aria-label="Search"
                />
              </div>
            </div>
            <ul class="flex items-center flex-shrink-0 space-x-6">
              <!-- Notifications menu -->
              <li
                :class="[
                  this.$store.getters.dir == 'rtl' ? 'rtl-language' : '',
                  'flex',
                ]"
              >
                <button @click="changeLanguage">
                  <span>{{ $t("system.language") }}</span>
                </button>
              </li>
              <li class="flex">
                <button
                  class="
                    rounded-md
                    focus:outline-none focus:shadow-outline-purple
                  "
                  @click="toggleTheme"
                  aria-label="Toggle color mode"
                >
                  <template v-if="!dark">
                    <svg
                      class="w-5 h-5"
                      aria-hidden="true"
                      fill="currentColor"
                      viewBox="0 0 20 20"
                    >
                      <path
                        d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"
                      ></path>
                    </svg>
                  </template>

                  <template v-if="dark">
                    <svg
                      class="w-5 h-5"
                      aria-hidden="true"
                      fill="currentColor"
                      viewBox="0 0 20 20"
                    >
                      <path
                        fill-rule="evenodd"
                        d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                        clip-rule="evenodd"
                      ></path>
                    </svg>
                  </template>
                </button>
              </li>
              
              <!-- Profile menu -->
              <li
                :class="[
                  this.$store.getters.dir == 'rtl' ? 'rtl-account' : '',
                  'relative',
                ]"
              >
                <button
                  class="
                    align-middle
                    rounded-full
                    focus:shadow-outline-purple focus:outline-none
                  "
                  @click="toggleProfileMenu"
                  @keydown.escape="closeProfileMenu"
                  aria-label="Account"
                  aria-haspopup="true"
                >
                  <img
                    class="object-cover w-8 h-8 rounded-full"
                    src="https://images.unsplash.com/photo-1502378735452-bc7d86632805?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&s=aa3a807e1bbdfd4364d1f449eaa96d82"
                    alt=""
                    aria-hidden="true"
                  />
                </button>
                <template v-if="isProfileMenuOpen">
                  <ul
                    x-transition:leave="transition ease-in duration-150"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    @click="closeProfileMenu"
                    @keydown.escape="closeProfileMenu"
                    :class="[
                      this.$store.getters.dir == 'rtl' ? 'rtl-menu' : '',
                      'absolute right-0 w-56 p-2 mt-2 space-y-2 text-gray-600 bg-white border border-gray-100 rounded-md shadow-md dark:border-gray-700 dark:text-gray-300 dark:bg-gray-700',
                    ]"
                    aria-label="submenu"
                  >
                    <li class="flex">
                      <Link
                        v-if="$page.props.hasPermissions.edit_settings"
                        class="
                          inline-flex
                          items-center
                          w-full
                          px-2
                          py-1
                          text-sm
                          font-semibold
                          transition-colors
                          duration-150
                          rounded-md
                          hover:bg-gray-100 hover:text-gray-800
                          dark:hover:bg-gray-800 dark:hover:text-gray-200
                        "
                        href="/settings"
                      >
                        <svg
                          :class="[
                            this.$store.getters.dir == 'rtl' ? 'ml-3' : 'mr-3',
                            'w-4 h-4',
                          ]"
                          aria-hidden="true"
                          fill="none"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          viewBox="0 0 24 24"
                          stroke="currentColor"
                        >
                          <path
                            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"
                          ></path>
                          <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <span>{{ $t("system.dashboard.settings") }}</span>
                      </Link>
                    </li>
                    <li class="flex">
                      <Link
                        v-if="$page.props.hasPermissions.view_roles"
                        class="
                          inline-flex
                          items-center
                          w-full
                          px-2
                          py-1
                          text-sm
                          font-semibold
                          transition-colors
                          duration-150
                          rounded-md
                          hover:bg-gray-100 hover:text-gray-800
                          dark:hover:bg-gray-800 dark:hover:text-gray-200
                        "
                        href="/roles"
                      >
                        <svg
                          :class="[
                            this.$store.getters.dir == 'rtl' ? 'ml-3' : 'mr-3',
                            'w-4 h-4',
                          ]"
                          fill="none"
                          stroke="currentColor"
                          viewBox="0 0 24 24"
                          xmlns="http://www.w3.org/2000/svg"
                        >
                          <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"
                          ></path>
                        </svg>
                        <span>{{ $t("system.dashboard.roles") }}</span>
                      </Link>
                    </li>
                    <li class="flex">
                      <Link
                        class="
                          inline-flex
                          items-center
                          w-full
                          px-2
                          py-1
                          text-sm
                          font-semibold
                          transition-colors
                          duration-150
                          rounded-md
                          hover:bg-gray-100 hover:text-gray-800
                          dark:hover:bg-gray-800 dark:hover:text-gray-200
                        "
                        href="/logout"
                        method="post"
                        as="button"
                        type="button"
                      >
                        <svg
                          :class="[
                            this.$store.getters.dir == 'rtl' ? 'ml-3' : 'mr-3',
                            'w-4 h-4',
                          ]"
                          aria-hidden="true"
                          fill="none"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          viewBox="0 0 24 24"
                          stroke="currentColor"
                        >
                          <path
                            d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"
                          ></path>
                        </svg>
                        <span>{{ $t("system.auth.log_out") }}</span>
                      </Link>
                    </li>
                  </ul>
                </template>
              </li>
            </ul>
          </div>
        </header>
        <main class="h-full pb-16 overflow-y-auto">
          <!-- Remove everything INSIDE this div to a really blank page -->
          <div class="container px-6 mx-auto grid">
            <div
              v-if="$page.props.flash.message"
              class="
                flex
                items-center
                justify-between
                p-4
                mb-8
                text-sm
                font-semibold
                text-green-700
                alert-message
                bg-green-100
                rounded-lg
                shadow-md
                focus:outline-none focus:shadow-outline-purple
                dark:bg-green-700 dark:text-green-100
              "
            >
              {{ $page.props.flash.message }}
            </div>
            <slot />
          </div>
        </main>
      </div>
    </div>
  </div>
</template>

<script>
import SidebarComponent from "./SidebarComponent";
import { Link, Head } from "@inertiajs/inertia-vue";
export default {
  components: { SidebarComponent, Link, Head },
  data() {
    return {
      isSideMenuOpen: false,
      isNotificationsMenuOpen: false,
      isProfileMenuOpen: false,
      isPagesMenuOpen: false,
      isModalOpen: false,
      trapCleanup: null,
      dark: this.$page.props.isDark,
    };
  },
  mounted() {
    if (this.$store.getters.language) {
      this.$lang.setLocale(this.$store.getters.language);
    } else {
      this.$lang.setLocale(this.$page.props.language);
      this.$store.commit("changeLanguage", this.$page.props.language);
    }
    if (this.$lang.getLocale() == "ar") {
      this.$store.commit("changeDir", "rtl");
    }else{
      this.$store.commit("changeDir", "ltr");
    }
  },
  methods: {
    changeLanguage() {
      if (this.$lang.getLocale() == "en") {
        this.$store.commit("changeDir", "rtl");
        this.$store.commit("changeLanguage", "ar");
        this.$lang.setLocale("ar");
      } else {
        this.$store.commit("changeDir", "ltr");
        this.$store.commit("changeLanguage", "en");
        this.$lang.setLocale("en");
      }
    },
    getThemeFromLocalStorage() {
      // if user already changed the theme, use it
      if (window.localStorage.getItem("dark")) {
        this.dark = JSON.parse(window.localStorage.getItem("dark"));
        return JSON.parse(window.localStorage.getItem("dark"));
      }

      // else return their preferences
      this.dark =
        !!window.matchMedia &&
        window.matchMedia("(prefers-color-scheme: dark)").matches;
      return (
        !!window.matchMedia &&
        window.matchMedia("(prefers-color-scheme: dark)").matches
      );
    },
    setThemeToLocalStorage(value) {
      window.localStorage.setItem("dark", value);
    },
    toggleTheme() {
      this.dark = !this.dark;
      this.setThemeToLocalStorage(this.dark);
    },
    toggleSideMenu() {
      this.isSideMenuOpen = !this.isSideMenuOpen;
    },
    closeSideMenu() {
      this.isSideMenuOpen = false;
    },
    toggleNotificationsMenu() {
      this.closeProfileMenu();
      this.isNotificationsMenuOpen = !this.isNotificationsMenuOpen;
    },
    closeNotificationsMenu() {
      this.isNotificationsMenuOpen = false;
    },
    toggleProfileMenu() {
      this.closeNotificationsMenu();
      this.isProfileMenuOpen = !this.isProfileMenuOpen;
    },
    closeProfileMenu() {
      this.isProfileMenuOpen = false;
    },
    togglePagesMenu() {
      this.isPagesMenuOpen = !this.isPagesMenuOpen;
    },
    openModal() {
      this.isModalOpen = true;
      this.trapCleanup = focusTrap(document.querySelector("#modal"));
    },
    closeModal() {
      this.isModalOpen = false;
      this.trapCleanup();
    },
  },
};
</script>

<style>
.rtl-language {
  margin-left: 20px;
  margin-right: 10px;
}
.rtl-search {
  padding-right: 20px;
}
.rtl-menu {
  margin-right: -200px;
}
.rtl-account {
  margin-left: unset !important;
}
.alert-message{
  margin-top: 25px;
}
</style>