<script setup>

import { defineAsyncComponent } from 'vue';

import OperatorLayout from '@/Layouts/OperatorLayout.vue';

import Dashboard  from './Dashboard.vue';
import SideNavbar from './Partials/SideNavbar.vue';

const routes = {
  'dashboard': Dashboard,
  'school' : importPage('School'),
};

const getActiveRoute = routeName => routes[routeName];


function importPage(name) {
  return defineAsyncComponent(() => import(`./${name}-Page.vue`));
}

</script>

<template>

<Operator-Layout>
  <template #sidebar="{ sidebarOpen, changeCurrent, current }">
    <Side-Navbar
      :sidebar-open="sidebarOpen"
      :change-current="changeCurrent"
      :current="current" />
  </template>

  <template #header>
    Welcome, Operator!
  </template>

  <template #main="{ activeRoute }">
    <KeepAlive>
      <component :is="getActiveRoute(activeRoute)" />
    </KeepAlive>
  </template>
</Operator-Layout>

</template>
