<template>
  <dashboard-component>
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
      <span>{{ $t("system.dashboard.roles") }}</span>
      <div
        class="
          flex flex-col flex-wrap
          mb-8
          space-y-4
          md:items-end md:space-x-4
          add-button
        "
      >
        <Link
          class="
            flex
            items-center
            justify-between
            px-2
            py-2
            text-sm
            font-medium
            leading-5
            text-white
            transition-colors
            duration-150
            bg-purple-600
            border border-transparent
            rounded-full
            active:bg-purple-600
            hover:bg-purple-700
            focus:outline-none focus:shadow-outline-purple
          "
          href="/roles/create"
        >
          <svg
            class="w-6 h-6"
            fill="currentColor"
            viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              fill-rule="evenodd"
              d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z"
              clip-rule="evenodd"
            ></path>
          </svg>
        </Link>
      </div>
    </h2>
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
      <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
          <thead>
            <tr
              class="
                font-semibold
                tracking-wide
                text-gray-500
                uppercase
                border-b
                dark:border-gray-700
                bg-gray-50
                dark:text-gray-400 dark:bg-gray-800
              "
            >
              <th
                :class="[
                  this.$store.getters.dir == 'rtl' ? 'text-right' : 'text-left',
                  'px-4 py-3',
                ]"
              >
                {{ $t("system.dashboard.role") }}
              </th>
              <th
                :class="[
                  this.$store.getters.dir == 'rtl' ? 'text-right' : 'text-left',
                  'px-4 py-3',
                ]"
              >
                {{ $t("validation.attributes.created_at") }}
              </th>
              <th
                :class="[
                  this.$store.getters.dir == 'rtl' ? 'text-right' : 'text-left',
                  'px-4 py-3',
                ]"
              >
                {{ $t("system.dashboard.actions") }}
              </th>
            </tr>
          </thead>
          <tbody
            class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
          >
            <tr
              v-for="role in roles.data"
              :key="role.id"
              class="text-gray-700 dark:text-gray-400"
            >
              <td
                :class="[
                  'px-4 py-3 text-sm',
                  $store.getters.dir == 'rtl' ? 'text-right' : 'text-left',
                ]"
              >
                {{ role.name }}
              </td>
              <td
                :class="[
                  'px-4 py-3 text-sm',
                  $store.getters.dir == 'rtl' ? 'text-right' : 'text-left',
                ]"
              >
                {{ role.created_at | formatDate }}
              </td>
              <td class="px-4 py-3">
                <div class="flex items-center space-x-4 text-sm">
                  <Link
                    class="
                      flex
                      items-center
                      justify-between
                      px-2
                      py-2
                      text-sm
                      font-medium
                      leading-5
                      text-purple-600
                      rounded-lg
                      dark:text-gray-400
                      focus:outline-none focus:shadow-outline-gray
                      text-center
                    "
                    aria-label="Edit"
                    :href="'/roles/' + role.id"
                  >
                    <svg
                      class="w-6 h-6"
                      fill="currentColor"
                      viewBox="0 0 20 20"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                      <path
                        fill-rule="evenodd"
                        d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                        clip-rule="evenodd"
                      ></path>
                    </svg>
                  </Link>
                  <Link
                    class="
                      flex
                      items-center
                      justify-between
                      px-2
                      py-2
                      text-sm
                      font-medium
                      leading-5
                      text-purple-600
                      rounded-lg
                      dark:text-gray-400
                      focus:outline-none focus:shadow-outline-gray
                      text-center
                    "
                    aria-label="Edit"
                    :href="'/roles/' + role.id + '/edit'"
                  >
                    <svg
                      class="w-5 h-5"
                      aria-hidden="true"
                      fill="currentColor"
                      viewBox="0 0 20 20"
                    >
                      <path
                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"
                      ></path>
                    </svg>
                  </Link>
                  <Link
                    class="
                      flex
                      items-center
                      justify-between
                      px-2
                      py-2
                      text-sm
                      font-medium
                      leading-5
                      text-purple-600
                      rounded-lg
                      dark:text-gray-400
                      focus:outline-none focus:shadow-outline-gray
                    "
                    aria-label="Delete"
                    :href="'roles/' + role.id"
                    method="delete"
                    as="button"
                    type="button"
                  >
                    <svg
                      class="w-5 h-5"
                      aria-hidden="true"
                      fill="currentColor"
                      viewBox="0 0 20 20"
                    >
                      <path
                        fill-rule="evenodd"
                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                        clip-rule="evenodd"
                      ></path>
                    </svg>
                  </Link>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </dashboard-component>
</template>

<script>
import DashboardComponent from "../../../components/Dashboard/DashboardComponent";
import { Link } from "@inertiajs/inertia-vue";
export default {
  props: { roles: Object },
  components: { DashboardComponent, Link },
};
</script>

<style>
</style>