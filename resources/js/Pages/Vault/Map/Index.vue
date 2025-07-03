<script setup>
import { ref } from 'vue';
import { VMap, VMapMarker, VMapPinIcon, VMapOsmTileLayer } from 'vue-map-ui';
import Layout from '@/Layouts/Layout.vue';
defineProps({
  layoutData: Object,
  data: Object,
});

const editedContact = ref(undefined);
</script>

<template>
  <layout title="Map" :inside-vault="true" :layout-data="layoutData">
    <main class="relative sm:mt-19">
      <div
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
                    <h2 class="text-base font-semibold text-gray-900" id="drawer-title">Panel title</h2>
                  </div>
                  <div class="relative mt-6 flex-1 px-4 sm:px-6">
                    {{ data }}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <VMap style="height: 100vh" zoom="8" :center="[50.073658, 14.41854]">
        <VMapOsmTileLayer />
        <VMapMarker
          v-for="contact in data.contacts"
          @click="editedContact = contact"
          :latlng="[(48.5 + Math.random() * 2).toFixed(6), (13 + Math.random() * 5).toFixed(6)]"
          :title="contact.name"
          :key="contact.id">
          <VMapPinIcon color="green">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
              <path
                d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z" />
            </svg>
          </VMapPinIcon>
        </VMapMarker>
      </VMap>
    </main>
  </layout>
</template>

<style lang="scss" scoped></style>
