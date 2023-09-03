<script setup>

const props = defineProps({
  currentClassroom: {
    type: Object,
  },
  students: {
    type: Object,
  },
});

import { computed, ref } from 'vue';
import { moveUp, moveDown, moveLeft, moveRight } from '@/utils/input-methods.js';

import FrozenTable from '@/Components/FrozenTable.vue';

const scores = ref([72, 76, 73, 75, 80]);

</script>

<template>
<section>

<div class="mx-auto max-w-screen-xl shadow-md">
  <div class="max-w-screen max-h-screen bg-[#999] dark:bg-gray-800 rounded">
    <div class="table-wrapper w-full h-[500px] overflow-y-scroll">
      <Frozen-Table
        :items="students.value[currentClassroom.value]">
        <template #head-start>
          <th class="w-12" scope="col">No</th>
          <th class="w-full" scope="col">Nama</th>
        </template>

        <template #head-center>
          <th scope="col">Nilai 1</th>
          <th scope="col">Nilai 2</th>
          <th scope="col">Nilai 3</th>
          <th scope="col">Nilai 4</th>
          <th scope="col">Nilai 5</th>
        </template>

        <template #head-end>
          <th class="w-full">Total</th>
        </template>

        <template #body-start="{ item, index }">
          <th class="w-12" scope="row">{{ index + 1 }}</th>
          <td class="w-full text-left border-l">{{ item.name }}</td>
        </template>

        <template #body-center="{ item, lastRow, rowIndex }">
          <!-- <template v-for="score, index in item.scores" :key="index"> -->
          <template v-for="score, colIndex in scores" :key="colIndex">
            <td>
              <input
                :data-col="colIndex"
                :data-row="rowIndex"
                :value="score"
                @keydown.prevent.up="moveUp($event)"
                @keydown.prevent.down="moveDown($event, lastRow)"
                @keydown.prevent.left="moveLeft($event)"
                @keydown.prevent.right="moveRight($event, colIndex === (scores.length - 1))"
                class="score-input w-full p-0 text-center bg-transparent border-0 focus:scale-125"
                type="number" />
            </td>
          </template>
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
  @apply bg-sky-200 cursor-pointer hover:bg-sky-400 transition duration-300;
}

td input::-webkit-inner-spin-button {
  @apply hidden;
}

td input.score-input:focus {
  box-shadow: none;
}

td:has(input:focus) {
  @apply bg-rose-200;
}

</style>
