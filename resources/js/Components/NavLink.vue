<script setup>

import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
  href: {
    type: String,
  },
  active: {
    type: Boolean,
  },
});

const classes = computed(() => props.active
  ? 'text-violet-600 bg-gray-50 pointer-events-none'
  : 'text-gray-100 tracking-tight hover:text-yellow-200 hover:tracking-normal cursor-pointer transition-all duration-150 ease-in-out'
);

</script>

<template>
  <a :class="classes"
    class="relative block w-full pl-3 py-2 text-lg font-medium rounded-l-full">
    <b :class="active ? 'block' : 'hidden'" class="-top-3" style="transform-origin: bottom"></b>
    <b :class="active ? 'block' : 'hidden'" class="-bottom-3" style="transform-origin: top"></b>
    <slot />
  </a>
</template>

<style scoped>

a:not(:last-child) {
  @apply mb-0.5;
}

b {
  @apply absolute right-0 w-3 h-3 bg-gray-50;
  animation: active .4s forwards;
}

b::before {
  @apply absolute w-3 h-3 bg-violet-600 border-none;
  content: "";
}

b:nth-child(1)::before {
  @apply rounded-br-full;
}

b:nth-child(2)::before {
  @apply rounded-tr-full;
}

@keyframes active {
  0% {
    transform: scaleY(0);
  }
  100% {
    transform: scaleY(1);
  }
}

</style>
