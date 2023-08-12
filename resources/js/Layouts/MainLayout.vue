<script setup>

import Navbar from '@/Components/Navbar.vue';
import BottomNav from '@/Components/BottomNav.vue';

defineProps({
  paths: { type: Array }
});

</script>

<template>
  <Navbar :paths="paths" />

  <slot />

  <Bottom-Nav />
</template>
