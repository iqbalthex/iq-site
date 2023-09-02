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

import FrozenTable from '@/Components/FrozenTable.vue';

</script>

<template>
<section>

<div class="mx-auto max-w-screen-xl shadow-md">
  <div class="max-w-screen max-h-screen bg-[#999] dark:bg-gray-800 rounded">
    <div class="table-wrapper w-full h-[500px] overflow-y-scroll">
      <Frozen-Table
        :items="students.value[currentClassroom.value]">
        <template #head-start>
          <th scope="col" class="w-12">No</th>
          <th scope="col" class="w-full">Nama</th>
        </template>

        <template #head-center>
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
        </template>

        <template #head-end>
          <th class="w-full">Total</th>
        </template>

        <template #body-start="{ item, index }">
          <th class="w-12" scope="row">{{ index + 1 }}</th>
          <td class="w-full text-left border-l">{{ item.name }}</td>
        </template>

        <template #body-center>
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
        </template>

        <template #body-end>
          <td class="w-full bg-yellow-300">{{ 60 + (Math.random().toFixed(2) * 30) }}</td>
        </template>
      </Frozen-Table>
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
  @apply border-r border-violet-500;
}

thead th,
tbody div > td {
  @apply px-2 py-1 whitespace-nowrap;
}

td {
  @apply border-r border-slate-400;
}

thead th {
  @apply px-2 bg-violet-300;
}

tbody tr > td {
  @apply px-2 py-1 bg-sky-200 cursor-pointer hover:bg-sky-400 transition duration-300;
}

</style>
