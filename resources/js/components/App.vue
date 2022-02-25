<template>
  <div class="main">
    <component :is="currentView" />
  </div>
</template>

<script>
import ContactForm from "./ContactForm.vue";
import ListContacts from "./ListContacts.vue";

const routes = {
  "/": ContactForm,
  "/contatos": ListContacts,
};

export default {
  data() {
    return {
      currentPath: window.location.hash,
    };
  },
  computed: {
    currentView() {
      return routes[this.currentPath.slice(1) || "/"];
    },
  },
  mounted() {
    window.addEventListener("hashchange", () => {
      this.currentPath = window.location.hash;
    });
  },
};
</script>

<style>
.main {
  display: flex;
  min-height: 100vh;
  width: 100%;
  align-items: center;
  justify-content: center;
  flex-flow: column;
}
body {
  background-image: linear-gradient(
    to bottom right,
    cornflowerblue,
    aquamarine
  );
}
</style>