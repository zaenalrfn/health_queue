<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head, useForm, usePage } from '@inertiajs/vue3';
import { defineProps,  ref,  watch, computed } from 'vue';
import { notify } from '@kyvg/vue3-notification';


const flash = computed(() => usePage().props.flash);

watch(flash, (value: any) => {
  if (value?.success) {
    notify({
      title: "Sukses!",
      text: value.success,
      type: "success",
      duration: 3000,
    });
  }
}, { immediate: true });

type Service = {
    name: string;
    description: string;
    code: string;
}

const props = defineProps<{
    service: any;
}>();

const form = useForm<Service>({
    name: props.service.name,
    description: props.service.description,
    code: props.service.code
})

const handleSubmit = () => {
    form.put(route('admin.services.update', props.service.id));
}

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Services',
        href: '/admin/services',
    },
     {
        title: 'Edit Service',
        href: '/admin/services/edit',
    },
];
</script>

<template>
    <Head title="Edit Service" />

    <AppLayout :breadcrumbs="breadcrumbs">
          <!-- notifikasi -->
          <Notifications/>
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4 overflow-x-auto">

            <form @submit.prevent="handleSubmit" class="space-y-6">

                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Nama Service</label>
                    <div class="mt-1">
                        <input
                            type="text"
                            id="name"
                            v-model="form.name"
                            class="block w-full p-2 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                            placeholder="Service"
                        />
                    </div>
                    <p v-if="form.errors.name" class="mt-2 text-sm text-red-600">{{ form.errors.name }}</p>
                </div>

                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                    <div class="mt-1">
                        <textarea
                            id="description"
                            rows="4"
                            v-model="form.description"
                            class="block w-full rounded-md p-2 border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                            placeholder="description"
                        ></textarea>
                    </div>
                    <p v-if="form.errors.description" class="mt-2 text-sm text-red-600">{{ form.errors.description }}</p>
                </div>

                <div>
                    <label for="code" class="block text-sm font-medium text-gray-700">Code</label>
                    <div class="mt-1">
                        <input
                            type="text"
                            id="code"
                            v-model="form.code"
                            class="block w-full p-2 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                            placeholder="Code"
                        />
                    </div>
                    <p v-if="form.errors.code" class="mt-2 text-sm text-red-600">{{ form.errors.code }}</p>
                </div>

                <div class="flex justify-end gap-4 pt-4">
                    <button
                        type="button"
                        class="rounded-md bg-gray-200 px-4 py-2 text-sm font-medium text-gray-800 hover:bg-gray-300"
                        @click="$inertia.visit(route('admin.services.index'))"
                    >
                        Batal
                    </button>
                    <button
                        type="submit"
                        :disabled="form.processing"
                        :class="{ 'opacity-50': form.processing }"
                        class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-medium text-white hover:bg-indigo-700"
                    >
                        <span v-if="form.processing">Menyimpan...</span>
                        <span v-else>Simpan Perubahan</span>
                    </button>
                </div>

            </form>
        </div>
    </AppLayout>
</template>
