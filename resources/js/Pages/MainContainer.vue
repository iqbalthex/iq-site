<script setup>

import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { defineAsyncComponent } from 'vue';

const routes = {
  'dashboard': importPage('Dashboard'),
  'school':    importPage('School'),
  'students':  importPage('Students'),
  'objective': importPage('Objective'),
  'extra':     importPage('Extra'),
  'formative': importPage('Formative'),
  'sumative':  importPage('Sumative'),
  'print.raport': importPage('PrintRaport'),
};

const getActiveRoute = routeName => routes[routeName];


function importPage(name) {
  return defineAsyncComponent(() => import(`./${name}-Page.vue`));
}

</script>

<template>

<Head title="Main" />

<Authenticated-Layout>
  <template #header>
    <h2 class="w-screen font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
  </template>

  <template #main="{ activeRoute }">
    <div class="py-2">
      <div class="max-w-7xl mx-auto p-4 overflow-hidden shadow-sm sm:rounded-lg sm:px-6 lg:px-8">
        {{ activeRoute }}
        <component :is="getActiveRoute(activeRoute)"></component>
      </div>
    </div>
  </template>
</Authenticated-Layout>

</template>
