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
import { computed, defineAsyncComponent, onMounted, provide, reactive, ref } from 'vue';
import { Head } from '@inertiajs/vue3';


// Components
import TeacherLayout from '@/Layouts/TeacherLayout.vue';

import Dashboard from './Dashboard.vue';
import Error     from '@/Components/Error.vue';
import Loading   from '@/Components/Loading.vue';
import Sidebar   from './Partials/Sidebar.vue';


// Variables
const students = reactive({});

const currentClassroom = ref(null);
const activeClassroom  = computed(() => props.classrooms[currentClassroom.value]);

const routes = {
  'dashboard': {
    component: Dashboard,
    props: {
      classrooms: props.classrooms,
    },
  },
  'students': {
    component: importPage('Students'),
    props: {
      // classroom: activeClassroom.value,
      currentClassroom,
      students,
    },
  },
  // 'objective': importPage('Objective'),
  'formative': {
    component: importPage('Formative'),
    props: {
      currentClassroom,
      students,
    },
  },
  /*'sumative': {
    component: importPage('Students'),
    props: {
      currentClassroom,
      students,
    },
  },*/
  // 'extras'   : importPage('Extras'),
  // 'raport'   : importPage('Raport'),
};


// Child scoped variables.
provide("$changeClassroom", index => {
  currentClassroom.value = index;

  if (students[currentClassroom.value]) return;

  fetch(route('teacher.students', activeClassroom.value.id))
    .then(response => response.json())
    .then(data => (students[currentClassroom.value] = data))
    .catch(err => console.log(err));
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
      :current="current"
      :currentClassroom="currentClassroom" />
  </template>

  <template #header="{ title }">
    <h2 class="w-screen font-semibold text-xl text-gray-800 leading-tight">
      <span>{{ title }}</span>
      <span class="ml-6">Kelas: {{ activeClassroom.class }}</span>
      <span class="ml-6">Kode: {{ activeClassroom.code }}</span>
    </h2>
  </template>

  <template #main="{ activeRoute, changeCurrent }">
    <div class="text-gray-900 max-h-screen">
      <KeepAlive>
        <component
          :is="getActiveRoute(activeRoute).component"
          :change-current="changeCurrent"
          v-bind="getActiveRoute(activeRoute).props" />
      </KeepAlive>
    </div>
  </template>
</Teacher-Layout>

</template>
