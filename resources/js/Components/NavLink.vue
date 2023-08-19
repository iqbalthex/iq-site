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
  sidebarOpen: {
    type: Boolean,
  },
});

const classes = computed(() => props.active
  ? 'text-violet-600 bg-gray-50 pointer-events-none'
  : 'text-gray-100 tracking-tight cursor-pointer group'
);

</script>

<template>
  <div :class="classes"
    class="relative pl-3 py-2 text-lg font-medium rounded-l-xl">
    <b v-show="active" class="-top-3" style="transform-origin: bottom"></b>
    <b v-show="active" class="-bottom-3" style="transform-origin: top"></b>
    <a :class="active ? 'text-orange-600' : 'text-gray-200'"
      class="w-max flex items-center gap-4 group-hover:text-yellow-200 group-hover:tracking-normal transition-all duration-150 ease-in-out">
      <slot name="icon" />
      <slot />
    </a>
  </div>
</template>

<style scoped>

b {
  @apply absolute right-0 w-3 h-3 bg-gray-50;
  animation: active .4s forwards;
}

b::before {
  @apply absolute w-3 h-3 bg-violet-600 border-none;
  content: "";
}

b:nth-child(1)::before {
  @apply rounded-br-xl;
}

b:nth-child(2)::before {
  @apply rounded-tr-xl;
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
