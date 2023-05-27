<script lang="ts" setup>
defineProps<{
  name: string
  selected?: boolean
}>()

const emit = defineEmits<{
  (e: 'onClick'): void
}>()
</script>

<template>
  <div
    class="route"
    :class="{
      'route--selected': selected
    }"
    @click="emit('onClick')"
  >
    {{ name }}
  </div>
</template>

<style lang="scss" scoped>
@use '@/assets/colors';
@use '@/assets/fonts';

.route {
  display: flex;
  align-items: center;
  @extend .lato;
  font-weight: 700;
  border-left: 5px solid colors.$light-green;
  padding: 0px 10px;
  height: 22px;
  color: colors.$grey;
  font-size: 14px;
  width: 100%;
  cursor: pointer;

  &--selected {
    background-color: colors.$light-grey-2;
  }
}
</style>
