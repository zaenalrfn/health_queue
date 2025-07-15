<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Waiting List',
        href: '/admin/queue',
    },
];
</script>

<template>

    <Head title="Dashboard" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4 overflow-x-auto">
            <nav class="tabs bg-base-200 rounded-field w-fit space-x-1 overflow-x-auto p-1" aria-label="Tabs"
                role="tablist" aria-orientation="horizontal">
                <button type="button"
                    class="btn btn-text active-tab:bg-primary active-tab:text-white hover:text-primary active hover:bg-transparent"
                    id="tabs-segment-item-1" data-tab="#tabs-segment-1" aria-controls="tabs-segment-1" role="tab"
                    aria-selected="true">
                    Poli Umum
                </button>
                <button type="button"
                    class="btn btn-text active-tab:bg-primary active-tab:text-white hover:text-primary hover:bg-transparent"
                    id="tabs-segment-item-2" data-tab="#tabs-segment-2" aria-controls="tabs-segment-2" role="tab"
                    aria-selected="false">
                    Poli GIzi
                </button>
            </nav>

            <div class="mt-3">
                <div id="tabs-segment-1" role="tabpanel" aria-labelledby="tabs-segment-item-1">
                    <div class="bg-base-100 flex flex-col rounded-md shadow-base-300/20 shadow-sm" data-datatable='{
  "pageLength": 10,
  "pagingOptions": {
    "pageBtnClasses": "btn btn-text btn-circle btn-sm"
  }
}'>
                        <div class="overflow-x-auto">
                            <div class="inline-block min-w-full align-middle">
                                <div class="overflow-hidden">
                                    <table class="table min-w-full">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="group">
                                                    <div class="flex items-center justify-between">
                                                        No Antrean
                                                        <span
                                                            class="icon-[tabler--chevron-up] hidden datatable-ordering-asc:block"></span>
                                                        <span
                                                            class="icon-[tabler--chevron-down] hidden datatable-ordering-desc:block"></span>
                                                    </div>
                                                </th>
                                                <th scope="col" class="group">
                                                    <div class="flex items-center justify-between">
                                                        Jam Antrean
                                                        <span
                                                            class="icon-[tabler--chevron-up] hidden datatable-ordering-asc:block"></span>
                                                        <span
                                                            class="icon-[tabler--chevron-down] hidden datatable-ordering-desc:block"></span>
                                                    </div>
                                                </th>
                                                <th scope="col" class="group">
                                                    <div class="flex items-center justify-between">
                                                        Status
                                                        <span
                                                            class="icon-[tabler--chevron-up] hidden datatable-ordering-asc:block"></span>
                                                        <span
                                                            class="icon-[tabler--chevron-down] hidden datatable-ordering-desc:block"></span>
                                                    </div>
                                                </th>
                                                <th scope="col" class="group">
                                                    <div class="flex items-center justify-between">
                                                        Actions
                                                        <span
                                                            class="icon-[tabler--chevron-up] hidden datatable-ordering-asc:block"></span>
                                                        <span
                                                            class="icon-[tabler--chevron-down] hidden datatable-ordering-desc:block"></span>
                                                    </div>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>John Doe</td>
                                                <td>johndoe@example.com</td>
                                                <td><span
                                                        class="badge badge-soft badge-success badge-sm">Professional</span>
                                                </td>
                                                <td>
                                                    <button class="btn btn-circle btn-text btn-sm"
                                                        aria-label="Action button">
                                                        <span class="icon-[tabler--circle-check] size-5"></span>
                                                    </button>
                                                    <button class="btn btn-circle btn-text btn-sm"
                                                        aria-label="Action button">
                                                        <span class="icon-[tabler--volume] size-5"></span>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Jane Smith</td>
                                                <td>janesmith@example.com</td>
                                                <td><span class="badge badge-soft badge-error badge-sm">Rejected</span>
                                                </td>
                                                <td>
                                                    <button class="btn btn-circle btn-text btn-sm"
                                                        aria-label="Action button">
                                                        <span class="icon-[tabler--circle-check] size-5"></span>
                                                    </button>
                                                    <button class="btn btn-circle btn-text btn-sm"
                                                        aria-label="Action button">
                                                        <span class="icon-[tabler--volume] size-5"></span>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div
                            class="border-base-content/25 flex items-center justify-between gap-3 border-t p-3 max-md:flex-wrap max-md:justify-center">
                            <div class="text-sm text-base-content/80" data-datatable-info="">
                                Showing
                                <span data-datatable-info-from=""></span>
                                to
                                <span data-datatable-info-to=""></span>
                                of
                                <span data-datatable-info-length=""></span>
                                users
                            </div>
                            <div class="flex hidden items-center space-x-1" data-datatable-paging="">
                                <button type="button" class="btn btn-text btn-circle btn-sm"
                                    data-datatable-paging-prev="">
                                    <span class="icon-[tabler--chevrons-left] size-4.5 rtl:rotate-180"></span>
                                    <span class="sr-only">Previous</span>
                                </button>
                                <div class="flex items-center space-x-1 [&>.active]:text-bg-soft-primary"
                                    data-datatable-paging-pages=""></div>
                                <button type="button" class="btn btn-text btn-circle btn-sm"
                                    data-datatable-paging-next="">
                                    <span class="sr-only">Next</span>
                                    <span class="icon-[tabler--chevrons-right] size-4.5 rtl:rotate-180"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="tabs-segment-2" class="hidden" role="tabpanel" aria-labelledby="tabs-segment-item-2">
                     <div class="bg-base-100 flex flex-col rounded-md shadow-base-300/20 shadow-sm" data-datatable='{
  "pageLength": 10,
  "pagingOptions": {
    "pageBtnClasses": "btn btn-text btn-circle btn-sm"
  }
}'>
                        <div class="overflow-x-auto">
                            <div class="inline-block min-w-full align-middle">
                                <div class="overflow-hidden">
                                    <table class="table min-w-full">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="group">
                                                    <div class="flex items-center justify-between">
                                                        No Antrean
                                                        <span
                                                            class="icon-[tabler--chevron-up] hidden datatable-ordering-asc:block"></span>
                                                        <span
                                                            class="icon-[tabler--chevron-down] hidden datatable-ordering-desc:block"></span>
                                                    </div>
                                                </th>
                                                <th scope="col" class="group">
                                                    <div class="flex items-center justify-between">
                                                        Jam Antrean
                                                        <span
                                                            class="icon-[tabler--chevron-up] hidden datatable-ordering-asc:block"></span>
                                                        <span
                                                            class="icon-[tabler--chevron-down] hidden datatable-ordering-desc:block"></span>
                                                    </div>
                                                </th>
                                                <th scope="col" class="group">
                                                    <div class="flex items-center justify-between">
                                                        Status
                                                        <span
                                                            class="icon-[tabler--chevron-up] hidden datatable-ordering-asc:block"></span>
                                                        <span
                                                            class="icon-[tabler--chevron-down] hidden datatable-ordering-desc:block"></span>
                                                    </div>
                                                </th>
                                                <th scope="col" class="group">
                                                    <div class="flex items-center justify-between">
                                                        Actions
                                                        <span
                                                            class="icon-[tabler--chevron-up] hidden datatable-ordering-asc:block"></span>
                                                        <span
                                                            class="icon-[tabler--chevron-down] hidden datatable-ordering-desc:block"></span>
                                                    </div>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>John Doe</td>
                                                <td>johndoe@example.com</td>
                                                <td><span
                                                        class="badge badge-soft badge-success badge-sm">Professional</span>
                                                </td>
                                                <td>
                                                    <button class="btn btn-circle btn-text btn-sm"
                                                        aria-label="Action button">
                                                        <span class="icon-[tabler--circle-check] size-5"></span>
                                                    </button>
                                                    <button class="btn btn-circle btn-text btn-sm"
                                                        aria-label="Action button">
                                                        <span class="icon-[tabler--volume] size-5"></span>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Jane Smith</td>
                                                <td>janesmith@example.com</td>
                                                <td><span class="badge badge-soft badge-error badge-sm">Rejected</span>
                                                </td>
                                                <td>
                                                    <button class="btn btn-circle btn-text btn-sm"
                                                        aria-label="Action button">
                                                        <span class="icon-[tabler--circle-check] size-5"></span>
                                                    </button>
                                                    <button class="btn btn-circle btn-text btn-sm"
                                                        aria-label="Action button">
                                                        <span class="icon-[tabler--volume] size-5"></span>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div
                            class="border-base-content/25 flex items-center justify-between gap-3 border-t p-3 max-md:flex-wrap max-md:justify-center">
                            <div class="text-sm text-base-content/80" data-datatable-info="">
                                Showing
                                <span data-datatable-info-from=""></span>
                                to
                                <span data-datatable-info-to=""></span>
                                of
                                <span data-datatable-info-length=""></span>
                                users
                            </div>
                            <div class="flex hidden items-center space-x-1" data-datatable-paging="">
                                <button type="button" class="btn btn-text btn-circle btn-sm"
                                    data-datatable-paging-prev="">
                                    <span class="icon-[tabler--chevrons-left] size-4.5 rtl:rotate-180"></span>
                                    <span class="sr-only">Previous</span>
                                </button>
                                <div class="flex items-center space-x-1 [&>.active]:text-bg-soft-primary"
                                    data-datatable-paging-pages=""></div>
                                <button type="button" class="btn btn-text btn-circle btn-sm"
                                    data-datatable-paging-next="">
                                    <span class="sr-only">Next</span>
                                    <span class="icon-[tabler--chevrons-right] size-4.5 rtl:rotate-180"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
