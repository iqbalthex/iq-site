<script setup>

import { defineAsyncComponent } from 'vue';

import TeacherLayout from '@/Layouts/TeacherLayout.vue';

import Dashboard  from './Dashboard.vue';
import SideNavbar from './Partials/SideNavbar.vue';

const routes = {
  'dashboard': Dashboard,
  'school'   : importPage('School'),
  'students' : importPage('Students'),
  'formative': importPage('Formative'),
  'sumative' : importPage('Sumative'),
  'raport'   : importPage('Raport'),
};

const getActiveRoute = routeName => routes[routeName];


function importPage(name) {
  return defineAsyncComponent(() => import(`./${name}-Page.vue`));
}

</script>

<template>

<Teacher-Layout>
  <template #sidebar="{ sidebarOpen, changeCurrent, current }">
    <Side-Navbar
      :sidebar-open="sidebarOpen"
      :change-current="changeCurrent"
      :current="current" />
  </template>

  <template #header>
    Welcome, Teacher!
  </template>

  <template #main="{ activeRoute }">
    <KeepAlive>
      <component :is="getActiveRoute(activeRoute)" />
    </KeepAlive>
  </template>
</Teacher-Layout>

</template>
