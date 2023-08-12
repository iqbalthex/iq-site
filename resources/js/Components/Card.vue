<script setup>

defineProps({
  url: { type: String, default: '#' },
  image: { type: String, default: 'ru.jpg' },
});

</script>

<template>
  <a :href="url" class="flex flex-col items-center bg-white border border-gray-800 rounded-2xl shadow-md overflow-hidden hover:bg-gray-100
    md:flex-row md:max-w-xl
    dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
    <img class="object-cover w-full h-96
      md:w-48 md:h-auto"
      :src="`images/${image}`" alt="" />
    <div class="flex flex-col justify-between p-4 leading-normal">
      <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900
        dark:text-white">
        <slot name="card-title" />
      </h5>
      <p class="mb-3 font-normal text-gray-700
        dark:text-gray-400">
        <slot name="card-body" />
      </p>
    </div>
  </a>
</template>
