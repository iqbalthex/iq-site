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
import Loading     from '@/Components/Loading.vue';

const students = computed(() => props.students.value[props.currentClassroom.value]);
const loading = computed(() => !props.students.value[props.currentClassroom.value]?.length);

</script>

<template>

<Frozen-Table>
  <template #head>
    <tr>
      <div class="freeze">
        <th class="w-12" scope="col">No</th>
        <th class="w-full" scope="col">Nama</th>
      </div>
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
      <div class="freeze">
        <th scope="col" class="w-8">S</th>
        <th scope="col" class="w-8">I</th>
        <th scope="col" class="w-8">A</th>
      </div>
    </tr>
  </template>

  <template #body>
    <tr v-if="loading">
      <td :colspan="10"><Loading /></td>
    </tr>
    <template v-else>
      <tr v-for="student, rowIndex in students"
        :data-row="rowIndex"
        :key="student.id"
        class="border-b border-slate-400 dark:border-gray-700 tes">
        <div class="freeze bg-gray-100">
          <th class="w-12" scope="row">{{ rowIndex + 1 }}</th>
          <td class="w-full text-left border-l">
            <!-- <Movable-Input></Movable-Input> -->
            <input
              data-col="0"
              :data-row="rowIndex"
              :value="student.name"
              @keydown.prevent.up="moveUp($event)"
              @keydown.prevent.down="moveDown($event, (rowIndex === students.length - 1))"
              @keydown.prevent.left="moveLeft($event)"
              @keydown.prevent.right="moveRight($event)"
              class="score-input text-left"
              type="text" />
          </td>
        </div>
        <td>
          <input
            data-col="1"
            :data-row="rowIndex"
            :value="student.nisn"
            @keydown.prevent.up="moveUp($event)"
            @keydown.prevent.down="moveDown($event, (rowIndex === students.length - 1))"
            @keydown.prevent.left="moveLeft($event)"
            @keydown.prevent.right="moveRight($event)"
            class="score-input w-full text-center"
            type="text" />
        </td>
        <td>
          <input
            data-col="2"
            :data-row="rowIndex"
            value="L"
            @keydown.prevent.up="moveUp($event)"
            @keydown.prevent.down="moveDown($event, (rowIndex === students.length - 1))"
            @keydown.prevent.left="moveLeft($event)"
            @keydown.prevent.right="moveRight($event)"
            class="score-input w-full text-center"
            type="text" />
        </td>
        <td>
          <input
            data-col="3"
            :data-row="rowIndex"
            value="Pasuruan"
            @keydown.prevent.up="moveUp($event)"
            @keydown.prevent.down="moveDown($event, (rowIndex === students.length - 1))"
            @keydown.prevent.left="moveLeft($event)"
            @keydown.prevent.right="moveRight($event)"
            class="score-input w-full text-center"
            type="text" />
        </td>
        <td>
          <input
            data-col="4"
            :data-row="rowIndex"
            value="2001-05-04"
            @keydown.prevent.up="moveUp($event)"
            @keydown.prevent.down="moveDown($event, (rowIndex === students.length - 1))"
            @keydown.prevent.left="moveLeft($event)"
            @keydown.prevent.right="moveRight($event)"
            class="score-input w-full text-center"
            type="text" />
        </td>
        <td>
          <input
            data-col="5"
            :data-row="rowIndex"
            value="Islam"
            @keydown.prevent.up="moveUp($event)"
            @keydown.prevent.down="moveDown($event, (rowIndex === students.length - 1))"
            @keydown.prevent.left="moveLeft($event)"
            @keydown.prevent.right="moveRight($event)"
            class="score-input w-full text-center"
            type="text" />
        </td>
        <td>
          <input
            data-col="6"
            :data-row="rowIndex"
            value="Pilangsari RT 02 RW 10 Desa Beji Kec. Beji"
            @keydown.prevent.up="moveUp($event)"
            @keydown.prevent.down="moveDown($event, (rowIndex === students.length - 1))"
            @keydown.prevent.left="moveLeft($event)"
            @keydown.prevent.right="moveRight($event, true)"
            class="score-input text-center"
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
        <div class="freeze">
          <td class="w-8 bg-yellow-300">{{ parseInt(Math.random() * 3) }}</td>
          <td class="w-8 bg-yellow-300">{{ parseInt(Math.random() * 3) }}</td>
          <td class="w-8 bg-yellow-300">{{ parseInt(Math.random() * 3) }}</td>
        </div>
      </tr>
    </template>
  </template>
</Frozen-Table>

</template>

<style scoped>

td {
  @apply border-r border-slate-400;
}

thead th.parent {
  @apply bg-lime-200;
}

td input::-webkit-inner-spin-button {
  @apply hidden;
}

td input.score-input {
  @apply p-0 bg-transparent border-0 focus:font-bold;
}

td input.score-input:focus {
  box-shadow: none;
}

td:has(input:focus) {
  @apply bg-rose-200;
}

tbody tr:has(td input.address:focus) * {
  @apply h-20;
}

</style>
