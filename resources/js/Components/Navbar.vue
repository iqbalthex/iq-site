<script setup>

import BreadcrumbItem from '@/Components/BreadcrumbItem.vue';
import BreadcrumbLast from '@/Components/BreadcrumbLast.vue';
import HamburgerIcon from '@/Components/Icons/HamburgerIcon.vue';
import NavLink from '@/Components/NavLink.vue';

defineProps({
  paths: {
    type: Array,
    default: [{ title: 'Beranda' }],
  },
});

</script>

<template>
<header class="mb-2 sticky top-0 bg-violet-200">

<nav class="dark:bg-gray-900 w-full z-20 left-0 border-b border-gray-200 dark:border-gray-600">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto px-4 py-2">
    <a :href="route('home')" class="inline-flex items-center text-2xl font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
      <svg class="w-4 h-4 mr-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
        <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
      </svg>
      IQ-Site
    </a>

    <ol class="inline-flex items-center space-x-1 md:space-x-3">
      <template v-for="path, index in paths" :key="index">
        <Breadcrumb-Item v-if="(index + 1) !== paths.length"
          :href="path.url"
          :title="path.title" />
        <Breadcrumb-Last v-else
          :title="path.title" />
      </template>
    </ol>

    <div class="flex md:order-2">
      <button data-collapse-toggle="navbar-sticky" type="button"
        class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg hover:bg-violet-100/50
        hover:bg-violet-200/75 focus:outline-none focus:ring-2 focus:ring-gray-200
        md:hidden dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
        aria-controls="navbar-sticky" aria-expanded="false">
        <Hamburger-Icon />
      </button>
    </div>

    <div class="hidden w-full ms-auto text-lg
      md:flex md:w-auto md:order-1" id="navbar-sticky">
      <ul class="flex flex-col p-2 mt-4 font-medium border border-gray-100 rounded-lg bg-violet-100
        md:px-2 md:py-0.5 md:flex-row md:space-x-6 md:mt-0 md:border-0 md:bg-transparent
        dark:bg-gray-800 dark:border-gray-700
        md:dark:bg-gray-900">
        <Nav-Link href="route('home')" :active="true">Beranda</Nav-Link>
        <Nav-Link href="route('blog')" :active="false">Artikel</Nav-Link>
        <Nav-Link href="route('blog')" :active="false">Tutorial</Nav-Link>
        <Nav-Link href="route('blog')" :active="false">Belajar</Nav-Link>
        <Nav-Link href="route('blog')" :active="false">Tentang saya</Nav-Link>
      </ul>
    </div>
  </div>
</nav>

</header>
</template>
