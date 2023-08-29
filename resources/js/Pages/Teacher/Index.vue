<script setup>

const props = defineProps({
  user: {
    type: Object, required: true
  },
  classroomIds: {
    type: Array,  required: true
  },
  subjects: {
    type: Array,  required: true
  }
});

import { defineAsyncComponent, onMounted, ref } from 'vue';
import { Head } from '@inertiajs/vue3';

import TeacherLayout from '@/Layouts/TeacherLayout.vue';

import Dashboard from './Dashboard.vue';
import Error     from '@/Components/Error.vue';
import Loading   from '@/Components/Loading.vue';
import Sidebar   from './Partials/Sidebar.vue';

const routes = {
  'dashboard': Dashboard,
  'students' : importPage('Students'),
  'objective': importPage('Objective'),
  'formative': importPage('Formative'),
  'sumative' : importPage('Sumative'),
  'extras'   : importPage('Extras'),
  'raport'   : importPage('Raport'),
};

const getActiveRoute = routeName => {
  if (routeName.startsWith('formative.')) {
    return route['formative'];
  } else if (routeName.startsWith('sumative.')) {
    return route['sumative'];
  }

  return routes[routeName];
};


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
      :subjects="subjects" />
  </template>

  <template #header="{ title }">
    <h2 class="w-screen font-semibold text-xl text-gray-800 leading-tight">{{ title }}</h2>
  </template>

  <template #main="{ activeRoute, changeCurrent }">
    <div class="text-gray-900">
      <KeepAlive>
        <component
          :is="getActiveRoute(activeRoute)"
          :change-current="changeCurrent"
          :subjects="subjects" />
      </KeepAlive>
    </div>
  </template>
</Teacher-Layout>

</template>
