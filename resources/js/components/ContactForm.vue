<template>
  <div>
    <a href="#/contatos" class="btn btn-secondary my-3">Todos os contatos</a>
    <h4>Entre em contato:</h4>
    <form id="form" v-on:submit.prevent="handleSubmit">
      <div class="mb-3">
        <!-- <label for="" class="form-label">Email address</label> -->
        <input
          type="text"
          class="form-control"
          id="nome"
          placeholder="Nome"
          v-model="form.nome"
          required
        />
        <small
          :key="key"
          v-for="(item, key) in errors.nome"
          class="text-danger"
        >
          {{ item }}
          <br />
        </small>
      </div>
      <div class="mb-3">
        <!-- <label for="exampleInputEmail1" class="form-label">Email address</label> -->
        <input
          type="email"
          class="form-control"
          id="email"
          placeholder="E-mail"
          v-model="form.email"
          required
        />
        <small
          :key="key"
          v-for="(item, key) in errors.email"
          class="text-danger"
        >
          {{ item }}
          <br />
        </small>
      </div>
      <div class="mb-3">
        <!-- <label for="exampleInputPassword1" class="form-label">Password</label> -->
        <input
          type="tel"
          class="form-control"
          id="telefone"
          placeholder="Telefone (xx) xxxxx-xxxx"
          v-model="form.telefone"
          required
          pattern="(\([0-9]{2}\))\s([9]{1})?([0-9]{4})-([0-9]{4})"
        />
        <small
          :key="key"
          v-for="(item, key) in errors.telefone"
          class="text-danger"
        >
          {{ item }}
          <br />
        </small>
      </div>
      <div class="mb-3">
        <!-- <label for="exampleInputPassword1" class="form-label">Password</label> -->
        <textarea
          class="form-control"
          id="mensagem"
          placeholder="Mensagem"
          v-model="form.mensagem"
          required
        >
        </textarea>
        <small
          :key="key"
          v-for="(item, key) in errors.mensagem"
          class="text-danger"
        >
          {{ item }}
          <br />
        </small>
      </div>
      <div class="mb-3">
        <label for="anexo" class="form-label">Anexo:</label>
        <input
          type="file"
          class="form-control"
          id="anexo"
          v-on:change="handleFileInput"
          required
        />
        <small
          :key="key"
          v-for="(item, key) in errors.anexo"
          class="text-danger"
        >
          {{ item }}
          <br />
        </small>
      </div>
      <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
    <div v-if="success" class="alert alert-success my-3" role="alert">
      {{ success }}
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      form: {
        nome: "",
        email: "",
        telefone: "",
        mensagem: "",
        ip: "",
        anexo: null,
      },
      errors: {},
      success: null,
    };
  },
  methods: {
    handleSubmit() {
      //   this.returnUserIP();
      let formData = new FormData();
      formData.append("nome", this.form.nome);
      formData.append("email", this.form.email);
      formData.append("telefone", this.form.telefone);
      formData.append("mensagem", this.form.mensagem);
      formData.append("ip", this.form.ip);
      formData.append("anexo", this.form.anexo);
      fetch("api/contatos", {
        headers: {
          Accept: "application/json",
        },
        method: "POST",
        body: formData,
      }).then((res) => {
        res.json().then((data) => {
          if (data.errors) {
            this.errors = data.errors;
          }
          if (res.status == 200) {
            this.success = data.message;
            this.form.nome = "";
            this.form.email = "";
            this.form.telefone = "";
            this.form.mensagem = "";
            this.form.ip = "";
            this.form.anexo = null;
            document.querySelector('#form').reset(); 
          }
        });
      });
    },
    handleFileInput(e) {
      this.form.anexo = e.target.files[0];
    },
  },
};
</script>

<style>
</style>