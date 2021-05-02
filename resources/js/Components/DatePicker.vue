<template>
  <vue-datepicker-local v-model="time" format="YYYY-MM-DD HH:mm:ss"></vue-datepicker-local>
</template>

<script>
import VueDatepickerLocal from 'vue-datepicker-local'

export default {
  components: {
    VueDatepickerLocal
  },
  data () {
    return {
      time: new Date()
    }
  }
}
</script>