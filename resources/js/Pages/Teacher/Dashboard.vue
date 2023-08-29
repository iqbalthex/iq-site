<script setup>

defineProps({
  changeCurrent: {
    type: Function,
    required: true
  },
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

<!--div>
  <div
    v-for="subject in subjects"
    class="card border border-black">
    {{ subject.name }}
  </div>
</div-->

<section>
  <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-2 md:gap-x-6 md:gap-y-4">
    <template v-for="subject in subjects" :key="subject.id">
      <div class="p-2 md:px-6 lg:px-8 lg:py-4 bg-violet-200 rounded-md border border-transparent shadow-gray-300 cursor-pointer hover:bg-blue-300 hover:scale-x-[1.02] hover:border-gray-400/75 hover:shadow-lg transition duration-300"
        @click="changeCurrent(`formative.${subject.name}`)">
        <h3 class="mb-2 text-xl font-bold dark:text-white">{{ subject.name }}</h3>
        <p class="text-gray-500 dark:text-gray-400">Plan it, create it, launch it. Collaborate seamlessly .</p>
      </div>
    </template>
  </div>
</section>

</template>
