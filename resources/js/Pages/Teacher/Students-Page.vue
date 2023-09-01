<script setup>

const props = defineProps({
  currentClassroom: {
    type: Object,
  },
  students: {
    type: Object,
  },
});

import { computed } from 'vue';

import Loading from '@/Components/Loading.vue';

const loading = computed(() => {
  return !props.students.value[props.currentClassroom.value]?.length;
});

</script>

<template>
<section>

<div class="mx-auto max-w-screen-xl shadow-md">
  <div class="max-w-screen max-h-screen bg-[#999] dark:bg-gray-800 rounded">
    <div class="table-wrapper w-full h-[500px] overflow-y-scroll">
      <table class="w-full text-center text-gray-800 dark:text-gray-400">
        <thead class="sticky top-0 z-20 text-gray-700 uppercase bg-green-200 dark:bg-gray-700 dark:text-gray-400">
          <tr class="">
            <div class="flex sticky left-0">
              <th scope="col" class="w-12">No</th>
              <th scope="col" class="w-56">Nama</th>
            </div>
            <th scope="col">Nilai 1</th>
            <th scope="col">Nilai 2</th>
            <th scope="col">Nilai 3</th>
            <th scope="col">Nilai 4</th>
            <th scope="col">Nilai 5</th>
            <th scope="col">Nilai 6</th>
            <th scope="col">Nilai 7</th>
            <th scope="col">Nilai 8</th>
            <th scope="col">Nilai 9</th>
            <th scope="col">Nilai 10</th>
            <th scope="col">Nilai 11</th>
            <th scope="col">Nilai 12</th>
            <th scope="col">Nilai 13</th>
            <th scope="col">Nilai 14</th>
            <th scope="col">Nilai 15</th>
            <th scope="col">Nilai 15</th>
            <th scope="col">Nilai 15</th>
            <th scope="col">Nilai 15</th>
            <th scope="col">Nilai 15</th>
            <th scope="col">Nilai 15</th>
          </tr>
        </thead>
        <tbody>
          <template v-if="loading">
            <Loading />
          </template>
          <tr
            v-for="student, index in students.value[currentClassroom.value]"
            :key="student.id"
            class="border-b border-slate-400 dark:border-gray-700">
            <div class="sticky left-0 z-10 bg-gray-100">
              <th class="w-12" scope="row">{{ index + 1 }}</th>
              <td class="w-56 text-left">{{ student.name }}</td>
            </div>
            <td>{{ 60 + (Math.random().toFixed(2) * 30) }}</td>
            <td>{{ 60 + (Math.random().toFixed(2) * 30) }}</td>
            <td>{{ 60 + (Math.random().toFixed(2) * 30) }}</td>
            <td>{{ 60 + (Math.random().toFixed(2) * 30) }}</td>
            <td>{{ 60 + (Math.random().toFixed(2) * 30) }}</td>
            <td>{{ 60 + (Math.random().toFixed(2) * 30) }}</td>
            <td>{{ 60 + (Math.random().toFixed(2) * 30) }}</td>
            <td>{{ 60 + (Math.random().toFixed(2) * 30) }}</td>
            <td>{{ 60 + (Math.random().toFixed(2) * 30) }}</td>
            <td>{{ 60 + (Math.random().toFixed(2) * 30) }}</td>
            <td>{{ 60 + (Math.random().toFixed(2) * 30) }}</td>
            <td>{{ 60 + (Math.random().toFixed(2) * 30) }}</td>
            <td>{{ 60 + (Math.random().toFixed(2) * 30) }}</td>
            <td>{{ 60 + (Math.random().toFixed(2) * 30) }}</td>
            <td>{{ 60 + (Math.random().toFixed(2) * 30) }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>

</section>
</template>

<style scoped>

.table-wrapper::-webkit-scrollbar {
  @apply hidden;
}

thead th {
  @apply border-violet-500;
}

th,
td {
  @apply border-r border-slate-400;
}

thead th,
tbody div > td {
  @apply px-2 py-1 whitespace-nowrap;
}

thead th {
  @apply px-2 bg-violet-300;
}

tbody tr > td {
  @apply px-2 py-1 bg-sky-200;
}

</style>
