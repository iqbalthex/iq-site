<script setup>

import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
// import { computed } from 'vue';

const routes = {
  'dashboard': {
    // component: import('@/Components/Dashboard.vue'),
    name: 'Dashboard da yo',
    props: {}
  },
  'school': {
    // component: import('@/Components/Dashboard.vue'),
    name: 'School da yo',
    props: {}
  },
};

const getActiveRoute = routeName => {
  return routes[routeName];
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
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-4">
            {{ getActiveRoute(activeRoute).name }}
            <!-- <Suspense> -->
              <!-- <component :is="activeRoute.component"></component> -->
              <!-- <component :is="getActiveRoute(activeRoute).component"></component> -->
            <!-- </Suspense> -->
          </div>
        </div>
      </div>
    </div>
  </template>
</Authenticated-Layout>

</template>
