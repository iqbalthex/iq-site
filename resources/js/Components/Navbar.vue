<script setup>



</script>

<template>
<header class="mb-2 sticky top-0 bg-violet-300">

<nav class="dark:bg-gray-900 w-full z-20 left-0 border-b border-gray-200 dark:border-gray-600">
<div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
  <ol class="inline-flex items-center space-x-1 md:space-x-3">
    <li class="inline-flex items-center">
      <a href="#" class="inline-flex items-center text-2xl font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
        <svg class="w-4 h-4 mr-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
          <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
        </svg>
        IQ-Site
      </a>
    </li>
    <li aria-current="page">
      <div class="flex items-center">
        <svg class="w-4 h-4 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
        </svg>
        <span class="ml-1 text-2xl font-medium text-gray-500 md:ml-2 dark:text-gray-400">
          Home
        </span>
      </div>
    </li>
  </ol>

  <div class="flex md:order-2">
    <button data-collapse-toggle="navbar-sticky" type="button"
      class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg
      hover:bg-violet-200/75 focus:outline-none focus:ring-2 focus:ring-gray-200
      md:hidden dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
      aria-controls="navbar-sticky" aria-expanded="false">
      <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
      </svg>
    </button>
  </div>
  <div class="items-center justify-between hidden w-full
    md:flex md:w-auto md:order-1" id="navbar-sticky">
    <ul class="flex flex-col p-4 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50
      md:p-0 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white
      dark:bg-gray-800 dark:border-gray-700
      md:dark:bg-gray-900">
      <li>
        <a href="/home" class="nav-link active
          block py-2 pl-3 pr-4 text-blue-700 hover:bg-gray-100
          md:p-0 md:hover:bg-transparent md:hover:text-blue-700
          md:dark:hover:text-blue-500">
          Beranda
        </a>
      </li>
      <li>
        <a href="/blog" class="nav-link
          block py-2 pl-3 pr-4 text-gray-900 hover:bg-gray-1
          md:p-0 md:hover:bg-transparent md:hover:text-blue-700
          md:dark:hover:text-blue-500">
          Artikel
        </a>
      </li>
      <li>
        <a href="/tutorial" class="nav-link
          block py-2 pl-3 pr-4 text-gray-900 hover:bg-gray-100
          md:p-0 md:hover:bg-transparent md:hover:text-blue-700
          md:dark:hover:text-blue-500">
          Tutorial
        </a>
      </li>
      <li>
        <a href="/learn" class="nav-link
          block py-2 pl-3 pr-4 text-gray-900 hover:bg-gray-100
          md:p-0 md:hover:bg-transparent md:hover:text-blue-700
          md:dark:hover:text-blue-500">
          Belajar
        </a>
      </li>
      <li>
        <a href="about" class="nav-link
          block py-2 pl-3 pr-4 text-gray-900 hover:bg-gray-100
          md:p-0 md:hover:bg-transparent md:hover:text-blue-700
          md:dark:hover:text-blue-500">
          Tentang saya
        </a>
      </li>
    </ul>
  </div>
</div>
</nav>

</header>
</template>
