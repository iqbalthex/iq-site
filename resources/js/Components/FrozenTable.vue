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

<table ref="table" class="w-full text-center text-gray-800 dark:text-gray-400">
  <thead class="sticky top-0 z-20 text-gray-700 uppercase dark:bg-gray-700 dark:text-gray-400">
    <tr>
      <div class="flex items-center sticky left-0 z-20">
        <slot name="head-start" />
      </div>
      <slot name="head-center" />
      <div class="flex items-center sticky right-0 z-20">
        <slot name="head-end" />
      </div>
    </tr>
  </thead>
  <tbody>
    <Loading v-if="loading" />
    <tr v-else
      v-for="item, index in items"
      :key="item.id"
      class="border-b border-slate-400 dark:border-gray-700">
      <div class="flex items-center h-full sticky left-0 z-10 bg-gray-100 border-l border-slate-400">
        <slot name="body-start" :item="item" :index="index" />
      </div>
      <slot
        :item="item"
        :last-row="index === (items.length - 1)"
        :row-index="index"
        name="body-center" />
      <div class="flex items-center sticky right-0 z-10 bg-gray-100">
        <slot name="body-end" />
      </div>
    </tr>
    </tbody>
</table>

</template>
