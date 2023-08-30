<script setup>

const props = defineProps({
  label: {
    type: String, required: true
  },
  icon: {
    type: Object
  },
  itemCount: {
    type: Number
  },
  isActive: {
    type: Boolean
  }
});

import { inject, ref, watch } from 'vue';

import NavLink from '@/Components/NavLink.vue';

const isOpen = ref(props.isActive);

</script>

<template>
  <div class="relative">
    <Nav-Link
      @click="isOpen = !isOpen">
      <component :is="icon" />
      {{ label }}
    </Nav-Link>

    <div
      :class="(isOpen || isActive) ? 'border-l border-violet-400' : 'overflow-hidden'"
      :style="{ height: (isOpen || isActive) ? `${itemCount * 2.75}rem` : 0 }"
      class="dropdown-items bg-violet-800 rounded-l-xl"
      style="transition: height .4s">
      <slot name="dropdown-items" />
    </div>
  </div>
</template>
