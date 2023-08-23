<script setup>

import { computed, ref } from 'vue';
import { useForm } from '@inertiajs/vue3';

import DropdownGroup from '@/Components/DropdownGroup.vue';
import NavLink       from '@/Components/NavLink.vue';

import AngleLeftIcon  from '@/Components/Icons/AngleLeftIcon.vue';
import AngleRightIcon from '@/Components/Icons/AngleRightIcon.vue';
import BookIcon       from '@/Components/Icons/BookIcon.vue';
import BuildingIcon  from '@/Components/Icons/BuildingIcon.vue';
import FileLinesIcon from '@/Components/Icons/FileLinesIcon.vue';
import FilePenIcon   from '@/Components/Icons/FilePenIcon.vue';
import HomeIcon      from '@/Components/Icons/HomeIcon.vue';
import LogoutIcon    from '@/Components/Icons/ArrowRightBracketIcon.vue';
import StarIcon        from '@/Components/Icons/StarIcon.vue';
import TableColumnIcon from '@/Components/Icons/TableColumnIcon.vue';
import UsersIcon       from '@/Components/Icons/UsersIcon.vue';

const sidebarOpen = ref(true);
const hambButton  = ref(null);
const current     = ref('dashboard');

const studies = [
  'Bahasa Indonesia',
  'Matematika',
  'IPAS',
  'Pendidikan Pancasila',
  'Bahasa Inggris',
  'Seni Budaya',
];


function submit() {
  // form.post(route('logout'));
}

function closeSidebar({ clientX, clientY }) {
  const btnClientRect = hambButton.value.getBoundingClientRect();

  if (
    clientX < btnClientRect.left || clientX > btnClientRect.right ||
    clientY < btnClientRect.top  || clientY > btnClientRect.bottom
  ) {
    sidebarOpen.value = false;
  }
}

</script>

<template>

<div>
  <div class="flex min-h-screen bg-gray-50">
    <slot name="sidebar">
      <nav :class="sidebarOpen ? 'min-w-60' : 'min-w-14'"
        class="nav-sidebar overflow-x-hidden">
        <div class="min-h-screen max-h-screen bg-violet-600 overflow-y-scroll">
          <!-- Logo -->
          <div class="pl-2">
            <NavLink
              :href="route('dashboard')">
              <HomeIcon #icon />
              Raport
            </NavLink>
          </div>

          <div class="pl-2 py-3 border-t border-gray-200">
            <!-- "route().current('dashboard')" -->

            <NavLink
              :href="route('dashboard')"
              :is-active="current === 'dashboard'"
              @click="current = 'dashboard'">
              <TableColumnIcon #icon />
              Dashboard
            </NavLink>

            <NavLink
              :href="route('profile.edit')"
              :is-active="current === 'school'"
              @click="current = 'school'">
              <BuildingIcon #icon />
              Data Sekolah
            </NavLink>

            <NavLink
              :href="route('profile.edit')"
              :is-active="current === 'students'"
              @click="current = 'students'">
              <UsersIcon #icon />
              Data Siswa
            </NavLink>

            <NavLink
              :href="route('profile.edit')"
              :is-active="current === 'objective'"
              @click="current = 'objective'">
              <BookIcon #icon />
              Tujuan Pembelajaran
            </NavLink>

            <NavLink
              :href="route('profile.edit')"
              :is-active="current === 'extra'"
              @click="current = 'extra'">
              <StarIcon #icon />
              Ekstrakurikuler
            </NavLink>

            <Dropdown-Group
              :is-active="current.startsWith('formative')"
              :item-count="studies.length">
              <template #dropdown-trigger>
                <NavLink
                  :is-active="current.startsWith('formative')"
                  @click="current = 'formative'"
                  class="dropdown-trigger">
                  <FilePenIcon #icon />
                  Penilaian Formatif
                </NavLink>
              </template>
              

              <template #dropdown-items>
                <NavLink
                  v-for="study, index in studies"
                  :key="index"
                  :is-active="current === `formative.${study}`"
                  @click="current = `formative.${study}`"
                  class="dropdown-item">
                  <FilePenIcon #icon />
                  {{ study }}
                </NavLink>
              </template>
            </Dropdown-Group>


            <Dropdown-Group
              :is-active="current.startsWith('sumative')"
              :item-count="studies.length">
              <template #dropdown-trigger>
                <NavLink
                  :is-active="current.startsWith('sumative')"
                  @click="current = 'sumative'"
                  class="dropdown-trigger">
                  <FilePenIcon #icon />
                  Penilaian Sumatif
                </NavLink>
              </template>

              <template #dropdown-items>
                <NavLink
                  v-for="study, index in studies"
                  :key="index"
                  :is-active="current === `sumative.${study}`"
                  @click="current = `sumative.${study}`"
                  class="dropdown-item">
                  <FilePenIcon #icon />
                  {{ study }}
                </NavLink>
              </template>
            </Dropdown-Group>

            <NavLink
              :href="route('profile.edit')"
              :is-active="current === 'profile7'"
              @click="current = 'profile7'">
              <FileLinesIcon #icon />
              Cetak Raport
            </NavLink>
          </div>

          <div class="pl-2 pt-3 border-t border-gray-200">
            <NavLink>
              <LogoutIcon #icon class="rotate-180" />
              <form @submit.prevent="submit">
                <button type="submit">
                  Log Out
                </button>
              </form>
            </NavLink>
          </div>
        </div>
      </nav>
    </slot>

    <div :class="sidebarOpen && 'open'" @click="closeSidebar"
      class="main-container">
      <header v-if="$slots.header">
        <div class="flex items-center py-1 border-b border-gray-200">
          <div class="ml-2 mr-8">
            <button @click="sidebarOpen = !sidebarOpen" ref="hambButton"
              class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
              <AngleLeftIcon v-show="sidebarOpen" />
              <AngleRightIcon v-show="!sidebarOpen" />
            </button>
          </div>

          <slot name="header" />
        </div>
      </header>

      <main>
        <slot name="main" :active-route="current" />
      </main>
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

.overflow-y-scroll::-webkit-scrollbar {
  @apply hidden;
}

</style>
