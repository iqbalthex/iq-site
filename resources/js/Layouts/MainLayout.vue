<script setup>

import Navbar from '@/Components/Navbar.vue';
import BottomNav from '@/Components/BottomNav.vue';

</script>

<template>
  <Navbar />

  <slot />

  <Bottom-Nav />
</template>
