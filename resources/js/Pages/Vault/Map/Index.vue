<script setup>
import { router } from '@inertiajs/vue3';
import { VMap, VMapMarker, VMapPinIcon, VMapOsmTileLayer } from 'vue-map-ui';
import Layout from '@/Layouts/Layout.vue';
import Avatar from '@/Shared/Avatar.vue';
defineProps({
  layoutData: Object,
  data: Object,
});

const handleClick = (url) => {
  console.log(url);
  router.visit(url);
};
</script>

<template>
  <layout title="Map" :inside-vault="true" :layout-data="layoutData">
    <main class="relative sm:mt-19">
      <!-- <div
        v-if="!!editedContact"
        class="relative z-1000"
        aria-labelledby="drawer-title"
        role="dialog"
        aria-modal="true">
        <div class="fixed inset-0 bg-gray-500/75 transition-opacity" aria-hidden="true"></div>
        <div class="fixed inset-0 overflow-hidden">
          <div class="absolute inset-0 overflow-hidden">
            <div class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-10 sm:pl-16">
              <div class="pointer-events-auto relative w-screen max-w-2xl">
                <div class="absolute top-0 right-0 -ml-8 flex pt-4 pr-2 sm:-ml-10 sm:pr-4">
                  <button
                    @click="editedContact = undefined"
                    type="button"
                    class="cursor-pointer relative rounded-md text-gray-300 hover:text-white focus-visible:ring-2 focus-visible:ring-white focus-visible:outline-hidden">
                    <span class="absolute -inset-2.5"></span>
                    <svg
                      class="size-6"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke-width="1.5"
                      stroke="black"
                      aria-hidden="true"
                      data-slot="icon">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                  </button>
                </div>

                <div class="flex h-full flex-col overflow-y-auto bg-white py-6 shadow-xl">
                  <div class="px-4 sm:px-6">
                    <h2 class="text-base font-semibold text-gray-900" id="drawer-title">{{ editedContact.name }}</h2>
                  </div>
                  <div class="relative mt-6 flex-1 px-4 sm:px-6">
                    {{ editedContact.addresses[0].line_1 }}
                  </div>
                  <div class="relative mt-6 flex-1 px-4 sm:px-6">
                    {{ editedContact }}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> -->

      <VMap style="height: 80vh" zoom="8" :center="[50.073658, 14.41854]">
        <VMapOsmTileLayer />
        <VMapMarker
          v-for="contact in data.contacts"
          @click="handleClick(contact.url.show)"
          :latlng="[contact.addresses[0].latitude, contact.addresses[0].longitude]"
          :title="contact.name"
          :key="contact.id">
          <VMapPinIcon color="#101828">
            <Avatar :data="contact.avatar" img-classes="relative h-5.5 w-5.5 rounded-full" />
          </VMapPinIcon>
        </VMapMarker>
      </VMap>
    </main>
  </layout>
</template>

<style lang="scss" scoped></style>
