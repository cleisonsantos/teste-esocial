<template>
  <div class="main">
    <a href="/contatos" class="btn btn-secondary my-3">Todos os contatos</a>
    <ContactForm />
  </div>
</template>

<script>
import ContactForm from "./ContactForm.vue";
export default {
    components: {
        ContactForm
    }
};
</script>

<style>
    .main {
        display: flex;
        height: 100vh;
        width: 100%;
        align-items: center;
        justify-content: center;
        flex-flow: column;
        background-image: linear-gradient(to bottom right, cornflowerblue, aquamarine);
    }
</style>