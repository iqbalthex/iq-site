<script setup>

import { ref } from 'vue';
import { useForm } from '@inertiajs/vue3';

import NavLink from '@/Components/NavLink.vue';

import BookIcon     from '@/Components/Icons/BookIcon.vue';
import BuildingIcon from '@/Components/Icons/BuildingIcon.vue';
import FileLinesIcon from '@/Components/Icons/FileLinesIcon.vue';
import FilePenIcon   from '@/Components/Icons/FilePenIcon.vue';
import HomeIcon from '@/Components/Icons/HomeIcon.vue';
import StarIcon from '@/Components/Icons/StarIcon.vue';
import TableColumnIcon from '@/Components/Icons/TableColumnIcon.vue';
import UsersIcon from '@/Components/Icons/UsersIcon.vue';

const sidebarOpen = ref(false);
const hambButton = ref(null);
const current = ref('dashboard');

const form = useForm({});

function submit() {
  // form.post(route('logout'));
}

function closeSidebar({ clientX, clientY }) {
  const btnClientRect = hambButton.value.getBoundingClientRect();

  if (
    clientX < btnClientRect.left || clientX > btnClientRect.right  ||
    clientY < btnClientRect.top  || clientY > btnClientRect.bottom
  ) {
    sidebarOpen.value = false;
  }
}

</script>

<template>

<div>
  <div class="flex min-h-screen bg-gray-50">
    <nav :class="sidebarOpen ? 'min-w-60' : 'min-w-14'"
      class="nav-sidebar overflow-x-hidden">
      <div class="min-h-screen bg-violet-600">
        <!-- Logo -->
        <div class="pl-2">
          <NavLink :href="route('dashboard')">
            <HomeIcon #icon />
            Raport
          </NavLink>
        </div>

        <div class="pl-2 py-3 border-t border-gray-200">
          <!-- <ResponsiveNavLink :href="route('dashboard')" :active="route().current('dashboard')"> -->

          <NavLink
            :href="route('dashboard')"
            :active="current === 'dashboard'"
            @click="current = 'dashboard'">
            <TableColumnIcon #icon />
            Dashboard
          </NavLink>
          <NavLink
            :href="route('profile.edit')"
            :active="current === 'profile'"
            @click="current = 'profile'">
            <BuildingIcon #icon />
            Data Sekolah
          </NavLink>
          <NavLink
            :href="route('profile.edit')"
            :active="current === 'profile2'"
            @click="current = 'profile2'">
            <UsersIcon #icon />
            Data Siswa
          </NavLink>

          <NavLink
            :href="route('profile.edit')"
            :active="current === 'profile3'"
            @click="current = 'profile3'">
            <BookIcon #icon />
            Tujuan Pembelajaran
          </NavLink>
          <NavLink
            :href="route('profile.edit')"
            :active="current === 'profile4'"
            @click="current = 'profile4'">
            <StarIcon #icon />
            Ekstrakurikuler
          </NavLink>

          <NavLink
            :href="route('profile.edit')"
            :active="current === 'profile5'"
            @click="current = 'profile5'">
            <FilePenIcon #icon />
            Penilaian Formatif
          </NavLink>
          <NavLink
            :href="route('profile.edit')"
            :active="current === 'profile6'"
            @click="current = 'profile6'">
            <FilePenIcon #icon />
            Penilaian Sumatif
          </NavLink>
          <NavLink
            :href="route('profile.edit')"
            :active="current === 'profile7'"
            @click="current = 'profile7'">
            <FileLinesIcon #icon />
            Cetak Raport
          </NavLink>
        </div>

        <div class="pl-2 pt-3 border-t border-gray-200">
          <NavLink>
            <FileLinesIcon #icon />
            <form @submit.prevent="submit">
              <button type="submit">
                Log Out
              </button>
            </form>
          </NavLink>
        </div>
      </div>
    </nav>

    <div :class="sidebarOpen && 'open'" @click="closeSidebar"
      class="main-container">
      <header v-if="$slots.header">
        <div class="flex items-center py-1 border-b border-gray-200">
          <div class="mx-2">
            <button @click="sidebarOpen = !sidebarOpen" ref="hambButton"
              class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
              <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <path :class="{ hidden: sidebarOpen, inlineFlex: !sidebarOpen }"
                  stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M4 6h16M4 12h16M4 18h16" />
                <path :class="{ hidden: !sidebarOpen, inlineFlex: sidebarOpen }"
                  stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
          </div>

          <slot name="header" />
        </div>
      </header>

      <!--main>
        <slot />
      </main-->
    </div>
  </div>
</div>

</template>

<style scoped>

.nav-sidebar {
  transition: min-width .3s;
}

.main-container {
  max-width: calc(100% - 3.5rem);
  transition: max-width .3s;
}

.main-container.open {
  max-width: calc(100% - 15rem);
}

</style>
