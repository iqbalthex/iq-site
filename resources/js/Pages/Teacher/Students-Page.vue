<script setup>

const props = defineProps({
  currentClassroom: {
    type: Object,
  },
  students: {
    type: Object,
  },
});

import { computed, onMounted } from 'vue';

import FrozenTable from '@/Components/FrozenTable.vue';

onMounted(() => {
  setTimeout(() => {
    console.log('Input listener bound');
    document.querySelectorAll('input[data-x][data-y]').forEach(input => {
      let { x, y } = input.dataset;

      input.onkeydown = function ({ keyCode, target }) {
        if (keyCode < 37 && keyCode > 40) return;

        const lastItem = document.querySelector('td input[data-last="true"]');
        const { x: xLast, y: yLast } = lastItem.dataset;

        ({
          37: () => (x > 0)     && x--,
          39: () => (x < xLast) && x++,
          38: () => (y > 0)     && y--,
          40: () => (y < yLast) && y++,
        })[keyCode]();

        const to = document.querySelector(`td input[data-x="${x}"][data-y="${y}"]`);
        to.focus();
        console.log(target.dataset)
        console.log(to.dataset);
      }
    });
  }, 3000);
});

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

        <template #body-center="{ item, yIndex, lastRow }">
          <!-- <template v-for="score, index in item.scores" :key="index"> -->
          <template v-for="score, xIndex in [72, 76, 73, 75, 80, 95, 74, 87, 84, 90]" :key="xIndex">
            <td>
              <input
                :data-last="lastRow && (xIndex === 9) && 'true'"
                :data-x="xIndex"
                :data-y="yIndex"
                :value="score"
                class="score-input w-full p-0 text-center bg-transparent border-0"
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

</style>
