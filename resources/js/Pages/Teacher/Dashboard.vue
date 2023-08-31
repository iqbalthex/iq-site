<script setup>

defineProps({
  changeCurrent: {
    type: Function,
    required: true,
  },
  classrooms: {
    type: Object,
  },
});

import { inject } from 'vue';

// Change current active classroom
const changeClassroom = inject("$changeClassroom");

</script>

<template>

<section class="space-y-4">
  <template v-for="classroom, index in classrooms" :key="classroom.id">
    <div v-if="classroom.subjects.length > 0" class="border-b border-violet-300"
      @click="changeCurrent('students')">
      <h2 class="text-xl font-bold">
        Kode kelas: {{ classroom.code }} |
        Jumlah siswa: {{ classroom.student_count }}
      </h2>

      <div class="pb-2 grid md:grid-cols-2 lg:grid-cols-3 gap-2 md:gap-x-6 md:gap-y-4">
        <template v-for="subject in classroom.subjects" :key="subject.id">
          <div class="p-2 md:px-6 lg:px-8 lg:py-4 bg-violet-200 rounded-md border border-transparent shadow-gray-300 cursor-pointer hover:bg-blue-300 hover:scale-x-[1.02] hover:border-gray-400/75 hover:shadow-lg transition duration-300"
            @click="changeClassroom(index)">
            <h3 class="mb-1 text-lg font-bold dark:text-white">Mapel: {{ subject.name }}</h3>
          </div>
        </template>
      </div>
    </div>
  </template>
</section>

</template>
