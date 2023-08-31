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

<section class="bg-gray-50 dark:bg-gray-900">
  <div class="mx-auto max-w-screen-xl">
    <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
      <div class="overflow-x-auto">
        <table class="w-full text-center text-gray-800 dark:text-gray-400">
          <thead class="text-gray-700 uppercase bg-green-200 dark:bg-gray-700 dark:text-gray-400">
            <tr>
              <th scope="col" class="px-4">No</th>
              <th scope="col" class="px-4">NISN</th>
              <th scope="col" class="px-4">Nama</th>
            </tr>
          </thead>
          <tbody>
            <template v-if="loading">
              <tr>
                <td colspan="3"><Loading /></td>
              </tr>
            </template>
            <tr
              v-for="student, index in students.value[currentClassroom.value]"
              :key="student.id"
              class="border-b dark:border-gray-700">
              <th scope="row" class="px-4 py-3">{{ index + 1 }}</th>
              <td class="px-4 py-3 text-left">{{ student.nisn }}</td>
              <td class="px-4 py-3 text-left">{{ student.name }}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>

</template>
