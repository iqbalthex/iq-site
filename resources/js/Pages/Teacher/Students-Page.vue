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
          <th scope="col">NISN</th>
          <th scope="col">L/P</th>
          <th scope="col">Tempat Lahir</th>
          <th scope="col">Tanggal Lahir</th>
          <th scope="col">Agama</th>
          <th scope="col">Alamat</th>
          <th scope="col" class="parent">Nama Ayah</th>
          <th scope="col" class="parent">Nama Ibu</th>
          <th scope="col" class="parent">Pekerjaan Ayah</th>
          <th scope="col" class="parent">Pekerjaan Ibu</th>
          <th scope="col" class="parent">Alamat Orang Tua</th>
          <th scope="col" class="parent">No Handphone Orang Tua</th>
          <th scope="col">Nama Wali</th>
          <th scope="col">Pekerjaan Wali</th>
          <th scope="col">Alamat Wali</th>
          <th scope="col">No Handphone Wali</th>
        </template>

        <template #head-end>
          <th scope="col" class="w-8 presence">S</th>
          <th scope="col" class="w-8 presence">I</th>
          <th scope="col" class="w-8 presence">A</th>
        </template>

        <template #body-start="{ item, index }">
          <th class="w-12" scope="row">{{ index + 1 }}</th>
          <td class="w-full text-left border-l">
            <input
              data-col="0"
              :data-row="index"
              :value="item.name"
              @keydown.prevent.up="moveUp($event)"
              @keydown.prevent.down="moveDown($event)"
              @keydown.prevent.left="moveLeft($event)"
              @keydown.prevent.right="moveRight($event)"
              class="score-input p-0 bg-transparent border-0 focus:scale-125"
              type="text" />
          </td>
        </template>

        <template #body-center="{ item, lastRow, rowIndex }">
          <td>
            <input
              data-col="1"
              :data-row="rowIndex"
              :value="item.nisn"
              @keydown.prevent.up="moveUp($event)"
              @keydown.prevent.down="moveDown($event, lastRow)"
              @keydown.prevent.left="moveLeft($event)"
              @keydown.prevent.right="moveRight($event)"
              class="score-input w-full text-center p-0 bg-transparent border-0 focus:scale-125"
              type="text" />
          </td>
          <td>
            <input
              data-col="2"
              :data-row="rowIndex"
              value="L"
              @keydown.prevent.up="moveUp($event)"
              @keydown.prevent.down="moveDown($event, lastRow)"
              @keydown.prevent.left="moveLeft($event)"
              @keydown.prevent.right="moveRight($event, true)"
              class="score-input w-full text-center p-0 bg-transparent border-0 focus:scale-125"
              type="text" />
          </td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </template>

        <template #body-end="{ item }">
          <td class="w-8">{{ parseInt(Math.random() * 3) }}</td>
          <td class="w-8">{{ parseInt(Math.random() * 3) }}</td>
          <td class="w-8">{{ parseInt(Math.random() * 3) }}</td>
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
  @apply bg-violet-300;
}

thead th.parent {
  @apply bg-lime-200;
}

thead th.presence {
  @apply bg-yellow-300;
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
