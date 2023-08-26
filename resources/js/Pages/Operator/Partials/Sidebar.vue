<script setup>

defineProps({
  sidebarOpen:   { type: Boolean, required: true },
  changeCurrent: { type: Function },
  current:       { type: String }
});

import DropdownGroup from '@/Components/DropdownGroup.vue';
import NavLink       from '@/Components/NavLink.vue';

// import BookIcon      from '@/Components/Icons/BookIcon.vue';
import BuildingIcon  from '@/Components/Icons/BuildingIcon.vue';
// import FileLinesIcon from '@/Components/Icons/FileLinesIcon.vue';
// import FilePenIcon   from '@/Components/Icons/FilePenIcon.vue';
import HomeIcon      from '@/Components/Icons/HomeIcon.vue';
import LogoutIcon    from '@/Components/Icons/ArrowRightBracketIcon.vue';
// import StarIcon        from '@/Components/Icons/StarIcon.vue';
import TableColumnIcon from '@/Components/Icons/TableColumnIcon.vue';
// import UsersIcon       from '@/Components/Icons/UsersIcon.vue';

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
        :is-active="current === 'school'"
        @click="changeCurrent('school')">
        <BuildingIcon #icon />
        Data Sekolah
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
