<script setup>

import { ref } from 'vue';
import { useForm } from '@inertiajs/vue3';

import NavLink from '@/Components/NavLink.vue';

const current = ref('dashboard');

const form = useForm({});

function submit() {
  // form.post(route('logout'));
}

</script>

<template>

<div>
  <div class="flex min-h-screen bg-gray-50">
    <nav>
      <div class="w-60 min-h-screen bg-violet-600 overflow-hidden">
        <!-- Logo -->
        <div class="pl-4">
          <NavLink :href="route('dashboard')">
            Raport
          </NavLink>
        </div>

        <div class="pl-4 py-3 border-t border-gray-200">
          <!-- <ResponsiveNavLink :href="route('dashboard')" :active="route().current('dashboard')">

          <Sidebar-Item name="dashboard">
            Dashboard
          </Sidebar-Item>
          <Sidebar-Item name="profile.edit">
            Profile
          </Sidebar-Item>
          <Sidebar-Item name="logout">
            Log Out
          </Sidebar-Item> -->

          <NavLink
            :href="route('dashboard')"
            :active="current === 'dashboard'"
            @click="current = 'dashboard'">
            Dashboard
          </NavLink>
          <NavLink
            :href="route('profile.edit')"
            :active="current === 'profile'"
            @click="current = 'profile'">
            Data Sekolah
          </NavLink>
          <NavLink
            :href="route('profile.edit')"
            :active="current === 'profile2'"
            @click="current = 'profile2'">
            Data Siswa
          </NavLink>

          <NavLink
            :href="route('profile.edit')"
            :active="current === 'profile3'"
            @click="current = 'profile3'">
            Tujuan Pembelajaran
          </NavLink>
          <NavLink
            :href="route('profile.edit')"
            :active="current === 'profile4'"
            @click="current = 'profile4'">
            Ekstrakurikuler
          </NavLink>

          <NavLink
            :href="route('profile.edit')"
            :active="current === 'profile5'"
            @click="current = 'profile5'">
            Penilaian Formatif
          </NavLink>
          <NavLink
            :href="route('profile.edit')"
            :active="current === 'profile6'"
            @click="current = 'profile6'">
            Penilaian Sumatif
          </NavLink>
          <NavLink
            :href="route('profile.edit')"
            :active="current === 'profile7'"
            @click="current = 'profile7'">
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

    <header v-if="$slots.header">
      <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <slot name="header" />
      </div>
    </header>

    <!--main>
      <slot />
    </main-->
  </div>
</div>

</template>
