<template>
  <div
    class="
      grid
      px-4
      py-3
      text-xs
      font-semibold
      tracking-wide
      text-gray-500
      uppercase
      border-t
      dark:border-gray-700
      bg-gray-50
      sm:grid-cols-9
      dark:text-gray-400 dark:bg-gray-800
    "
  >
    <span class="flex items-center col-span-3">
      {{ $t("system.dashboard.showing") }} {{ from }}-{{ to }}
      {{ $t("system.dashboard.of") }} {{ total }}
    </span>
    <span class="col-span-2"></span>
    <!-- Pagination -->
    <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
      <nav aria-label="Table navigation">
        <ul class="inline-flex items-center">
          <li v-for="link in links" :key="link.label">
            <Link
              v-if="
                (link.label == '&laquo; Previous' &&
                  $store.getters.dir == 'ltr') ||
                (link.label == 'Next &raquo;' && $store.getters.dir == 'rtl')
              "
              class="
                px-3
                py-1
                rounded-md rounded-l-lg
                focus:outline-none focus:shadow-outline-purple
              "
              aria-label="Previous"
              :href="link.url"
              as="button"
              type="button"
            >
              <svg
                class="w-4 h-4 fill-current"
                aria-hidden="true"
                viewBox="0 0 20 20"
              >
                <path
                  d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                  clip-rule="evenodd"
                  fill-rule="evenodd"
                ></path>
              </svg>
            </Link>
            <Link
              v-else-if="
                (link.label == '&laquo; Previous' &&
                  $store.getters.dir == 'rtl') ||
                (link.label == 'Next &raquo;' && $store.getters.dir == 'ltr')
              "
              class="
                px-3
                py-1
                rounded-md rounded-r-lg
                focus:outline-none focus:shadow-outline-purple
              "
              aria-label="Next"
              :href="link.url"
              as="button"
              type="button"
            >
              <svg
                class="w-4 h-4 fill-current"
                aria-hidden="true"
                viewBox="0 0 20 20"
              >
                <path
                  d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                  clip-rule="evenodd"
                  fill-rule="evenodd"
                ></path>
              </svg>
            </Link>
            <Link
              v-else
              :class="
                link.active
                  ? 'px-3 py-1 text-white transition-colors duration-150 bg-purple-600 border border-r-0 border-purple-600 rounded-md focus:outline-none focus:shadow-outline-purple'
                  : 'px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple'
              "
              :href="link.url"
            >
              <span v-if="link.label == '...'" class="px-3 py-1">...</span>
              <span v-else>{{ link.label }}</span>
            </Link>
          </li>
        </ul>
      </nav>
    </span>
  </div>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue";
export default {
  props: {
    links: {
      type: Array,
      required: true
    },
    from:{
      type: Number,
      required: true
    },
    to: {
      type: Number,
      required: true
    },
    total: {
      type: Number,
      required: true
    },
  },
  components: {
    Link,
  },
};
</script>

<style>
</style>