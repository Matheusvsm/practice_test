<template>
  <div class="hold-transition sidebar-mini">
    <div class="wrapper">
      <Topbar />
      <Sidebar />
      <RouterView />
      <Footer />
    </div>
  </div>
</template>
<script>
import Topbar from "../components/Topbar.vue";
import Footer from "../components/Footer.vue";
import Sidebar from "../components/Sidebar.vue";
import { RouterView } from "vue-router";

export default {
  name: "AppLayout",
  components: { Footer, Sidebar, Topbar },
};
</script>
<style scoped></style>
