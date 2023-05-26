import { ref } from 'vue'

const title = ref('')

function setTitle(newTitle: string) {
  title.value = newTitle
}

export function useHeaderTitle() {
  return {
    title,
    setTitle
  }
}
