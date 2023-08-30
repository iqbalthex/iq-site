<script setup>

const props = defineProps({
  students: {
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
console.log(props.students);
// const students = [
  // { id: 1, name: "iqbal" },
  // { id: 2, name: "arie" },
// ];

</script>

<template>

<section class="bg-gray-50 dark:bg-gray-900">
  <div class="mx-auto max-w-screen-xl">
    <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
      <div class="overflow-x-auto">
        <table class="w-full text-center text-gray-800 dark:text-gray-400">
          <thead class="text-gray-700 uppercase bg-green-200 dark:bg-gray-700 dark:text-gray-400">
            <tr>
              <th scope="col" class="px-4" rowspan="2">No</th>
              <th scope="col" class="px-4" rowspan="2">Nama</th>
              <th scope="col" class="px-4 bg-rose-200" colspan="3">Nilai</th>
            </tr>
            <tr>
              <th scope="col" class="px-4">1</th>
              <th scope="col" class="px-4">2</th>
              <th scope="col" class="px-4">3</th>
            </tr>
          </thead>
          <tbody>
            <tr
              v-for="student, index in students"
              :key="student.id"
              class="border-b dark:border-gray-700">
              <th scope="row" class="px-4 py-3">{{ index + 1 }}</th>
              <td class="px-4 py-3 text-left">{{ student.name }}</td>
              <td class="px-4 py-3">{{ Math.random().toFixed(2) }}</td>
              <td class="px-4 py-3">{{ Math.random().toFixed(2) }}</td>
              <td class="px-4 py-3">{{ Math.random().toFixed(2) }}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>

</template>
