<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head, useForm, usePage, router, Link } from '@inertiajs/vue3';
import { ref,  watch, computed } from 'vue';
import { notify } from '@kyvg/vue3-notification';
import { Trash, Edit } from 'lucide-vue-next';


interface Service {
    name: string;
    description: string;
    code: string;
}
const flash = computed(() => usePage().props.flash);
const showModalCreate = ref(false);
const showModalDelete = ref(false);
const serviceToDelete = ref<{ id: number, name: string } | null>(null);

function openDeleteModal(service: { id: number, name: string }) {
    serviceToDelete.value = service;
    showModalDelete.value = true;
}

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


const form = useForm<Service>({
    name: '',
    description: '',
    code: '',
});

const submitForm = () => {
    form.post('/admin/services', {
        onSuccess: () => {
            form.reset();
            showModalCreate.value = false;
        }
    });
};
const submitFormDelete = (id: any) => {
    router.delete(`/admin/services-delete/${id}`, {
        onSuccess: () => {
            showModalDelete.value = false;
        }
    });
}

// data service
defineProps<{
    services: {
        data: any[];
        links: any[];
    }
}>();
function goToPage(url) {
    if (url) {
        router.get(url, {}, {
            preserveState: true,
            preserveScroll: true,
        });
    }
}

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Services',
        href: '/admin/services',
    },
];
</script>

<template>

    <Head title="Services" />

    <AppLayout :breadcrumbs="breadcrumbs">
          <!-- notifikasi -->
          <Notifications/>
        <div class="flex flex-col gap-4 p-4">
            <div class="flex justify-between items-center">
                <!-- Trigger Button -->
                <button @click="showModalCreate = true"
                    class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
                    + Add Service
                </button>
            </div>

            <div class="overflow-x-auto rounded-md shadow-md">
                <table class="min-w-full divide-y divide-gray-200 bg-white">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Name</th>
                            <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Code</th>
                            <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Description</th>
                            <th class="px-4 py-3 text-center text-sm font-medium text-gray-700">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">

                        <tr v-for="service in services.data" :key="service.id" class="hover:bg-gray-50">
                            <td class="px-4 py-3">{{ service.name }}</td>
                            <td class="px-4 py-3">{{ service.code }}</td>
                            <td class="px-4 py-3">{{ service.description ?? "-" }}</td>
                            <td class="px-4 py-3 flex justify-center gap-2">
                                <Link :href="route('admin.services.edit', service.id)" class="text-blue-600 cursor-pointer"><Edit/></Link>
                                <button class="text-red-600 cursor-pointer"  @click="openDeleteModal(service)"><Trash/></button>
                            </td>
                            <!-- dialog delete -->
                               <Transition name="fade">
                <div v-if="showModalDelete" class="fixed inset-0 bg-black/50 flex items-center justify-center z-50">
                    <Transition name="scale-fade">
                        <div class="bg-white rounded-xl shadow-lg p-6 w-full max-w-lg" v-if="showModalDelete">
                            <!-- Modal Content -->
                            <h2 class="text-xl text-center font-bold mb-4">Hapus Service {{ serviceToDelete?.name }}?</h2>

                            <form @submit.prevent="submitFormDelete(serviceToDelete?.id)" class="flex flex-col gap-4">
                                <div class="flex justify-center gap-2 mt-4">
                                    <button type="button" @click="showModalDelete = false"
                                        class="px-4 py-2 rounded-lg border hover:bg-gray-100">
                                        Cancel
                                    </button>
                                    <button type="submit"
                                        class="px-4 py-2 rounded-lg bg-red-600 text-white hover:bg-red-700">
                                        Delete
                                    </button>
                                </div>
                            </form>
                        </div>
                    </Transition>
                </div>
            </Transition>
                        </tr>
                        <tr v-if="services.data.length === 0">
                            <td colspan="4" class="text-center py-4 text-gray-500">No services found.</td>
                        </tr>
                    </tbody>
                </table>
            </div>
             <!-- Pagination -->
        <div class="flex justify-end mt-2 gap-2">
            <button
                v-for="link in services.links"
                :key="link.label"
                v-html="link.label"
                :disabled="!link.url"
                @click="goToPage(link.url)"
                class="px-3 py-1 border rounded hover:bg-gray-100"
                :class="{ 'bg-gray-300': link.active, 'text-gray-500': !link.url }"
            ></button>
        </div>

            <!-- Modal Overlay + Animasi -->
            <Transition name="fade">
                <div v-if="showModalCreate" class="fixed inset-0 bg-black/50 flex items-center justify-center z-50">
                    <Transition name="scale-fade">
                        <div class="bg-white rounded-xl shadow-lg p-6 w-full max-w-lg" v-if="showModalCreate">
                            <!-- Modal Content -->
                            <h2 class="text-xl font-bold mb-4">Create Service</h2>

                            <form @submit.prevent="submitForm" class="flex flex-col gap-4">
                                <div>
                                    <label class="block mb-1 font-medium">Name</label>
                                    <input v-model="form.name" type="text"
                                        class="w-full border rounded-lg p-2 focus:outline-none focus:ring"
                                        placeholder="Enter service name" />
                                    <span v-if="form.errors.name" class="text-red-500 text-sm">{{ form.errors.name
                                    }}</span>
                                </div>
                                <div>
                                    <label class="block mb-1 font-medium">Code</label>
                                    <input v-model="form.code" type="text"
                                        class="w-full border rounded-lg p-2 focus:outline-none focus:ring"
                                        placeholder="Enter service code" />
                                    <span v-if="form.errors.code" class="text-red-500 text-sm">{{ form.errors.code
                                        }}</span>
                                </div>
                                <div>
                                    <label class="block mb-1 font-medium">Description (Opsional)</label>
                                    <input v-model="form.description" type="text"
                                        class="w-full border rounded-lg p-2 focus:outline-none focus:ring"
                                        placeholder="Enter service description" />
                                    <span v-if="form.errors.description" class="text-red-500 text-sm">{{
                                        form.errors.description }}</span>
                                </div>
                                <div class="flex justify-end gap-2 mt-4">
                                    <button type="button" @click="showModalCreate = false"
                                        class="px-4 py-2 rounded-lg border hover:bg-gray-100">
                                        Cancel
                                    </button>
                                    <button type="submit" :disabled="form.processing"
                                        class="px-4 py-2 rounded-lg bg-blue-600 text-white hover:bg-blue-700">
                                        {{ form.processing ? 'Saving...' : 'Save' }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </Transition>
                </div>
            </Transition>

        </div>
    </AppLayout>
</template>

<style scoped>
.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.2s ease;
}

.fade-enter-from,
.fade-leave-to {
    opacity: 0;
}

.scale-fade-enter-active,
.scale-fade-leave-active {
    transition: opacity 0.2s ease, transform 0.2s ease;
}

.scale-fade-enter-from,
.scale-fade-leave-to {
    opacity: 0;
    transform: scale(0.95);
}
</style>
