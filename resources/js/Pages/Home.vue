<script setup>

import MainLayout from '@/Layouts/MainLayout.vue';
//import PrimaryButton from '@/Components/PrimaryButton.vue';
//import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const props = defineProps({
  post: {
    type: Object,
  }
});

</script>

<template>
<Main-Layout>

<Head title="Beranda" />

<section class="dark:bg-gray-900">
  <div class="px-4 max-w-screen-xl md:px-12 lg:px-16">
    <div class="max-w-screen-lg text-gray-500 md:w-4/5 sm:text-lg dark:text-gray-400">
      <Page-Title>Welcome Page</Page-Title>
      <p class="mb-4">Halo, selamat datang di IQ-SITE, situs yang saya buat. Tujuan dibuatnya situs ini adalah melatih kemampuan menulis saya dan berbagi pengetahuan mengenai teknologi dengan orang-orang termasuk kamu. Berikut detail masing-masing halaman pada IQ-SITE.</p>

      <!-- <Paragraph> -->
        <!-- <template #head> -->
          <!-- Beranda -->
        <!-- </template> -->
        <!-- <template #body> -->
        <!-- </template> -->
      <!-- </Paragraph> -->

      <h3 class="mb-1 text-2xl font-medium text-gray-800 dark:text-white">Beranda</h3>
      <p class="mb-4">Halaman saat ini, pembuka dan perkenalan situs saya kepada teman-teman sebagai pembaca, agar mengetahui tujuan situs ini dibuat serta fitur atau hal apa saja yang bisa kamu lakukan disini.</p>

      <h3 class="mb-1 text-2xl font-medium text-gray-800 dark:text-white">Artikel</h3>
      <p class="mb-4">Halaman artikel adalah halaman yang saya gunakan untuk menyimpan hasil tulisan saya agar bisa kamu baca. Untuk saat ini, halaman blog hanya akan memuat tulisan dari saya.</p>

      <h3 class="mb-1 text-2xl font-medium text-gray-800 dark:text-white">Tutorial</h3>
      <p class="mb-4">Halaman tutorial adalah halaman dimana saya akan menyimpan tulisan yang berisi prosedur atau langkah-langkah melakukan sesuatu.</p>

      <h3 class="mb-1 text-2xl font-medium text-gray-800 dark:text-white">Belajar</h3>
      <p class="mb-4">Halaman belajar adalah halaman dimana kamu bisa mempelajari secara mendalam mengenai teknologi.</p>

      <p class="mb-4">Sebagai penutup, supaya kita bisa saling mengenal, kamu bisa kunjungi halaman "About me". Situs ini masih akan saya kembangkan agar menjadi lebih baik, karena itu request, kritik dan saran bisa kamu sampaikan pada kolom komentar di bawah.</p>
      <p>Terima kasih telah membaca sampai akhir. Tetap semangat dan sampai bertemu kembali di artikel berikutnya.</p>
    </div>
  </div>
</section>

</Main-Layout>
</template>
