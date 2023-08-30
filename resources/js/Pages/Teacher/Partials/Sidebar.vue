<script setup>

const props = defineProps({
  sidebarOpen:   { type: Boolean, required: true },
  changeCurrent: { type: Function },
  current:       { type: String },
  subjects:      { type: Array }
});

import DropdownGroup from '@/Components/DropdownGroup.vue';
import NavLink       from '@/Components/NavLink.vue';

import BookIcon      from '@/Components/Icons/BookIcon.vue';
import FileLinesIcon from '@/Components/Icons/FileLinesIcon.vue';
import FilePenIcon   from '@/Components/Icons/FilePenIcon.vue';
import HomeIcon      from '@/Components/Icons/HomeIcon.vue';
import LogoutIcon    from '@/Components/Icons/ArrowRightBracketIcon.vue';
import StarIcon        from '@/Components/Icons/StarIcon.vue';
import TableColumnIcon from '@/Components/Icons/TableColumnIcon.vue';
import UsersIcon       from '@/Components/Icons/UsersIcon.vue';

</script>

<template>

<nav :class="sidebarOpen ? 'min-w-60' : 'min-w-14'"
  class="nav-sidebar overflow-x-hidden">
  <div class="sidebar min-h-screen max-h-screen bg-violet-600 overflow-y-scroll">
    <!-- Logo -->
    <div class="pl-2">
      <Nav-Link
        @click="changeCurrent('dashboard')">
        <HomeIcon #icon />
        Raport
      </Nav-Link>
    </div>

    <div class="pl-2 py-3 border-t border-gray-200">
      <Nav-Link
        :is-active="current === 'dashboard'"
        @click="changeCurrent('dashboard')">
        <TableColumnIcon #icon />
        Dashboard
      </Nav-Link>

      <Nav-Link
        :is-active="current === 'students'"
        @click="changeCurrent('students')">
        <UsersIcon #icon />
        Data Siswa
      </Nav-Link>

      <Nav-Link
        :is-active="current === 'objective'"
        @click="changeCurrent('objective')">
        <BookIcon #icon />
        Tujuan Pembelajaran
      </Nav-Link>

      <Nav-Link
        :is-active="current === 'extras'"
        @click="changeCurrent('extras')">
        <StarIcon #icon />
        Ekstrakurikuler
      </Nav-Link>

      <Dropdown-Group
        v-if="subjects"
        label="Penilaian Formatif"
        :icon="FilePenIcon"
        :item-count="subjects.length"
        :is-active="current.startsWith('formative.')">
        <template #dropdown-items>
          <Nav-Link
            v-for="subject in subjects"
            :key="subject.id"
            :is-active="current === `formative.${subject.name}`"
            @click="changeCurrent(`formative.${subject.name}`)"
            class="dropdown-item">
            <FilePenIcon #icon />
            {{ subject.name }}
          </Nav-Link>
        </template>
      </Dropdown-Group>

      <Dropdown-Group
        v-if="subjects"
        label="Penilaian Sumatif"
        :icon="FilePenIcon"
        :item-count="subjects.length">
        <template #dropdown-items>
          <Nav-Link
            v-for="subject in subjects"
            :key="subject.id"
            :is-active="current === `sumative.${subject.name}`"
            @click="changeCurrent(`sumative.${subject.name}`)"
            class="dropdown-item">
            <FilePenIcon #icon />
            {{ subject.name }}
          </Nav-Link>
        </template>
      </Dropdown-Group>

      <Nav-Link
        :is-active="current === 'print.raport'"
        @click="changeCurrent('print.raport')">
        <FileLinesIcon #icon />
        Cetak Raport
      </Nav-Link>
    </div>

    <div class="pl-2 pt-3 border-t border-gray-200">
      <Nav-Link>
        <LogoutIcon #icon class="rotate-180" />
        <form @submit.prevent="submit">
          <button type="submit">
            Log Out
          </button>
        </form>
      </Nav-Link>
    </div>
  </div>
</nav>

</template>

<style scoped>

.nav-sidebar {
  transition: min-width .3s;
}

.nav-sidebar > .sidebar::-webkit-scrollbar {
  @apply hidden;
}

</style>
