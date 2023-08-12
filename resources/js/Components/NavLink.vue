<script setup>

import { computed } from 'vue';

const props = defineProps({
  href: {
    type: String,
    required: true,
  },
  active: {
    type: Boolean,
  },
});

const isActive = computed(() => props.active
  ? ''
  : 'bg-white'
);

</script>

<template>
  <li>
    <a :href="href" :class="isActive"
      class="block py-1 px-3 text-gray-400 rounded-lg hover:shadow hover:bg-violet-200/25 md:py-1 md:hover:bg-violet-100/50 md:hover:text-violet-600 md:dark:hover:text-blue-500">
      <slot />
    </a>
  </li>
</template>
