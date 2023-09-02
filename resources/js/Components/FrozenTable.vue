<script setup>

const props = defineProps({
  items: {
    type: Array,
  },
});

import { computed } from 'vue';
import Loading from '@/Components/Loading.vue';

const loading = computed(() => !props.items?.length);

</script>

<template>

<table class="w-full text-center text-gray-800 dark:text-gray-400">
  <thead class="sticky top-0 z-20 text-gray-700 uppercase bg-green-200 dark:bg-gray-700 dark:text-gray-400">
    <tr class="">
      <div class="flex sticky left-0">
        <slot name="head-start" />
      </div>
      <slot name="head-center" />
      <slot name="head-end" />
    </tr>
  </thead>
  <tbody>
    <Loading v-if="loading" />
    <tr v-else
      v-for="item, index in items"
      :key="item.id"
      class="border-b border-slate-400 dark:border-gray-700">
      <slot name="item-list" :item="item" :index="index" />
      <!-- <div class="sticky left-0 z-10 bg-gray-100"> -->
        <!-- <slot name="body-start" :item="item" /> -->
      <!-- </div> -->
      <!-- <slot name="body-center" /> -->
      <!-- <slot name="body-end" /> -->
    </tr>
    </tbody>
</table>

</template>

<style scoped>

thead th {
  @apply border-violet-500;
}

th,
td {
  @apply border-r border-slate-400;
}

thead th,
tbody div > td {
  @apply px-2 py-1 whitespace-nowrap;
}

thead th {
  @apply px-2 bg-violet-300;
}

tbody tr > td {
  @apply px-2 py-1 bg-sky-200;
}

</style>
