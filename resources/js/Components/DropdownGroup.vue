<script setup>

defineProps({
  isActive: {
    type: Boolean,
  },
  itemCount: {
    type: Number,
  },
});

</script>

<template>
  <div class="relative">
    <slot name="dropdown-trigger" />

    <div
      :class="true ? 'border-l border-violet-400' : 'overflow-hidden'"
      :style="{ height: isActive ? `${itemCount * 2.75}rem` : 0 }"
      class="dropdown-items bg-violet-800 rounded-l-xl"
      style="transition: height .4s">
      <slot name="dropdown-items" />
    </div>
  </div>
</template>
