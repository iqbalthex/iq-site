<script setup>

const props = defineProps({
  // classroom: {
    // type: Object,
  // },
  currentClassroom: {
    type: Object,
  },
  students: {
    type: Object,
  },
});

import { computed, ref } from 'vue';
import { moveUp, moveDown, moveLeft, moveRight } from '@/utils/input-methods.js';
import { calcTotal } from '@/utils/calc-total.js';

import FrozenTable from '@/Components/FrozenTable.vue';
import Loading     from '@/Components/Loading.vue';

const students = computed(() => props.students.value[props.currentClassroom.value]);
const loading = computed(() => !props.students.value[props.currentClassroom.value]?.length);
const scores = [72, 76, 73, 75, 80];
let timeout;


function onInput(target, rowIndex) {
  clearTimeout(timeout);
  target.value || (target.value = 0);

  timeout = setTimeout(() => calcTotal(rowIndex), 400);
}

</script>

<template>

<Frozen-Table>
  <template #head>
    <tr>
      <div class="freeze">
        <th class="w-12" scope="col">No</th>
        <th class="w-full" scope="col">Nama</th>
      </div>
      <th scope="col">Nilai 1</th>
      <th scope="col">Nilai 2</th>
      <th scope="col">Nilai 3</th>
      <th scope="col">Nilai 4</th>
      <th scope="col">Nilai 5</th>
      <div class="freeze flex items-center sticky right-0 z-10">
        <th class="w-full">Totala</th>
      </div>
    </tr>
  </template>

  <template #body>
    <tr v-if="loading">
      <td :colspan="3 + scores.length"><Loading /></td>
    </tr>
    <template v-else>
      <tr v-for="student, rowIndex in students"
        :data-row="rowIndex"
        :key="student.id"
        class="border-b border-slate-400 dark:border-gray-700">
        <div class="freeze bg-gray-100">
          <th class="w-12" scope="row">{{ rowIndex + 1 }}</th>
          <td class="w-full text-left border-l">{{ student.name }}</td>
        </div>
        <template v-for="score, colIndex in scores" :key="colIndex">
          <td>
            <input
              :data-col="colIndex"
              :data-row="rowIndex"
              :value="score"
              @input="onInput($event.target, rowIndex)"
              @keydown.prevent.up="moveUp($event)"
              @keydown.prevent.down="moveDown($event, rowIndex === (students.length - 1))"
              @keydown.prevent.left="moveLeft($event)"
              @keydown.prevent.right="moveRight($event, colIndex === (scores.length - 1))"
              class="score-input w-full p-0 text-center bg-transparent border-0 focus:scale-125"
              type="number" />
          </td>
        </template>
        <div class="freeze">
          <td class="w-full bg-yellow-300" :data-total="rowIndex">0</td>
        </div>
      </tr>
    </template>
  </template>
</Frozen-Table>

</template>

<style scoped>

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
