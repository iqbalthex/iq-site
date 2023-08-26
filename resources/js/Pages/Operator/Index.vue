<script setup>

import { defineAsyncComponent } from 'vue';
import { Head } from '@inertiajs/vue3';

import OperatorLayout from '@/Layouts/OperatorLayout.vue';

import Dashboard from './Dashboard.vue';
import Sidebar   from './Partials/Sidebar.vue';

const routes = {
  'dashboard': Dashboard,
  'school'   : importPage('School'),
};

const getActiveRoute = routeName => routes[routeName];


function importPage(name) {
  return defineAsyncComponent(() => import(`./${name}-Page.vue`));
}

</script>

<template>

<Head title="Operator Menu" />

<Operator-Layout>
  <template #sidebar="{ sidebarOpen, changeCurrent, current }">
    <Sidebar
      :sidebar-open="sidebarOpen"
      :change-current="changeCurrent"
      :current="current" />
  </template>

  <template #header="{ title }">
    <h2 class="w-screen font-semibold text-xl text-gray-800 leading-tight">{{ title }}</h2>
  </template>

  <template #main="{ activeRoute }">
    <div class="py-2">
      <div class="max-w-7xl mx-auto p-4 overflow-hidden shadow-sm sm:rounded-lg sm:px-6 lg:px-8">
        {{ activeRoute }}:
        <div class="p-6 text-gray-900">
          <KeepAlive>
            <component :is="getActiveRoute(activeRoute)" />
          </KeepAlive>
        </div>
      </div>
    </div>
  </template>
</Operator-Layout>

</template>
