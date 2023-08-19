<script setup>

defineProps({
  isActive: {
    type: Boolean,
  },
  itemCount: {
    type: Number,
  },
});

// import { ref } from 'vue';

</script>

<template>
  <slot name="dropdown-trigger" />

  <div
    :class="isActive ? 'border-l border-violet-400' : 'overflow-hidden'"
    :style="{ height: isActive ? `${itemCount * 2.75}rem` : 0 }"
    class="dropdown-items bg-violet-800 rounded-l-xl"
    style="transition: height .4s">
    <slot name="dropdown-items" />
  </div>
</template>
