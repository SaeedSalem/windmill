<template>
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
            <th>test</th>
          </tr>
        </thead>
      </table>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    roles: Object,
  },
};
</script>

<style>
</style>