<script setup>

import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
  href: {
    type: String,
  },
  isActive: {
    type: Boolean,
  },
  sidebarOpen: {
    type: Boolean,
  },
});

const classes = computed(() => props.isActive
  ? 'text-violet-600 bg-gray-50 pointer-events-none'
  : 'text-gray-100 tracking-tight cursor-pointer group'
);

</script>

<template>
  <div :class="classes"
    class="relative pl-3 py-2 text-lg font-medium rounded-l-xl">
    <b v-show="isActive" class="-top-3" style="transform-origin: bottom"></b>
    <a :class="isActive ? 'text-orange-600' : 'text-gray-200'"
      class="w-max flex items-center gap-4 group-hover:text-yellow-200 group-hover:tracking-normal transition-all duration-150 ease-in-out">
      <slot name="icon" />
      <slot />
    </a>
    <b v-show="isActive" class="-bottom-3" style="transform-origin: top"></b>
  </div>
</template>

<style scoped>

b,
b::before {
  @apply absolute right-0 w-3 h-3;
}

/* corner background */
b {
  @apply bg-gray-50;
  animation: active .4s forwards;
}

/* dropdown-trigger's bottom corner & dropdown-item */
.dropdown-trigger b:last-child::before,
.dropdown-item b::before {
  @apply bg-violet-800;
}

/* first dropdown-item's top corner */
.dropdown-item:first-child b:first-child {
  @apply hidden;
}

/* last dropdown-item's bottom corner & general corner */
.dropdown-item:last-child b:last-child::before,
b::before {
  @apply bg-violet-600;
  content: "";
}

/* top corner */
b:first-child::before {
  @apply rounded-br-xl;
}

/* bottom corner */
b:last-child::before {
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
