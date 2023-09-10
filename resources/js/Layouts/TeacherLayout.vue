<script setup>

import { ref }  from 'vue';

import AngleLeftIcon  from '@/Components/Icons/AngleLeftIcon.vue';
import AngleRightIcon from '@/Components/Icons/AngleRightIcon.vue';

const sidebarOpen = ref(true);
const hambButton  = ref(null);
const current     = ref({
  routeName: 'dashboard',
  title: 'Dashboard'
});


function changeCurrent(routeName, title='') {
  current.value = { routeName, title };
}

/*
function closeSidebar({ clientX, clientY }) {
  const btnClientRect = hambButton.value.getBoundingClientRect();

  if (
    clientX < btnClientRect.left || clientX > btnClientRect.right ||
    clientY < btnClientRect.top  || clientY > btnClientRect.bottom
  ) {
    sidebarOpen.value = false;
  }
}
*/

</script>

<template>

<div class="flex min-h-screen max-h-screen overflow-y-hidden bg-gray-50">
  <slot name="sidebar"
    :sidebar-open="sidebarOpen"
    :change-current="changeCurrent"
    :current="current.routeName" />

  <div :class="sidebarOpen && 'open'" @click="closeSidebar"
    class="main-container pb-16">
    <header v-if="$slots.header">
      <div class="flex items-center py-1 border-b border-gray-200">
        <div class="ml-2 mr-8">
          <button @click="sidebarOpen = !sidebarOpen" ref="hambButton"
            class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
            <AngleLeftIcon v-show="sidebarOpen" />
            <AngleRightIcon v-show="!sidebarOpen" />
          </button>
        </div>

        <slot name="header" :title="current.title" />
      </div>
    </header>

    <main class="h-full overflow-y-scroll">
      <div class="py-2">
        <div class="max-w-7xl mx-auto p-4 overflow-hidden shadow-sm sm:rounded-lg sm:px-6 lg:px-8">
          <slot name="main"
            :active-route="current.routeName"
            :change-current="changeCurrent" />
        </div>
      </div>
    </main>
  </div>
</div>

</template>

<style scoped>

.main-container {
  max-width: calc(100% - 3.5rem);
  transition: max-width .3s;
}

.main-container.open {
  max-width: calc(100% - 15rem);
}

::-webkit-scrollbar {
  /* display: none; */
}

</style>
