<template>
    <app-Layout>
        <h1>Woozoo</h1>
    </app-Layout>
</template>

<script>
import AppLayout from "./../../Layouts/AppLayout";

export default {
    components: {
    AppLayout,
    },
    props: ["oneprops"],

  mounted() {
    console.log("Component Home mounted.");
  },
}
</script>