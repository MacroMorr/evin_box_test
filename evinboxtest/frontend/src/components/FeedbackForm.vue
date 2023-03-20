<script>
import axios from 'axios'

export default {
  data: () => ({
    valid: false,

    name: '',
    nameRules: [
      value => {
        return value ? true : 'Name is required.'
      },
    ],

    phone: '',
    phoneRules: [
      value => {
        return value ? true : 'Phone is required.'
      },
    ],

    message: '',
    messageRules: [
      value => {
        return value ? true : 'Message is required.'
      },
    ],
  }),

  methods: {
    async sendForm() {
      const response = await axios.post(import.meta.env.VITE_BACKEND_URL, {
        name: this.name,
        phone: this.phone,
        message: this.message,
      })

    }
  }
}
</script>

<template>
  <v-form v-model="valid">
    <v-container>
      <v-row>
        <v-col cols="12" md="12">
          <v-text-field
              v-model="name"
              :rules="nameRules"
              label="Your Name"
              required
          />

          <v-text-field
              v-model="phone"
              :rules="phoneRules"
              label="Your phone"
              required
          />

          <v-text-field
              v-model="message"
              :rules="messageRules"
              label="Your message text"
              required
          />

          <v-btn variant="outlined" width="200" @click="sendForm">
            Send
          </v-btn>

        </v-col>
      </v-row>
    </v-container>
  </v-form>
</template>

<style scoped>

</style>
