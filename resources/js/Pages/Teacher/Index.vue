<script setup>

const props = defineProps({
  classrooms: {
    type: Array,  required: true
  },
  user: {
    type: Object, required: true
  }
});


// Modules
import { computed, defineAsyncComponent, onMounted, provide, ref } from 'vue';
import { Head } from '@inertiajs/vue3';


// Components
import TeacherLayout from '@/Layouts/TeacherLayout.vue';

import Dashboard from './Dashboard.vue';
import Error     from '@/Components/Error.vue';
import Loading   from '@/Components/Loading.vue';
import Sidebar   from './Partials/Sidebar.vue';


// Variables
const students = ref({});

const currentClassroom = ref(null);
const activeClassroom  = computed(() => props.classrooms[currentClassroom.value]);

const routes = {
  'dashboard': {
    component: Dashboard,
    props: { classrooms: props.classrooms }
  },
  'students': {
    component: importPage('Students'),
    props: { students }
  },
  // 'objective': importPage('Objective'),
  // 'formative': importPage('Formative'),
  // 'sumative' : importPage('Sumative'),
  // 'extras'   : importPage('Extras'),
  // 'raport'   : importPage('Raport'),
};


// Child scoped variables.
provide("$changeClassroom", async index => {
  currentClassroom.value = index;

  const response = await fetch(route('teacher.students', activeClassroom.value.id));
  const data = await response.json();

  students.value[index] = data;
  // console.log(students.value[currentClassroom.value]);
});


// Functions
/**
 * Get current active route.
 *
 * @param  {string} routeName
 * @return {string}
 */
function getActiveRoute(routeName) {
  return routes[routeName.split('.')[0]];
}

/**
 * Import page dynamically.
 *
 * @param  {string} name
 * @return {Object}
 */
function importPage(name) {
  return defineAsyncComponent({
    loader: () => import(`./${name}-Page.vue`),

    loadingComponent: Loading,
    delay: 200,

    errorComponent: Error,
    timeout: 3000,
  });
}

</script>

<template>

<Head title="Teacher Menu" />

<Teacher-Layout>
  <template #sidebar="{ sidebarOpen, changeCurrent, current }">
    <Sidebar
      :sidebar-open="sidebarOpen"
      :change-current="changeCurrent"
      :current="current" />
      <!-- :subjects="activeClassroom.subjects" /> -->
  </template>

  <template #header="{ title }">
    <h2 class="w-screen font-semibold text-xl text-gray-800 leading-tight">{{ title }}</h2>
  </template>

  <template #main="{ activeRoute, changeCurrent }">
    <div class="text-gray-900">
      <KeepAlive>
        <component
          :is="getActiveRoute(activeRoute).component"
          :props="getActiveRoute(activeRoute).props"
          :change-current="changeCurrent" />
      </KeepAlive>
    </div>
  </template>
</Teacher-Layout>

</template>
