<script setup>

import MainLayout from '@/Layouts/MainLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const props = defineProps({
  title: {
    type: String,
    default: 'All Posts',
  },
  posts: {
    type: Array,
  }
});

</script>

<template>
<Main-Layout>

<Head title="Log in" />

<table class="border">
  <thead>
    <tr>
      <th>#</th>
      <th>Judul</th>
      <th>Penulis</th>
    </tr>
  </thead>
  <tbody>
    <tr v-for="post in posts" :key="post.id">
      <td>{{ post.id }}</td>
      <td>{{ post.title }}</td>
      <td>{{ post.body }}</td>
    </tr>
  </tbody>
</table>

</Main-Layout>
</template>
