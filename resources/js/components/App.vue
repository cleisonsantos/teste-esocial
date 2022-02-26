<template>
  <div>
    <nav class="nav">
      <a href="#/" class="btn btn-secondary my-3">Home</a>
      <a href="#/contatos" class="btn btn-secondary my-3">Todos os contatos</a>
    </nav>
    <div class="main">
      <component :is="currentView" />
    </div>
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
body {
  background-image: linear-gradient(
    to bottom right,
    cornflowerblue,
    aquamarine
  );
}

.nav {
  display: flex;
  justify-content: space-evenly;
  align-items: flex-start;
  min-height: 10vh;
}

.main {
  display: flex;
  min-height: 90vh;
  width: 100%;
  align-items: center;
  justify-content: center;
  flex-flow: column;
}
</style>