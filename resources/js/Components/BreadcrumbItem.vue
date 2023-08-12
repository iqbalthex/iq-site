<script setup>

defineProps({
  href: {
    type: String
  },
  title: {
    type: String
  }
});

</script>

<template>
  <li class="inline-flex items-center">
    <a :href="href" class="inline-flex items-center text-2xl font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
      <svg class="w-4 h-4 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
      </svg>
      {{ title }}
    </a>
  </li>
</template>
