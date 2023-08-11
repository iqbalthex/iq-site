<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({
  canResetPassword: {
    type: Boolean,
  },
  status: {
    type: String,
  },
});

const form = useForm({
  email: '',
  password: '',
  remember: false,
});

const submit = () => {
  form.post(route('login'), {
    onFinish: () => form.reset('password'),
  });
};
</script>

<template>
<Guest-Layout>

<Head title="Log in" />

<div v-if="status" class="mb-4 font-medium text-sm text-green-600">
  {{ status }}
</div>

<form @submit.prevent="submit">
  <div>
    <Input-Label for="email" value="Email" />

    <Text-Input id="email" type="email" required
      class="mt-1 block w-full"
      v-model="form.email"
      autofocus
      autocomplete="username" />

    <Input-Error class="mt-2" :message="form.errors.email" />
  </div>

  <div class="mt-4">
    <Input-Label for="password" value="Password" />

    <Text-Input id="password" type="password" required
      class="mt-1 block w-full"
      v-model="form.password"
      autocomplete="current-password" />

    <Input-Error class="mt-2" :message="form.errors.password" />
  </div>

  <div class="block mt-4">
    <label class="flex items-center">
      <Checkbox name="remember" v-model:checked="form.remember" />
      <span class="ml-2 text-sm text-gray-600">Remember me</span>
    </label>
  </div>

  <div class="flex items-center justify-end mt-4">
    <Link v-if="canResetPassword" :href="route('password.request')"
      class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
      Forgot your password?
    </Link>

    <Primary-Button class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
      Log in
    </Primary-Button>
  </div>
</form>

</Guest-Layout>
</template>
