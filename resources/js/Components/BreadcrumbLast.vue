<script setup>

defineProps({
  title: {
    type: String
  }
});

</script>

<template>
  <li class="pointer-events-none" aria-current="page">
    <div class="flex items-center">
      <svg class="w-4 h-4 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
      </svg>
      <span class="ml-1 text-2xl font-medium text-gray-500 md:ml-2 dark:text-gray-400">
        {{ title }}
      </span>
    </div>
  </li>
</template>
