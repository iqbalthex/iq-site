<script setup>

defineProps({
  subjects: {
    type: Array
  }
});

// import { onCreated, onMounted } from 'vue';

// onCreated(() => {
  // fetch data overview
// });

// onMounted(() => {
  // map data to view
// });

</script>

<template>

Teacher Dashboard

<div>
  <div
    v-for="subject in subjects"
    class="card border border-black">
    {{ subject.name }}
  </div>
</div>

</template>
