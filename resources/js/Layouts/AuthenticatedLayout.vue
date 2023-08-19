<script setup>

import { ref } from 'vue';
import { useForm } from '@inertiajs/vue3';

import NavLink from '@/Components/NavLink.vue';

import BookIcon     from '@/Components/Icons/BookIcon.vue';
import BuildingIcon from '@/Components/Icons/BuildingIcon.vue';
import FileLinesIcon from '@/Components/Icons/FileLinesIcon.vue';
import FilePenIcon   from '@/Components/Icons/FilePenIcon.vue';
import HomeIcon  from '@/Components/Icons/HomeIcon.vue';
import StarIcon  from '@/Components/Icons/StarIcon.vue';
import UsersIcon from '@/Components/Icons/UsersIcon.vue';

const sidebarOpen = ref(true);
const current = ref('dashboard');

const form = useForm({});

function submit() {
  // form.post(route('logout'));
}

</script>

<template>

<div>
  <div class="min-h-screen bg-gray-50" style="display: flex">
    <nav :class="sidebarOpen ? 'min-w-60' : 'min-w-20'"
      class="overflow-hidden transition-all duration-300">
      <div class="w-60 min-h-screen bg-violet-600">
        <!-- Logo -->
        <div class="pl-4">
          <NavLink :href="route('dashboard')">
            Raport
          </NavLink>
        </div>

        <div class="pl-4 py-3 border-t border-gray-200">
          <!-- <ResponsiveNavLink :href="route('dashboard')" :active="route().current('dashboard')"> -->

          <NavLink
            :href="route('dashboard')"
            :active="current === 'dashboard'"
            @click="current = 'dashboard'">
            <HomeIcon #icon />
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

        <div class="pl-4 pt-3 border-t border-gray-200">
          <form @submit.prevent="submit">
            <button type="submit"
              class="w-full pl-3 text-left text-lg text-gray-100 font-medium tracking-tight hover:text-yellow-200 hover:tracking-normal cursor-pointer transition duration-150 ease-in-out">
              Log Out
            </button>
          </form>
        </div>
      </div>
    </nav>

    <div class="w-full">
      <header v-if="$slots.header">
        <div class="flex items-center py-0.5 border-b border-gray-300">
          <div class="mx-2">
            <button @click="sidebarOpen = !sidebarOpen"
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
