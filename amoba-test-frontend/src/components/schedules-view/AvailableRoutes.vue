<script lang="ts" setup>
import type Route from '@/types/Route'
import AvailableRoutesRoute from './AvailableRoutesRoute.vue'
import TheLoading from '@/components/TheLoading.vue'
import { ref, watch } from 'vue'

const props = defineProps<{
  availableRoutes: Route[]
  loading?: boolean
}>()

const emit = defineEmits<{
  (e: 'selectedRouteChange', route: Route | null): void
}>()

const selectedRoute = ref<Route | null>(null)

watch(
  () => props.loading,
  () => {
    if (selectedRoute.value === null) return

    setSelectedRoute(null)
  }
)

function setSelectedRoute(route: Route | null) {
  if (selectedRoute.value === route) route = null

  selectedRoute.value = route
  emit('selectedRouteChange', selectedRoute.value)
}
</script>

<template>
  <div class="available-routes">
    <h2 class="available-routes__title">Rutas Disponibles</h2>

    <div class="available-routes__empty-text" v-if="!availableRoutes.length && !loading">
      No hay rutas disponibles.
    </div>

    <TheLoading v-if="loading" text="Cargando rutas disponibles..." />

    <div class="available-routes__container" v-if="!loading">
      <AvailableRoutesRoute
        v-for="(route, index) in availableRoutes"
        class="available-routes__route"
        :key="index"
        :name="route.title"
        :selected="selectedRoute === route"
        @on-click="setSelectedRoute(route)"
      />
    </div>
  </div>
</template>

<style lang="scss" scoped>
@use '@/assets/colors';

.available-routes {
  background-color: colors.$white;
  border-radius: 20px;
  padding: 29px 43px;

  &__empty-text {
    text-align: center;
  }

  &__title {
    font-size: 18px;
    font-weight: 700;
    margin-bottom: 42px;
  }

  &__route {
    margin-top: 16px;
  }
}
</style>
