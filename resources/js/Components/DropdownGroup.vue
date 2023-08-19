<script setup>

defineProps({
  itemCount: {
    type: Number,
  },
});

import { ref } from 'vue';

const isOpen = ref(false);


function toggleOpen() {
  isOpen.value = !isOpen.value;
}

</script>

<template>
  <slot name="dropdown-trigger" :toggle-open="toggleOpen">
    <button @click="toggleOpen">
      Default trigger
    </button>
  </slot>

  <!-- 1 menu 3 rem -->
  <div class="dropdown-items bg-violet-800 border-violet-400 rounded-l-xl"
    :class="isOpen ? 'border-l border-y' : 'overflow-hidden'"
    style="transition: height .4s"
    :style="{ height: isOpen ? `${itemCount * 2.75}rem` : 0 }">
    <slot name="dropdown-items" />
  </div>
</template>
