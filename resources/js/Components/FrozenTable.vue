<template>

<section>
  <div class="mx-auto max-w-screen-xl shadow-md">
    <div class="max-w-screen max-h-screen bg-[#999] dark:bg-gray-800 rounded">
      <div class="table-wrapper w-full h-[500px] overflow-y-scroll">
        <table class="w-full text-center text-gray-800 dark:text-gray-400">
          <thead class="sticky top-0 z-20 text-gray-700 uppercase dark:bg-gray-700 dark:text-gray-400">
            <slot name="head" />
          </thead>
          <tbody>
            <slot name="body" />
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>

</template>

<style>

.table-wrapper::-webkit-scrollbar {
  @apply hidden;
}

div.freeze {
  @apply flex items-center sticky z-10;
}

tr > div.freeze:first-child {
  @apply left-0 border-l border-slate-400;
}

tr > div.freeze:last-child {
  @apply right-0;
}

thead th {
  @apply border-r border-violet-500;
}

thead th,
tbody div > td {
  @apply px-2 py-1 whitespace-nowrap;
}

thead th {
  @apply bg-violet-300;
}

tbody tr > td {
  @apply bg-sky-200 cursor-pointer hover:bg-sky-400 transition duration-300;
}

td {
  @apply border-r border-slate-400;
}

</style>
