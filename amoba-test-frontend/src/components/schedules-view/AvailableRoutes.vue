<script lang="ts" setup>
import AvailableRoutesRoute from './AvailableRoutesRoute.vue'

const routes = ['Ruta 1', 'Ruta 2', 'Ruta 3', 'Ruta 4']
</script>

<template>
  <div class="available-routes">
    <h2 class="available-routes__title">Rutas Disponibles</h2>

    <AvailableRoutesRoute
      v-for="(route, index) in routes"
      class="available-routes__route"
      :key="index"
      :name="route"
      :selected="index === 0"
    />
  </div>
</template>

<style lang="scss" scoped>
@use '@/assets/colors';
.available-routes {
  background-color: colors.$white;
  border-radius: 20px;
  padding: 29px 43px;

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
