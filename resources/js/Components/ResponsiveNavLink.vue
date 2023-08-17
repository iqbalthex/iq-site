<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
  href: {
    type: String,
    required: true,
  },
  active: {
    type: Boolean,
  },
});

const classes = computed(() =>
    props.active
        ? 'text-indigo-700 bg-indigo-200 focus:outline-none focus:text-indigo-800 focus:bg-indigo-100 focus:border-indigo-700 transition duration-150 ease-in-out'
        : 'text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out'
);
</script>

<template>
  <div>
    <Link :href="href" :class="classes"
      class="relative block w-full pl-3 pr-4 py-2 overflow-hidden text-left text-base font-medium rounded-l-2xl">
      <b></b>
      <!-- <b></b> -->
      <slot />
    </Link>
  </div>
</template>

<style scoped>

b {
  @apply absolute top-0 left-0 w-4 h-4 bg-rose-100 border border-black
}

</style>
